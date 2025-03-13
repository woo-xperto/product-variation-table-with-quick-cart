<?php
if ( ! defined( 'ABSPATH' ) ) exit;
class QUICK_admin{

    /**
     * Define Constant.
     *
     * @return void
     * @since 1.0.0
     */
    public function __construct() {
        add_action('admin_menu', [$this, 'addAdminMenu']);
        add_action('wp_ajax_quick_variable_review_dismissed_ajax', array($this, 'quick_variable_review_dismissed_ajax'));
        add_action('admin_enqueue_scripts', [$this, 'enqueueAssets']);
    }

    /**
     * Select admin menu.
     *
     * @return void
     * @since 1.0.0
     */
    public function addAdminMenu() {
        add_menu_page(
            'Variations Table',
            'Variations Table',
            'manage_options',
            'quick-variable-setting',
            [$this, 'renderDashboard'],
            'dashicons-editor-table',
            20
        );
    }

    /**
     * Dashboard setup.
     *
     * @return void
     * @since 1.0.0
     */
    public function renderDashboard() {
        require_once plugin_dir_path(__FILE__) . 'Dashboard.php';
    }

    /**
     * Handle AJAX request dismiss review notice.
     *
     * @return void
     * @since 1.0.2
     */
    function quick_variable_review_dismissed_ajax() {

        check_ajax_referer('qvt_nonce', '_nonce');
        update_option('quick_variable_review_dismissed', true);
        wp_send_json_success(['message' => 'Notice dismissed successfully.']);
    }

    /**
     * Enqueue script.
     *
     * @return void
     * @since 1.0.2
     */
    public function enqueueAssets() {
        wp_enqueue_style('wp-color-picker');
        wp_enqueue_media();
        wp_enqueue_script('jquery-ui-sortable');
        wp_enqueue_script('jquery');
        wp_enqueue_script(
            'variation-gallery-admin',
            plugin_dir_url(dirname(__FILE__)) . 'Assets/JS/admin.js',
            ['jquery', 'wp-color-picker'],
            '1.0.0',
            true
        );

        wp_enqueue_style('main-font-awesome-css-admin', plugin_dir_url(dirname(__FILE__)) . 'Assets/CSS/font-awesome.min.css', array(), '4.7.0');

        $logo_url = esc_url(plugin_dir_url(dirname(__FILE__)) . 'Assets/images/logo.png');
        wp_localize_script( 'variation-gallery-admin', 'qvt_notice_obj', array(
            'ajax_url' => admin_url( 'admin-ajax.php' ),
            'nonce' => wp_create_nonce( 'qvt_nonce' ),
            'logo_url' => $logo_url
        ));
    }

}