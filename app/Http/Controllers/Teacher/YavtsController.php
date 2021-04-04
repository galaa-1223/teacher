<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Yavts;
use Illuminate\Support\Facades\Auth;

class YavtsController extends Controller
{
    public function index()
    {
        $pageTitle = 'Багшийн хичээл ангийн явц';
        $pageName = 'yavts';
        $yavtsas = Yavts::All();

        $activeMenu = activeMenu($pageName);

        return view('teacher/pages/'.$pageName.'/index', [
            'first_page_name' => $activeMenu['first_page_name'],
            'page_title' => $pageTitle,
            'page_name' => $pageName,
            'yavtsas' => $yavtsas,
            'user' => Auth::guard('teacher')->user()
        ]);
    }
}
