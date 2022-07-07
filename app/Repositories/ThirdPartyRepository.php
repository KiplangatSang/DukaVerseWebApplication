<?php

namespace App\Repositories;



class ThirdPartyRepository
{


    protected $base_image_path = "https://storage.googleapis.com/dukaverse-e4f47.appspot.com/app/";

    public function __construct()
    {
    }
    public function getThirdPartyImages()
    {
        $thirdPartyImagePaths = array(
            'MoneyPayments' => $this->thirdpartyPayments(),
            'Airtime' => $this->thirdpartyAirtime(),
            'Electricity' => $this->thirdpartyElectricity(),
            // 'Electricity' => $this->thirdpartyElectricity(),
            'Water' => $this->thirdpartyWater(),
            'TV' => $this->thirdpartyTV(),
        );



        return $thirdPartyImagePaths;
    }

    public function thirdpartyPayments()
    {

        $thirdParties = array(
            "EQUITY.png",
            "KCB.png",
            "MPESA.jpg",
        );

        $thirdPartyImagePaths = array();

        foreach ($thirdParties as $thirdParty) {
            $imagepath = $this->base_image_path . $thirdParty;
            // array_push($thirdPartyImagePaths,,"yellow");
            $thirdParty = substr($thirdParty, 0, -4);
            $ImagePathsArray =  array($thirdParty => $imagepath);
            $thirdPartyImagePaths =  array_merge($thirdPartyImagePaths, $ImagePathsArray);
        }
        return $thirdPartyImagePaths;
    }
    public function thirdpartyAirtime()
    {
        $thirdParties = array('AIRTEL.png', 'SAFARICOM.png', 'TELKOM.png');
        $thirdPartyImagePaths = array();

        foreach ($thirdParties as $thirdParty) {
            $imagepath = $this->base_image_path . $thirdParty;
            // array_push($thirdPartyImagePaths,,"yellow");
            $thirdParty = substr($thirdParty, 0, -4);

            $ImagePathsArray =  array($thirdParty => $imagepath);
            $thirdPartyImagePaths =  array_merge($thirdPartyImagePaths, $ImagePathsArray);
        }
        return $thirdPartyImagePaths;
    }


    public function thirdpartyElectricity()
    {

        $thirdParties = array('KENYAPOWER.jpg');
        $thirdPartyImagePaths = array();

        foreach ($thirdParties as $thirdParty) {
            $imagepath = $this->base_image_path . $thirdParty;
            // array_push($thirdPartyImagePaths,,"yellow");
            $thirdParty = substr($thirdParty, 0, -4);

            $ImagePathsArray =  array($thirdParty => $imagepath);
            $thirdPartyImagePaths =  array_merge($thirdPartyImagePaths, $ImagePathsArray);
        }
        return $thirdPartyImagePaths;
    }

    public function thirdpartyWater()
    {

        $thirdParties = array('NAIROBIWATER.png');
        $thirdPartyImagePaths = array();

        foreach ($thirdParties as $thirdParty) {
            $imagepath = $this->base_image_path . $thirdParty;
            // array_push($thirdPartyImagePaths,,"yellow");
            $thirdParty = substr($thirdParty, 0, -4);

            $ImagePathsArray =  array($thirdParty => $imagepath);
            $thirdPartyImagePaths =  array_merge($thirdPartyImagePaths, $ImagePathsArray);
        }
        return $thirdPartyImagePaths;
    }

    public function thirdpartyTV()
    {


        $thirdParties = array(
            'DSTV.png',
            'STARTIMES.jpg',
            'ZUKU.png',
        );
        $thirdPartyImagePaths = array();

        foreach ($thirdParties as $thirdParty) {
            $imagepath = $this->base_image_path . $thirdParty;
            // array_push($thirdPartyImagePaths,,"yellow");

            $thirdParty = substr($thirdParty, 0, -4);

            $ImagePathsArray =  array($thirdParty => $imagepath);


            $thirdPartyImagePaths =  array_merge($thirdPartyImagePaths, $ImagePathsArray);
        }
        return $thirdPartyImagePaths;
    }
}

        /*

        https://storage.googleapis.com/dukaverse-e4f47.appspot.com/app/AIRTEL.png
        https://storage.googleapis.com/dukaverse-e4f47.appspot.com/app/DSTV.png
        https://storage.googleapis.com/dukaverse-e4f47.appspot.com/app/EQUITY.png
        https://storage.googleapis.com/dukaverse-e4f47.appspot.com/app/KCB.png
        https://storage.googleapis.com/dukaverse-e4f47.appspot.com/app/NAIROBIWATER.png
        https://storage.googleapis.com/dukaverse-e4f47.appspot.com/app/SAFARICOM.png
        https://storage.googleapis.com/dukaverse-e4f47.appspot.com/app/TELKOM.png
        https://storage.googleapis.com/dukaverse-e4f47.appspot.com/app/ZUKU.png
        https://storage.googleapis.com/dukaverse-e4f47.appspot.com/app/GOTV.jpg
        https://storage.googleapis.com/dukaverse-e4f47.appspot.com/app/KENYAPOWER.jpg
        https://storage.googleapis.com/dukaverse-e4f47.appspot.com/app/MPESA.jpg
        https://storage.googleapis.com/dukaverse-e4f47.appspot.com/app/STARTIMES.jpg

        $thirdParties = array(
            "AIRTEL.png",
            "DSTV.png",
            "EQUITY.png",
            "KCB.png",
            "NAIROBIWATER.png",
            "SAFARICOM.png",
            "TELKOM.png",
            "ZUKU.png",
            "GOTV.jpg",
            "KENYAPOWER.jpg",
            "MPESA.jpg",
            "STARTIMES.jpg",
        );
        */
