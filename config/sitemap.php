<?php
// config/sitemap.php

return [
    'generator' => [
        'name' => 'my-sitemap',
        'maps' => [
            [
                'url' => '/',
                'schedule' => 'daily',
                'maxItemsPerFile' => 5000,
            ],
            // ... autres maps
        ],
    ],
    'stores' => [
        'default' => [
            'storageClass' => 'Spatie\Sitemap\Storage\FilesystemStorage',
            'path' => public_path('sitemap'),
        ],
    ],
];
