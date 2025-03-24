<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\About;
use App\Models\MultiImage;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function AboutPage(){

        $aboutpage = About::find(1);
        return view('admin.about_page.about_page_all',compact('aboutpage'));

     } // End Method

     public function UpdateAbout(Request $request)
{
    $about_id = $request->id;
    $about = About::findOrFail($about_id);

    if ($request->hasFile('about_image')) {
        $image = $request->file('about_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

        // حفظ الصورة في مجلد "storage/app/public/about"
        $image->move(public_path('storage/about'), $name_gen);

        // الرابط الصحيح للصورة
        $save_url = 'storage/about/' . $name_gen;

        // حذف الصورة القديمة إن وجدت
        if ($about->about_image) {
            $old_image_path = public_path($about->about_image);
            if (file_exists($old_image_path)) {
                unlink($old_image_path);
            }
        }

        // تحديث بيانات "عن الموقع" مع الصورة الجديدة
        $about->update([
            'title' => $request->title,
            'short_title' => $request->short_title,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'about_image' => $save_url,
        ]);

        return redirect()->back()->with([
            'message' => 'تم تحديث صفحة "عن الموقع" مع الصورة بنجاح',
            'alert-type' => 'success'
        ]);
    } else {
        // تحديث بدون صورة
        $about->update([
            'title' => $request->title,
            'short_title' => $request->short_title,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
        ]);

        return redirect()->back()->with([
            'message' => 'تم تحديث صفحة "عن الموقع" بدون صورة',
            'alert-type' => 'success'
        ]);
    }
}
public function HomeAbout(){

    $aboutpage = About::find(1);
    return view('frontend.about_page',compact('aboutpage'));

 }// End Method

 public function AboutMultiImage(){

    return view('admin.about_page.multimage');


 }// End Method


 public function StoreMultiImage(Request $request)
 {
     $images = $request->file('multi_image');

     foreach ($images as $multi_image) {
         // إنشاء اسم فريد للصورة
         $name_gen = hexdec(uniqid()) . '.' . $multi_image->getClientOriginalExtension();
         $save_path = 'storage/multi/' . $name_gen;

         // نقل الصورة إلى مجلد التخزين مباشرةً
         $multi_image->move(public_path('storage/multi'), $name_gen);

         // إدراج المسار في قاعدة البيانات
         MultiImage::insert([
             'multi_image' => $save_path,
             'created_at' => Carbon::now()
         ]);
     }

     // إشعار النجاح
     $notification = [
         'message' => 'تم حفظ الصور بنجاح',
         'alert-type' => 'success'
     ];

     return redirect()->back()->with($notification);
 }
 public function AllMultiImage(){

    $allMultiImage = MultiImage::all();
    return view('admin.about_page.all_multiimage',compact('allMultiImage'));

 }// End Method

 public function EditMultiImage($id){

    $multiImage = MultiImage::findOrFail($id);
    return view('admin.about_page.edit_multi_image',compact('multiImage'));

 }// End Method
 public function UpdateMultiImage(Request $request, $id)
{
    $multi_image = MultiImage::findOrFail($id);

    if ($request->hasFile('multi_image')) {
        // حذف الصورة القديمة
        if (file_exists(public_path($multi_image->multi_image))) {
            unlink(public_path($multi_image->multi_image));
        }

        // رفع الصورة الجديدة
        $image = $request->file('multi_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $save_path = 'storage/multi/' . $name_gen;

        $image->move(public_path('storage/multi'), $name_gen);

        // تحديث المسار في قاعدة البيانات
        $multi_image->update([
            'multi_image' => $save_path,
            'updated_at' => Carbon::now()
        ]);

        return redirect()->back()->with([
            'message' => 'تم تحديث الصورة بنجاح',
            'alert-type' => 'success'
        ]);
    }
    $notification = array(
        'message' => 'Multi Image Updated Successfully',
        'alert-type' => 'success'
    );
    return redirect()->route('all.multi.image')->with($notification);

}
public function DeleteMultiImage($id)
{
    $multi_image = MultiImage::findOrFail($id);

    // حذف الصورة من المجلد
    if (file_exists(public_path($multi_image->multi_image))) {
        unlink(public_path($multi_image->multi_image));
    }

    // حذف السجل من قاعدة البيانات
    $multi_image->delete();

    $notification = array(
        'message' => 'Multi Image Deleted Successfully',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);
}

}