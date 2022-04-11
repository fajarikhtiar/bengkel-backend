<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Accesorie;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;

class AccesorieController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');

        if ($id) {
            $sparepart = Accesorie::find($id);

            return ResponseFormatter::success(
                $sparepart,
                'Data aksesori berhasil diambil'
            );
        }

        $sparepart = Accesorie::all();

        return ResponseFormatter::success(
            $sparepart,
            'Data aksesori berhasil diambil'
        );
    }
}
