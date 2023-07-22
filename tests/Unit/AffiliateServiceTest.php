<?php

namespace Tests\Unit;

use App\Services\AffiliateService;
use Illuminate\Support\Facades\Storage;
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

    public function testGetAffiliatesFileNotFound()
    {
        Storage::move('affiliates.txt', 'affiliates-temp.txt');
        $service = new AffiliateService();

        try {
            $affiliates = $service->getAffiliates();
        } catch (\Exception $e) {
            $this->assertEquals('Affiliates file not found.', $e->getMessage());
        }
        Storage::move('affiliates-temp.txt', 'affiliates.txt');
    }

    public function testCalculateDistance()
    {
        $service = new AffiliateService();
        $distance = $service->calculateDistance(53.3340285, -6.2535495, 52.986375, -6.043701);

        $this->assertIsFloat($distance);
    }
}



