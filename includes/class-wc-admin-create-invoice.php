<?php
/**
 * Admin Create Invoice Class
 */

class WC_Admin_Create_Invoice
{
    public static function output()
    {
        global $wpdb;
        include dirname(__FILE__) . '/views/html-admin-create-invoice.php';
    }
}
