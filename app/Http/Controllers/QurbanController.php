<?php

namespace App\Http\Controllers;

use App\GalleryQurban;
use App\PenerimaanQurban;
use App\PenyaluranQurban;
use Illuminate\Http\Request;

class QurbanController extends Controller
{
    public function index ()
    {
        $penyaluran = PenyaluranQurban::whereYear('created_at', now())
        ->get();
        $item = PenerimaanQurban::whereYear('created_at', now())->orderBy('id', 'DESC')->get();
        $gallery = GalleryQurban::whereYear('created_at', now())
        ->get();

        // return $penyaluran;

        return view('user.laporan.qurban.qurban', [
            'item' => $item,
            'penyaluran' => $penyaluran,
            'gallery' => $gallery
        ]);
    }
}
