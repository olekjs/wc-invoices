<?php
/**
 * Admin View: Page - Invoices
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<div class="wrap woocommerce">
    <h1 class="wp-heading-inline">Faktury</h1>
    <a href='<?php echo admin_url('admin.php?page=admin-create-invoice') ?>' class="page-title-action">Utwórz fakturę</a>
    <?php if(WC_Admin_Invoice::existingInvoices() != 1) { ?>
        <table class="wp-list-table widefat fixed striped">
            <thead>
                <tr class="wp-list-table__row">
                    <th class="wp-list-table">Numer faktury</th>
                    <th class="wp-list-table">Data wystawienia</th>
                    <th class="wp-list-table">Zamówienie powiązane</th>
                    <th class="wp-list-table">Data utworzenia</th>
                    <th class="wp-list-table">Data ostatniej aktualizacji</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach (WC_Admin_Invoice::invoices() as $order): ?>
                    <tr>
                        <td><?php echo $order->number; ?></td>
                        <td><?php echo $order->issue_data; ?></td>
                        <td><?php echo $order->order_id; ?></td>
                        <td><?php echo $order->created_at; ?></td>
                        <td><?php echo $order->updated_at; ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    <?php } else { ?>
        <p>Brak faktur</p>
    <?php } ?>
</div>