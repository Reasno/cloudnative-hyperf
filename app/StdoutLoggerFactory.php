<?php
declare(strict_types=1);

namespace App;

use Hyperf\Logger\LoggerFactory;
use Psr\Container\ContainerInterface;

class StdoutLoggerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $factory = $container->get(LoggerFactory::class);
        return $factory->get("Sys", "default");
    }
}
