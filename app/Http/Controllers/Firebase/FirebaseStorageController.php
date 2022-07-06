<?php

namespace App\Http\Controllers\Firebase;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Repositories\FirebaseRepository;
use App\User;
use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Illuminate\Support\Str;

use Exception;
use Illuminate\Support\Facades\Log;
use Kreait\Firebase\ServiceAccount;

class FirebaseStorageController extends BaseController
{
    //

    protected $factory = null;
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     * allow write: if "auth.token.email === 'kiplangatsang425@gmail.com'";
     *
     */
    public function index()
    {
        // // $serviceAccount = ServiceAccount::fromJsonFile(base_path(env('FIREBASE_CREDENTIALS')));
        // $firebase = (new Factory)
        //     ->withServiceAccount($serviceAccount)
        //     ->withDatabaseUri("https://storm3blog-default-rtdb.firebaseio.com")
        //     ->create();


        $database = $this->factory->createDatabase();

        // $database = $firebase->getDatabase();
        $newPost = $database
            ->getReference('blog/posts')
            ->push([
                'title' => 'Post title',
                'body' => 'I mf did it.'
            ]);
        //$newPost->getKey(); // => -KVr5eu8gcTv7_AHb-3-
        //$newPost->getUri(); // => https://my-project.firebaseio.com/blog/posts/-KVr5eu8gcTv7_AHb-3-
        //$newPost->getChild('title')->set('Changed post title');
        //$newPost->getValue(); // Fetches the data from the realtime database
        //$newPost->remove();
        echo "<pre>";
        print_r($newPost->getvalue());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        /*
        $this->factory = (new Factory)
            // ->withServiceAccount(base_path(env('FIREBASE_CREDENTIALS')))
            ->withServiceAccount(base_path("storage/app/firebase/firebase_credentials.json"))
            ->withDatabaseUri('https://storage.googleapis.com/' . env('FIREBASE_PROJECT_ID') . '.appspot.com');

        $file = fopen(base_path('storage/app/public/3rdPartyPictures/noprofile.png'), 'r');

         $path = base_path("storage/app/firebase/firebase_credentials.json");
         //$path =base_path('storage/app/public/3rdPartyPictures/noprofile.png');
        //  dd($path);

        try {
            $storage = app('firebase.storage'); // This is an instance of Google\Cloud\Storage\StorageClient from kreait/firebase-php library
           // dd($storage);
            $defaultBucket = $storage->getBucket();
            Log::debug($defaultBucket->getMessage());
        //    $defaultBucket = ;
            $image = $file;
            //    $name = (string) Str::uuid().".png".$image->getClientOriginalExtension(); // use Illuminate\Support\Str;

            $name = "NOPROFILE.jpg";
            $object = $defaultBucket->upload($file, [
                //  'name' => auth()->user()->id."/". $name,
                'name' => "app/" . $name,
                'predefinedAcl' => 'publicRead'
            ]);
            $image_url = 'https://storage.googleapis.com/' . env('FIREBASE_PROJECT_ID') . '.appspot.com/' . "app/" . $name;
            //dd($file);
            return $image_url;
        } catch (Exception $e) {
            Log::debug($e->getMessage());
            return $e->getMessage();

        }
*/
        $file = fopen(base_path('storage/app/public/3rdPartyPictures/noprofile.png'), 'r');
        try {
            $storage = app('firebase.storage'); // This is an instance of Google\Cloud\Storage\StorageClient from kreait/firebase-php library
            $defaultBucket = $storage->getBucket();
            $image = $file;
            $name = (string) Str::uuid() . ".png"; // use Illuminate\Support\Str;
            $pathName = base_path('storage/app/public/3rdPartyPictures/noprofile.png');


            $file = fopen($pathName, 'r');
            $object = $defaultBucket->upload($file, [
                'name' => auth()->user()->id . "/" . $name,
                'predefinedAcl' => 'publicRead'
            ]);
            $image_url = 'https://storage.googleapis.com/' . env('FIREBASE_PROJECT_ID') . '.appspot.com/' . auth()->user()->id . "/" . $name;
            //dd($file);
            return $image_url;
        } catch (Exception $e) {
            Log::debug( $e->getMessage());
            echo $e->getMessage();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $file = fopen(base_path('storage/app/public/3rdPartyPictures/AIRTEL.png'), 'r');
        $file = base_path('storage/app/public/3rdPartyPictures/AIRTEL.png');
        $user = User::where('id', auth()->id())->first();
        $firebaserepo = new FirebaseRepository($this->getRetail());
        $result =  $firebaserepo->store($user, "Airtel", $file);
        return $result;
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
}
