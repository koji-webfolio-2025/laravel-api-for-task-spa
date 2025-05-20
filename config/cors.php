<?php

return [
    'paths' => ['api/*', 'login', 'logout', 'csrf-token', 'sanctum/csrf-cookie','register',],
    'allowed_methods' => ['GET', 'POST', 'PUT', 'DELETE', 'OPTIONS'],
    'allowed_origins' => ['https://spa.codeshift-lab.com'],
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'],
    'exposed_headers' => ['*'],
    'max_age' => 0,
    'supports_credentials' => true,
];
