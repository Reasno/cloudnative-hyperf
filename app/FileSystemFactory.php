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

namespace App;

use Hyperf\Guzzle\CoroutineHandler;
use League\Flysystem\Adapter\Local;
use League\Flysystem\Config;
use League\Flysystem\Filesystem;
use Psr\Container\ContainerInterface;

class FileSystemFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $config = $container->get(ConfigInterface::class);
        if ($config->get('APP_ENV') === 'dev') {
            return new Local(__DIR__ . '/../runtime');
        }
        $options = $container->get(ConfigInterface::class)->get('file');
        $adapter = $this->adapterFromArray($options);
        return new Filesystem($adapter, new Config($options));
    }

    private function adapterFromArray(array $options): AwsS3Adapter
    {
        $options = array_merge($options, ['handler' => new CoroutineHandler()]);
        $client = new S3Client($options);
        return new AwsS3Adapter($client, $options['bucket_name'], '', ['override_visibility_on_copy' => true]);
    }
}
