<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Irts;
use Illuminate\Support\Facades\Auth;

class IrtsController extends Controller
{
    public function index()
    {
        $pageTitle = 'Багшийн хичээл ангийн ирц';
        $pageName = 'irts';
        $irtses = Irts::All();

        $activeMenu = activeMenu($pageName);

        return view('teacher/pages/'.$pageName.'/index', [
            'first_page_name' => $activeMenu['first_page_name'],
            'page_title' => $pageTitle,
            'page_name' => $pageName,
            'irtses' => $irtses,
            'user' => Auth::guard('teacher')->user()
        ]);
    }
}
