<?php

namespace App\Http\Controllers\Firebase;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Google\Cloud\Storage\StorageClient;

class FirebaseController extends BaseController
{

    protected $factory = null;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        //          $this->factory = (new Factory)
        //    ->withServiceAccount(base_path(env('FIREBASE_CREDENTIALS')))
        //    ->withDatabaseUri('https://storm3blog-default-rtdb.firebaseio.com');

        //

        //     $storage = app('firebase.storage'); // This is an instance of Google\Cloud\Storage\StorageClient from kreait/firebase-php library
        //     $defaultBucket = $storage->getBucket();
        //    // $image = $request->file('image');
        //    // $name = (string) Str::uuid().".".$image->getClientOriginalExtension(); // use Illuminate\Support\Str;
        //     //$pathName = $image->getPathName();

        //     $name ="Sang.png";

        // dd($name);
        // $file = fopen(public_path('/storage/RetailPictures/pic.png'), 'r');

        // if ( is_dir("files/".$file_name ) == false ) {
        //     $file = new SplFileObject("files/".$file_name);
        //     $row = 1;
        //     while (!$file->eof()) {
        //       $data[$row] = $file->fgetcsv();
        //       $row++;
        //     }
        // }

        // $object = $defaultBucket->upload($file, [
        //      'name' =>"ena/". $name,
        //      'predefinedAcl' => 'publicRead'
        // ]);
        // $image_url = 'https://storage.googleapis.com/'.env('FIREBASE_PROJECT_ID').'.appspot.com/'.$name;
        // //dd($file);
        // return $image_url;

        $this->makeNotification();
    }

    public function storage()
    {
        # code...
        // try {
        //     $storage = new StorageClient([
        //         'keyFilePath' => public_path('dukaverse-e4f47-firebase-adminsdk-mq9bi-b97e1597fe.json'),
        //     ]);

        //     $bucketName = 'artisansweb-bucket';
        //     $bucket = $storage->bucket($bucketName);
        //     if (!$bucket->exists()) {
        //         $response = $storage->createBucket($bucketName);
        //         echo "Your Bucket $bucketName is created successfully.";
        //     }
        // } catch (Exception $e) {
        //     return $e->getMessage();
        // }



        // try {
        //     $storage = new StorageClient([
        //         'keyFilePath' => storage_path('dukaverse-e4f47-firebase-adminsdk-mq9bi-b97e1597fe'),
        //     ]);

        //     $bucketName = 'artisansweb-bucket';
        //     $fileName = '1.jpg';
        //     $bucket = $storage->bucket($bucketName);
        //     $object = $bucket->upload(
        //         fopen($fileName, 'r')
        //     );
        // } catch (Exception $e) {
        //     echo $e->getMessage();
        // }
    }



    public function makeNotification()
    {


        try {
            //  $fcmTokens = FirebaseToken::where('email', $request->email)->pluck('fcmtoken');
            //$fcmTokens = "fyxfkkpNTomMlUm-yJ38Fv:APA91bHOUEyLYmDH5x_Z3vzmahHyD5P67ZtL-swzgqHcSC9uMXmqDXUkWfkgy4zcchM0LW0duaEH5kpWeEUcxUNTtYzxDfcXNwECraqzryPPoiOwT5_vDKkIDe4InnbfG9zKBDXNTj-y";
            $url = 'gs://dukaverse-e4f47.appspot.com';

            $url = 'https://dukaverse-e4f47.firebaseio.com.json';
            $api_key = 'AAAA3fMc-VE:APA91bHJZX2Tm3OA0hWAQPXkpP8szfjp7of7zPofjoCke1SS7J1Yne61A335Vy93i7Ul0vfkPT05EofPIMRbRHgnGTA0XxK0yJ-l9RL_THIoBn4rP4kTkn566cWuOSkCJDyYlqACgjt8';
            $file = fopen(public_path('pic.png'), 'r');
            $fields = array(
                'data' => array(
                    "file" =>  $file,
                )
            );

            //dd($fields);

            $headers = array(
                'Content-Type:application/json',
                'Authorization:key=' . $api_key
            );

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
            $result = curl_exec($ch);
            if ($result === FALSE) {
                die('FCM Send Error: ' . curl_error($ch));
            }
            curl_close($ch);
            return $result;
        } catch (Exception $e) {
            //report($e);
            return $e->getMessage();
        }
    }
}
