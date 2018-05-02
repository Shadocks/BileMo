<?php

namespace App\Action;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class LoginAction.
 */
class LoginAction
{
    /**
     * @Route(
     *     path="/login",
     *     name="json_login_auth",
     *     methods={"POST"}
     * )
     *
     * @param Request $request
     */
    public function __invoke(Request $request)
    {
    }
}
