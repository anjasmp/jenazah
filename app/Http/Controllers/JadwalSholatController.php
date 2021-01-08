<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class JadwalSholatController extends Controller
{
    
    public function index()
    {
        $cities= Http::get('https://api.banghasan.com/sholat/format/json/kota')->json()['kota'];

        return view('homepage', compact('cities'));
    }

    public function result(Request $request)
    {
        $schedule = Http::get('https://api.banghasan.com/sholat/format/json/jadwal/kota/');
        
        return $schedule;
        // return view('result', compact('schedule'));
    }
}
