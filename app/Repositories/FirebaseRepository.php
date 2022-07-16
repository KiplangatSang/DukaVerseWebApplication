<?php

namespace App\Repositories;

use App\Retails\Retail;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Kreait\Firebase\Factory;
use Illuminate\Support\Str;

class FirebaseRepository
{

    protected $factory = null;
    protected $retail = null;
    public function __construct($account = null)
    {
        $this->factory = (new Factory)
            ->withServiceAccount("C:\\xampp\\htdocs\\DukaVerse\\storage\\app\\firebase\\firebase_credentials.json")
            ->withDatabaseUri(env('FIREBASE_DATABASE_URL'));
        // dd(env('FIREBASE_DATABASE_URL'));
        $this->retail = $account;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     * allow write: if "auth.token.email === 'kiplangatsang425@gmail.com'";
     *
     */

    public function store($user, $folder, $file)
    {
        //
        try {
            $storage = app('firebase.storage'); // This is an instance of Google\Cloud\Storage\StorageClient from kreait/firebase-php library
            $defaultBucket = $storage->getBucket();
            $image = $file;
            $name = (string) Str::uuid() . "." . $image->getClientOriginalExtension(); // use Illuminate\Support\Str;

            $pathName = $image->getPathName();

            $package =  $this->firebaseRepositories($this->retail, $user);
            $filename = $package . $folder . "/" . $name;
            // $file = fopen($pathName, 'r');
            $file = fopen($pathName, 'r');
            $object = $defaultBucket->upload($file, [
                'name' => $filename,
                'predefinedAcl' => 'publicRead'
            ]);
            $image_url = 'https://storage.googleapis.com/' . env('FIREBASE_PROJECT_ID') . '.appspot.com/' .  $filename;
            //dd($file);

            //https://storage.googleapis.com/dukaverse-e4f47.appspot.com/1/bf8af7e2-275d-4327-93a5-144fe2f42e24
            return $image_url;
        } catch (Exception $e) {
            Log::debug($e->getMessage());
            return $e->getMessage();
        }
    }

    public function firebaseRepositories(Retail $retail = null, User $user)
    {
        # code...
        $package = "";
        if ($user->isAdmin) {
            $package = "admin/" . $user->id . "/";
        } elseif ($user->isEmployee) {
            $package = "client/" . $retail->id . "/employee/" . $user->id . "/";
        } elseif (!$user->isEmployee && $user->role == 1) {
            $package = "client/" . $retail->id . "/" . $user->id . "/";
        } elseif ($user->role == 2) {
            $package = "supplier/" . $user->id . "/";
        } elseif ($user->role == 3) {
            $package = "customers/" . $user->id . "/";
        }
        return $package;
    }
}
