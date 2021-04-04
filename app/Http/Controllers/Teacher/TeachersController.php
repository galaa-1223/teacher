<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Image;
use Illuminate\Support\Facades\Auth;

use App\Models\Teachers;
use App\Models\Tenhim;
use App\Models\MergejilBagsh;

class TeachersController extends Controller
{
    public function __construct() {
        $this->middleware('auth:teacher');
    }

    public function index()
    {
        $pageTitle = 'Багш';
        $pageName = 'teachers';
        $teachers = Teachers::orderBy('created_at', 'desc')->get();

        $activeMenu = activeMenu($pageName);

        return view('teacher/pages/'.$pageName.'/index', [
            'first_page_name' => $activeMenu['first_page_name'],
            'page_title' => $pageTitle,
            'page_name' => $pageName,
            'teachers' => $teachers,
            'user' => Auth::guard('teacher')->user()
        ]);
    }

}
