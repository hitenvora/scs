<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SignUp;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CustomerListController extends Controller
{
    public function index()
    {
        return view('admin.customer_list');
    }

    public function get_customer(Request $request)
    {
        $getCustomer = SignUp::orderBy('id')->get();

        foreach ($getCustomer as $key => $record) {
            $getCustomer[$key]['sample_frequency_name'] =  $record->sample_frequency->name;
            $getCustomer[$key]['map_icon'] =  '<span class="text-center"><a href="' . $record->g_map_location . '" target="_blank"><img src="../assets/img/map-icon.png" alt="map"></a><span>';
                $getCustomer[$key]['eye_icon'] =  '<button type="button" class="btn btn-primary btn-sm me-1" onclick="viewSell(' . $record->id . ')"  title="View"><i class="fa fa-eye"></i></button>
                <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#cusomer_view" aria-label="View" data-bs-original-title="View"></a>';
        }
        return DataTables::of($getCustomer)
            ->addIndexColumn()
            ->rawColumns(['sample_frequency_name', 'map_icon', 'eye_icon'])
            ->make(true);
    }

        public function get_customer_details($id)
        {
            $getCustomer = SignUp::with('contact','sample_frequency')->where('id', $id)->first();  
            if ($getCustomer) {
                return response()->json([
                    'status' => '200',
                    'msg' => 'success',
                    'data' =>  $getCustomer
                ]);
            }
            return response()->json(['status' => '200', 'msg' => 'success'], 400);
        }


    public function customer_list_edit($id)
    {
        $getCustomer = SignUp::where('id', '=', $id)->first();
        if ($getCustomer) {
            return response()->json(['status' => '200', 'msg' => 'success', 'data' =>  $getCustomer]);
        }
        return response()->json(['status' => '200', 'msg' => 'success'], 400);
    }
}
