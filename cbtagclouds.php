<?php
/*
Plugin Name: CB Tag Clouds
Plugin URI: http://cbTagClouds.com/plugin
Description: This plugin was created to make it easy to include CB Tag Clouds (http://cbtagclouds.com) before and/or after every post. However, it can also be used to add any valid Javascript or HTML before and / or after every current post, and new posts, automatically.
Version: 1.12
Author: Tim Brechbill
Author URI: http://cbCashClouds.com
*/
/*  Copyright 2010  CB Tag Clouds  (email : support@skadoogle.com) */
add_filter('the_content', 'add_cbtagclouds');
function add_cbtagclouds($content)
{
$postfooter_cbcc= '<p>'.get_option(cbtagclouds_postfooter).'</p>';
$postheader_cbcc= '<p>'.get_option(cbtagclouds_postheader).'</p>';
return $postheader_cbcc.$content.$postfooter_cbcc;	
}
?>
<?php
function cbtagclouds_option()
{
?>
<div class="wrap">
<div id="icon-options-general" class="icon32"><br /></div>
<h2><a href="http://cbcashclouds.com" target="_blank" title="Get CB Tag Clouds Now">CB Tag Clouds</a></h2>
<form method="post" action="options.php">
<?php wp_nonce_field('update-options'); ?>
<table class="form-table">
<tr valign="top"><td>
<font style="text-align:left;font-weight:bold;">Include <a href="http://cbcashclouds.com"  title="Get CB Tag Clouds Now" target="_blank"><b>CB Tag Clouds</b></a> like the sample below, in all of your Posts, automatically.</font><br>
<a href="http://cbcashclouds.com" title="Get CB Tag Clouds" target="_blank" style="text-decoration:none;"><img src="../wp-content/plugins/cbtagclouds/screenshot-1.jpg" height="160" alt="CB Tag Clouds Example" border=0></a>
<p align="left"><a href="http://cbtagclouds.com/members"  title="Login Now" target="_blank"><b>Login to cbTagClouds</b></a> <small>(Opens in a new window)</small></p>
<h3>Place the following Code <font color="red">Above</font> Every Post</h3>
<textarea id="cbtagclouds_postheader" name="cbtagclouds_postheader" class="large-text code" style="font-size:12px;" cols="60" rows="3"><?php echo stripslashes(get_option('cbtagclouds_postheader')); ?></textarea>
</td></tr>
<tr valign="top"><td><h3>Place the following Code <font color="red">Below</font> Every Post</h3>
<textarea id="cbtagclouds_postfooter" name="cbtagclouds_postfooter" class="large-text code" style="font-size:12px;" cols="60" rows="3"><?php echo stripslashes(get_option('cbtagclouds_postfooter')); ?></textarea>
</td></tr>
</table>
<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="cbtagclouds_postfooter, cbtagclouds_postheader" />
<p class="submit">
<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
</p>
</form>
</div>
<?php 
}
function cbtagclouds_add_admin()
{
	add_options_page('CB Tag Clouds', 'CB Tag Clouds', 7, 'cbtagclouds', 'cbtagclouds_option');
}
function cbtagclouds_install()
{ 
	add_option('cbtagclouds_postfooter', "");
}
add_action('admin_menu', 'cbtagclouds_add_admin');
register_activation_hook(__FILE__,"cbtagclouds_install");        
?>