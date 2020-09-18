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
    Hyperf\Contract\StdoutLoggerInterface::class => App\Provider\StdoutLoggerFactory::class,
    League\Flysystem\Filesystem::class => App\Provider\FileSystemFactory::class,
];
