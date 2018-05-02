<?php

namespace App;

use Symfony\Bundle\FrameworkBundle\HttpCache\HttpCache;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class CacheKernel.
 */
class CacheKernel extends HttpCache
{
    /**
     * @param Request $request
     * @param bool    $catch
     *
     * @return Response
     */
    protected function invalidate(Request $request, $catch = false)
    {
        if ('PURGE' != $request->getMethod()) {
            return parent::invalidate($request, $catch);
        }

        if ('::1' !== $request->getClientIp()) {
            return new Response(
                'Invalid HTTP method',
                Response::HTTP_BAD_REQUEST
            );
        }

        $response = new Response();

        if ($this->getStore()->purge($request->getUri())) {
            $response->setStatusCode(Response::HTTP_OK, 'Purged');
        } else {
            $response->setStatusCode(Response::HTTP_NOT_FOUND, 'Not found');
        }

        return $response;
    }
}
