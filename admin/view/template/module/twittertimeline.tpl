<?php echo $header; ?>
<div id="content">
<div class="breadcrumb">
	<?php foreach ($breadcrumbs as $breadcrumb) { ?>
	<?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
	<?php } ?>
</div>
<?php if ($error_warning) { ?>
	<div class="warning"><?php echo $error_warning; ?></div>
<?php } ?>
<?php if ($success) { ?>
	<div class="success"><?php echo $success; ?></div>
	<?php } ?>
<div class="box">
	<div class="heading">
		<h1><img src="view/image/module.png" alt="" /> <?php echo $heading_title; ?></h1>
		<div class="buttons">
			<a onclick="$('#form').submit();" class="button"><span><?php echo $button_save; ?></span></a>
			<a onclick="location = '<?php echo $cancel; ?>';" class="button"><span><?php echo $button_cancel; ?></span></a>
		</div>
	</div>
	<div class="content">
		<div id="tabs" class="htabs">
			<a href="#tab-connect"><?php echo $tab_connect; ?></a><a href="#tab-display"><?php echo $tab_display; ?></a>
		</div>
			<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
			<div id="tab-connect">
				<table class="form">
					<tr>
						<td><span class="required">*</span> <?php echo $entry_twitter_screen_name; ?></td>
						<td>
							@<input type="text" name="config_twitter_screen_name" value="<?php echo $config_twitter_screen_name; ?>" />
							<?php if ($error_twitter_screen_name) { ?>
								<span class="error"><?php echo $error_twitter_screen_name; ?></span>
							<?php } ?>
						</td>
					</tr>
					<tr>
						<td><span class="required">*</span> <?php echo $entry_twitter_cache_expire; ?></td>
						<td>
							<select name="config_twitter_cache_expire">
								<option value="900"<?php echo $config_twitter_cache_expire == '900' ? ' selected="selected"' : '';?>>15 Mins</option>
								<option value="1800"<?php echo $config_twitter_cache_expire == '1800' ? ' selected="selected"' : '';?>>30 Mins</option>
								<option value="3600"<?php echo $config_twitter_cache_expire == '' || '3600' ? ' selected="selected"' : '';?>>1 hour - Default</option>
								<option value="7200"<?php echo $config_twitter_cache_expire == '7200' ? ' selected="selected"' : '';?>>2 Hours</option>
								<option value="10800"<?php echo $config_twitter_cache_expire == '10800' ? ' selected="selected"' : '';?>>3 Hours</option>
							</select>
							<?php if ($error_twitter_cache_expire) { ?>
								<span class="error"><?php echo $error_twitter_cache_expire; ?></span>
							<?php } ?>
						</td>
					</tr>
					<tr>
						<td><span class="required">*</span> <?php echo $entry_twitter_oauth_access_token; ?></td>
						<td>
							<input type="text" name="config_twitter_oauth_access_token" value="<?php echo $config_twitter_oauth_access_token; ?>" size="75"/>
							<?php if ($error_twitter_oauth_access_token) { ?>
								<span class="error"><?php echo $error_twitter_oauth_access_token; ?></span>
							<?php } ?>
						</td>
					</tr>
					<tr>
						<td><span class="required">*</span> <?php echo $entry_twitter_oauth_access_token_secret; ?></td>
						<td>
							<input type="text" name="config_twitter_oauth_access_token_secret" value="<?php echo $config_twitter_oauth_access_token_secret; ?>" size="75"/>
							<?php if ($error_twitter_oauth_access_token_secret) { ?>
								<span class="error"><?php echo $error_twitter_oauth_access_token_secret; ?></span>
							<?php } ?>
						</td>
					</tr>
					<tr>
						<td><span class="required">*</span> <?php echo $entry_twitter_consumer_key; ?></td>
						<td>
							<input type="text" name="config_twitter_consumer_key" value="<?php echo $config_twitter_consumer_key; ?>" size="75"/>
							<?php if ($error_twitter_consumer_key) { ?>
								<span class="error"><?php echo $error_twitter_consumer_key; ?></span>
							<?php } ?>
						</td>
					</tr>
					<tr>
						<td><span class="required">*</span> <?php echo $entry_twitter_consumer_secret; ?></td>
						<td>
							<input type="text" name="config_twitter_consumer_secret" value="<?php echo $config_twitter_consumer_secret; ?>" size="75"/>
							<?php if ($error_twitter_consumer_secret) { ?>
								<span class="error"><?php echo $error_twitter_consumer_secret; ?></span>
							<?php } ?>
						</td>
					</tr>
					<tr>
						<td><span class="required">*</span> <?php echo $entry_twitter_count; ?></td>
						<td>
							<select name="config_twitter_count">
								<option value="10"<?php echo $config_twitter_count == '10' ? ' selected="selected"' : '';?>>10</option>
								<option value="50"<?php echo $config_twitter_count == '50' ? ' selected="selected"' : '';?>>50</option>
								<option value="100"<?php echo $config_twitter_count == '' || '100' ? ' selected="selected"' : '';?>>100</option>
								<option value="200"<?php echo $config_twitter_count == '200' ? ' selected="selected"' : '';?>>200</option>
							</select>
							<?php if ($error_twitter_count) { ?>
								<span class="error"><?php echo $error_twitter_count; ?></span>
							<?php } ?>
						</td>
					</tr>
					<tr>
						<td><?php echo $entry_twitter_exclude_replies; ?></td>
						<td>
							<?php if ($config_twitter_exclude_replies) { ?>
								<input type="radio" name="config_twitter_exclude_replies" value="1" checked="checked" />
								<?php echo $text_yes; ?>
								<input type="radio" name="config_twitter_exclude_replies" value="0" />
								<?php echo $text_no; ?>
							<?php } else { ?>
								<input type="radio" name="config_twitter_exclude_replies" value="1" />
								<?php echo $text_yes; ?>
								<input type="radio" name="config_twitter_exclude_replies" value="0" checked="checked" />
								<?php echo $text_no; ?>
							<?php } ?>
						</td>
					</tr>
					<tr>
						<td><?php echo $entry_twitter_include_rts; ?></td>
						<td>
							<?php if ($config_twitter_include_rts) { ?>
								<input type="radio" name="config_twitter_include_rts" value="1" checked="checked" />
								<?php echo $text_yes; ?>
								<input type="radio" name="config_twitter_include_rts" value="0" />
								<?php echo $text_no; ?>
							<?php } else { ?>
								<input type="radio" name="config_twitter_include_rts" value="1" />
								<?php echo $text_yes; ?>
								<input type="radio" name="config_twitter_include_rts" value="0" checked="checked" />
								<?php echo $text_no; ?>
							<?php } ?>
						</td>
					</tr>
				</table>
			</div>
			<div id="tab-display">
					<table id="module" class="list">
						<thead>
							<tr>
								<td class="left"><?php echo $entry_limit; ?></td>
								<td class="left"><?php echo $entry_layout; ?></td>
								<td class="left"><?php echo $entry_position; ?></td>
								<td class="left"><?php echo $entry_status; ?></td>
								<td class="right"><?php echo $entry_sort_order; ?></td>
								<td></td>
							</tr>
						</thead>
						<?php $module_row = 0; ?>
						<?php foreach ($modules as $module) { ?>
							<tbody id="module-row<?php echo $module_row; ?>">
								<tr>
									<td class="left">
										<input type="text" name="twittertimeline_module[<?php echo $module_row; ?>][limit]" value="<?php echo $module['limit']; ?>" size="1" />
									</td>
									<td class="left">
										<select name="twittertimeline_module[<?php echo $module_row; ?>][layout_id]">
																<?php foreach ($layouts as $layout) { ?>
																<?php if ($layout['layout_id'] == $module['layout_id']) { ?>
																<option value="<?php echo $layout['layout_id']; ?>" selected="selected"><?php echo $layout['name']; ?></option>
																<?php } else { ?>
																<option value="<?php echo $layout['layout_id']; ?>"><?php echo $layout['name']; ?></option>
																<?php } ?>
																<?php } ?>
														</select>
									</td>
												<td class="left"><select name="twittertimeline_module[<?php echo $module_row; ?>][position]">
																<?php if ($module['position'] == 'content_top') { ?>
																<option value="content_top" selected="selected"><?php echo $text_content_top; ?></option>
																<?php } else { ?>
																<option value="content_top"><?php echo $text_content_top; ?></option>
																<?php } ?>
																<?php if ($module['position'] == 'content_bottom') { ?>
																<option value="content_bottom" selected="selected"><?php echo $text_content_bottom; ?></option>
																<?php } else { ?>
																<option value="content_bottom"><?php echo $text_content_bottom; ?></option>
																<?php } ?>
																<?php if ($module['position'] == 'column_left') { ?>
																<option value="column_left" selected="selected"><?php echo $text_column_left; ?></option>
																<?php } else { ?>
																<option value="column_left"><?php echo $text_column_left; ?></option>
																<?php } ?>
																<?php if ($module['position'] == 'column_right') { ?>
																<option value="column_right" selected="selected"><?php echo $text_column_right; ?></option>
																<?php } else { ?>
																<option value="column_right"><?php echo $text_column_right; ?></option>
																<?php } ?>
														</select></td>
												<td class="left"><select name="twittertimeline_module[<?php echo $module_row; ?>][status]">
																<?php if ($module['status']) { ?>
																<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
																<option value="0"><?php echo $text_disabled; ?></option>
																<?php } else { ?>
																<option value="1"><?php echo $text_enabled; ?></option>
																<option value="0" selected="selected"><?php echo $text_disabled; ?></option>
																<?php } ?>
														</select></td>
												<td class="right"><input type="text" name="twittertimeline_module[<?php echo $module_row; ?>][sort_order]" value="<?php echo $module['sort_order']; ?>" size="3" /></td>
												<td class="left"><a onclick="$('#module-row<?php echo $module_row; ?>').remove();" class="button"><?php echo $button_remove; ?></a></td>
										</tr>
										</tbody>
										<?php $module_row++; ?>
										<?php } ?>
										<tfoot>
										<tr>
												<td colspan="5"></td>
												<td class="left"><a onclick="addModule();" class="button"><?php echo $button_add_module; ?></a></td>
										</tr>
										</tfoot>
				</table>
			</div>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
	$('#tabs a').tabs();

	var module_row = <?php echo $module_row; ?>;

		function addModule() {
				html  = '<tbody id="module-row' + module_row + '">';
				html += '  <tr>';
				html += '    <td class="left"><input type="text" name="twittertimeline_module[' + module_row + '][limit]" value="10" size="1" /></td>';
				html += '    <td class="left"><select name="twittertimeline_module[' + module_row + '][layout_id]">';
		<?php foreach ($layouts as $layout) { ?>
						html += '      <option value="<?php echo $layout['layout_id']; ?>"><?php echo addslashes($layout['name']); ?></option>';
				<?php } ?>
				html += '    </select></td>';
				html += '    <td class="left"><select name="twittertimeline_module[' + module_row + '][position]">';
				html += '      <option value="content_top"><?php echo $text_content_top; ?></option>';
				html += '      <option value="content_bottom"><?php echo $text_content_bottom; ?></option>';
				html += '      <option value="column_left"><?php echo $text_column_left; ?></option>';
				html += '      <option value="column_right"><?php echo $text_column_right; ?></option>';
				html += '    </select></td>';
				html += '    <td class="left"><select name="twittertimeline_module[' + module_row + '][status]">';
				html += '      <option value="1" selected="selected"><?php echo $text_enabled; ?></option>';
				html += '      <option value="0"><?php echo $text_disabled; ?></option>';
				html += '    </select></td>';
				html += '    <td class="right"><input type="text" name="twittertimeline_module[' + module_row + '][sort_order]" value="" size="3" /></td>';
				html += '    <td class="left"><a onclick="$(\'#module-row' + module_row + '\').remove();" class="button"><?php echo $button_remove; ?></a></td>';
				html += '  </tr>';
				html += '</tbody>';

				$('#module tfoot').before(html);

				module_row++;
		}
</script> 
<?php echo $footer; ?>