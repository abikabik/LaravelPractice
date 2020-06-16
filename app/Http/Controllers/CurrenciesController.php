<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\currenciesModel;
use Carbon\Carbon;
class currenciesController extends Controller
{
    public function currencies(){
        return response()->json(currenciesModel::get(),200);
    }

    public function  currenciesOne($id){
        $realdate = Carbon::now()->toDateString();
        $curr=currenciesModel::where([
            ['name', $id],
            ['date', $realdate],
        ])->get();
        if (count($curr)<1){
            return response()->json('Not Found', 404);
        }
        else return response()->json($curr,200);
    }
}
