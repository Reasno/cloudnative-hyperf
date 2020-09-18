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

use Hyperf\HttpServer\Router\Router;

Router::addRoute(['GET', 'HEAD'], '/liveness', 'App\Controller\HealthCheckController@liveness');
Router::addRoute(['GET', 'HEAD'], '/readiness', 'App\Controller\HealthCheckController@readiness');
Router::addRoute(['GET', 'HEAD'], '/metrics', 'App\Controller\HealthCheckController@metrics');
