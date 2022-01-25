<?php

namespace App\Repositories;



class ThirdPartyRepository
{


    public function getThirdPartyImages()
    {
        $thirdPartyImagePaths = array(
         'MoneyPayments' => $this-> thirdpartyPayments(),
         'Airtime' => $this-> thirdpartyAirtime(),
         'Electricity' => $this->thirdpartyElectricity(),
         'Electricity' => $this->thirdpartyElectricity(),
         'Water' => $this->thirdpartyWater(),
         'TV' => $this->thirdpartyTV(),
        );



        return $thirdPartyImagePaths;
    }

    public function thirdpartyPayments()
    {
        $thirdParties = array('MPESA.jpg', 'kcb.png', 'equity.png');
        $thirdPartyImagePaths = array();

        foreach ($thirdParties as $thirdParty) {
            $imagepath = "/storage/3rdPartyPictures/" . $thirdParty;
            // array_push($thirdPartyImagePaths,,"yellow");
            $thirdParty = substr($thirdParty, 0,-4);
            $ImagePathsArray =  array($thirdParty => $imagepath);
            $thirdPartyImagePaths =  array_merge($thirdPartyImagePaths, $ImagePathsArray);
        }
        return $thirdPartyImagePaths;
    }
    public function thirdpartyAirtime()
    {
        $thirdParties = array('airtel.png', 'safaricom.png','telkom.png');
        $thirdPartyImagePaths = array();

        foreach ($thirdParties as $thirdParty) {
            $imagepath = "/storage/3rdPartyPictures/" . $thirdParty;
            // array_push($thirdPartyImagePaths,,"yellow");
            $thirdParty = substr($thirdParty, 0,-4);

            $ImagePathsArray =  array($thirdParty => $imagepath);
            $thirdPartyImagePaths =  array_merge($thirdPartyImagePaths, $ImagePathsArray);
        }
        return $thirdPartyImagePaths;
    }


    public function thirdpartyElectricity()
    {
        $thirdParties = array('kenyapower.jpg');
        $thirdPartyImagePaths = array();

        foreach ($thirdParties as $thirdParty) {
            $imagepath = "/storage/3rdPartyPictures/" . $thirdParty;
            // array_push($thirdPartyImagePaths,,"yellow");
            $thirdParty = substr($thirdParty, 0,-4);

            $ImagePathsArray =  array($thirdParty => $imagepath);
            $thirdPartyImagePaths =  array_merge($thirdPartyImagePaths, $ImagePathsArray);
        }
        return $thirdPartyImagePaths;
    }

    public function thirdpartyWater()
    {
        $thirdParties = array('nairobiwater.png');
        $thirdPartyImagePaths = array();

        foreach ($thirdParties as $thirdParty) {
            $imagepath = "/storage/3rdPartyPictures/" . $thirdParty;
            // array_push($thirdPartyImagePaths,,"yellow");
            $thirdParty = substr($thirdParty, 0,-4);

            $ImagePathsArray =  array($thirdParty => $imagepath);
            $thirdPartyImagePaths =  array_merge($thirdPartyImagePaths, $ImagePathsArray);
        }
        return $thirdPartyImagePaths;
    }

    public function thirdpartyTV()
    {
        $thirdParties = array(
            'dstv.png',
            'startimes.jpg',
            'zuku.png',
        );
        $thirdPartyImagePaths = array();

        foreach ($thirdParties as $thirdParty) {
            $imagepath = "/storage/3rdPartyPictures/" . $thirdParty;
            // array_push($thirdPartyImagePaths,,"yellow");

            $thirdParty = substr($thirdParty, 0,-4);

            $ImagePathsArray =  array($thirdParty => $imagepath);


            $thirdPartyImagePaths =  array_merge($thirdPartyImagePaths, $ImagePathsArray);
        }
        return $thirdPartyImagePaths;
    }
}
