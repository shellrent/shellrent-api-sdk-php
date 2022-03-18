<?php


namespace Shellrent\Api\Tests;

class ServicesTest extends TestCase
{
    public function test_can_fetch_list_of_purchasable_services()
    {
        $services = $this->api()->services();

        // ALL OK
        $this->assertTrue(true);
        $this->assertGreaterThan(0, count($services));
    }
}
