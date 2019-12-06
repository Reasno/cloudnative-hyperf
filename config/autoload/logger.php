<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf-cloud/hyperf/blob/master/LICENSE
 */

return [
    'default' => [
        'handler' => [
            'class' => Monolog\Handler\ErrorLogHandler::class,
            'constructor' => [
                'messageType' => Monolog\Handler\ErrorLogHandler::OPERATING_SYSTEM,
                'level' => env("APP_ENV") === "PROD"
                ? Monolog\Logger::WARNING
                : Monolog\Logger::DEBUG,
            ],
        ],
        'formatter' => [
            'class' => env("APP_ENV") === "PROD"
            ? Monolog\Formatter\JsonFormatter::class
            : Monolog\Formatter\LineFormatter::class,
        ],
        'PsrLogMessageProcessor' => [
            'class' => Monolog\Processor\PsrLogMessageProcessor::class,
        ],
    ],
];
