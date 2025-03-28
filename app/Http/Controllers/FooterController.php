<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{

        public function FooterSetup(){

            $allfooter = Footer::find(1);
            return view('admin.footer.footer_all',compact('allfooter'));

        } // end method
        public function UpdateFooter(Request $request){

            $footer_id = $request->id;

             Footer::findOrFail($footer_id)->update([
                    'number' => $request->number,
                    'short_description' => $request->short_description,
                    'adress' => $request->adress,
                    'email' => $request->email,
                    'facebook' => $request->facebook,
                    'twitter' => $request->twitter,
                    'copyright' => $request->copyright,

                ]);
                $notification = array(
                'message' => 'Footer Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);

        } // end method
}
