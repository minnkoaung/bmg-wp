<?php

if(is_admin()){

    add_action('admin_menu', 'embed_options');
    
}

function embed_options()
{
		
	add_options_page('MMUnicode Embed', 'Unicode Embed', 'administrator', 'mmunicod_embed', 'mmunicode_adminpage');
}

function mmunicode_adminpage()
{
	if(isset($_POST))
	{
		if(isset($_POST['Submit']))
		{
			//update_option('fblike_display_page',$_POST['fblike_display_page']);
			update_option('uniemd_converter',$_POST['uniemd_converter']);
			update_option('uniembed_font',$_POST['uniembed_font']);
			update_option('uniemd_forceCSS',$_POST['uniemd_forceCSS']);
			update_option('uniemd_embed',$_POST['uniemd_embed']);
		}
		
	}
	
	if (get_option('uniemd_init') =="")
	{
		//init
		update_option('uniemd_init',1);
		update_option('uniemd_jquery',1);
		update_option('uniemd_converter',1);
		update_option('uniemd_forceCSS',0);
		update_option('uniemd_embed',1);
		update_option('uniembed_font','yunghkio');
	}
?>
	 <div class="wrap" style="font-size:13px;">

			<div class="icon32" id="icon-options-general"><br/></div><h2>Settings for MMunicode Embed</h2>
			<form method="post" action="options-general.php?page=mmunicod_embed">
			<table class="form-table">
				<tr valign="top">
					<th scope="row">
						မှတ်ချက် unicode ပြောင်းစနစ်
					</th>
					<td>
						<p>
						 <input type="checkbox" value="1"
						 <?php if (get_option('uniemd_converter') == '1') echo 'checked="checked"'; 
						 ?> name="uniemd_converter" id="uniemd_converter" group="uniemd_converter"/>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						အောက်မှာ ရွေးထားတဲ့ Font family CSS ထဲတွင် မဖြစ်မနေ ထည့်သွင်းမည်။
					</th>
					<td>
						<p>
						 <input type="checkbox" value="1"
						 <?php if (get_option('uniemd_forceCSS') == '1') echo 'checked="checked"'; 
						 ?> name="uniemd_forceCSS" id="uniemd_forceCSS" group="uniemd_forceCSS"/>

						 ( စာလုံးအားလုံးသည် အောက်မှ ရွေးချယ်ထားသော font ဖြစ်သွားပါမည်။ )
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						Unicode Embed Code ကို အသုံးပြုမည်။
					</th>
					<td>
						<p>
						 <input type="checkbox" value="1"
						 <?php if (get_option('uniemd_embed') == '1') echo 'checked="checked"'; 
						 ?> name="uniemd_embed" id="uniemd_embed" group="uniemd_embed"/>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						Font Family
					</th>
					<td>
						<?php if(get_option('uniembed_font')=="") update_option('uniembed_font','yunghkio'); ?>


						<p>
							<input type="radio" name="uniembed_font" value="yunghkio" <?php if (get_option('uniembed_font') == 'yunghkio') echo 'checked="checked"'; 
						 ?>/>Yungkio
						</p>
						<p>
							<input type="radio" name="uniembed_font" value="myanmar3" <?php if (get_option('uniembed_font') == 'myanmar3') echo 'checked="checked"'; 
						 ?> />Myanmar3
						</p>
						<p>
							<input type="radio" name="uniembed_font" value="padauk" <?php if (get_option('uniembed_font') == 'padauk') echo 'checked="checked"'; 
						 ?> />Padauk
						</p>
						<p>
      						<input type="radio" name="uniembed_font" value="mymyanmar" <?php if (get_option('uniembed_font') == 'mymyanmar') echo 'checked="checked"'; 
						 ?> />MyMyanmar
						</p>
						<p>
							<input type="radio" name="uniembed_font" value="mon3" <?php if (get_option('uniembed_font') == 'mon3') echo 'checked="checked"'; 
						 ?> />
							MON3 Anonta 1
						</p>
						<p>
							<input type="radio" name="uniembed_font" value="zawgyi" <?php if (get_option('uniembed_font') == 'zawgyi') echo 'checked="checked"'; 
						 ?> />
							Zawgyi-One
						</p>
					</td>
				</tr>
			</table>
			<p class="submit">
				<input type="submit" name="Submit" class="button button-primary" value="<?php _e('Save Changes') ?>" />		
			</p>
			</form>
<?php
}
?>