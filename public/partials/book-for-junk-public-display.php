<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://webmkit.com
 * @since      1.0.0
 *
 * @package    Book_For_Junk
 * @subpackage Book_For_Junk/public/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->


<div class="mts_book_for_junk_container">
    <form id="multiStepForm" method="post">
        <!-- Step 1 -->
        <div class="step" id="step1">
            <h2><?php esc_html_e('Step 1: Waste Type', 'book-for-junk'); ?></h2>
            <label class="custom-radio">
                <input type="radio" name="waste_type" value="Household Waste" required>
                <span class="radio-btn" id="waste_type"><?php esc_html_e('Household Waste', 'book-for-junk'); ?></span>
            </label>
            <label class="custom-radio">
                <input type="radio" name="waste_type" value="Garden Waste">
                <span class="radio-btn" id="waste_type"><?php esc_html_e('Garden Waste', 'book-for-junk'); ?></span>
            </label>
            <label class="custom-radio">
                <input type="radio" name="waste_type" value="Mixed Waste">
                <span class="radio-btn" id="waste_type"><?php esc_html_e('Mixed Waste', 'book-for-junk'); ?></span>
            </label>
            <label class="custom-radio">
                <input type="radio" name="waste_type" value="Hardcore (Rubble/Brick)">
                <span class="radio-btn" id="waste_type"><?php esc_html_e('Hardcore (Rubble/Brick)', 'book-for-junk'); ?></span>
            </label>
            <label class="custom-radio">
                <input type="radio" name="waste_type" value="Soil">
                <span class="radio-btn" id="waste_type"><?php esc_html_e('Soil', 'book-for-junk'); ?></span>
            </label>
            <label class="custom-radio">
                <input type="radio" name="waste_type" value="Wood">
                <span class="radio-btn" id="waste_type"><?php esc_html_e('Wood', 'book-for-junk'); ?></span>
            </label>
            <button type="button" class="next"><?php esc_html_e('Next', 'book-for-junk'); ?></button>
        </div>

        <!-- Step 2 -->
        <div class="step" id="step2" style="display:none;">
            <h2><?php esc_html_e('Step 2: Drop of Type', 'book-for-junk'); ?></h2>
            
            <label class="custom-radio">
                <input type="radio" name="drop_of_type" value="Off Road" required>
                <span class="radio-btn" id="off_road"><?php esc_html_e('Off Road', 'book-for-junk'); ?></span>
            </label>
            <label class="custom-radio">
                <input type="radio" name="drop_of_type" value="On Road">
                <span class="radio-btn" id="on_road"><?php esc_html_e('On Road', 'book-for-junk'); ?></span>
            </label>
            <label class="custom-radio">
                <input type="radio" name="drop_of_type" value="Wait and Load">
                <span class="radio-btn" id="wait_and_load"><?php esc_html_e('Wait and Load', 'book-for-junk'); ?></span>
            </label>

            <button type="button" class="prev"><?php esc_html_e('Previous', 'book-for-junk'); ?></button>
            <button type="button" class="next"><?php esc_html_e('Next', 'book-for-junk'); ?></button>
        </div>


        <!-- Step 3 -->
        <div class="step" id="step3" style="display: none">
            <h2><?php esc_html_e('Step 3: Select Your Skip', 'book-for-junk'); ?></h2>

        	<?php
        	$args = array(
			    'orderby' => 'date', // Order by date
			    'order' => 'ASC', // Change to 'DESC' if needed
			    'post_status' => 'publish',
			);


        	$product_query = new WC_Product_Query($args);
			$products = $product_query->get_products();

			?>

			<div class="mts_skip_container">

			<?php
			// Display the products
			if (!empty($products)) {
			    foreach ($products as $product) {
			?>  
				<div class="mts_single_skip">
					<label class="custom-radio">
		                <input type="radio" name="mts_skip" value="<?php echo esc_attr($product->get_id()); ?>" required>
		                <span class="radio-btn" id="mts_skip">
		                	<?php echo esc_html($product->get_image()); ?>
		                	<span style="font-size:22px;font-weight: 600;"><?php e_( $product->get_name(), 'book-for-junk' ); ?></span>
		                	<span style="font-size: 16px;font-weight: 400;line-height: 26px;margin-top: 10px;display: block;"><?php esc_html_e(wpautop($product->get_description()), 'book-for-junk'); ?></span>
		                	<span style="background: #F2FFF8;display: block;padding: 5px;border-radius: 8px;border: 1px solid #E5E7EB;font-size: 18px;font-weight: 600;"><?php esc_html_e( $product->get_price_html(), 'book-for-junk' ); ?></span>
		            	</span>
		            </label>
		        </div>
			<?php
				}
			}
        	?>
        	</div>

            <button type="button" class="prev"><?php esc_html_e('Previous', 'book-for-junk'); ?></button>
            <button type="button" class="next"><?php esc_html_e('Next', 'book-for-junk'); ?></button>
        </div>


        <!-- Step 4 -->
        <div class="step" id="step4" style="display:none">
            <h2><?php esc_html_e('Step 4: DROP OFF DATE', 'book-for-junk'); ?></h2>

        	<input type="date" name="mts_drop_off_date" required>

            <button type="button" class="prev"><?php esc_html_e('Previous', 'book-for-junk'); ?></button>
            <button type="button" class="next"><?php esc_html_e('Next', 'book-for-junk'); ?></button>
        </div>


        <!-- Step 5 -->
        <div class="step" id="step5" style="display:none">
            <h2><?php esc_html_e('Step 5: COLLECTION FROM DATE', 'book-for-junk'); ?></h2>

        	<input type="date" name="mts_collection_from_date" required>

            <button type="button" class="prev"><?php esc_html_e('Previous', 'book-for-junk'); ?></button>
            <button type="button" class="next"><?php esc_html_e('Next', 'book-for-junk'); ?></button>
        </div>


        <!-- Step 6 -->
        <div class="step" id="step6" style="display:none;">
            <h2><?php esc_html_e('Step 6: Confirmation', 'book-for-junk'); ?></h2>

            <p>
                <label><?php esc_html_e('Your First Name', 'book-for-junk'); ?></label>
            	<input type="text" name="mts_first_name" required>
            </p>
            <p>
                <label><?php esc_html_e('Your Last Name', 'book-for-junk'); ?></label>
            	<input type="text" name="mts_last_name" required>
            </p>
            <p>
                <label><?php esc_html_e('Your Address', 'book-for-junk'); ?></label>
            	<input type="text" name="mts_address" required>
            </p>
            <p>
                <label><?php esc_html_e('Your City', 'book-for-junk'); ?></label>
            	<input type="text" name="mts_city" required>
            </p>
            <p>
                <label><?php esc_html_e('Your Postcode', 'book-for-junk'); ?></label>
            	<input type="text" name="mts_postcode" required>
            </p>
            <p>
                <label><?php esc_html_e('Your Email', 'book-for-junk'); ?></label>
            	<input type="email" name="mts_email" required>
            </p>
            <p>
                <label><?php esc_html_e('Your Phone', 'book-for-junk'); ?></label>
            	<input type="tel" name="mts_phone" required>
            </p>

            <p style="color:green"><?php esc_html_e('Please confirm your information: If all is okay then click the checkout button. If checkout doesn&rsquo;t work, check the steps from the beginning to select a step that was missed.' , 'book-for-junk') ?></p>
            <!-- <p id="confirmInfo"></p> -->
            <?php wp_nonce_field('mts_new_junk_book_checkout'); ?>

            <button type="button" class="prev"><?php esc_html_e('Previous', 'book-for-junk'); ?></button>

            <button type="submit" name="mts_junk_book_checkout" style="background-color: green"><?php esc_html_e('Checkout', 'book-for-junk'); ?></button>
        </div>
    </form>
</div>

<?php require_once(plugin_dir_path(__FILE__).'submission-form.php'); ?>
