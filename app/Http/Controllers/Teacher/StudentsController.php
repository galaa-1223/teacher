<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Image;
use Illuminate\Support\Facades\Auth;

use App\Models\Angi;
use App\Models\MergejilBagsh;
use App\Models\Students;

class StudentsController extends Controller
{
    public function index()
    {
        $pageTitle = 'Оюутан';
        $pageName = 'students';
        $students = Students::orderBy('created_at', 'desc')->get();

        $activeMenu = activeMenu($pageName);

        return view('teacher/pages/'.$pageName.'/index', [
            'first_page_name' => $activeMenu['first_page_name'],
            'page_title' => $pageTitle,
            'page_name' => $pageName,
            'students' => $students,
            'user' => Auth::guard('teacher')->user()
        ]);
    }

}
