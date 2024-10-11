<?php
class Qucikadmin{
    function __construct(){
        add_action('admin_menu', array($this, 'Qucikadminmenu'));
    }

    public function Qucikadminmenu(){
       //Create Qucik Admin menu
        add_menu_page(
            'Variations Table',      
            'Variations Table',       
            'manage_options',       
            'quick-variable-setting',       
            array($this, 'Qucikadmindashboard'),  
            'dashicons-editor-table',      
            20                      
        );

    }

    //Admin Setting Dashboard
    public function Qucikadmindashboard(){
        require_once plugin_dir_path(__FILE__) . "Dashboard.php";
    }
}