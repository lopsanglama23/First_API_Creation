<?php

// Simple test script to test authentication
$url = 'http://127.0.0.1:8000/api/login';
$data = [
    'email' => 'test@example.com',
    'password' => 'password'
];

$options = [
    'http' => [
        'header' => "Content-type: application/json\r\n",
        'method' => 'POST',
        'content' => json_encode($data)
    ]
];

$context = stream_context_create($options);
$result = file_get_contents($url, false, $context);

if ($result === FALSE) {
    echo "Error: " . error_get_last()['message'] . "\n";
} else {
    echo "Response: " . $result . "\n";
}
