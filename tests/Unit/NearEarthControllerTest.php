<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NearEarthControllerTest extends TestCase
{
    use RefreshDatabase;

   public function test_getHazardous()
    {
        $response = $this->get('api/neo/hazardous');
        $response->assertStatus(200);
    }

    public function test_getFastestHazardous()
    {
        $response = $this->get('api/neo/fastest');
        $response->assertStatus(200);
    }

    public function test_uncorrectMethod()
    {
        $response = $this->post('api/neo/fastest');
        $response->assertStatus(405);
    }

    public function test_notFoundRoute()
    {
        $_SERVER['REQUEST_URI'] = 'api/test/not-found';
        $response = $this->get('api/test/not-found');
        $response->assertStatus(404);
    }
}
