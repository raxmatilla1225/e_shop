<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Messages;
use App\Models\recover_password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
//            'username'=> 'required|string|unique:clients',
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
        $m = Messages::where('phone', $request['phone'])->get();

        if ($m->last()->message == $request['confirm_code']){
            Messages::where('phone', $request['phone'])->update(['verification' => 1]);
            Client::where('phone_number', $request['phone'])->update(['verification' => 1]);
            return redirect()->route('home')
                ->with('success','Registration completed successfully.');
        }else{
            return view('electro/layouts/number_confirmation', ['phone' => $request['phone']])->with('error','verification code is not correct');
        }
    }

    public function recover(Request $request)
    {
        $m = random_int(100000, 999999);

        Recover_password::create([
            'phone' => $request['phone'],
            'message' => $m,
        ]);

//        $response = Http::withHeaders([
//            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjUsInJvbGUiOiJ1c2VyIiwiZGF0YSI6eyJpZCI6NSwibmFtZSI6Ilx1MDQyN1x1MDQxZiBCZXN0IEludGVybmV0IFNvbHV0aW9uIiwiZW1haWwiOiJ0ZXN0QGVza2l6LnV6Iiwicm9sZSI6InVzZXIiLCJhcGlfdG9rZW4iOm51bGwsInN0YXR1cyI6ImFjdGl2ZSIsInNtc19hcGlfbG9naW4iOiJlc2tpejIiLCJzbXNfYXBpX3Bhc3N3b3JkIjoiZSQkayF6IiwidXpfcHJpY2UiOjUwLCJiYWxhbmNlIjozOTUwLCJpc192aXAiOjAsImhvc3QiOiJzZXJ2ZXIxIiwiY3JlYXRlZF9hdCI6bnVsbCwidXBkYXRlZF9hdCI6IjIwMjItMDUtMTdUMjE6MTU6MTIuMDAwMDAwWiJ9LCJpYXQiOjE2NTI4NTQ4MTcsImV4cCI6MTY1NTQ0NjgxN30.U9vNjVRUmy9-n8XukYi3Bsodoyrh6WDahIdn5ccsfGY'
//        ])->post('https://notify.eskiz.uz/api/message/sms/send', [
//            'mobile_phone' => $request['phone'],
//            'message' =>'Verification code'. $m .
//            "don't tell it to anyone",
//            'from' => '4546',
//            'callback_url' => 'http://0000.uz/test.php',
//            'client_id' => '248877'
//        ]);

        return view('electro/layouts/recover_password', ['phone' => $request['phone']]);

    }

    public function confirm_recover(Request $request)
    {
        $m = Recover_password::where('phone', $request['phone'])->get();

        if ($m->last()->message == $request['confirm_code']){
            return view('electro/layouts/update_password', ['phone' => $request['phone']]);

        }else{
            return view('electro/layouts/recover_password', ['phone' => $request['phone']])->with('error','verification code is not correct');
        }
    }

    public function update_password(Request $request)
    {
        Client::where('phone_number', $request['phone'])->update(['password' => Hash::make($request['password'])]);;

        return redirect()->route('home')->with('success','Your password has been successfully updated');
    }


    public function login(Request $request)
    {
        $inputVal = $request->all();

        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);
        $c = Client::where('username', $request['username'])->get('verification');
        foreach ($c as $item) {
            $code = $item['verification'];
        }

        if (Client::where('username',$request['username'])->count()){
            if ($code == 1){
                if(auth('client')->attempt(array('username' => $inputVal['username'], 'password' => $inputVal['password']))){
                    return redirect()->route('home')
                        ->with('success','You are logged in');
                }else{
                    return redirect()->route('home')
                        ->with('error','Email & Password are incorrect.');
                }
            }else{
                return redirect()->route('home')
                    ->with('error','You have not been verified.');
            }
        }else{
            return redirect()->route('home')
                ->with('error','Client under this name '.$request['username'].'  is not registered.');
        }



    }

    public function logout()
    {
        Session::flush();

        Auth::guard('client')->logout();

        return redirect()->route('home')->with('error','You are logged out');
    }


}
