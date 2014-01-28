<?php
$func = rex_request('func', 'string');

if ($func == 'generate_all') {
	/*if (rex_request('generate_no_files') == 1) {
		$includePath = realpath($REX['HTDOCS_PATH'] . 'redaxo/include/') . DIRECTORY_SEPARATOR;

		foreach ($REX['WEBSITE_MANAGER']->getWebsites() as $website) {
			// articles
			$files = glob($includePath . $website->getGeneratedDir() . '/articles/*');

			foreach ($files as $file) {
				if (is_file($file))
					unlink($file);
				}
			}

			// 
			$files = glob($includePath . $website->getGeneratedDir() . '/templates/*');

			foreach ($files as $file) {
				if (is_file($file))
					unlink($file);
				}
			}
	} else {*/
		$REX['WEBSITE_MANAGER']->generateAll();
		echo rex_info($I18N->msg('website_manager_tools_cache_deleted'));
	//}
} elseif ($func == 'metainfo_fix') {
	echo rex_info($I18N->msg('website_manager_tools_metainfo_fixer_success'));
	
}
?>

<div class="rex-addon-output">
	<h2 class="rex-hl2"><?php echo $I18N->msg('website_manager_tools_cache_tool'); ?></h2>
	<div class="rex-area-content">
		<p><?php echo $I18N->msg('website_manager_tools_cache_tool_desc'); ?></p>
		<form action="index.php" method="post">		
			<!--<p class="rex-form-checkbox rex-form-label-right">
				<input type="checkbox" value="1" checked="checked" id="generate_no_files" name="generate_no_files" />
				<label for="generate_no_files"><?php echo $I18N->msg('website_manager_tools_cache_tool_generate_no_files'); ?></label>
			</p>-->
			<p class="button">
				<input id="generate-all-button" type="submit" class="rex-form-submit" name="sendit" value="<?php echo $I18N->msg('website_manager_tools_cache_tool_button'); ?>" />
			</p>
			<input type="hidden" name="page" value="website_manager" />
			<input type="hidden" name="subpage" value="tools" />
			<input type="hidden" name="func" value="generate_all" />
		</form>
	</div>
</div>

<?php if ($REX['WEBSITE_MANAGER_SETTINGS']['identical_meta_infos']) { ?>
	<div class="rex-addon-output">
		<h2 class="rex-hl2"><?php echo $I18N->msg('website_manager_tools_metainfo_fixer'); ?></h2>
		<div class="rex-area-content">
			<p><?php echo $I18N->msg('website_manager_tools_metainfo_fixer_desc'); ?></p>
			<form action="index.php" method="post">		
				<p class="button">
					<input disabled="disabled" type="submit" class="rex-form-submit" name="sendit" value="<?php echo $I18N->msg('website_manager_tools_metainfo_fixer_button'); ?>" />
				</p>
				<input type="hidden" name="page" value="website_manager" />
				<input type="hidden" name="subpage" value="tools" />
				<input type="hidden" name="func" value="metainfo_fix" />
			</form>
		</div>
	</div>
<?php } ?>

<style type="text/css">
p.rex-form-checkbox input {
	position: relative;
	top: 3px;
}

.rex-addon-output p {
	margin-bottom: 5px;
}

#generate-all-button {
	float: right;
	margin-top: 5px;
	margin-bottom: 10px;
	margin-right: 5px;
}
</style>
