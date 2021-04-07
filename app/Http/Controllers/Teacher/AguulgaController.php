<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;

use App\Models\Fond;
use App\Models\BulegSedev;
use App\Models\Aguulga;
use App\Models\Files;
use Illuminate\Support\Facades\Storage;

class AguulgaController extends Controller
{
    public function aguulga($slug)
    {
        $pageTitle = 'Eschool :: хичээлийн агуулга';
        $pageName = 'eschool';
        $fond = Fond::where('slug', '=', $slug)->firstOrFail();

        $activeMenu = activeMenu($pageName);

        return view('teacher/pages/'.$pageName.'/aguulga', [
            'first_page_name' => $activeMenu['first_page_name'],
            'page_title' => $pageTitle,
            'page_name' => $pageName,
            'fond' => $fond,
            'user' => Auth::guard('teacher')->user()
        ]);
    }

    public function aguulgaAdd($slug, $id)
    {
        $pageTitle = 'Агуулга нэмэх';
        $pageName = 'eschool';
        $fond = Fond::select('fond.id as fid', 'fond.t_id', 'fond.tsag as tsag', 'fond.slug as slug', 'teachers.id', 'angi.ner as angi', 'angi.course as course', 'angi.buleg as buleg', 'angi.tovch', 'hicheel.ner as hicheel', 'hicheel.tovch as hicheel_tovch')
            ->join('teachers', 'teachers.id', '=', 'fond.t_id')
            ->join('angi', 'angi.id', '=', 'fond.a_id')
            ->join('hicheel', 'hicheel.id', '=', 'fond.h_id')
            ->orderBy('hicheel.ner', 'asc')
            ->where('fond.t_id', Auth::guard('teacher')->user()->id)
            ->where('slug', '=', $slug)->firstOrFail();
        $buleg = BulegSedev::where('slug', '=', $slug)
            ->where('id', '=', $id)
            ->orderBy('created_at', 'desc')->first();

        $activeMenu = activeMenu($pageName);

        return view('teacher/pages/'.$pageName.'/aguulga_add', [
            'first_page_name' => $activeMenu['first_page_name'],
            'page_title' => $pageTitle,
            'page_name' => $pageName,
            'fond' => $fond,
            'buleg' => $buleg,
            'user' => Auth::guard('teacher')->user()
        ]);
    }

    public function aguulgaSave(Request $request, $slug, $id)
    {
        $aguulga = new Aguulga;

        $aguulga->ner = Str::ucfirst($request->ner);
        $aguulga->tailbar = Str::ucfirst($request->tailbar);
        $aguulga->link = $request->link;
        $aguulga->embed = ($request->embed == null) ? null : $request->embed;
        $aguulga->slug = $slug;
        $aguulga->buleg = $id;
        $aguulga->t_id = Auth::guard('teacher')->user()->id;

        $aguulga->save();

        return redirect()->route('teacher-eschool-sedev', [$slug, $id])->with('success', 'Агуулга амжилттай нэмэгдлээ!'); 

    }

    public function aguulgaUploads(Request $request, $slug, $id)
    {

        $target_dir = public_path("uploads/aguulga/".$slug.'/');

        if(!is_dir($target_dir)){
            $response = mkdir($target_dir);
        }

        $files = new Files;
        
        $array = explode('.', $_FILES['file']['name']);
        $extension = end($array);
        $filename = $id.'-'.Str::random(5).'.'.$extension;
        $target_file = $target_dir . $filename;

        

        $msg = "";

        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {

            $files->name = $filename;
            $files->link = $_POST['link2'];
            $files->save();

        }else{ 
            $msg = "Error while uploading";
        }
            echo $msg;
        exit;

    }
    
}
