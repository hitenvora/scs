<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ScsMail;
use App\Models\ContactList;
use App\Models\EmployeeList;
use App\Models\SampleFrequency;
use App\Models\SignUp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class CustomerSystemController extends Controller
{
    public function index()
    {
        $SampleFrequencies = SampleFrequency::orderBy('id')->get();
        $customer_id = Session::get('customer_id');
        $customer = SignUp::where('id', $customer_id)->first();
        $customersname_id = Session::get('customer_id');
        $customersname = ContactList::where('sign_up_id', $customersname_id)->get();

        return view('admin.cust_system', compact('SampleFrequencies', 'customer', 'customersname'));
    }

    public function customer_get()
    {
        $customer = SignUp::get();  
        $customer = Session::get('customer_id');
        $contect =  EmployeeList::where('id', $customer)->get();
        $user = SignUp::where('id', $customer)->get();

        return response()->json([
            'status' => 200,
            'message' => 'success',
            'data' => $user
        ]);
    }

    public function customer_edit(Request $request)
    {

        $rules = [
            'cust_name' => 'required',
            'city' => 'required',
            'address' => 'required',
            'gst_no' => 'required',
            'sample_frequencies_id' => 'required',
            'g_map_location' => 'required',
            'is_active' => 'required'
        ];

        $this->validate($request, $rules);
        $customer_id = Session::get('customer_id');

        try {
            // Start a database transaction
            DB::beginTransaction();

            // Update the SignUp record
            $customer = SignUp::find($customer_id);
            $customer->cust_name = $request->input('cust_name');
            $customer->city = $request->input('city');
            $customer->address = $request->input('address');
            $customer->gst_no = $request->input('gst_no');
            $customer->sample_frequencies_id = $request->input('sample_frequencies_id');
            $customer->g_map_location = $request->input('g_map_location');
            $customer->is_active = $request->input('is_active');
            $customer->save();  

            // Delete existing ContactList records for this SignUp
            ContactList::where('sign_up_id', $customer_id)->delete();
    
            
            // Insert new ContactList records
            $person_name = $request->input('person_name');
            $mobile_no = $request->input('mobile_no');
            $email_id = $request->input('email_id');
            
            
            $rules = [
                'mobile_no' => 'required',
                'email_id' => 'required',
                'person_name' => 'required',
            ];
            $this->validate($request, $rules);

            foreach ($person_name as $key => $value) {
                $contact = new ContactList();
                $contact->sign_up_id = $customer_id;
                $contact->person_name = $value;
                $contact->mobile_no = $mobile_no[$key];
                $contact->email_id = $email_id[$key];
                $contact->save();
            }   

            // Commit the transaction
            DB::commit();

            return response()->json(['status' => 200, 'msg' => 'Customer updated successfully!']);
        } catch (\Exception $e) {
            // Something went wrong, so rollback the transaction
            DB::rollback();

            return response()->json(['status' => 500, 'msg' => 'Error updating customer: ' . $e->getMessage()]);
        }
    }




    public function emailsending(Request $request)
    {

        $rules = [
            'more_selection' => 'required',
            'remark' => 'required',
            'upload_img' => 'required',
           
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
      
        $select = $request->input('more_selection');
        $remark = $request->input('remark');
        
        // $imagePath = null;
        if ($request->hasFile('upload_img')) {
            $image = $request->file('upload_img');
            $imagePath = $image->move(public_path('upload/sample-collection-request/')); // Store the uploaded image
        }

        Mail::to('hitenvora5666@gmail.com')->send(new ScsMail($select, $remark, $imagePath));
        return response()->json(['message' => 'Email sent successfully']);
    }
}
