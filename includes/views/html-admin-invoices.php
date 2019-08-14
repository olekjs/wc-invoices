<?php
/**
 * Admin View: Page - Invoices
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<?php 
/**
 * @TODO Ten kod raczej nie jest poprawny. Trzeba wywalić poniższą linię.
 * A następnie zastanowić się w jaki sposób użyć tej klasy w tym widoku.
 */
include_once dirname(__FILE__) . '/../class-wc-admin-invoice.php'; 
?>

<div class="wrap woocommerce">
    <h1 class="wp-heading-inline">Faktury</h1>
    <a href="" class="page-title-action">Utwórz fakturę</a>
    <table class="wp-list-table widefat fixed striped">
        <thead>
            <tr class="wp-list-table__row">
                <th class="wp-list-table">Id</th>
                <th class="wp-list-table">status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach (WC_Admin_Invoice::orders() as $order): ?>
                <tr>
                    <td><?php echo $order->get_data()['id']; ?></td>
                    <td><?php echo $order->get_data()['status']; ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>