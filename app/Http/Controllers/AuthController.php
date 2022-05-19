<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Messages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'username'=> 'required|string|unique:clients',
            'password'=>'required',
            'phone'=>'required',
        ]);

        $m = random_int(100000, 999999);

        Messages::create([
            'username' => $request['username'],
            'password' => Hash::make($request['password']),
            'phone' => $request['phone'],
            'message' => $m,
        ]);

        Client::create([
            'name' => $request['username'],
            'username' => $request['username'],
            'password' => Hash::make($request['password']),
            'phone_number' => $request['phone'],
        ]);

        $response = Http::withHeaders([
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjUsInJvbGUiOiJ1c2VyIiwiZGF0YSI6eyJpZCI6NSwibmFtZSI6Ilx1MDQyN1x1MDQxZiBCZXN0IEludGVybmV0IFNvbHV0aW9uIiwiZW1haWwiOiJ0ZXN0QGVza2l6LnV6Iiwicm9sZSI6InVzZXIiLCJhcGlfdG9rZW4iOm51bGwsInN0YXR1cyI6ImFjdGl2ZSIsInNtc19hcGlfbG9naW4iOiJlc2tpejIiLCJzbXNfYXBpX3Bhc3N3b3JkIjoiZSQkayF6IiwidXpfcHJpY2UiOjUwLCJiYWxhbmNlIjozOTUwLCJpc192aXAiOjAsImhvc3QiOiJzZXJ2ZXIxIiwiY3JlYXRlZF9hdCI6bnVsbCwidXBkYXRlZF9hdCI6IjIwMjItMDUtMTdUMjE6MTU6MTIuMDAwMDAwWiJ9LCJpYXQiOjE2NTI4NTQ4MTcsImV4cCI6MTY1NTQ0NjgxN30.U9vNjVRUmy9-n8XukYi3Bsodoyrh6WDahIdn5ccsfGY'
        ])->post('https://notify.eskiz.uz/api/message/sms/send', [
            'mobile_phone' => $request['phone'],
            'message' => $m ,
            'from' => '4546',
            'callback_url' => 'http://0000.uz/test.php',
            'client_id' => '248877'
        ]);


        return view('electro/layouts/number_confirmation', ['phone' => $request['phone']]);
    }

    public function confirm(Request $request)
    {
        $m = Messages::where('phone', $request['phone'])->get('message');
        foreach ($m as $item) {
            $sms = $item['message'];
        }
        if ($sms == $request['confirm_code']){
            Messages::where('phone', $request['phone'])->update(['verification' => 1]);
            return 'Регистрация прошла успешно';
        }else{
            return 'код подтверждения не верный';
        }
    }


    public function login(Request $request)
    {
        $inputVal = $request->all();

        $this->validate($request, [
            'username' => 'required|email',
            'password' => 'required',
        ]);

        if(auth('client')->attempt(array('username' => $inputVal['username'], 'password' => $inputVal['password']))){
            return redirect()->route('contact')
                ->with('success');
        }else{
            return redirect()->route('login')
                ->with('error','Email & Password are incorrect.');
        }
    }


}
