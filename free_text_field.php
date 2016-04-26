<?php
	/*
	Plugin Name: Free Text Field
	*/
	function recipient_email_field()
	{
		echo '<table class = "variations" cellspacing="0">
				<tbody>
					<tr>
					<td class = "label"><label for = "Word Count">Email of Recipient</label></td>
					<td class="value">
						<input type="text" name = "recipient-email" value="" />
					</td>
					</tr>
				</tbody>
			</table>';
	}
	//add_action('woocommerce_before_add_to_cart_button', 'recipient_email_field');
	
	function validate_recipient_email()
	{
		if( empty($_REQUEST['recipient-email']))
		{
			wc_add_notice( __('Please input an email for the recipient of the note', 'woocommerce'), 'error' );
			return false;
		}
		return true;
	}
	//add_action('woocommerce_add_to_cart_validation', 'validate_recipient_email', 10, 3);
	
	function store_recipient_email_in_cart($cart_item_data, $product_id )
	{
		if(isset($_REQUEST['recipient-email']))
		{
			$cart_item_data['recipient_email'] = $_REQUEST['recipient-email'];
			//every add is a unique line item
			$cart_item_data['unique_key'] = md5(microtime().rand());
		}
		return $cart_item_data;
	}
	//add_action( 'woocommerce_add_cart_item_data', 'store_recipient_email_in_cart', 10, 2);
	
	function checkout_and_cart_rendering($cart_data, $cart_item = null)
	{
		$custom_items = array();
		if(!empty($cart_data))
		{
			$custom_items = $cart_data;
		}
		if(isset($cart_item['recipient_email']))
		{
			$custom_items[] = array("name" => 'Recipient Email', "value" => $cart_item['recipient_email']);
		}
		return $custom_items;
	}
	add_action('woocommerce_before_add_to_cart_button', 'recipient_email_field');
	add_action('woocommerce_add_to_cart_validation', 'validate_recipient_email', 10, 3);
	add_action( 'woocommerce_add_cart_item_data', 'store_recipient_email_in_cart', 10, 2);
	add_filter('woocommerce_get_item_data', 'checkout_and_cart_rendering', 10, 2);
?>