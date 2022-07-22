<?php

namespace App\Http\Controllers;

use App\Http\Resources\StockResource;
use App\Models\SMStock;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['public_getAllActiveProducts']]);
    }

    public function public_getAllActiveProducts(Request $request)
    {
        $stocks = SMStock::where("active", "=", "1")->where("stock_in_hand", ">", 0)->get();
        //$stocks = SMStock::all();
        //dd($stocks);
        return  StockResource::collection($stocks);
    }
}
