<?php

// Test accessing protected endpoint with token
$token = '1|bz9qBqtJRaJKksS68eqDpiLEnpSgbGWWQnALLJv159b66c0d';
$url = 'http://127.0.0.1:8000/api/cvs';

$options = [
    'http' => [
        'header' => "Authorization: Bearer $token\r\n",
        'method' => 'GET'
    ]
];

$context = stream_context_create($options);
$result = file_get_contents($url, false, $context);

if ($result === FALSE) {
    echo "Error: " . error_get_last()['message'] . "\n";
} else {
    $data = json_decode($result, true);
    echo "Success! Found " . $data['total'] . " CVs\n";
    echo "First CV: " . $data['data'][0]['name'] . "\n";
}
