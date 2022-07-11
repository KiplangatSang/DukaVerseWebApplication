<?php

namespace App\Http\Controllers;

use App\Employees\Employees;
use App\Repositories\AppRepository;
use App\Repositories\FirebaseRepository;
use App\Retails\Retail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BaseController extends Controller
{
    //

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */

    //gets retails list sent to home controller for choosing
    public function appRepository()
    {
        # code...
        $baseRepo = new AppRepository();
        return $baseRepo;
    }

    public function getBaseImages()
    {
        # code...
        $baseImages = $this->appRepository()->getBaseImages();
        return $baseImages;
    }
    public function getRetailList()
    {
        $user = User::where('id', Auth::id())->first();

        if ($user->is_owner) {
            $retails = null;
            # code...
            $retails = $user->retails()->get();
            $retailList['retails'] = $retails;

            return $retailList;
        } elseif (!$user->is_owner && $user->is_employee) {
            // dd($user);

            $employeeaccount = $user->employees()->first();
            $retails = null;
            # code...
            $retails =  $employeeaccount->employeeable()->get();
            $retailList['retails'] = $retails;
            return $retailList;
        } else {
            dd("employeeaccount");
        }
    }

    public function setRetail()
    {

        $retails = $this->getRetailList();

        if (count($retails['retails']) < 1) {
            return redirect("/client/retails/create")->with('error', 'Register Your Retail Shop First');
        }


        return view('retails', compact('retails'));
    }


    public function getRetail()
    {
        $user = User::where('id', Auth::id())->first();
        //dd($user);
        $retail = $user->sessionRetail()->first();

        if (!$retail)
            return false;


        $retailId  = $retail->retail_id;
        $retail = Retail::where('id', $retailId)->first();

        if (!$retail)
            return false;
        $retail['complete'] = $this->calculate_profile($retail);
        return $retail;
    }

    public function sendResponse($result, $message)
    {
        $response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];


        return response()->json($response, 200);
    }


    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error, $errorMessages = [], $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];


        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }


        return response()->json($response, $code);
    }

    function calculate_profile($profile)
    {
        if (!$profile) {
            return 0;
        }
        $columns    = preg_grep('/(.+ed_at)|(.*id)/', array_keys($profile->toArray()), PREG_GREP_INVERT);
        $per_column = 100 / count($columns);
        $total      = 0;

        foreach ($profile->toArray() as $key => $value) {
            if ($value !== NULL && $value !== [] && in_array($key, $columns)) {
                $total += $per_column;
            }
        }
        $total = number_format($total, 2);
        return $total;
    }

    public function saveFile($folder, $file)
    {
        # code...
        $user = User::where('id', auth()->id())->first();
        $fileNameToStore = "";

        $firebase = new FirebaseRepository($this->getRetail());
        $fileNameToStore =  $firebase->store($user, $folder, $file);

        // $jobDescFileWithExt = $file->getClientOriginalName();
        // $filename = pathinfo($jobDescFileWithExt, PATHINFO_FILENAME);
        // $extension = $file->getClientOriginalExtension();
        // $fileNameToStore = $filename . '_' . time() . '.' . $extension;
        // //   Log::info("File" .$fileNameToStore);
        // //storage_path()
        return $fileNameToStore;
    }
}
