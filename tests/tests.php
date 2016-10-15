<html><head><title>tests</title><style>
.pass { background: #7f7; }
.fail { background: #f7f; }
</style></head>
<body>
<?php

require_once '../src/urljoin.php';


function test($base, $url, $expected) {
    $out = urljoin($base, $url);
    echo '<div class="' . ($out == $expected ? 'pass' : 'fail') . '">';
    echo "<div>$base + $url => ";
    if ($out == $expected) {
        echo '<span class="pass">' . $out . '</span>';
    } else {
        echo '<span class="fail">' . $out . '</span> (expected: ' . $expected . ')';
    }
    echo '</div>';
}


test("http://example.com/foo/bar", "test.jpg", "http://example.com/foo/test.jpg");
test("http://example.com/foo/bar", "/test.jpg", "http://example.com/test.jpg");
test("http://example.com/foo/bar/baz", "../test.jpg", "http://example.com/foo/test.jpg");
test("http://example.com/foo/bar/baz/quux", "../../../../../test.jpg", "http://example.com/test.jpg");
test("http://example.com/foo/bar", "baz/foo///../bar", "http://example.com/foo/baz/bar");
test("http://example.com/foo/bar", "//stackexchange.com/test.jpg", "http://stackexchange.com/test.jpg");
test("https://example.com/foo/bar", "//stackexchange.com/test.jpg", "https://stackexchange.com/test.jpg");
test("https://example.com/foo/bar.cgi?hello=goodbye", "moo.cgi?yes=no", "https://example.com/foo/moo.cgi?yes=no");
?>
</body></html>