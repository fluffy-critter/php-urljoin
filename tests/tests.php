<?php

/*

Here, have some unit tests.

Author: fluffy, http://beesbuzz.biz/

 */

ini_set('display_errors', '1');
error_reporting(E_ALL);
define('DEBUG', true);

?><!DOCTYPE html>
<html><head><title>tests</title><style>
.pass { background-color: #7f7; }
.fail { background-color: #f7f; }
table { counter-reset: count; }
tr td:nth-child(1):before { content: counters(count, "", decimal-leading-zero); counter-increment: count; }
td { border: 1px solid black; border-collapse: collapse; }
th { background-color: lightgray; }
td { padding: 0 10px; }
</style></head>
<body>
<table>
	<tr>
		<th>No.</th>
		<th>Base</th>
		<th>URL</th>
		<th>Expected / Result</th>
	</tr>
<?php

require_once '../src/urljoin.php';

function test($base, $url, $expected) {
	$out = urljoin($base, $url);
	echo "<tr><td /><td>$base</td><td>$url</td>";
	if ($out == $expected) {
		echo '<td class="pass">' . $out . '</td>';
	} else {
		echo '<td class="fail">' . $out . ' (expected: ' . $expected . ')</td>';
	}
	echo '</tr>';
}

foreach(json_decode(file_get_contents(__DIR__ . '/cases.json'), true) as $item) {
	foreach($item['cases'] as $case) {
		test($case[0], $case[1], $case[2]);
	}
}

?>
</table></body></html>
