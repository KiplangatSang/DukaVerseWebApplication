<?php

namespace App\Http\Controllers\Retails;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Repositories\FirebaseRepository;
use App\Repositories\RetailRepository;
use App\Retails\Retail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RetailAPIController extends BaseController
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $retails = $this->getRetailList();
        return $this->sendResponse($retails, "Select Your Retail");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'retail_name' => ['required', 'string:2'],
            'retail_goods' => ['required',],
            'retail_town' => ['required',],
            'retail_constituency' => ['required',],
            'retail_county' => ['required',],
        ]);


        $request['retail_Id'] = substr($request->retail_county, 0, 3) . rand(10000, 100000);
        $goods = json_encode($request->retail_goods);
        $request['retail_goods'] = $goods;

        // dd($request->all());
        $user = User::where('id', auth()->id())->first();
        //dd($user);
        $retail = $user->retails()->create(
            $request->all(),
        );
        $retail->retail_goods = json_decode($retail->retail_goods);
        return $this->sendResponse($retail, "Retail registered successfully");
        //
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $user = User::where('id', auth()->id())->first();
        $retail = $user->retails()->where('id', $id)->first();
        if (!$retail)
            return $this->sendError("Could not find retail", $retail, 404);
        return $this->sendResponse($retail, "Retail registered successfully");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::where('id', auth()->id())->first();
        //dd($user);
        $retail = $user->retails()->where('id', $id)->first();
        if (!$retail)
            return $this->sendError("Could not find retail", $retail, 404);
        return $this->sendResponse($retail, "Retail registered successfully");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        //return $request->all();
        $retail = $this->getRetail();
        if ($request->retail_goods) {
            $retail_goods = json_decode($retail->retail_goods);
            $goods = array_merge((array)$retail_goods, $request->retail_goods);
            $request['retail_goods'] = json_encode($goods);
        }
        return $request->all();
        $retail = $retail->update(
            $request->all(),
        );

        if (!$retail)
            return $this->sendError("Could not make update", $retail, 404);

        $retail = $this->getRetail();
        return $this->sendResponse($retail, "Retail data updated");
    }

    public function paymentPreference(Request $request)
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

        $retail = $retail->update(
            [
                "paymentpreference" => $request->paymentpreference,
                "account_details" => json_encode($account_details),
            ]
        );

        if (!$retail)
            return $this->sendError("Could not make update", $retail, 404);

        return $this->sendResponse($this->getRetail(), "Payment preference data Updated");
    }


    public function updateRetailProfile(Request $request)
    {
        $fileNameToStore = "https://storage.googleapis.com/dukaverse-e4f47.appspot.com/app/nofile.png";

        if (request()->hasFile('file')) {
            $fileNameToStore = $this->saveFile(request()->file('file'));
        }
        $retail = $this->getRetail();
        Log::info("updated" . json_encode($request->all()));
        $retail = $retail->update([
            "retail_profile" => $fileNameToStore,
        ]);

        if (!$retail)
            return $this->sendError("Could not make update", $retail, 404);


        return $this->sendResponse($this->getRetail(), "Profile Updated");
    }
    public function uploadRetailDocuments(Request $request)
    {
        # code...
        $fileNameToStore = "";
        if (request()->hasFile('file')) {
            $fileNameToStore = $this->saveFile(request()->file('file'));
            Log::info("File" . $fileNameToStore);
        } else {

            $fileNameToStore = 'nofile.png';
            Log::info("No File " . $fileNameToStore);
        }
        $path = request()->file('file')->storeAs('storage/RetailBusinessPermit', $fileNameToStore);
        $retail = $this->getRetail();
        //Log::info("updated" .$path);
        $documents = null;

        // check if there are documents available and append
        if ($retail->retail_documents) {
            $documents = (array)json_decode($retail->retail_documents);
        }
        $documents['business_permit'] = $fileNameToStore;

        $retail =  $retail->update([
            "retail_documents" => json_encode($documents),
        ]);

        if (!$retail)
            return $this->sendError("Could not make update", $retail, 404);

        return $this->sendResponse($this->getRetail(), "Retail Documents data Updated");
    }
    public function uploadRelevantDocuments(Request $request)
    {
        # code...
        $retail = $this->getRetail();
        $fileNameToStore = "";
        if (request()->hasFile('file')) {

            $user = User::where('id', auth()->id())->first();

            $firebaserepo = new FirebaseRepository($retail);
            $firebaseresult =  $firebaserepo->store($user, "RetailRelevantDocuments", request()->file('file'));
            $fileNameToStore = $firebaseresult;

            Log::info("File" . $fileNameToStore);
        } else {

            $fileNameToStore = 'nofile.png';
            Log::info("No File " . $fileNameToStore);
        }
        $path = request()->file('file')->storeAs('storage/RetailRelevantDocuments', $fileNameToStore);


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


        if (!$retail)
            return $this->sendError("Could not make update", $retail, 404);


        return $this->sendResponse($this->getRetail(), "Relevant documents Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $retail = Retail::destroy($id);
        if (!$retail)
            return $this->sendError("Could not make update", "", 404);

        if ($retail)
            return $this->sendResponse($retail, "Retail deleted");
    }

    public function setSessionRetail(Request $request)
    {
        # code...
        request()->validate([
            'retail_id' => 'required',
        ]);
        //dd( $retail);
        $retailRepo = new RetailRepository(auth()->user());
        $retail = $retailRepo->storeRetailInSession($request->retail_id);
        if (!$retail)
            return $this->sendError("Could set session", "", 404);

        return $this->sendResponse($this->getRetail(), "Well Done! Logging in");
    }

    public function getPaymentPreferences()
    {
        # code...
        $user = User::where('id', auth()->id())->first();
        $retailRepo = new RetailRepository($user);
        $paymentPref = $retailRepo->getPaymentPreferences();

        return $this->sendResponse($paymentPref, "Select your payent Preference");
    }
}
