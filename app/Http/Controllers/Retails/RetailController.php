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

        return view('client.retailers.registration.create');
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
        return view('client.retailers.profile.index', compact('retail'));
    }

    public function edit()
    {
        $retail = $this->getRetail();
        $retail->retail_goods = json_decode($retail->retail_goods);
        $profileComplete = $this->calculate_profile($retail);
        $retail['profile_complete'] = $profileComplete;

        return view('client.retailers.profile.retailprofile.edit', compact('retail'));
        # code...
    }

    public function update(Request $request)
    {
        # code...
        //dd($request->all());
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


    public function updateRetailProfile(Request $request)
    {
        $fileNameToStore = "";
        if (request()->hasFile('file')) {
            $fileNameToStore = $this->saveFile(request()->file('file'));
        } else {
            $fileNameToStore = 'nofile.png';
        }
        $path = request()->file('file')->storeAs('public/RetailPictures', $fileNameToStore);
        $retail = $this->getRetail();
        Log::info("updated" . json_encode($request->all()) );
        $retail->update([
            "retail_profile" => $fileNameToStore,
        ]);

        return 200;
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



        $retail->update([
            "retail_documents" => json_encode($documents),
        ]);

        return 200;
    }
    public function uploadRelevantDocuments(Request $request)
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
        $path = request()->file('file')->storeAs('storage/RetailRelevantDocuments', $fileNameToStore);

        $retail = $this->getRetail();
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
