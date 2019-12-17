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

use Hyperf\Tracer\Adapter\JaegerTracerFactory;

return [
    // 选择默认的 Tracer
    'default' => env('APP_ENV') === 'prod' ? 'jaeger-prod' : 'jaeger-dev',

    // 这里的代码演示不对 enable 内的配置进行展开
    'enable' => [
        // 打开或关闭对 Guzzle HTTP 调用的追踪
        'guzzle' => true,
        // 打开或关闭对 Redis 调用的追踪
        'redis' => true,
        // 打开或关闭对 DB  调用的追踪
        'db' => true,
    ],

    'tracer' => [
        // Jaeger 驱动配置
        'jaeger-prod' => [
            'driver' => JaegerTracerFactory::class,
            // 项目名称
            'name' => env('APP_NAME', 'skeleton'),
            'options' => [
                // 采样器，默认为所有请求的都追踪
                'sampler' => [
                    'type' => Jaeger\SAMPLER_TYPE_PROBABILISTIC,
                    'param' => 0.02,
                ],
                // 上报地址
                'local_agent' => [
                    'reporting_host' => env('JAEGER_REPORTING_HOST', 'localhost'),
                    'reporting_port' => env('JAEGER_REPORTING_PORT', 5775),
                ],
            ],
        ],
        'jaeger-dev' => [
            'driver' => JaegerTracerFactory::class,
            // 项目名称
            'name' => env('APP_NAME', 'skeleton'),
            'options' => [
                // 采样器，默认为所有请求的都追踪
                'sampler' => [
                    'type' => Jaeger\SAMPLER_TYPE_CONST,
                    'param' => true,
                ],
                // 上报地址
                'local_agent' => [
                    'reporting_host' => env('JAEGER_REPORTING_HOST', 'localhost'),
                    'reporting_port' => env('JAEGER_REPORTING_PORT', 5775),
                ],
            ],
        ],
    ],
];
