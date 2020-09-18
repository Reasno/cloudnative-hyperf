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

use Hyperf\Apidog\Annotation\ApiController;
use Hyperf\Apidog\Annotation\ApiResponse;
use Hyperf\Apidog\Annotation\ApiServer;
use Hyperf\Apidog\Annotation\GetApi;

/**
 * @ApiController(tag="Demo", description="Demo接口")
 * @ApiServer(name="http")
 */
class IndexController extends AbstractController
{
    /**
     * @Author Hyperf
     * @GetApi(path="/", description="Hello World")
     * @ApiResponse(schema={"method": "GET", "message": "Hello Hyperf"})
     */
    public function index()
    {
        $user = $this->request->input('user', 'Hyperf');
        $method = $this->request->getMethod();

        return [
            'method' => $method,
            'message' => "Hello {$user}.",
        ];
    }
}
