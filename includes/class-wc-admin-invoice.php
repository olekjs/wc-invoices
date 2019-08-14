<?php
/**
 * Admin Invoices Class
 */

class WC_Admin_Invoice
{
    public static function output()
    {
        include dirname(__FILE__) . '/views/html-admin-invoices.php';
    }

    public function orders()
    {
        $query = new WC_Order_Query();

        return $query->get_orders();
    }
}
