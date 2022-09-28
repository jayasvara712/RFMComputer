<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;

class AjaxControllers extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function ajaxRequest()
    {
        return view();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function ajaxRequestPost($id): \Illuminate\Http\JsonResponse
    {
        $stok = 0;
        $stockDBData = Stock::where('id_barang', '=', $id)->first();
        if ($stockDBData) {
            $stok = $stockDBData->stock;
        }
        return response()->json(['stok' => $stok]);
    }
}
