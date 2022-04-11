<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Models\Service;

class ServiceController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');

        if ($id) {
            $sparepart = Service::find($id);

            return ResponseFormatter::success(
                $sparepart,
                'Data jasa berhasil diambil'
            );
        }

        $sparepart = Service::all();

        return ResponseFormatter::success(
            $sparepart,
            'Data jasa berhasil diambil'
        );
    }
}
