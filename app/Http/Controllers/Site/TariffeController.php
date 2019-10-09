<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Model\Tariffe;

class TariffeController extends Controller
{
    public function getTariffe()
    {
        $tariffes = Tariffe::with('tariffe_items')->get();

        return response()->json(['data' => $tariffes]);
    }
}
