<?php
if (!defined('ABSPATH'))
	exit;
class DfdHeaderBuilder_Text extends DfdHeaderBuilderElementAbstract {

	public function render() {
		$preset = DfdHeaderBuilder_PresetCollection::instance()->getActivePreset();
		$values = $preset->getGlobalSettingByName("header_copyright_builder");
		$val = $values->value;
		echo "<span class='copyright_message'>";
			echo apply_filters('dfd_header_builder_copyright_message', $val);
		echo "</span>";
	}

}
