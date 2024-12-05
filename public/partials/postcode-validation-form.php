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
	<form id="mts_post_code_submition_form">
		<input type="text" name="mts_post_code" id="mts_post_code" placeholder="Enter Your PostCode">
		<button type="submit" id="mts_book_now_button">Book Now</button>
	</form>
	<div id="mts_postcode_output" style="color:red;"></div>
</div>

<script>
	
document.getElementById('mts_post_code_submition_form').addEventListener('submit', function(event) {
	event.preventDefault(); // Prevent the default form submission

	const postcode = document.getElementById('mts_post_code').value;
    
    // Construct the URL with query parameters
    const url = `https://api.postcodes.io/postcodes/${postcode}`;


    fetch(url).then(response => {
            if (!response.ok) {
                document.getElementById('mts_postcode_output').innerText = `Output: Server Error following this ${postcode} code`;
            }else{
            	const host = window.location.host
            	window. location. href= `${host}/mts_junk_book`;
            }
    });

});

</script>