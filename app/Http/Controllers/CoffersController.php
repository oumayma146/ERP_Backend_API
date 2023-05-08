<?php

namespace App\Http\Controllers;

use App\Models\Coffer;
use Illuminate\Http\Request;

class CoffersController extends Controller
{
    public function get()
    {
        $coffer = Coffer::all();
        return response()->json($coffer);
    }
    public function sumCheque()
    {
        $cheque = Coffer::sum('chèque');
        return response()->json($cheque);
    }
    public function sumVirement()
    {
        $virement = Coffer::sum('virement');
        return response()->json($virement);
    }
    public function sumEspece()
    {
        $espece = Coffer::sum('espéce');
        return response()->json($espece);
    }
}
