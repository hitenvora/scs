<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactList;
use App\Models\SignUp;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustomerLoginController extends Controller
{
    public function index()
    {
        return view('admin.cust_login');
    }

    public function login(Request $request)
    {
        $customer = $request->mobile_no;
        $user = ContactList::where('mobile_no', $customer)->first();
        if (!$user) {
            return redirect()->back()->with('error', 'Invalid mobile number.');
        }
        Session::put('customer_id', $user->sign_up_id);
        if ($user) {
            if ($user->is_active == 0) {
                return redirect('/')->with('message', 'You Are Not Active!');
            }
            return redirect()->route('cust_system');
        } else {
            return redirect()->back()->with('message', 'Invalid mobile number.');
        }
    }
}
