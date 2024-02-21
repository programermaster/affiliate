<?php

namespace App\Http\Services;

use App\Enums\DublinOfficeCoordinate;

class AffiliateService
{
    const R_EARTH = 6371.009;
    public function getAffiliatesLivesWithinDistanceOfDublin($requestDistance)
    {
        $file = fopen(base_path("database/data/affiliates.txt"), "r");

        $foundedAffiliates = [];

        while (($data = fgets($file, 2000)) !== FALSE) {

            $affiliate = json_decode($data, true);

            if($this->isAffiliateLivesWithinDistanceOfDublin($affiliate, $requestDistance)){
                $foundedAffiliates[$affiliate["affiliate_id"]] = $affiliate;
            }
        }

        ksort($foundedAffiliates);

        return $foundedAffiliates;
    }

    public function isAffiliateLivesWithinDistanceOfDublin($affiliate, $requestDistance){

        $affiliate["latitude"] = deg2rad($affiliate["latitude"]);
        $affiliate["longitude"] = deg2rad($affiliate["longitude"]);

        $distanceAffiliate =  self::R_EARTH * acos(
            sin($affiliate["latitude"]) * sin(DublinOfficeCoordinate::LATITUDE) +
            cos($affiliate["latitude"]) * cos(DublinOfficeCoordinate::LATITUDE) * cos(abs($affiliate["longitude"] - DublinOfficeCoordinate::LONGITUDE))
        );

//        echo $distanceAffiliate."<BR>";

        if($distanceAffiliate <= $requestDistance){
            return true;
        }

        return false;
    }
}
