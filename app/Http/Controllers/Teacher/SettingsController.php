<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Image;
use Illuminate\Support\Str;
use App\Models\Settings;
use App\Models\Teachers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{

    public function index()
    {

        $pageTitle = 'Хувийн мэдээлэл';
        $pageName = 'settings';

        $activeMenu = activeMenu($pageName);

        return view('teacher/pages/'.$pageName.'/index', [
            'first_page_name' => $activeMenu['first_page_name'],
            'page_title' => $pageTitle,
            'page_name' => $pageName,
            'user' => Auth::guard('teacher')->user()
        ]);
    }

    public function password()
    {

        $pageTitle = 'Нууц үг солих';
        $pageName = 'settings';

        $activeMenu = activeMenu($pageName);

        return view('teacher/pages/'.$pageName.'/password', [
            'first_page_name' => $activeMenu['first_page_name'],
            'page_title' => $pageTitle,
            'page_name' => $pageName,
            'user' => Auth::guard('teacher')->user()
        ]);
    }

    public function changePassword(Request $request){

        if (!(Hash::check($request->get('current-password'), Auth::guard('teacher')->user()->password))) {
            return redirect()->back()->with("error2","Таны одоогийн нууц үг таны оруулсан нууц үгтэй таарахгүй байна. Дахин оролдоно уу.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            return redirect()->back()->with("error2","Шинэ нууц үг нь таны одоогийн нууц үгтэй ижил байж болохгүй. Өөр нууц үг сонгоно уу.");
        }

        $request->validate([
            'new-password' => 'between:8,255|required_with:new-password-confirm|same:new-password-confirm',
            'new-password-confirm' => 'required|between:8,255'
        ]);

        $user = Auth::guard('teacher')->user();
        $user->password = Hash::make($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success2","Нууц үг амжилттай өөрчлөгдсөн!");

    }

    public function changePicture(Request $request, $id)
    {
        if ($request->hasFile('image')) {

            $teacher = Teachers::findOrFail($id);

            if($teacher->image != null){

                $imagePath = public_path('/uploads/teachers/'.$teacher->image);
                $imageThumbPath = public_path('/uploads/teachers/thumbs/'.$teacher->image);


                if(file_exists($imagePath))
                {
                    unlink($imagePath);
                    unlink($imageThumbPath);
                }
            }

            $date = Str::slug(Carbon::now());
            $imageName = Str::slug('123') . '-' . $date;
            $image = Image::make($request->file('image'))->save(public_path('/uploads/teachers/') . $imageName . '.jpg')->encode('jpg','50');
            $image->fit(300, 300);
            $image->save(public_path('/uploads/teachers/thumbs/' .$imageName.'.jpg'));
            
            
            $teacher->image = $imageName.'.jpg';
            $teacher->save();
        }

        return redirect()->route('teacher-settings')->with('success', 'Багшийн зураг амжилттай солигдлоо!'); 
    }

    public function huvaari()
    {

        $pageTitle = 'Хуваарь тохиргоо';
        $pageName = 'settings';

        $activeMenu = activeMenu($pageName);

        return view('teacher/pages/'.$pageName.'/huvaari', [
            'first_page_name' => $activeMenu['first_page_name'],
            'page_title' => $pageTitle,
            'page_name' => $pageName,
            'user' => Auth::guard('teacher')->user()
        ]);
    }
}
