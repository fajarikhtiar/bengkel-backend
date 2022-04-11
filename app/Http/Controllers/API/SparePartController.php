<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Sparepart;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;

class SparePartController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');

        if ($id) {
            $sparepart = Sparepart::find($id);

            return ResponseFormatter::success(
                $sparepart,
                'Data sparepart berhasil diambil'
            );
        }

        $sparepart = Sparepart::all();

        return ResponseFormatter::success(
            $sparepart,
            'Data sparepart berhasil diambil'
        );
    }
}
