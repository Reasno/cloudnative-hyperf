<?php

declare(strict_types=1);

namespace App\Controller;

use Prometheus\CollectorRegistry;

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
        $renderer = new Prometheus\RenderTextFormat();
        return $renderer->render($registry->getMetricFamilySamples());
    }
}
