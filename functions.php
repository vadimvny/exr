<?php

class EXR_Theme 
{
     
    static private $self = null;
    
    static public $newDevAgentCount = 3;
    
    private function __construct()
    {
        $this->initActions();
        add_theme_support('post-thumbnails');
        add_image_size('neighborhoods', 400, 300, true); 
        
        add_action('init', array( $this, 'create_post_type_new_developments') ); // Add our Testimonials Type
        add_action( 'add_meta_boxes', array( $this, 'exr_new_development_add_meta_box') ); 
        add_action( 'save_post', array($this, 'exr_new_development_save_meta_box_data') );
    }    
    
    protected function initActions()
    {
        add_action('init', array($this, 'registerMenus'));
        wp_enqueue_style( 'we3-search-styles', plugin_dir_url().'/we3-real-estate/modules/search/css/we3-search.css', array(), '1.0.2' );
        wp_enqueue_style( 'we3-custom',  get_template_directory_uri() . '/we3-custom.css', array(), '1.0.0' );
 
		wp_enqueue_script('we3-search-script', plugin_dir_url().'/we3-real-estate/modules/search/js/we3-searchv2.js', array(), '1.0.0');
		wp_enqueue_script('we3-jquery-number-script', plugin_dir_url().'/we3-real-estate/modules/search/js/jquery.number.min.js');
		
		wp_enqueue_script('we3-handlebars-script', plugins_url() . '/we3-real-estate/js/handlebars.js');
					
    }
    
    /** actions **/
    
    public function registerMenus() 
    {
        register_nav_menu('footer-nav', __('Footer Nav'));
        register_nav_menu('top-right', __('Top Right'));
    }
    
    public static function getInstance()
    {
        if (is_null(self::$self)) self::$self = new self();
        return self::$self;
    }  
    
    
	public static function create_post_type_new_developments()
	{
		register_taxonomy_for_object_type('category', 'new-developments'); // Register Taxonomies for Category
		register_taxonomy_for_object_type('post_tag', 'new-developments');
		register_post_type('new-developments', // Register Custom Post Type
			array(
			'labels' => array(
				'name' => __('New Developments', 'new-development'), // Rename these to suit
				'singular_name' => __('New Developments', 'new-development'),
				'add_new' => __('Add New', 'new-development'),
				'add_new_item' => __('Add New New Developments', 'new-development'),
				'edit' => __('Edit', 'new-development'),
				'edit_item' => __('Edit New Development', 'new-development'),
				'new_item' => __('New New Developments', 'new-development'),
				'view' => __('View New Developments', 'new-development'),
				'view_item' => __('View New Development', 'new-development'),
				'search_items' => __('Search New Developments', 'new-development'),
				'not_found' => __('No New Developments found', 'new-development'),
				'not_found_in_trash' => __('No New Developments found in Trash', 'new-development')
			),
			'public' => true,
			'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
			'has_archive' => true,
			'supports' => array(
				'title',
				'editor',
				'excerpt',
				'thumbnail'
			), // Go to Dashboard Custom HTML5 Blank post for supports
			'can_export' => true, // Allows export in Tools > Export
			'taxonomies' => array(
				'post_tag',
				'category'
			) // Add Category and Post Tags support
		));
	}
  
    
    public static function exr_new_development_add_meta_box() {
		add_meta_box(
				'exr_new_development_sectionid',
				__( 'EXR New Development Details', 'exr_new_development_textdomain' ),
				array(self::$self, 'exr_new_development_meta_box_callback'),
				'new-developments'
			);
	}
	public function exr_print_building_select($name, $value){

			if ( false === ( $agents = get_transient( 'exr_buildings' ) ) || true ) {
				$we3Options = get_option('we3-real-estate');
				$we3_agent_api = $we3Options['search_api'] . '/search-results?source_namespace=' . $we3Options['name_space']. '&rp=999&sort='.urlencode('full_street_address asc');
				//echo $we3_agent_api;
				$result = json_decode(file_get_contents($we3_agent_api));
				$buildings = $result->data;
				set_transient( 'exr_buildings', $agents, 60 * MINUTE_IN_SECONDS );
			}
		
			$buildingArray = array();
			foreach($buildings as $building){
				if(!empty($building->building)){
					$buildingArray[$building->building] = $building->full_street_address . ', '. $building->city . ', '. $building->state . ' '. $building->zip;
				}
			}
		
			echo '<select id="'. $name . '" name="'.$name.'">';
			echo    '<option value="">--Not Selected--</option>';
			foreach($buildingArray as $key => $building){
				$selected = '';
				if($value == $key){
					$selected = ' selected';
				}
				echo '<option value="' . $key . '" '. $selected . '>'.ucwords($building).'</option>';
			}
			echo '</select>';

	}

	public static function exr_print_agent_select($name, $value){

		if ( false === ( $agents = get_transient( 'exr_agents' ) ) ) {
			$we3Options = get_option('we3-real-estate');
			$we3_agent_api = $we3Options['search_api'] . '/agents?source_namespace=' . $we3Options['name_space'].'&rp=999&sort='.urlencode('last_name asc');
			//echo $we3_agent_api;
			$result = json_decode(file_get_contents($we3_agent_api));
			$agents = $result->data;
			set_transient( 'exr_agents', $agents, 60 * MINUTE_IN_SECONDS );
		}	
		
		echo '<select id="'. $name . '" name="'.$name.'">';
		echo    '<option value="">--Not Selected--</option>';
		foreach($agents as $agent){
			$selected = '';
			if($value == $agent->key){
				$selected = ' selected';
			}
			echo '<option value="' . $agent->key . '" '. $selected . '>'.ucwords($agent->last_name) . ', '. ucwords($agent->first_name).'</option>';
		}
		echo '</select>';

	}
	
	
	public static function exr_new_development_meta_box_callback( $post ) {
			// Add a nonce field so we can check for it later.
			
			
			wp_nonce_field( 'exr_new_development_meta_box', 'exr_new_development_meta_box_nonce' );
		
			/*
			 * Use get_post_meta() to retrieve an existing value
			 * from the database and use the value for the form.
			 */
		 
			$featureField = 'exr_new_development_feature';
			$feature= get_post_meta( $post->ID, $featureField , true );
		
			echo '<p><label for="exr_new_development_feature">';
			_e( 'Featured ', 'exr_new_development_textdomain' );
			echo '</label> ';
			$checked = '';
			if($feature == 'featured'){
				$checked = ' checked';
			}
			echo ' <input type="checkbox" id="' . $featureField . '" name="' . $featureField . '" value="featured" '.$checked.' /> <i>Only the last featured new developed will be displayed in large format.</i></p>';

		 
			$soldOutField = 'exr_new_development_sold_out';
			$soldOut= get_post_meta( $post->ID, $soldOutField , true );
		
			echo '<p><label for="exr_new_development_sold_out">';
			_e( 'Sold Out ', 'exr_new_development_textdomain' );
			echo '</label> ';
			$checked = '';
			if($soldOut == 'sold-out'){
				$checked = ' checked';
			}
			echo ' <input type="checkbox" id="' . $soldOutField . '" name="' . $soldOutField . '" value="sold-out" '.$checked.' /></p>';
		
		
			$amenitiesField = 'exr_new_development_amenities';
			$amenities= get_post_meta( $post->ID, $amenitiesField , true );
		
			echo '<p><label for="'.$amenitiesField.'">';
			_e( 'Describe Building Amenities ', 'exr_new_development_textdomain' );
			echo '</label></p> ';
			echo '<p><textarea id="' . $amenitiesField . '" name="' . $amenitiesField . '" style="width:98%;height:60px" >'. $amenities . '</textarea></p>';
		 
			$buildingField = 'exr_new_development_building';
			$building = get_post_meta( $post->ID, $buildingField , true );
		
			echo '<p><label for="'.$buildingField.'">';
			_e( 'Select Building with Active Listings to Associate with this New Development ', 'warburg_new_development_textdomain' );
			echo '</label></p> ';
			self::exr_print_building_select($buildingField, $building);
		
		
			echo '<p><label for="exr_new_development_agent">';
			_e( 'Choose Up to '.self::$newDevAgentCount.' Agents Representing this  New Development: ', 'exr_new_development_textdomain' );
			echo '</label></p> ';
		
			$agents = array();
			for($i=1; $i<=self::$newDevAgentCount; $i++){
				$agentField = 'exr_new_development_agent_'.$i;	
				$agents[$i] = get_post_meta( $post->ID, $agentField, true );
				self::exr_print_agent_select($agentField, $agents[$i]);
			}
		
		
		
	}
	
	public static function exr_new_development_save_meta_box_data( $post_id ) {
		// Check if our nonce is set.
		if ( ! isset( $_POST['exr_new_development_meta_box_nonce'] ) ) {
			return;
		}

		// Verify that the nonce is valid.
		if ( ! wp_verify_nonce( $_POST['exr_new_development_meta_box_nonce'], 'exr_new_development_meta_box' ) ) {
			return;
		}

		// If this is an autosave, our form has not been submitted, so we don't want to do anything.
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		// Check the user's permissions.
		if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

			if ( ! current_user_can( 'edit_page', $post_id ) ) {
				return;
			}

		} else {

			if ( ! current_user_can( 'edit_post', $post_id ) ) {
				return;
			}
		}

		/* OK, it's safe for us to save the data now. */
	
		// Make sure that it is set.
	
		if ( isset( $_POST['exr_new_development_feature'] ) ) {
			$feature = sanitize_text_field( $_POST['exr_new_development_feature'] );
			update_post_meta( $post_id, 'exr_new_development_feature', $feature );
		}else{
			update_post_meta( $post_id, 'exr_new_development_feature', '' );
		}
	
	
		if ( isset( $_POST['exr_new_development_sold_out'] ) ) {
			$soldOut = sanitize_text_field( $_POST['exr_new_development_sold_out'] );
			update_post_meta( $post_id, 'exr_new_development_sold_out', $soldOut );
		}else{
			update_post_meta( $post_id, 'exr_new_development_sold_out', '' );
		}
	
		if ( isset( $_POST['exr_new_development_amenities'] ) ) {
			$amenities = sanitize_text_field( $_POST['exr_new_development_amenities'] );
			update_post_meta( $post_id, 'exr_new_development_amenities', $amenities );
		}
	
		if ( isset( $_POST['exr_new_development_building'] ) ) {
			$building = sanitize_text_field( $_POST['exr_new_development_building'] );
			update_post_meta( $post_id, 'exr_new_development_building', $building );
		}
	
		$agents = array();
		for($i=1; $i<=self::$newDevAgentCount; $i++){
			$agentField = 'exr_new_development_agent_'.$i;
			if ( isset( $_POST[$agentField] ) ) {
				$agents[$i] = sanitize_text_field( $_POST[$agentField] );
				update_post_meta( $post_id, $agentField, $agents[$i] );
			}
		}

	}
}



EXR_Theme::getInstance();