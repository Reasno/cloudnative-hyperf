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
    'scan' => [
        'paths' => [
            BASE_PATH . '/app',
        ],
        'ignore_annotations' => [
            'mixin',
            'Author',
        ],
        'class_map' => [
            // 需要映射的类名 => 类所在的文件地址
            \Hyperf\Utils\Coroutine::class => BASE_PATH . '/classmap/Coroutine.php',
        ],
    ],
];
