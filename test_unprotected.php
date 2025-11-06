<?php

// Test accessing protected endpoint without token (should fail)
$url = 'http://127.0.0.1:8000/api/cvs';

$options = [
    'http' => [
        'method' => 'GET'
    ]
];

$context = stream_context_create($options);
$result = file_get_contents($url, false, $context);

if ($result === FALSE) {
    echo "Success! Endpoint is protected - access denied without token\n";
} else {
    echo "Warning: Endpoint is not protected!\n";
    echo "Response: " . $result . "\n";
}

