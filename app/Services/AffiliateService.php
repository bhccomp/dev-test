<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class AffiliateService
{
    /**
     * Retrieve affiliates data from the data source.
     *
     * @return array An array of affiliate data, each element being an associative array representing an affiliate.
     */
    public function getAffiliates(): array
    {
        if (!Storage::exists('affiliates.txt')) {
            throw new \Exception('Affiliates file not found.');
        }

        $contents = Storage::get('affiliates.txt');
        $lines = explode("\n", $contents);

        $affiliates = array_map(function (string $line): array {
            return json_decode($line, true);
        }, $lines);

        return $affiliates;
    }

    /**
     * Calculate the great-circle distance between two points on Earth.
     *
     * @param  float  $latitudeFrom  Latitude of the starting point.
     * @param  float  $longitudeFrom Longitude of the starting point.
     * @param  float  $latitudeTo    Latitude of the destination point.
     * @param  float  $longitudeTo   Longitude of the destination point.
     * @return float  The calculated great-circle distance in kilometers.
     */
    public function calculateDistance(float $latitudeFrom, float $longitudeFrom, float $latitudeTo, float $longitudeTo): float
    {

        $earthRadius = env('EARTH_RADIUS', 6371);

        $latitudeFromRadian = deg2rad($latitudeFrom);
        $longitudeFromRadian = deg2rad($longitudeFrom);
        $latitudeToRadian = deg2rad($latitudeTo);
        $longitudeToRadian = deg2rad($longitudeTo);

        $latitudeDelta = $latitudeToRadian - $latitudeFromRadian;
        $longitudeDelta = $longitudeToRadian - $longitudeFromRadian;

        $angle = 2 * asin(sqrt(pow(sin($latitudeDelta / 2), 2) + cos($latitudeFromRadian) * cos($latitudeToRadian) * pow(sin($longitudeDelta / 2), 2)));

        return $angle * $earthRadius;
    }
}
