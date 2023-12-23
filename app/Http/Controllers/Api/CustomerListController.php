<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SignUp;
use Illuminate\Http\Request;

class CustomerListController extends Controller
{
    public function getCustomerList(Request $request)
    {
        $getCustomer = SignUp::orderBy('id')
            ->with('sample_frequency', 'customers')
            ->where('is_active', 1)->get();
        if ($getCustomer) {
            return response()->json([
                'message' => 'Customers details',
                'status' => 200,
                'data' => $getCustomer,
            ], 200);
        } else {
            return response()->json([
                'message' => 'No Customers found!',
                'status' => 404,
            ]);
        }
    }
}
