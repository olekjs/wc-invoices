<?php
/**
 * Admin Invoices Class
 */

class WC_Admin_Invoice
{
    public static function output()
    {
        global $wpdb;
        include dirname(__FILE__) . '/views/html-admin-invoices.php';
    }

    public static function invoices()
    {
        global $wpdb;
         // @TODO trzba podmienić wp_wc_invoices na $wpdb->wc_invoices czy coś w tym stylu, tak żeby działało.
        return $wpdb->get_results("SELECT * FROM wp_wc_invoices");
    }

    public static function existingInvoices()
    {
        global $wpdb;
        return empty(static::invoices());
    }
}
