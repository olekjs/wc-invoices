<?php
/*
Plugin Name: WC Invoice
Description: Faktury do zamówień
Version: 1.0
Author: Olek Kaim
Author URI: https://olekkaim.pl
 */

add_action('admin_menu', 'register_invoices_page');

if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
    function register_invoices_page()
    {
        add_submenu_page(
            'woocommerce',
            'Faktury',
            'Faktury',
            'manage_options',
            'admin-invoices',
            'init_view_class'
        );
    }

    function init_view_class()
    {
        include_once dirname(__FILE__) . '/includes/class-wc-admin-invoice.php';
        WC_Admin_Invoice::output();
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
