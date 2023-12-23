<?php

namespace App\Http\Controllers\Admin;

use App\Models\SignUp;
use App\Http\Controllers\Controller;
use App\Models\ContactList;
use App\Models\SampleFrequency;
use Illuminate\Http\Request;


class SignUpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $SampleFrequencies = SampleFrequency::orderBy('id')->get();
        return view('admin.sign_up', compact('SampleFrequencies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function insert(Request $request)
    {

        if ($request->sign_up_id == '') {
            $rules = [
                'cust_name' => 'required',
                'city' => 'required',
                'address' => 'required',
                'gst_no' => 'required',
                'sample_frequencies_id' => 'required',
                'g_map_location' => 'required',
            ];
        } else {
            $rules = [
                'cust_name' => 'required',
                'city' => 'required',
                'address' => 'required',
                'gst_no' => 'required',
                'sample_frequencies_id' => 'required',
                'g_map_location' => 'required',
            ];
        }
        $this->validate($request, $rules);

        if ($request->sign_up_id != '') {
            $SignUp = SignUp::find($request->sign_up_id);
            if (!$SignUp) {
                return response()->json(['status' => 400, 'msg' => 'SignUp details not found!']);
            }
            $SignUp->is_active = $request->is_active;
        } else {
            $SignUp = new SignUp();
        }
        $SignUp->cust_name = $request->input('cust_name');
        $SignUp->city = $request->input('city');
        $SignUp->address = $request->input('address');
        $SignUp->gst_no = $request->input('gst_no');
        $SignUp->sample_frequencies_id = $request->input('sample_frequencies_id');
        $SignUp->g_map_location = $request->input('g_map_location');

        $SignUp->save();

        // $rules = [
        //     'person_name' => 'required',
        //     'mobile_no' => 'required|numeric|min:10',
        //     'email_id' => 'required',
        // ];
        // $this->validate($request, $rules);
        $SignUpId = $SignUp->id;

        $person_name = $request->input('person_name');
        $mobile_no = $request->input('mobile_no');
        $email_id = $request->input('email_id');

        foreach ($person_name as $key => $value) {
            $ContactList = new ContactList();
            $ContactList->sign_up_id = $SignUpId;
            $ContactList->person_name = $value;
            $ContactList->mobile_no = $mobile_no[$key];
            $ContactList->email_id = $email_id[$key];
            $ContactList->save();
        }

        // return redirect()->route('cust_system')->with('success', 'Customer updated successfully!');

        return response()->json(['status' => '200', 'msg' => 'success']);
    }
}
