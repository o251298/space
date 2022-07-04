<?php

namespace Tests\Unit;

use Tests\TestCase;

class DefaultControllerTest extends TestCase
{
    public function test_index_route()
    {
        $exp = json_encode(['hello' => 'MacPaw Internship 2022!']);
        $response = $this->get('/api/');
        $this->assertEquals($exp, $response->content());
        $response->assertStatus(200);
    }
}
