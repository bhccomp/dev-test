<?php

namespace Tests\Unit;

use App\Services\AffiliateService;
use Tests\TestCase;

class AffiliateServiceTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();
    }

    public function testGetAffiliates()
    {
        $service = new AffiliateService();

        $affiliates = $service->getAffiliates();

        $this->assertIsArray($affiliates);
    }

    public function testCalculateDistance()
    {
        $service = new AffiliateService();

        $distance = $service->calculateDistance(53.3340285, -6.2535495, 52.986375, -6.043701);

        $this->assertIsFloat($distance);
    }
}



