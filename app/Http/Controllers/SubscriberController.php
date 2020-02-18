<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth, Hash, Validator;
use App\Traits\ApiMotbit;
use App\Models\Subscriber;
class SubscriberController extends Controller
{
    use ApiMotbit;
    protected $model = 'Subscriber';

    public function processInputs($request)
    {
        $rs = [
            'email' => $request->input('email', ''),
            'status' => $request->input('status', 0)
        ];
        return $rs;
    }
   
    public function postSubscriber(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'email' => 'required|unique:subscribers',
          
        ], [
            'email.required' => 'Nhập email của bạn',
            'email.unique'=>'Email đã được đăng kí'
        ]);
        if($validator->fails()) {
            return response()->json([
                'errors' => $validator->messages()
            ]);
        }

        $contact = new Subscriber;
       
        $contact->email = $req->email;
      
        $contact->save();
       return response()->json($req->all());
    }
}
