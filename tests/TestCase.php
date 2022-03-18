<?php

namespace Shellrent\Api\Tests;

use Dotenv\Dotenv;
use Shellrent\Api\ShellrentAPI;

class TestCase extends \PHPUnit\Framework\TestCase
{
    protected function setUp(): void
    {
        $dotenv = Dotenv::createImmutable(dirname(__DIR__));
        $dotenv->load();
    }

    protected function api(): ShellrentAPI
    {
        return new ShellrentApi($_ENV['USERNAME'], $_ENV['TOKEN']);
    }
}
