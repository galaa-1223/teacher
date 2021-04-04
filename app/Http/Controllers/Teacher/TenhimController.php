<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;

use App\Models\Tenhim;

class TenhimController extends Controller
{
    
    public function index()
    {
        $pageTitle = 'Тэнхим';
        $pageName = 'tenhim';
        $tenhim = Tenhim::orderBy('created_at', 'desc')->paginate(9);

        $activeMenu = activeMenu($pageName);

        return view('teacher/pages/'.$pageName.'/index', [
            'first_page_name' => $activeMenu['first_page_name'],
            'page_title' => $pageTitle,
            'page_name' => $pageName,
            'tenhims' => $tenhim,
            'user' => Auth::guard('teacher')->user()
        ]);
    }

}
