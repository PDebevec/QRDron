<?php
$url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
parse_str(parse_url($url)['query'], $params);
?>