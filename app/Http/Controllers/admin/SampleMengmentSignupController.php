<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\SignUpController;
use App\Http\Controllers\Controller;
use App\Models\SampleMengmentSignup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SampleMengmentSignupController extends Controller
{
    public function index()
    {
        return view('admin.sms_sign_up');
    }


    public function insert(Request $request)
    {
        $rules = [
            'name' => 'required',
            'mobile_no' => 'required',
            'password' => 'required',

        ];
        $this->validate($request, $rules);

        $sms_signup = new SampleMengmentSignup();
        $sms_signup->name = $request->input('name');
        $sms_signup->mobile_no = $request->input('mobile_no');
        $sms_signup->password = Hash::make($request->password);
        $sms_signup->save(); {
            return response()->json(['status' => '200', 'msg' => 'Added Sucessfully']);
        }
    }




    // public function login(Request $request)
    // {
    //     $credentials = [
    //         'mobile_no' => 'required|numeric|min:10',
    //         'password' => 'required',
    //     ];
    //     // $this->validate($request, $rules);

    //     // $credentials = $request->only('mobile_no', 'password');

    //     // $admin = SampleMengmentSignup::where('mobile_no', $request->mobile_no)->first();



    //     if (Auth::attempt($credentials)) {
    //         return redirect()->route('list_route');
    //     }


    //     return back()->withErrors(['error' => 'Invalid credentials']);
    // }
}
