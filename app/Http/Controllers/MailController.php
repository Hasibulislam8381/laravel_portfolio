<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\GeneralInfo;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Brian2694\Toastr\Facades\Toastr;

class MailController extends Controller {

   public function html_email(Request $request) {
    //Fetch data from General setting
      $to_email = GeneralInfo::first();
      $sitename = $to_email->site_name;
      $email = $to_email->email;
      //fetch data from user email
      $from_email=$request->email;
      
      $data = array('name'=>$request->name,'email'=>$request->email,'phone'=>$request->phone,'text'=>$request->message);
      
      Mail::send('mail', $data, function($message) use($sitename,$email,$from_email) {
         $message->to($email, $sitename)->subject
            ('Mail from '.$sitename);
         $message->from("nasrullah@rentsincorporation.com",$sitename);
      });
      
      Toastr::success('Mail Send Successfully', 'success');
      return back();
     
   }

}