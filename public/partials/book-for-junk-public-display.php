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
            <h2>Step 1: Waste Type</h2>
            <label class="custom-radio">
                <input type="radio" name="waste_type" value="Household Waste" required>
                <span class="radio-btn" id="waste_type">Household Waste</span>
            </label>
            <label class="custom-radio">
                <input type="radio" name="waste_type" value="Garden Waste">
                <span class="radio-btn" id="waste_type">Garden Waste</span>
            </label>
            <label class="custom-radio">
                <input type="radio" name="waste_type" value="Mixed Waste">
                <span class="radio-btn" id="waste_type">Mixed Waste</span>
            </label>
            <label class="custom-radio">
                <input type="radio" name="waste_type" value="Hardcore (Rubble/Brick)">
                <span class="radio-btn" id="waste_type">Hardcore (Rubble/Brick)</span>
            </label>
            <label class="custom-radio">
                <input type="radio" name="waste_type" value="Soil">
                <span class="radio-btn" id="waste_type">Soil</span>
            </label>
            <label class="custom-radio">
                <input type="radio" name="waste_type" value="Wood">
                <span class="radio-btn" id="waste_type">Wood</span>
            </label>
            <button type="button" class="next">Next</button>
        </div>

        <!-- Step 2 -->
        <div class="step" id="step2" style="display:none;">
            <h2>Step 2: Drop of Type</h2>
            
            <label class="custom-radio">
                <input type="radio" name="drop_of_type" value="Off Road" required>
                <span class="radio-btn" id="off_road">Off Road</span>
            </label>
            <label class="custom-radio">
                <input type="radio" name="drop_of_type" value="On Road">
                <span class="radio-btn" id="on_road">On Road</span>
            </label>
            <label class="custom-radio">
                <input type="radio" name="drop_of_type" value="Wait and Load">
                <span class="radio-btn" id="wait_and_load">Wait and Load</span>
            </label>

            <button type="button" class="prev">Previous</button>
            <button type="button" class="next">Next</button>
        </div>


        <!-- Step 3 -->
        <div class="step" id="step3" style="display: none">
        	<h2>Step 3: Select Your Skip</h2>

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
		                <input type="radio" name="mts_skip" value="<?php echo $product->get_id(); ?>" required>
		                <span class="radio-btn" id="mts_skip">
		                	<?php echo $product->get_image(); ?>
		                	<span style="font-size:22px;font-weight: 600;"><?php echo $product->get_name(); ?></span>
		                	<span style="font-size: 16px;font-weight: 400;line-height: 26px;margin-top: 10px;display: block;"><?php echo wpautop($product->get_description()); ?></span>
		                	<span style="background: #F2FFF8;display: block;padding: 5px;border-radius: 8px;border: 1px solid #E5E7EB;font-size: 18px;font-weight: 600;"><?php echo $product->get_price_html(); ?></span>
		            	</span>
		            </label>
		        </div>
			<?php
				}
			}
        	?>
        	</div>

        	<button type="button" class="prev">Previous</button>
            <button type="button" class="next">Next</button>
        </div>


        <!-- Step 4 -->
        <div class="step" id="step4" style="display:none">
        	<h2>Step 4: DROP OFF DATE</h2>

        	<input type="date" name="mts_drop_off_date" required>

        	<button type="button" class="prev">Previous</button>
            <button type="button" class="next">Next</button>
        </div>


        <!-- Step 5 -->
        <div class="step" id="step5" style="display:none">
        	<h2>Step 5: COLLECTION FROM DATE</h2>

        	<input type="date" name="mts_collection_from_date" required>

        	<button type="button" class="prev">Previous</button>
            <button type="button" class="next">Next</button>
        </div>


        <!-- Step 6 -->
        <div class="step" id="step6" style="display:none;">
            <h2>Step 6: Confirmation</h2>

            <p>
            	<label>Your First Name</label>
            	<input type="text" name="mts_first_name" required>
            </p>
            <p>
            	<label>Your Last Name</label>
            	<input type="text" name="mts_last_name" required>
            </p>
            <p>
            	<label>Your Address</label>
            	<input type="text" name="mts_address" required>
            </p>
            <p>
            	<label>Your City</label>
            	<input type="text" name="mts_city" required>
            </p>
            <p>
            	<label>Your Postcode</label>
            	<input type="text" name="mts_postcode" required>
            </p>
            <p>
            	<label>Your Emal</label>
            	<input type="email" name="mts_email" required>
            </p>
            <p>
            	<label>Your Phone</label>
            	<input type="tel" name="mts_phone" required>
            </p>

            <p style="color:green">Please confirm your information: If all is okay then click the checkout button. If checkout doesn't work, check the steps from the beginning to select a step that was missed.</p>
            <!-- <p id="confirmInfo"></p> -->
            <?php wp_nonce_field('mts_new_junk_book_checkout'); ?>
            <button type="button" class="prev">Previous</button>
            <button type="submit" name="mts_junk_book_checkout" style="background-color: green">Checkout</button>
        </div>
    </form>
</div>

<?php require_once(plugin_dir_path(__FILE__).'submission-form.php'); ?>
