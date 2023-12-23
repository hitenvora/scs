<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\RouteList;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RouteListController extends Controller
{
    public function index()
    {
        return view('admin.route_list');
    }

    public function insert(Request $request)
    {
        if ($request->route_id == '') {
            $rules = [
                'name' => 'required',
            ];
        } else {
            $rules = [
                'name' => 'required',
            ];
        }
        $this->validate($request, $rules);

        if ($request->route_id != '') {
            $route_list = RouteList::find($request->route_id);
            if (!$route_list) {
                return response()->json(['status' => 400, 'msg' => 'Route details not found!']);
            }
        } else {
            $route_list = new RouteList();
        }
        $route_list->name = $request->input('name');
        $route_list->save();

        return response()->json(['status' => '200', 'msg' => 'success']);
    }

    public function show_route(Request $request)
    {
        $route_list = RouteList::orderBy('id', 'desc')->get();

        foreach ($route_list as $key => $record) {
            $id = $record->id;
            $action = '<button type="button" class="btn btn-primary btn-sm me-1" onclick="editroute(' . $id . ')" title="Edit"><i class="fa fa-pencil"></i></button>';
            $action .= '<button type="button" class="btn btn-danger btn-sm" onclick="daletetabledata(' . $id . ')" title="Delete"><i class="fa fa-trash"></i></button>';
            $route_list[$key]['action'] =  $action;
        }
        return DataTables::of($route_list)
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }

    public function route_edit($id)
    {
        $route_list = RouteList::where('id', '=', $id)->first();
        if ($route_list) {
            return response()->json(['status' => '200', 'msg' => 'success', 'data' => $route_list]);
        }
        return response()->json(['status' => '200', 'msg' => 'success'], 400);
    }

    public function delete(Request $request)
    {
        $id =  $request->input('id');
        $route_list = RouteList::find($id);
        $route_list->delete();

        return response()->json(['status' => '200', 'msg' => 'success']);
    }

}
