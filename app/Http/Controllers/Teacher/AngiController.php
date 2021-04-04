<?php

namespace App\Http\Controllers\Teacher;


use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use App\Models\Angi;
use App\Models\Tenhim;
use App\Models\Teachers;
use App\Models\Mergejil;
use App\Models\MergejilTurul;
use App\Models\Huvaari; 


class AngiController extends Controller
{
    public function index()
    {
        $pageTitle = 'Ангиуд';
        $pageName = 'angi';

        $angi = Angi::select('angi.*', 'teachers.ner as bagsh', 'teachers.ovog')
                            ->join('teachers', 'teachers.id', '=', 'angi.b_id')
                            ->orderBy('ner', 'asc')
                            ->get();

        $activeMenu = activeMenu($pageName);

        return view('teacher/pages/'.$pageName.'/index', [
            'first_page_name' => $activeMenu['first_page_name'],
            'page_title' => $pageTitle,
            'page_name' => $pageName,
            'angiud' => $angi,
            'user' => Auth::guard('teacher')->user()
        ]);
    }

    public function students()
    {
        $pageTitle = 'Даасан ангийн оюутнууд';
        $pageName = 'angi';

        $angi = Angi::select('angi.*', 'teachers.ner as bagsh', 'teachers.ovog')
                            ->join('teachers', 'teachers.id', '=', 'angi.b_id')
                            ->orderBy('ner', 'asc')
                            ->get();

        $activeMenu = activeMenu($pageName);

        return view('teacher/pages/'.$pageName.'/students', [
            'first_page_name' => $activeMenu['first_page_name'],
            'page_title' => $pageTitle,
            'page_name' => $pageName,
            'angiud' => $angi,
            'user' => Auth::guard('teacher')->user()
        ]);
    }

    public function huvaari()
    {
        $pageTitle = 'Даасан ангийн хичээлийн хуваарь';
        $pageName = 'angi';

        $angi = Angi::where('b_id', '=', Auth::guard('teacher')->user()->id)->first();

        $huvaariud = Huvaari::select('huvaari.*', 'angi.ner AS angi_ner', 'angi.tovch AS angi_tovch', 'angi.b_id AS angi_bagsh', 'angi.m_id AS angi_mergejil', 'hicheel.ner as hicheel', 'hicheel.tovch as hicheel_tovch')
                            ->join('fond', 'fond.id', '=', 'huvaari.f_id')
                            ->join('hicheel', 'hicheel.id', '=', 'fond.h_id')
                            ->join('angi', 'angi.id', '=', 'fond.a_id')
                            ->where('fond.a_id', $angi->id)->get();

        $activeMenu = activeMenu($pageName);

        return view('teacher/pages/'.$pageName.'/huvaari', [
            'first_page_name' => $activeMenu['first_page_name'],
            'page_title' => $pageTitle,
            'page_name' => $pageName,
            'huvaariud' => $huvaariud,
            'angi' => $angi,
            'user' => Auth::guard('teacher')->user()
        ]);
    }

    public function irts()
    {
        $pageTitle = 'Даасан ангийн ирц';
        $pageName = 'angi';

        $angi = Angi::select('angi.*', 'teachers.ner as bagsh', 'teachers.ovog')
                            ->join('teachers', 'teachers.id', '=', 'angi.b_id')
                            ->orderBy('ner', 'asc')
                            ->get();

        $activeMenu = activeMenu($pageName);

        return view('teacher/pages/'.$pageName.'/irts', [
            'first_page_name' => $activeMenu['first_page_name'],
            'page_title' => $pageTitle,
            'page_name' => $pageName,
            'angiud' => $angi,
            'user' => Auth::guard('teacher')->user()
        ]);
    }

    public function yavts()
    {
        $pageTitle = 'Даасан ангийн явц';
        $pageName = 'angi';

        $angi = Angi::select('angi.*', 'teachers.ner as bagsh', 'teachers.ovog')
                            ->join('teachers', 'teachers.id', '=', 'angi.b_id')
                            ->orderBy('ner', 'asc')
                            ->get();

        $activeMenu = activeMenu($pageName);

        return view('teacher/pages/'.$pageName.'/yavts', [
            'first_page_name' => $activeMenu['first_page_name'],
            'page_title' => $pageTitle,
            'page_name' => $pageName,
            'angiud' => $angi,
            'user' => Auth::guard('teacher')->user()
        ]);
    }

}
