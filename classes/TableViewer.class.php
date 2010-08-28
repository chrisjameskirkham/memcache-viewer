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

		$output = '<table><tr><th>Key</th><th>Slab</th><th>Size</th><th>Expiration Time</th><th>Expires In</th></tr>';

		foreach ($cache->items as $item){

			$output .= '<tr>';

			$output .= '<td>' . $item->getKey() . '</td>';
			$output .= '<td>' . $item->getSlab() . '</td>';
			$output .= '<td>' . $item->getSize() . '</td>';
			$output .= '<td>' . $item->getFormattedTime() . '</td>';
			$output .= '<td>' . $item->getFormattedTime($current_time) . '</td>';

			$output .= '</tr>';

		}//foreach

		$output .= '</table>';

		return $output;

	}//getTableHTML

}//Tableiewer


?>
