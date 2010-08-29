<?php

class TableViewer {

	private function __construct(){}

	public static function getTableHTML($cache){

		/*
		 * Table headings:
                 *   - key
                 *   - slab
                 *   - size
                 *   - expiration time
                 *   - expires in
		 */

		$current_time = time();

		$output = '<table id="TableViewer"><tr><th>Key</th><th>Slab</th><th>Size</th><th>Expiration Time</th><th>Expires In</th><th>Delete</th></tr>';

		foreach ($cache->items as $item){

			$output .= '<tr>';

			$output .= '<td class="key">' . $item->getKey() . '</td>';
			$output .= '<td class="slab">' . $item->getSlab() . '</td>';
			$output .= '<td class="size">' . $item->getSize() . '</td>';
			$output .= '<td class="expiry_date">' . $item->getFormattedTime() . '</td>';
			$output .= '<td class="expires_in">' . $item->getFormattedTime($current_time) . '</td>';
			$output .= '<td class="delete"><a href="delete.php?delete_item=' . $item->getKey() . '">delete</a></td>';

			$output .= '</tr>';

		}//foreach

		$output .= '</table>';

		return $output;

	}//getTableHTML

}//Tableiewer


?>
