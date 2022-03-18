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

    public function test_can_get_the_details_of_a_purchasable_service()
    {
        $services = $this->api()->services();
        $serviceId = array_shift($services);

        $service = $this->api()->service($serviceId);

        $this->assertArrayHasKey("id", $service);
        $this->assertArrayHasKey("type", $service);
        $this->assertArrayHasKey("name", $service);
        $this->assertArrayHasKey("description", $service);
        $this->assertArrayHasKey("is_primary", $service);
        $this->assertArrayHasKey("is_secondary", $service);
        $this->assertArrayHasKey("default_recurrence", $service);
        $this->assertArrayHasKey("available_recurrences", $service);
        $this->assertArrayHasKey("activation_price", $service);
        $this->assertArrayHasKey("renew_price", $service);
        $this->assertArrayHasKey("restore_price", $service);
        $this->assertArrayHasKey("transfer_price", $service);
        $this->assertArrayHasKey("price_currency", $service);
    }
}
