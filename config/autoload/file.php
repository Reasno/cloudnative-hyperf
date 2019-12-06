<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

return [
    'credentials' => [
        'key' => env('S3_KEY'),
        'secret' => env('S3_SECRET'),
    ],
    'region' => env('S3_REGION'),
    'version' => 'latest',
    'bucket_endpoint' => false,
    'use_path_style_endpoint' => true,
    'endpoint' => env('endpoint'),
];
