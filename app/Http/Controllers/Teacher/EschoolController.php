<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;

use App\Models\Fond;

class EschoolController extends Controller
{
    public function index()
    {
        $pageTitle = 'Eschool';
        $pageName = 'eschool';
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
