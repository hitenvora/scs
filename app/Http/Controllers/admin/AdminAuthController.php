<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.admin_login');
    }

    public function login(Request $request)
    {
        $rules = [
            'mobile' => 'required|numeric|min:10',
            'password' => 'required',
        ];
        $this->validate($request, $rules);

        $credentials = $request->only('mobile', 'password');

        $admin = Admin::where('mobile', $request->mobile)->first();

        if ($admin) {
            if ($admin->is_active == 0) {
                return redirect('admin/login')->with('error', 'Your Admin is Not Active!');
            }
            if (Auth::guard('admin')->attempt($credentials)) {
                return redirect()->route('collected');
            }
        }

        return back()->withErrors(['error' => 'Invalid credentials']);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }
}
