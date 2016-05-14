<?php

/*
    Plugin Name: Woo Min Order Amount
    Plugin URI: 
    Description: This is not just a plugin.
    Author: Mirza Twhidul Imran
    Version: 1.0
    Author URI: 
*/

// create custom plugin settings menu
add_action('admin_menu', 'wc_minimum_order_amount_menu');

function wc_minimum_order_amount_menu() {

	//create new top-level menu
	add_plugins_page('Woo Min Order Amount Settings', 'Woo Min Amount', 'administrator', __FILE__, 'wc_minimum_order_amount_settings_page' , plugins_url('/images/icon.png', __FILE__) );

	//call register settings function
	add_action( 'admin_init', 'register_wc_minimum_order_amount_settings' );
}


function register_wc_minimum_order_amount_settings() {
	//register our settings
	register_setting( 'wc-minimum-order-amount-settings-group', 'min_order_amount' );
}

function wc_minimum_order_amount_settings_page() {
?>
    <div class="wrap">
    <h2>Woo Min Order Amount</h2>

    <form method="post" action="options.php">
        <?php settings_fields( 'wc-minimum-order-amount-settings-group' ); ?>
        <?php do_settings_sections( 'wc-minimum-order-amount-settings-group' ); ?>
        <table class="form-table">
            <tr valign="top">
            <th scope="row">Minimum Order Amount</th>
            <td><input type="text" name="min_order_amount" value="<?php echo esc_attr( get_option('min_order_amount') ); ?>" /></td>
            </tr>
        </table>
    
    <?php submit_button(); ?>

    </form>
    </div>
<?php 
} 
