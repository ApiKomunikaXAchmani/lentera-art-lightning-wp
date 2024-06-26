<?php
/**
 * Extension-Boilerplate
 * @link https://github.com/ReduxFramework/extension-boilerplate
 *
 * Radium Importer - Modified For ReduxFramework
 * @link https://github.com/FrankM1/radium-one-click-demo-install
 *
 * @package     WBC_Importer - Extension for Importing demo content
 * @author      Webcreations907
 * @version     1.0.1
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// Don't duplicate me!
if ( !class_exists( 'ReduxFramework_wbc_importer' ) ) {

    /**
     * Main ReduxFramework_wbc_importer class
     *
     * @since       1.0.0
     */
    class ReduxFramework_wbc_importer {

        /**
         * Field Constructor.
         *
         * @since       1.0.0
         * @access      public
         * @return      void
         */
        function __construct( $field, $value, $parent ) {
            $this->parent = $parent;
            $this->field = $field;
            $this->value = $value;
			
            $class = ReduxFramework_extension_wbc_importer::get_instance();

            if ( !empty( $class->demo_data_dir ) ) {
                $this->demo_data_dir = $class->demo_data_dir;
				$this->demo_data_url = get_template_directory_uri().'/inc/demo-data/';
//				$this->demo_data_url = site_url( str_replace( trailingslashit( str_replace( '\\', '/', ABSPATH ) ), '', $this->demo_data_dir ) );
            }

            if ( empty( $this->extension_dir ) ) {
                $this->extension_dir = trailingslashit( str_replace( '\\', '/', dirname( __FILE__ ) ) );
                $this->extension_url = site_url( str_replace( trailingslashit( str_replace( '\\', '/', ABSPATH ) ), '', $this->extension_dir ) );
            }
        }

        /**
         * Field Render Function.
         *
         * @since       1.0.0
         * @access      public
         * @return      void
         */
        public function render() {

            echo '</fieldset></td></tr><tr><td colspan="2"><fieldset class="redux-field wbc_importer">';

            $nonce = wp_create_nonce( "redux_{$this->parent->args['opt_name']}_wbc_importer" );

            // No errors please
            $defaults = array(
                'id'        => '',
                'url'       => '',
                'width'     => '',
                'height'    => '',
                'thumbnail' => '',
            );

            $this->value = wp_parse_args( $this->value, $defaults );

            $imported = false;
			
            $this->field['wbc_demo_imports'] = apply_filters( "redux/{$this->parent->args['opt_name']}/field/wbc_importer_files", array() );

            echo '<div class="theme-browser">'
					. '<div class="description">'
						. apply_filters( 'wbc_importer_description', esc_html__( 'Works best to import on a new install of WordPress', 'dfd-native' ) )
					. '</div>'
					. '<div class="themes">';

            if ( !empty( $this->field['wbc_demo_imports'] ) ) {
				
				$i = 0;
				
                foreach ( $this->field['wbc_demo_imports'] as $section => $imports ) {
					$i++;
                    if ( empty( $imports ) ) {
                        continue;
                    }

                    if ( !array_key_exists( 'imported', $imports ) ) {
                        $extra_class = 'not-imported';
                        $imported = false;
                        $import_message = esc_html__( 'Import Demo', 'dfd-native' );
                    }else {
                        $imported = true;
                        $extra_class = 'active imported';
                        $import_message = esc_html__( 'Demo Imported', 'dfd-native' );
                    }
                    echo '<div class="wrap-importer theme '.$extra_class.'" data-demo-id="'.esc_attr( $section ).'"  data-nonce="' . $nonce . '" id="' . $this->field['id'] . '-custom_imports">';
                    echo '<div class="dfd-import-wrap-cover">';

                    echo '<div class="theme-screenshot">';

                    if ( isset( $imports['image'] ) ) {
						$urlPrefix = $this->demo_data_url;
						if($imports['content_file']) {
							$urlPrefix = 'http://dfd.name/check-native/files/ntv/';
						}
						
						
                        echo '<img class="wbc_image" src="'.esc_attr( esc_url($urlPrefix.$imports['directory'].'/'.$imports['image'] ) ).'"/>';

                    }
                    echo '</div>';

                    echo '<span class="more-details">'.$import_message.'</span>';

						
							if ( false == $imported ) {
								$button_ntml = '';
									if(
										$imports['directory'] != '107_elementor_forty_five' &&
										$imports['directory'] != '55_elementor_one' &&
										$imports['directory'] != '56_elementor_two' &&
										$imports['directory'] != '57_elementor_three' &&
										$imports['directory'] != '58_elementor_four'
									) {
										$button_ntml .= '<div class="theme-actions"><span class="spinner">'.esc_html__( 'Please Wait...', 'dfd-native' ).'</span>';
										$button_ntml .= '<span class="button-primary importer-button import-demo-data">' . esc_html__( 'Import Demo', 'dfd-native' ) . '</span>';
									} else {
										$button_ntml = '<div class="theme-actions" style="width: 80%; text-align: center; color: #fff; padding: 20px; background: rgba(0,0,0,.8); top: 0%;">
															<span>Please load the demo via Tools > Import > WordPress Importer.</ br> Files can be found in theme mainfiles.</span>';
									}
									echo '<div class="wbc-importer-buttons">';
										echo $button_ntml;
									echo '</div>';
							} else {
								echo '<div class="theme-actions">';
									echo '<div class="wbc-importer-buttons button-secondary importer-button">'.esc_html__( 'Imported', 'dfd-native' ).'</div>';
									echo '<span class="spinner">'.esc_html__( 'Please Wait...', 'dfd-native' ).'</span>';
									echo '<div id="wbc-importer-reimport" class="wbc-importer-buttons button-primary import-demo-data importer-button"><span>'.esc_html__('Re','dfd-native').'</span>'.esc_html__( 'Import demo', 'dfd-native' ).'</div>';
							}
							
						echo '</div>';
                    echo '</div>';
                    echo '<h3 class="theme-name">'. esc_html( apply_filters( 'wbc_importer_directory_title', $imports['directory'] ) ) .'</h3>';
                    echo '</div>';

//					switch($i) {
//						case $i % 4 == 0:
//							echo '<div class="clear clear-main"></div>';
//							break;
//						case $i % 3 == 0:
//							echo '<div class="clear clear-three-cols"></div>';
//							break;
//						case $i % 2 == 0:
//							echo '<div class="clear clear-two-cols"></div>';
//							break;
//					}
                }

            } else {
                echo "<h5>".esc_html__( 'No Demo Data Provided', 'dfd-native' )."</h5>";
            }

            echo '</div></div>';
            echo '</fieldset></td></tr>';

        }

        /**
         * Enqueue Function.
         *
         * @since       1.0.0
         * @access      public
         * @return      void
         */
        public function enqueue() {

            $min = Redux_Functions::isMin();

            wp_enqueue_script(
                'redux-field-wbc-importer-js',
                $this->extension_url . '/field_wbc_importer' . $min . '.js',
                array('jquery'),
                time(),
                true
            );
//
//            wp_enqueue_style(
//                'redux-field-wbc-importer-css',
//                $this->extension_url . 'field_wbc_importer.css',
//                time(),
//                true
//            );

        }
    }
}
