<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use App\Models\Mergejil;
use App\Models\MergejilTurul;

class MergejilController extends Controller
{
    public function index()
    {
        $pageTitle = 'Мэргэжил';
        $pageName = 'mergejil';

        $mergejil = Mergejil::orderBy('ner', 'asc')->get();

        $activeMenu = activeMenu($pageName);

        return view('teacher/pages/'.$pageName.'/index', [
            'first_page_name' => $activeMenu['first_page_name'],
            'page_title' => $pageTitle,
            'page_name' => $pageName,
            'mergejils' => $mergejil,
            'user' => Auth::guard('teacher')->user()
        ]);
    }

}
