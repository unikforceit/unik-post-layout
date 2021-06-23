<?php
/**
 * Plugin Name: Unik Post Layout
 * Description: Unik Post Layout is a custom elementor addons to show wordpress posts in modern look.
 * Plugin URI:  https://wordpress.org/elementor-post-layout/
 * Version:     1.0.0
 * Author:      UnikForce
 * Author URI:  https://unikforce.com/
 * Text Domain: unikpostlayout
 */

if (!defined('ABSPATH'))
    exit;

if (!class_exists('Unik_Post_Layout')) {

    /**
     * Main Unik Post Layout Class
     *
     */
    final class Unik_Post_Layout
    {


        /**
         * Plugin Version
         *
         * @since 1.0.0
         *
         * @var string The plugin version.
         */
        const VERSION = '1.0.0';

        /**
         * Minimum Elementor Version
         *
         * @since 1.0.0
         *
         * @var string Minimum Elementor version required to run the plugin.
         */
        const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

        /**
         * Minimum PHP Version
         *
         * @since 1.0.0
         *
         * @var string Minimum PHP version required to run the plugin.
         */
        const MINIMUM_PHP_VERSION = '5.6';

        /** Singleton *************************************************************/

        private static $instance;

        /**
         * On Plugins Loaded
         *
         * Checks if Elementor has loaded, and performs some compatibility checks.
         * If All checks pass, inits the plugin.
         *
         * Fired by `plugins_loaded` action hook.
         *
         * @since 1.0.0
         *
         * @access public
         */
        public function on_plugins_loaded()
        {

            if ($this->is_compatible()) {
                add_action('elementor/init', [$this, 'init']);
            }

        }

        /**
         * Compatibility Checks
         *
         * Checks if the installed version of Elementor meets the plugin's minimum requirement.
         * Checks if the installed PHP version meets the plugin's minimum requirement.
         *
         * @since 1.0.0
         *
         * @access public
         */
        public function is_compatible()
        {

            // Check if Elementor installed and activated
            if (!did_action('elementor/loaded')) {
                add_action('admin_notices', [$this, 'admin_notice_missing_main_plugin']);
                return false;
            }

            // Check for required Elementor version
            if (!version_compare(ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=')) {
                add_action('admin_notices', [$this, 'admin_notice_minimum_elementor_version']);
                return false;
            }

            // Check for required PHP version
            if (version_compare(PHP_VERSION, self::MINIMUM_PHP_VERSION, '<')) {
                add_action('admin_notices', [$this, 'admin_notice_minimum_php_version']);
                return false;
            }

        }

        /**
         * Admin notice
         *
         * Warning when the site doesn't have compatible installed or activated.
         *
         * @since 1.0.0
         *
         * @access public
         */
        public function admin_notice_missing_main_plugin()
        {
            if (isset($_GET['activate'])) {
                $message = sprintf(
                /* translators: 1: Plugin name 2: Elementor */
                    esc_html__('"%1$s" requires "%2$s" to be installed and activated.', 'unikpostlayout'),
                    '<strong>' . esc_html__('Unik Post Layout', 'unikpostlayout') . '</strong>',
                    '<strong>' . esc_html__('Elementor', 'unikpostlayout') . '</strong>'
                );
                printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
            }
            unset($_GET['activate']);
        }

        public function admin_notice_minimum_elementor_version()
        {

            if (isset($_GET['activate'])) unset($_GET['activate']);

            $message = sprintf(
            /* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
                esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'unikpostlayout'),
                '<strong>' . esc_html__('Unik Post Layout', 'unikpostlayout') . '</strong>',
                '<strong>' . esc_html__('Elementor', 'unikpostlayout') . '</strong>',
                self::MINIMUM_ELEMENTOR_VERSION
            );

            printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);

        }

        public function admin_notice_minimum_php_version()
        {

            if (isset($_GET['activate'])) unset($_GET['activate']);

            $message = sprintf(
            /* translators: 1: Plugin name 2: PHP 3: Required PHP version */
                esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'unikpostlayout'),
                '<strong>' . esc_html__('Unik Post Layout', 'unikpostlayout') . '</strong>',
                '<strong>' . esc_html__('PHP', 'unikpostlayout') . '</strong>',
                self::MINIMUM_PHP_VERSION
            );

            printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);

        }

        /**
         * Main Unik Post Layout Instance
         *
         * Insures that only one instance of Unik Post Layout exists in memory at any one
         * time. Also prevents needing to define globals all over the place.
         */
        public static function instance()
        {

            if (!isset(self::$instance) && !(self::$instance instanceof Unik_Post_Layout)) {

                self::$instance = new Unik_Post_Layout;

                self::$instance->setup_constants();

                self::$instance->hooks();

                self::$instance->on_plugins_loaded();

                self::$instance->unikpostlayout_includes();

            }
            return self::$instance;
        }

        /**
         * Throw error on object clone
         *
         * The whole idea of the singleton design pattern is that there is a single
         * object therefore, we don't want the object to be cloned.
         */
        public function __clone()
        {
            // Cloning instances of the class is forbidden
            _doing_it_wrong(__FUNCTION__, __('Cheatin&#8217; huh?', 'unikpostlayout'), '1.0.0');
        }

        /**
         * Disable unserializing of the class
         *
         */
        public function __wakeup()
        {
            // Unserializing instances of the class is forbidden
            _doing_it_wrong(__FUNCTION__, __('Cheatin&#8217; huh?', 'unikpostlayout'), '1.0.0');
        }

        /**
         * Setup plugin constants
         *
         */
        private function setup_constants()
        {

            // Plugin Folder Path
            if (!defined('UNIKPOSTLAYOUT_DIR')) {
                define('UNIKPOSTLAYOUT_DIR', plugin_dir_path(__FILE__));
            }
            // Plugin Folder Path
            if (!defined('UNIKPOSTLAYOUT_INC_DIR')) {
                define('UNIKPOSTLAYOUT_INC_DIR', plugin_dir_path(__FILE__));
            }

            // Plugin Folder URL
            if (!defined('UNIKPOSTLAYOUT_URL')) {
                define('UNIKPOSTLAYOUT_URL', plugin_dir_url(__FILE__));
            }

            // Plugin Folder URL
            if (!defined('UNIKPOSTLAYOUT_ASSETS_URL')) {
                define('UNIKPOSTLAYOUT_ASSETS_URL', plugin_dir_url(__FILE__).'assets/');
            }
            if (!defined('UNIKPOSTLAYOUT_VERSION')) {
                define('UNIKPOSTLAYOUT_VERSION', self::VERSION);            }
            }

        private function unikpostlayout_includes()
        {
            foreach (glob(UNIKPOSTLAYOUT_DIR . 'helper/*.php') as $file) {
                require_once $file;
            }
        }

        /**
         * Setup the default hooks and actions
         */
        private function hooks()
        {
            add_action('elementor/widgets/widgets_registered', array(self::$instance, 'unikpostlayout_include_widgets'));
            add_action('elementor/frontend/after_register_scripts', array(self::$instance, 'unikpostlayout_register_frontend_scripts'), 10);
            add_action('elementor/frontend/after_enqueue_styles', array(self::$instance, 'unikpostlayout_register_frontend_styles'), 10);
            add_action('elementor/init', array(self::$instance, 'unikpostlayout_elementor_category'));
            add_action('template_redirect',  array(self::$instance, 'elementorpost_layout_template_block'), 9);
        }

        public function elementorpost_layout_template_block(){
                $instance = \Elementor\Plugin::$instance->templates_manager->get_source('local');
                remove_action('template_redirect', [$instance, 'block_template_frontend']);
        }

        public function unikpostlayout_elementor_category()
        {
            \Elementor\Plugin::instance()->elements_manager->add_category(
                'unikpostlayout',
                array(
                    'title' => __('Unik Post Layout', 'unikpostlayout'),
                    'icon' => 'fa fa-plug',
                ),
                1);
        }

        /**
         * Load Frontend Style
         *
         */
        public function  unikpostlayout_register_frontend_styles()
        {
            // Css Library
            wp_enqueue_style( 'unikpostlayout-bootstrap', UNIKPOSTLAYOUT_ASSETS_URL . 'css/bootstrap.min.css', array(), '5.0.1', 'all' );
            wp_enqueue_style( 'unikpostlayout-owl-carousel', UNIKPOSTLAYOUT_ASSETS_URL . 'css/owl.carousel.min.css', array(), '2.3.4', 'all' );
            wp_enqueue_style( 'unikpostlayout-owl-carousel-default', UNIKPOSTLAYOUT_ASSETS_URL . 'css/owl.theme.default.css', array(), '2.3.4', 'all' );
            // CSS Custom
            wp_enqueue_style('unikpostlayout-elements', UNIKPOSTLAYOUT_ASSETS_URL . 'css/unikpostlayout.css', array(), UNIKPOSTLAYOUT_VERSION);
        }

        /**
         * Load Frontend Scripts
         *
         */
        public function  unikpostlayout_register_frontend_scripts()
        {

            // JS Library
            wp_enqueue_script('unikpostlayout-bootstrap', UNIKPOSTLAYOUT_ASSETS_URL . 'js/bootstrap.min.js', array('jquery'), '5.0.1', true);
            wp_enqueue_script('unikpostlayout-owl-carousel', UNIKPOSTLAYOUT_ASSETS_URL . 'js/owl.carousel.min.js', array('jquery'), '2.3.4', true);
            // Custom Js
            wp_enqueue_script('unikpostlayout-elements', UNIKPOSTLAYOUT_ASSETS_URL . 'js/unikpostlayout.js', array('jquery'), UNIKPOSTLAYOUT_VERSION, true);
        }


        /**
         * Include required files
         *
         */
        public function  unikpostlayout_include_widgets()
        {
            foreach (glob(UNIKPOSTLAYOUT_DIR . 'widgets/*/controls.php') as $file) {
                require_once $file;
            }
        }

    }

} // End if class_exists check

function UNIKPOSTLAYOUT_INIT() {
    return Unik_Post_Layout::instance();
}

// Get UnikPostLayout Running
UNIKPOSTLAYOUT_INIT();
