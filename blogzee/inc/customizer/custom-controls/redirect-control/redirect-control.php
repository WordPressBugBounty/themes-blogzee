<?php
/**
 * Redirect Link Control
 * 
 * @package Blogzee Pro
 * @since 1.0.0
 */

if( class_exists( 'WP_Customize_Control' ) ) :
    class Blogzee_WP_Redirect_Control extends \Blogzee_WP_Base_Control {
        /**
         * Control type
         * 
         */
        public $type = 'redirect-link';
        public $tab = 'general';

        /**
         * Add custom JSON parameters to use in the JS template.
         *
         * @since  1.0.0
         * @access public
         * @return void
         */
        public function to_json() {
            parent::to_json();
            if( $this->tab ) {
                $this->json['tab'] = $this->tab;
            }
        }

        /**
         * Enqueue scripts/styles.
         *
         * @since 3.4.0
         */
        public function enqueue() {
            wp_enqueue_style( 'blogzee-customizer-redirect-control', get_template_directory_uri() . '/inc/customizer/custom-controls/redirect-control/redirect-control.css', array(), BLOGZEE_VERSION, 'all' );
            wp_enqueue_script( 'blogzee-customizer-redirect-control', get_template_directory_uri() . '/inc/customizer/custom-controls/redirect-control/redirect-control.js', array('jquery'), BLOGZEE_VERSION, [ 'strategy' => 'defer', 'in_footer' => true ] );
        }

        /**
         * Render the control's content.
         *
         */
        public function render_content() {
    ?>
            <div class="section-content-wrap">
                <?php
                    foreach( $this->choices as $key => $choice  ) :
                ?>
                        <a href="#" class="link-item" data-type="<?php echo esc_attr( $choice['type'] ); ?>" data-id="<?php echo esc_attr( $choice['id'] ); ?>"><?php echo esc_html( $choice['label'] ); ?><span class="dashicons dashicons-arrow-right-alt2"></span></a>
                <?php
                    endforeach;
                ?>
            </div>
            <?php
        }
    }
endif;