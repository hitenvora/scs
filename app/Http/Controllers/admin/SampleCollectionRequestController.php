<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SampleCollectionRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SampleCollectionRequestController extends Controller
{
    public function send_request(Request $request)
    {
        $rules = [
            'sample_date' => 'required|date',
            'sample_no' => 'required|numeric',
            'company_name' => 'required',
            'mobile' => 'required|numeric|min:10',
            'address' => 'required',
            'image' => 'required |mimes:jpeg,jpg,png,gif',
        ];

        $this->validate($request, $rules);

        $image = $request->file('image');
        $filename = '';


        if ($image == '') {
            return response()->json(['status' => '400', 'msg' => 'please select image']);
        }

        if (!empty($image)) {
            $filename = str_replace(' ', '', $image->getClientOriginalName());
            $image->move(public_path('upload/sample-collection-request/'), $filename);
        }


        $sample_request = new SampleCollectionRequest();
        $sample_request->sample_date = $request->input('sample_date');
        $sample_request->sample_no = $request->input('sample_no');
        $sample_request->company_name = $request->input('company_name');
        $sample_request->mobile = $request->input('mobile');
        $sample_request->address = $request->input('address');
        $sample_request->image = $filename;
        $customer_id = Session::get('customer_id');
        $sample_request->sign_up_id = $customer_id;
        $sample_request->save();

        return response()->json(['status' => 200, 'msg' => 'Request send successfully']);
    }
}
