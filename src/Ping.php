<?php
namespace Application;

use Zend\Diactoros\Response\JsonResponse;
use Zend\Stratigility\Http\Request;
use Zend\Stratigility\Http\Response;
use Zend\Stratigility\Next;

/**
 * Class Ping
 * @package Application
 */
class Ping
{
    /**
     * @param Request $request
     * @param Response $response
     * @param Next $next
     * @return JsonResponse
     */
    public function __invoke(Request $request, Response $response, Next $next)
    {
        return new JsonResponse(['ack' => time()]);
    }
}