<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Helpers\ResponseFormatter;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Exception;

class CustomerController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');

        if ($id) {
            $customer = Customer::find($id);

            return ResponseFormatter::success(
                $customer,
                'Data customer berhasil diambil'
            );
        }

        $customer = Customer::all();

        return ResponseFormatter::success(
            $customer,
            'Data customer berhasil diambil'
        );
    }

    public function add(Request $request)
    {
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'name' => ['required', 'string'],
                    'phone' => ['nullable', 'string'],
                ]
            );

            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }

            $id = $request->input('id');

            if ($id) {
                $customer = Customer::find($id);
                $data = $request->all();
                $customer->update($data);

                return ResponseFormatter::success($customer, 'Profile updated');
            }

            Customer::create([
                'name' => $request->name,
                'phone' => $request->phone,
            ]);

            $customer = Customer::where('phone', $request->phone)->first();

            return ResponseFormatter::success(
                $customer,
                'Customer Registered'
            );
        } catch (Exception $error) {
            ResponseFormatter::error([
                'message' => 'Something wen\'t wrong',
                'error' => $error
            ], 'Customer Fail to Add', 500);
        }
    }


    public function update(Request $request, $id)
    {
        $customer = Customer::find($id);
        $customer->update(['name' => $request->name, 'phone' => $request->phone]);

        return ResponseFormatter::success($customer, 'Profile update');
    }

    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();

        return ResponseFormatter::success($customer, 'Customer deleted');
    }
}
