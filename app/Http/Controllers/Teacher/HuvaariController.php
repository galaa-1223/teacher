<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use App\Models\Huvaari;

class HuvaariController extends Controller
{
    public function index()
    {
        $pageTitle = 'Хичээлийн хуваарь';
        $pageName = 'huvaari';
        $huvaariud = Huvaari::select('huvaari.*', 'angi.ner AS angi_ner', 'angi.tovch AS angi_tovch', 'angi.b_id AS angi_bagsh', 'angi.m_id AS angi_mergejil', 'hicheel.ner as hicheel', 'hicheel.tovch as hicheel_tovch')
                            ->join('fond', 'fond.id', '=', 'huvaari.f_id')
                            ->join('hicheel', 'hicheel.id', '=', 'fond.h_id')
                            ->join('angi', 'angi.id', '=', 'fond.a_id')
                            ->where('fond.t_id', Auth::guard('teacher')->user()->id)->get();
        $activeMenu = activeMenu($pageName);

        return view('teacher/pages/'.$pageName.'/index', [
            'first_page_name' => $activeMenu['first_page_name'],
            'page_title' => $pageTitle,
            'page_name' => $pageName,
            'huvaariud' => $huvaariud,
            'user' => Auth::guard('teacher')->user()
        ]);
    }

    
}
