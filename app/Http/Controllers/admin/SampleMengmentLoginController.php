<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SampleMengmentSignup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class SampleMengmentLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.sms_login');
    }


    public function login(Request $request)
    {
        $rules = [  
            'mobile_no' => 'required|numeric|min:10',
            'password' => 'required',
        ];
        $this->validate($request, $rules);

        $user = SampleMengmentSignup::where('mobile_no', $request->input('mobile_no'))->first();

        if ($user && Hash::check($request->input('password'), $user->password)) {
            // Successful login, you can use Auth::login($user) here if needed
            return redirect()->route('list_of_route');
        }

        return back()->withErrors(['error' => 'Invalid credentials']);
    }
}
