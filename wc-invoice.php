<?php
/*
Plugin Name: WC Invoice
Description: Faktury do zamówień
Version: 1.0
Author: Olek Kaim
Author URI: https://olekkaim.pl
 */

if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
    new WC_Invoice();
}

class WC_Invoice
{
    public function __construct()
    {
        add_action('admin_menu', [$this, 'register_invoices_page']);
        add_action('admin_menu', [$this, 'register_create_invoice_page']);
        register_activation_hook(__FILE__, [$this, 'create_table']);
    }

    public function register_invoices_page()
    {
        add_menu_page(
            'Faktury',
            'Faktury',
            'manage_options',
            'admin-invoices',
            function() {
                include_once dirname(__FILE__) . '/includes/class-wc-admin-invoice.php';
                WC_Admin_Invoice::output();
            },
            'dashicons-format-aside'
        );
    }

    public function register_create_invoice_page()
    {
        add_submenu_page(
            'admin-invoices',
            'Tworzenie faktury',
            'Tworzenie faktury',
            'manage_options',
            'admin-create-invoice',
            function() {
                include_once dirname(__FILE__) . '/includes/class-wc-admin-create-invoice.php';
                WC_Admin_Create_Invoice::output();
            }
        );
    }

    public function create_table()
    {
        global $wpdb;

        $sql = $this->generate_sql(
            $wpdb->prefix . 'wc_invoices',
            $wpdb->prefix . 'posts',
            $wpdb->get_charset_collate()
        );

        $this->update_or_create($sql);

        add_option("jal_db_version", "1.0");
    }

    protected function generate_sql($table_name, $posts_table_name, $charset_collate)
    {
        return "CREATE TABLE $table_name (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            order_id bigint(20) unsigned DEFAULT NULL,
            number varchar(255) NOT NULL,
            issue_data date NOT NULL,
            created_at datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
            updated_at datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
            PRIMARY KEY  (id),
            FOREIGN KEY (order_id) REFERENCES $posts_table_name(ID)
        ) $charset_collate;";
    }

    protected function update_or_create($sql)
    {
        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        dbDelta($sql);
    }
}

// @TODO delete this function
function dd()
{
    foreach (func_get_args() as $arg) {
        echo '<pre>', print_r($arg, true), '</pre>';
    }

    die();
}
