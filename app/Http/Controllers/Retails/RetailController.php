<?php

namespace App\Http\Controllers\Retails;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Retails\Retail;
use App\User;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RetailController extends BaseController
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function create()
    {
        return view('retailers.registration.create');
    }

    public function store(Request $request)
    {


        $request['retail_Id'] = substr($request->retail_county, 0, 3) . rand(10000, 100000);
        $goods = json_encode($request->retail_goods);
        $request['retail_goods'] = $goods;

        // dd($request->all());
        $user = User::where('id', auth()->id())->first();
        //dd($user);
        $user->retails()->create(
            $request->all(),
        );

        return redirect('/home');
    }

    public function show()
    {
        # code...
        $retail = $this->getRetail();
        return view('retailers.profile.index', compact('retail'));
    }

    public function edit()
    {
        $retail = $this->getRetail();
        $retail->retail_goods = json_decode($retail->retail_goods);
        $retail->account_details = json_decode($retail->account_details);
        $profileComplete = $this->calculate_profile($retail);
        $retail['profile_complete'] = $profileComplete;

        return view('retailers.profile.retailprofile.edit', compact('retail'));
        # code...
    }

    public function update(Request $request)
    {
        # code...
        $retail = $this->getRetail();
        if ($request->retail_goods) {
            $retail_goods = json_decode($retail->retail_goods);
            $goods = array_merge((array)$retail_goods, $request->retail_goods);
            $request['retail_goods'] = json_encode($goods);
        }

        $retail->update(
            $request->all(),
        );
        return back()->with("success", "Profile data Updated");
    }

    public function paymentPreference($id, Request $request)
    {
        # code...
        $request->validate([
            "paymentpreference" => "required",
        ]);
        $account_details = array();

        if ($request->paymentpreference == "mpesapaybill") {

            $request->validate([
                "paybill" => "required",
                "account_number" => "required",
            ]);

            $account_details["paybill"] = $request->paybill;
            $account_details["account_number"] = $request->account_number;
        } elseif ($request->paymentpreference == "mpesatill") {
            $request->validate([
                "till_number" => "required",
                "till_store" => "required"
            ]);

            $account_details["till_number"] = $request->till_number;
            $account_details["till_store"] = $request->till_store;
        }

        $retail = $this->getRetail();

        $retail->update(
            [
                "paymentpreference" => $request->paymentpreference,
                "account_details" => json_encode($account_details),
            ]
        );

        return back()->with("success", "Payment preference data Updated");
    }


    public function updateRetailProfile(Request $request)
    {
        $retail = $this->getRetail();
        $fileNameToStore = $this->getBaseImages()['nofile'];
        if (request()->hasFile('file')) {
            $fileNameToStore = $this->saveFile("retail_profile", request()->file('file'));
        } else
            Log::info("No File " . $fileNameToStore);

        // $path = request()->file('file')->storeAs('public/RetailPictures', $fileNameToStore);

        Log::info("updated" . json_encode($request->all()));
        $retail->update([
            "retail_profile" => $fileNameToStore,
        ]);

        return 200;
    }
    public function uploadRetailDocuments(Request $request)
    {
        # code...
        $retail = $this->getRetail();
        $fileNameToStore = $this->getBaseImages()['nofile'];
        if (request()->hasFile('file')) {
            $fileNameToStore = $this->saveFile("business_permit", request()->file('file'));
            Log::info("File" . $fileNameToStore);
        } else
            Log::info("No File " . $fileNameToStore);

        // $path = request()->file('file')->storeAs('storage/RetailBusinessPermit', $fileNameToStore);

        //Log::info("updated" .$path);
        $documents = null;

        // check if there are documents available and append
        if ($retail->retail_documents) {
            $documents = (array)json_decode($retail->retail_documents);
        }
        $documents['business_permit'] = $fileNameToStore;



        $retail->update([
            "retail_documents" => json_encode($documents),
        ]);

        return 200;
    }
    public function uploadRelevantDocuments(Request $request)
    {
        $retail = $this->getRetail();
        # code...
        $fileNameToStore = $this->getBaseImages()['nofile'];
        if (request()->hasFile('file')) {
            $fileNameToStore = $this->saveFile("retail_relevant_documents", request()->file('file'));
            Log::info("File" . $fileNameToStore);
        } else
            Log::info("No File " . $fileNameToStore);

        // $path = request()->file('file')->storeAs('storage/RetailRelevantDocuments', $fileNameToStore);


        //Log::info("updated" .$path);


        $documents = null;
        if ($retail->retail_relevant_documents) {
            //get and append to uploaded documents
            $documents = (array)json_decode($retail->retail_relevant_documents);
            array_push($documents, $fileNameToStore);
        } else {
            #set new value if the documents are empty
            $documents = $fileNameToStore;
        }
        $retail->update([
            "retail_relevant_documents" => json_encode($documents),
        ]);
    }
}
