<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Profiles\profiles;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProfileController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
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
        //
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
        $profile = $user->profiles()->first();
        $profile['profile_complete'] = $this->calculate_profile($profile);
        $profile['user'] = $user;


        //dd($profile);

        return view('retailers.profile.userprofile.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $profile = profiles::where('id', $id)->first();
        $profile->update(
            $request->all(),
        );
        return back()->with("success", "Profile data Updated");
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
    }

    public function updateUserProfile($id, Request $request)
    {
        $user = User::where('id', auth()->id())->first();
        $profile = profiles::where('id', $id)->first();

        Log::info("Request " . json_encode($request->all()));

        $fileNameToStore = $this->getBaseImages()['nofile'];
        if (request()->hasFile('file')) {
            $fileNameToStore = $this->saveFile("profile_image",request()->file('file'));
        } else
            Log::info("Error");

        // $path = request()->file('file')->storeAs('public/ProfilePictures', $fileNameToStore);

        Log::info("updated" . json_encode($request->all()));
        profiles::updateOrCreate([
            "user_id" => $user->id,
        ], [
            "profile_image" => $fileNameToStore,
        ]);

        return 200;
    }
    public function uploadUserDocuments($id, Request $request)
    {
        $user = User::where('id', auth()->id())->first();
        $profile = $user->profiles()->first();
        # code...
        $fileNameToStore = $this->getBaseImages()['nofile'];
        if (request()->hasFile('file')) {
            $fileNameToStore = $this->saveFile("national_id", request()->file('file'));
            Log::info("File" . $fileNameToStore);
        } else
            Log::info("No File " . $fileNameToStore);

        // $path = request()->file('file')->storeAs('storage/UserNationalId', $fileNameToStore);

        $documents = null;

        // check if there are documents available and append
        if ($profile->national_id) {
            $documents = (array)json_decode($profile->national_id);
        }
        $documents['national_id'] = $fileNameToStore;



        $profile->update([
            "national_id" => json_encode($documents),
        ]);

        return 200;
    }
    public function uploadRelevantDocuments($id, Request $request)
    {
        $user = User::where('id', auth()->id())->first();
        $profile = $user->profiles()->first();
        # code...
        $fileNameToStore = $this->getBaseImages()['nofile'];
        if (request()->hasFile('file')) {
            $fileNameToStore = $this->saveFile("relevant_documents", request()->file('file'));
            // Log::info("File" . $fileNameToStore);
        } else
            Log::info("No File " . $fileNameToStore);

        // $path = request()->file('file')->storeAs('storage/UserRelevantDocuments', $fileNameToStore);
        $documents = null;
        if ($profile) {
            if ($profile->relevant_documents) {
                //get and append to uploaded documents
                $documents = (array)json_decode($profile->relevant_documents);
                array_push($documents, $fileNameToStore);
            } else {
                #set new value if the documents are empty
                $documents = $fileNameToStore;
            }
            $profile->update([
                "relevant_documents" => json_encode($documents),
            ]);
        } else {
        }
    }
}
