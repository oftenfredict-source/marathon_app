<?php
$file = 'c:/xampp/htdocs/marathon_app/public/build/assets/main-BuDwjA8r.js';
$content = file_get_contents($file);
$strings = ['Running Tracker', 'JOIN THE COMMUNITY', 'Connect with fellow'];

foreach ($strings as $s) {
    if (($pos = strpos($content, $s)) !== false) {
        echo "Found '$s' at position $pos\n";
        echo "Context: " . substr($content, max(0, $pos - 100), 300) . "\n\n";
    } else {
        echo "Not found: '$s'\n";
    }
}
