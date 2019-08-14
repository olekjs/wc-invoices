<?php
/*
Plugin Name: WC Invoice
Description: Faktury do zamówień
Version: 1.0
Author: Olek Kaim
Author URI: https://olekkaim.pl
 */

if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
    // add_action('init', 'my_init', 1);

    // function my_init(){
    //     $orders = new WC_Order(['status' => 'processing']);
    //     // dd($orders);
    // }

    add_action('admin_menu', 'register_invoices_page');

    function register_invoices_page() {
        add_submenu_page(
            'woocommerce',
            'Faktury',
            'Faktury',
            'manage_options',
            'admin-invoices',
            'init_view_class'
        );
    }

    function init_view_class() {
         include dirname( __FILE__ ) . '/includes/class-wc-admin-invoice.php';
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
