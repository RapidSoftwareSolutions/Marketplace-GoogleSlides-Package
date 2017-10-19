<?php
$routes = [
    'metadata',
    'getAccessToken',
    'refreshToken',
    'revokeAccessToken',
    'getPresentation',
    'getPresentationPages',
    'createPresentation',
    'getPagesThumbnails',
    'updatePresentation'
];
foreach($routes as $file) {
    require __DIR__ . '/../src/routes/'.$file.'.php';
}

