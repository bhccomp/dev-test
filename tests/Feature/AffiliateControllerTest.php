<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AffiliateControllerTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->get('/affiliates');

        $response->assertStatus(200);
        $response->assertViewIs('affiliates');
    }
}
