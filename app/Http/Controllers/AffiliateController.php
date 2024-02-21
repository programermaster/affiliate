<?php

namespace App\Http\Controllers;

use App\Http\Services\AffiliateService;
use Illuminate\Routing\Controller as BaseController;

class AffiliateController extends BaseController
{
    public function getAffiliatesLivesWithinDistanceOfDublin(AffiliateService $acs){

        $affiliates = $acs->getAffiliatesLivesWithinDistanceOfDublin(100);

        return  view("affiliates", [
           "affiliates" => $affiliates
        ]);
    }
}
