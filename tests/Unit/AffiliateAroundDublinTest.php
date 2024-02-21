<?php

namespace Tests\Unit;

use App\Http\Services\AffiliateService;
use PHPUnit\Framework\TestCase;

class AffiliateAroundDublinTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_affiliate_distance_below_100km_of_dublin(): void
    {
        //41km distance of Dublin office
        $affiliate = [
            "latitude"=> "52.986375",
            "affiliate_id"=> 12,
            "name"=> "Yosef Giles",
            "longitude"=> "-6.043701"
        ];

        $acs = new AffiliateService;
        $result = $acs->isAffiliateLivesWithinDistanceOfDublin($affiliate, 100);
        $this->assertTrue($result);
    }
}
