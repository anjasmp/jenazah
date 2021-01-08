<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function sejarah()
    {
        return view('user.profil.sejarah');

    }

    public function struktur()
    {
        return view('user.profil.struktur');

    }

    public function proker()
    {
        return view('user.profil.proker');

    }

    public function struktur_opera()
    {
        return view('user.profil.struktur-opera');

    }
}
