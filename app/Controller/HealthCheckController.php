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

namespace App\Controller;

use Prometheus\CollectorRegistry;
use Prometheus\RenderTextFormat;

class HealthCheckController extends AbstractController
{
    public function liveness()
    {
        return 'ok';
    }

    public function readiness()
    {
        return 'ok';
    }

    public function metrics(CollectorRegistry $registry)
    {
        $renderer = new RenderTextFormat();
        return $renderer->render($registry->getMetricFamilySamples());
    }
}
