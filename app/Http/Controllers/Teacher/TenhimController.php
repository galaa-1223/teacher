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

    public function add()
    {
        $pageTitle = 'Тэнхим нэмэх';
        $pageName = 'tenhim';

        $activeMenu = activeMenu($pageName);

        return view('teacher/pages/'.$pageName.'/add', [
            'first_page_name' => $activeMenu['first_page_name'],
            'page_title' => $pageTitle,
            'page_name' => $pageName,
            'user' => Auth::guard('teacher')->user()
        ]);
    }

    public function store(Request $request)
    {

        $tenhim = new Tenhim;
        $tenhim->ner = Str::ucfirst($request->ner);
        $tovch = '';
        $tenhimuud = explode(" ", $request->ner);
        foreach($tenhimuud as $t):
            $tovch .= Str::ucfirst(Str::substr($t, 0, 1));
        endforeach;
        $tenhim->tovch = $tovch;
        $tenhim->save();

        $activity = Activity::all()->last();

        $activity->description;
        $activity->subject;
        $activity->causer;
        $activity->changes;

        switch ($request->input('action')) {
            case 'save':
                return redirect()->route('teacher-tenhim')->with('success', 'Тэнхим амжилттай нэмэгдлээ!'); 
                break;
    
            case 'save_and_new':
                return back()->with('success', 'Тэнхим амжилттай нэмэгдлээ!');
                break;
    
            case 'preview':
                echo 'preview';
                break;
        }
    }

    public function edit($id)
    {
        $pageTitle = 'Тэнхим засварлах';
        $pageName = 'tenhim';

        $teacher = tenhim::findOrFail($id);

        $activeMenu = activeMenu($pageName);

        return view('teacher/pages/'.$pageName.'/edit', [
            'first_page_name' => $activeMenu['first_page_name'],
            'page_title' => $pageTitle,
            'page_name' => $pageName,
            'teacher' => $teacher,
            'user' => Auth::guard('teacher')->user()
        ]);
    }

    public function update(Request $request, $id)
    {
        $tenhim = tenhim::findOrFail($id);

        $tenhim->ner = Str::ucfirst($request->ner);
        $tenhim->course = $request->course;
        $tenhim->buleg = Str::ucfirst($request->buleg);
        $tenhim->m_id = $request->m_id;
        $tenhim->b_id = $request->b_id;

        $tenhim->save();

        switch ($request->input('action')) {
            case 'save':
                return redirect()->route('teacher-tenhim')->with('success', 'Тэнхим амжилттай засварлагдлаа!'); 
                break;
    
            case 'save_and_new':
                return back()->with('success', 'Тэнхим амжилттай засварлагдлаа!');
                break;
    
            case 'preview':
                echo 'preview';
                break;
        }
    }

    public function destroy(Request $request, $id)
    {
        $member = tenhim::findOrFail($id);
        $member->delete();

        return redirect()->route('tenhim')->with('success', 'Тэнхим устгагдлаа нэмэгдлээ!'); 

    }

    public function delete(Request $request)
    {
        $member = tenhim::findOrFail($request->get("t_id"));
        $member->delete();
        return redirect()->route('teacher-tenhim')->with('success', 'Тэнхим амжилттай устгалаа!'); 
    }
}
