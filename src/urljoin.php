<?php

function urljoin($base, $rel) {
    $pbase = parse_url($base);
    $prel = parse_url($rel);

    $merged = array_merge($pbase, $prel);
    if ($prel['path'][0] != '/') {
        $dir = preg_replace('@/[^/]*$@', '', $pbase['path']);
        $merged['path'] = $dir . '/' . $prel['path'];
    }

    $pathParts = explode('/', $merged['path']);
    array_shift($pathParts);

    $path = [];
    foreach ($pathParts as $part) {
        if ($part == '..') {
            array_pop($path);
        } else if ($part != '') {
            array_push($path, $part);
        }
    }
    $merged['path'] = '/' . implode('/', $path);

    $ret = '';
    if (isset($merged['scheme'])) $ret .= $merged['scheme'] . ':';
    if (isset($merged['host'])) $ret .= '//' . $merged['host'];

    // TODO: support user/pass

    if (isset($prel['host'])) {
        if (isset($prel['port'])) {
            $ret .= ':' . $prel['port'];
        }
    } else if (isset($pbase['port'])) {
        $ret .= ':' . $pbase['port'];
    }

    if (isset($merged['path'])) $ret .= $merged['path'];

    if (isset($prel['query'])) $ret .= '?' . $prel['query'];

    return $ret;
}
