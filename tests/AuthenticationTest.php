<?php


namespace Shellrent\Api\Tests;

use Shellrent\Api\ShellrentAPI;

class AuthenticationTest extends TestCase
{
    public function test_can_connect_succesfully_with_token()
    {
        $sdk = new ShellrentApi($_ENV['USERNAME'], $_ENV['TOKEN']);
        $sdk->purchases();

        // ALL OK
        $this->assertTrue(true);
    }

    public function test_cannot_connect_with_wrong_token()
    {
        $this->expectExceptionCode(403);

        $sdk = new ShellrentApi('[USER]', '[TOKEN]');
        $sdk->purchases();
    }
}
