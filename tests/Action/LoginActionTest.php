<?php

namespace App\Tests\Action;

use App\Action\LoginAction;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;

class LoginActionTest extends TestCase
{
    private $request;

    private $loginAction;

    public function setUp()/* The :void return type declaration that should be here would cause a BC issue */
    {
        $this->loginAction = new LoginAction();

        $this->request = $this->createMock(Request::class);

        parent::setUp();
    }

    public function testInstantiation()
    {
        static::assertInstanceOf(LoginAction::class, $this->loginAction);
    }

    public function testInvoke()
    {
        static::assertNull($this->loginAction->__invoke($this->request));
    }
}