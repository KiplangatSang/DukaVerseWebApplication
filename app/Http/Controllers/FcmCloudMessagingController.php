<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FirebaseToken;

class FcmCloudMessagingController extends Controller
{

    public function firebaseTokenStorage(Request $request){
        $data = request()->validate([
            'name' => 'required',
            'email' => ['required','email'],
            'fcmtoken' => 'required'
        ]);
    $firebase_name = $request->input('name');
    $firebase_email= $request->input('email');
    $firebase_token = $request->input('fcmtoken');
  //  $firebase_token->save();

 // $user = FirebaseToken::where('email', $firebase_email)->first();

// if ($user !== null) {
//     $user->update(['fcmtoken' =>$firebase_token]);
// } else {
//     $user = FirebaseToken::create([
//       'email' => $firebase_email,
//       'name' => $firebase_name,
//       'fcmtoken' =>$firebase_token

//     ]);
// }
// If there's a flight from Oakland to San Diego, set the price to $99.
// If no matching model exists, create one.

 $user = FirebaseToken::updateOrCreate(
        ['email' => $firebase_email, 'name' => $firebase_name],
        ['fcmtoken' => $firebase_token]
    );
    return $user;
    }


    public function firebaseTokenRetrieve(Request $request){
       $data = request()-> validate([
        'email' => ['required','email']
           ]
        );
        return FirebaseToken::where('email', $request->email) ->get();
    }

    public function makeNotification(Request $request){

        $data = request()->validate([
            'email' =>['required','email'],
            'title'=>'required',
            'message'=>'required'
        ]);

        try{
           $fcmTokens = FirebaseToken::where('email', $request->email)->pluck('fcmtoken');
           //$fcmTokens = "fyxfkkpNTomMlUm-yJ38Fv:APA91bHOUEyLYmDH5x_Z3vzmahHyD5P67ZtL-swzgqHcSC9uMXmqDXUkWfkgy4zcchM0LW0duaEH5kpWeEUcxUNTtYzxDfcXNwECraqzryPPoiOwT5_vDKkIDe4InnbfG9zKBDXNTj-y";
            $url = 'https://fcm.googleapis.com/fcm/send';
            $api_key ='AAAA3fMc-VE:APA91bHJZX2Tm3OA0hWAQPXkpP8szfjp7of7zPofjoCke1SS7J1Yne61A335Vy93i7Ul0vfkPT05EofPIMRbRHgnGTA0XxK0yJ-l9RL_THIoBn4rP4kTkn566cWuOSkCJDyYlqACgjt8';
            $fields = array (
                'registration_ids' => array (
                    $fcmTokens
                ),
                'data' => array (
                        "title" => $request->title,
                        "message" => $request->message
                )
            );

            dd($fields);

            $headers = array(
                'Content-Type:application/json',
                'Authorization:key='.$api_key
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



        }catch(\Exception $e){
            report($e);
            return $e ." Throw Error";
        }
    }


    public function sendNotification(Request $request)
    {

        $rules = [
            'message'    => 'required',
            'device_id' => 'required',
        ];

        //$input     = $request->only('message','device_id');
       // $validator = Validator::make($input, $rules);

       // if ($validator->fails()) {
       //     return response()->json(['success' => false,'code'=>400,'message' =>'error'.$validator->messages()]);
       // }
        $message    = $request->message;
        $device_id = $request->device_id;
        $fcmTokens = "fyxfkkpNTomMlUm-yJ38Fv:APA91bHOUEyLYmDH5x_Z3vzmahHyD5P67ZtL-swzgqHcSC9uMXmqDXUkWfkgy4zcchM0LW0duaEH5kpWeEUcxUNTtYzxDfcXNwECraqzryPPoiOwT5_vDKkIDe4InnbfG9zKBDXNTj-y";

        $url = 'https://fcm.googleapis.com/fcm/send';
        $api_key = 'AAAAQigkhm0:APA91bHbZ3N8OlqobfABcpCVanFKMwtCfZ-jD2eJg7o-kP-Ey4RCsWOsAeziuLqc-EYz8F0Me_CiuWHFe7vXQaf2tZZSsUfFQHZQl4o3WPPDfoT3ca3S5MQqKRCYLtuRTTa9sfKI8ogZ';

        $fields = array (
            'registration_ids' => array (
                    $fcmTokens
            ),
            'data' => array (
                    "message" => $message ."Hello happy to be here"
            )
        );

        $headers = array(
            'Content-Type:application/json',
            'Authorization:key='.$api_key
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
    }

    public function updateToken(Request $request){
        $data = request()-> validate([
            'email' =>['required','email'],
            'fcmtoken'=>'required'
        ]);
        $email =  $request->email;
        $token = $request->fcmtoken;

       // dd($email." :" .$token);
try{
$update = FirebaseToken::where('email', $email)->update(['fcmtoken' =>  $token]);
    return  "success updated";
}catch(\Exception $e){
    report($e);
    return "Error Updating token" .$e;
}
}

    public function curldownload(Request $request){
        $url = 'https://my-json-server.typicode.com/typicode/demo/posts';


        $curl = curl_init();
        curl_setopt($curl,CURLOPT_URL,$url );
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);

        $result = curl_exec($curl);

        curl_close($curl);

        return $result;
    }

    public function deleterecords(Request $request){

  $data = request()->validate(
           [ 'id' => ['required','is_int'],
            'email' => ['required','email']
            ]
  );
$deleteId = $request->id;
$delete = FirebaseToken::destroy($deleteId);

return $deleteId;
}

}
