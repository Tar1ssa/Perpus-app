<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalControllers extends Controller
{
    public function index()
    {
        return view('cal.index');
    }

    public function kubus()
    {

        return view('cal.kubus');
    }

    public function kubusAction(Request $request)
    {
        $s = $request['s'];
        $vol = $s ** 3;
        $luas =  6 * $s ** 2;
        return view('cal.kubus', compact('vol', 'luas'));
    }

    public function balok()
    {

        return view('cal.balok');
    }

    public function balokAction(Request $request)
    {
        $p = $request['p'];
        $l = $request['l'];
        $t = $request['t'];

        $vol = $p * $l * $t;
        $luas = 2 * ($p * $l + $p * $t + $l * $t);
        return view('cal.balok', compact('vol', 'luas'));
    }

    public function limas()
    {
        return view('cal.limas');
    }

    public function limasAction(Request $request)
    {
        $s = $request->s;
        $t = $request->t;
        $alas = $s ** 2;
        $vol = 1 / 3 * $alas * $t;

        return view('cal.limas', compact('vol'));
    }

    public function tabung()
    {
        return view('cal.tabung');
    }

    public function tabungAction(Request $request)
    {
        $pie = 3.14;
        $r = $request->r;
        $t = $request->t;

        $vol = $pie * $r ** 2 * $t;
        $luas = 2 * $pie * $r * ($r + $t);
        return view('cal.tabung', compact('vol', 'luas'));
    }

    public function bola()
    {
        return view('cal.bola');
    }
    public function bolaAction(Request $request)
    {
        $pie = 3.14;
        $r = $request->r;
        $vol = 4 / 3 * $pie * $r ** 3;
        $luas = 4 * $pie * $r ** 2;
        return view('cal.bola', compact('vol', 'luas'));
    }
}
