<?php

namespace PhpTools\Plugin\Datatables;

use PhpTools\Primitives\StringTools;

class DatatableTools
{
	public static function createSkel($heads, $dataUrl)
	{
		$id = StringTools::generateRandomString(20);
		$js = [];
		$js['columns'] = [];
		$js['ajax'] = $dataUrl;
		$hs = '<tr>';
		foreach($heads as $h)
		{
			$js['columns'][] = ['title' => $h];
			$hs .= '<th>'.$h.'</th>';
		}
		$hs .= '</tr>';

		$ret = '<table id="'.$id.'" class="dataTable table"><thead>'.$hs.'</thead><tbody></tbody></table>';
		$ret .= 
'<script type="text/javascript">
	document.addEventListener("DOMContentLoaded", function() {
	$("#'.$id.'").DataTable('.json_encode($js).');
});
</script>';
		return $ret;
	}
}
