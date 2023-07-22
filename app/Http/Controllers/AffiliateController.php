<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AffiliateService;

/**
 * Class AffiliateController
 * @package App\Http\Controllers
 */
class AffiliateController extends Controller
{

    /**
     * Display a listing of affiliates within 100km from Dublin office.
     *
     * @param  AffiliateService  $affiliateService
     * @return \Illuminate\View\View
     */
    public function index(AffiliateService $affiliateService)
    {

        $dublinOffice = [
            'latitude' => env('DUBLIN_LATITUDE', 53.3340285),
            'longitude' => env('DUBLIN_LONGITUDE', -6.2535495),
        ];

        $affiliates = $affiliateService->getAffiliates();

        $affiliates = array_map(function ($affiliate) use ($dublinOffice, $affiliateService) {

            $distance = $affiliateService->calculateDistance(
                $dublinOffice['latitude'], 
                $dublinOffice['longitude'], 
                $affiliate['latitude'], 
                $affiliate['longitude']
            );

            return [
                'affiliate_id' => $affiliate['affiliate_id'],
                'name' => $affiliate['name'],
                'distance' => $distance,
            ];

        }, $affiliates);

        $affiliates = array_filter($affiliates, function ($affiliate) {
            return $affiliate['distance'] <= 100;
        });

        usort($affiliates, function ($a, $b) {
            return $a['affiliate_id'] <=> $b['affiliate_id'];
        });

        return view('affiliates', ['affiliates' => $affiliates]);
    }

}
