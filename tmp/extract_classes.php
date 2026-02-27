<?php
$file = 'c:/xampp/htdocs/marathon_app/public/build/assets/main-B_6PDggt.css';
$content = file_get_contents($file);
preg_match_all('/\.[a-zA-Z0-9_\-]+/i', $content, $matches);
$classes = array_unique($matches[0]);
$results = [];

foreach ($classes as $c) {
    if (stripos($c, 'hero') !== false || stripos($c, 'slider') !== false || stripos($c, 'banner') !== false) {
        $results[] = $c;
    }
}

echo implode("\n", $results);
