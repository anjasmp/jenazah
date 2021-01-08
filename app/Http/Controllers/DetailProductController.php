<?php

namespace App\Http\Controllers;

use App\Product;
use App\Transaction;
use App\UserDetails;
use Illuminate\Http\Request;

class DetailProductController extends Controller
{
    public function index (Request $request, $slug)
    {
        $item = Product::where('slug', $slug)
            ->firstOrFail();

        return view('user.pelayananjenazah.detail', [
            'item' => $item
        ]);
    }
}
