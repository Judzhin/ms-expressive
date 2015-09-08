<?php
namespace Application;

use Zend\Stratigility\Http\Request;
use Zend\Stratigility\Http\Response;
use Zend\Stratigility\Next;

/**
 * Class HelloWorld
 * @package Application
 */
class HelloWorld
{
    /**
     * @param Request $request
     * @param Response $response
     * @param Next $next
     * @return Response
     */
    public function __invoke(Request $request, Response $response, Next $next)
    {
        $response->write('Hello World!');
        return $response;
    }
}