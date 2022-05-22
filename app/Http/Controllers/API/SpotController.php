<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Spot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SpotController extends Controller
{
    public function getVaccinesSpot()
    {
        $data = Spot::with('vaccines')->get();
        return response()->json([
            'spots'=> $data,
        ]);
    }

    public function spotDetail($id)
    {
        $data = Spot::where('id', $id)->firstOrFail();
        return response()->json([
            'date' => date('Y-m-d'),
            'spot' => $data,
            'vaccions_count' => 15,
        ]);
    }
}
