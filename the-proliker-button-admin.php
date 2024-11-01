<?php

if (isset($_POST["app-id"])) {
	update_option("the_proliker_button_app_id", $_POST["app-id"]);
}

if (isset($_POST["display"])) {
	update_option("the_proliker_button_display", $_POST["display"]);
}

if (isset($_POST["action"])) {
	update_option("the_proliker_button_action", $_POST["action"]);
}

if (isset($_POST["endpoint-url"])) {
	update_option("the_proliker_button_endpoint_url", $_POST["endpoint-url"]);
}

?>

<div class="wrap">
	<div id="icon-options-general" class="icon32"><br /></div>
	<h2>The Proliker Button Settings</h2>
	<form method="post">
		<table class="form-table">
			<tr valign="top">
				<th scope="row">
					<label for="app-id">App ID</label>
				</th>
				<td>
					<input name="app-id" type="text" id="app-id" value="<?php echo get_option("the_proliker_button_app_id"); ?>" class="regular-text" />
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">
					<label for="display">Display</label>
				</th>
				<td>
					<select name="display" id="display">
						<option <?php echo (get_option("the_proliker_button_display") == "before" ? "selected=\"selected\"" : ""); ?> value="before">Before the content</option>
						<option <?php echo (get_option("the_proliker_button_display") == "after" ? "selected=\"selected\"" : ""); ?> value="after">After the content</option>
					</select>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">
					<label for="action">Action</label>
				</th>
				<td>
					<select name="action" id="action">
						<option <?php echo (get_option("the_proliker_button_action") == "love" ? "selected=\"selected\"" : ""); ?> value="love">Love</option>
						<option <?php echo (get_option("the_proliker_button_action") == "use" ? "selected=\"selected\"" : ""); ?> value="use">Use</option>
						<option <?php echo (get_option("the_proliker_button_action") == "take" ? "selected=\"selected\"" : ""); ?> value="take">Take</option>
						<option <?php echo (get_option("the_proliker_button_action") == "attend" ? "selected=\"selected\"" : ""); ?> value="attend">Attend</option>
						<option <?php echo (get_option("the_proliker_button_action") == "buy" ? "selected=\"selected\"" : ""); ?> value="buy">Buy</option>
						<option <?php echo (get_option("the_proliker_button_action") == "collect" ? "selected=\"selected\"" : ""); ?> value="collect">Collect</option>
						<option <?php echo (get_option("the_proliker_button_action") == "play" ? "selected=\"selected\"" : ""); ?> value="play">Play</option>
						<option <?php echo (get_option("the_proliker_button_action") == "wear" ? "selected=\"selected\"" : ""); ?> value="wear">Wear</option>
					</select>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">
					<label for="endpoint-url">Endpoint url (optional)</label>
				</th>
				<td>
					<input name="endpoint-url" type="text" id="endpoint-url" value="<?php echo get_option("the_proliker_button_endpoint_url"); ?>" class="regular-text" />
					<p class="description">http://michele.berto.li</p>
				</td>
			</tr>
		</table>
		<p class="submit">
			<input type="submit" name="submit" id="submit" class="button-primary" value="Save Changes" />
		</p>
	</form>
</div>