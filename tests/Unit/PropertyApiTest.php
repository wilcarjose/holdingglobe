<?php

namespace Tests\Unit;

use Tests\TestCase;
use Holdingglobe\Models\Property;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PropertyApiTest extends TestCase
{
	use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    /**
     * Get properties from api tests.
     *
     * @return void
     */
    public function testGetProperties()
    {
    	factory(Property::class, 10)->create();

    	$response = $this->get('/api/properties');

    	$response->assertstatus(200)
    		->assertJsonCount(10);
    }
}
