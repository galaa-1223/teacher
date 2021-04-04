<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fond;
use Illuminate\Support\Facades\Auth;

class FondController extends Controller
{
    public function index()
    {
        $pageTitle = 'Багшийн цагийн фонд';
        $pageName = 'fond';
        $fond = Fond::select('fond.id as fid', 'fond.t_id', 'fond.tsag as tsag', 'teachers.id', 'angi.ner as angi', 'angi.course as course', 'angi.buleg as buleg', 'angi.tovch', 'hicheel.ner as hicheel', 'hicheel.tovch as hicheel_tovch')
                            ->join('teachers', 'teachers.id', '=', 'fond.t_id')
                            ->join('angi', 'angi.id', '=', 'fond.a_id')
                            ->join('hicheel', 'hicheel.id', '=', 'fond.h_id')
                            ->orderBy('angi', 'asc')
                            ->where('fond.t_id', Auth::guard('teacher')->user()->id)->get();

        $activeMenu = activeMenu($pageName);

        return view('teacher/pages/'.$pageName.'/index', [
            'first_page_name' => $activeMenu['first_page_name'],
            'page_title' => $pageTitle,
            'page_name' => $pageName,
            'fonds' => $fond,
            'user' => Auth::guard('teacher')->user()
        ]);
    }
}
