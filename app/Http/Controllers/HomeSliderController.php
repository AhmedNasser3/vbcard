<?php

namespace App\Http\Controllers;

use App\Models\HomeSlide;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;




class HomeSliderController extends Controller
{
    public function HomeSlider(){

        $homeslide = HomeSlide::find(1);
        return view('admin.home_slide.home_slide_all',compact('homeslide'));

     } // End Method


     public function UpdateSlider(Request $request)
     {
         $slide_id = $request->id;
         $slide = HomeSlide::findOrFail($slide_id);

         if ($request->hasFile('home_slide')) {
             $image = $request->file('home_slide');
             $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

             // حفظ الصورة في مجلد "storage/app/public/home_slide"
             $image->move(public_path('storage/home_slide'), $name_gen);

             // الرابط الصحيح للصورة
             $save_url = 'storage/home_slide/' . $name_gen;

             // حذف الصورة القديمة إن وجدت
             if ($slide->home_slide) {
                 $old_image_path = public_path($slide->home_slide);
                 if (file_exists($old_image_path)) {
                     unlink($old_image_path);
                 }
             }

             // تحديث بيانات السلايد
             $slide->update([
                 'title' => $request->title,
                 'short_title' => $request->short_title,
                 'video_url' => $request->video_url,
                 'home_slide' => $save_url,
             ]);

             return redirect()->back()->with([
                 'message' => 'تم تحديث السلايد مع الصورة بنجاح',
                 'alert-type' => 'success'
             ]);
         } else {
             $slide->update([
                 'title' => $request->title,
                 'short_title' => $request->short_title,
                 'video_url' => $request->video_url,
             ]);

             return redirect()->back()->with([
                 'message' => 'تم تحديث السلايد بدون صورة',
                 'alert-type' => 'success'
             ]);
         }
     }

}
