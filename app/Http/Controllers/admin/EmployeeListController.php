<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EmployeeList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class EmployeeListController extends Controller
{
    public function index()
    {
        return view('admin.employee_list');
    }

    public function insert(Request $request)
    {
        if ($request->user_id == '') {
            $rules = [
                'name' => 'required',
                'mobile_no' => 'required',
                'imei_number' => 'required',

            ];
        } else {
            $rules = [
                'name' => 'required',
                'mobile_no' => 'required',
                'imei_number' => 'required',
            ];
        }
        $this->validate($request, $rules);

        if ($request->user_id != '') {
            $employee_list = EmployeeList::find($request->user_id);
            if (!$employee_list) {
                return response()->json(['status' => 400, 'msg' => 'Employee details not found!']);
            }
            $employee_list->is_active = $request->is_active;
        } else {
            $employee_list = new EmployeeList();
        }
        $employee_list->name = $request->input('name');
        $employee_list->mobile_no = $request->input('mobile_no');
        $employee_list->imei_number = $request->input('imei_number');
        $employee_list->save();

        return response()->json(['status' => '200', 'msg' => 'success']);
    }

    public function get_employe_list(Request $request)
    {
        $employee_list = EmployeeList::orderBy('id', 'desc')->get();

        foreach ($employee_list as $key => $record) {
            $id = $record->id;
            if ($record->is_active == 0) {
                $employee_list[$key]['active_button'] = '<span class="badge bg-warning">In Active</span>';
            } else {
                $employee_list[$key]['active_button'] = '<span class="badge bg-success">Active</span>';
            }
            $action = '<button type="button" class="btn btn-primary btn-sm me-1" onclick="editemploye(' . $id . ')" title="Edit"><i class="fa fa-pencil"></i></button>';
            $action .= '<button type="button" class="btn btn-danger btn-sm" onclick="daletetabledata(' . $id . ')" title="Delete"><i class="fa fa-trash"></i></button>';
            $employee_list[$key]['action'] =  $action;
        }
        return DataTables::of($employee_list)
            ->addIndexColumn()
            ->rawColumns(['action', 'active_button',])
            ->make(true);
    }

    public function employe_edit($id)
    {
        $employee_list = EmployeeList::where('id', '=', $id)->first();
        if ($employee_list) {
            return response()->json(['status' => '200', 'msg' => 'success', 'data' => $employee_list]);
        }
        return response()->json(['status' => '200', 'msg' => 'success'], 400);
    }

    public function delete(Request $request)
    {
        $id =  $request->input('id');
        $employee_list = EmployeeList::find($id);
        $employee_list->delete();

        return response()->json(['status' => '200', 'msg' => 'success']);
    }
}
