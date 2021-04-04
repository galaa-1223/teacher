<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use App\Models\MergejilBagsh;

class MergejilBagshController extends Controller
{
    public function index()
    {
        $pageTitle = 'Багшийн мэргэжил';
        $pageName = 'mergejil_bagsh';
        $mergejil_bagsh = MergejilBagsh::orderBy('created_at', 'desc')->paginate(9);

        $activeMenu = activeMenu($pageName);

        return view('teacher/pages/'.$pageName.'/index', [
            'first_page_name' => $activeMenu['first_page_name'],
            'page_title' => $pageTitle,
            'page_name' => $pageName,
            'mergejil_bagshs' => $mergejil_bagsh,
            'user' => Auth::guard('teacher')->user()
        ]);
    }

}
