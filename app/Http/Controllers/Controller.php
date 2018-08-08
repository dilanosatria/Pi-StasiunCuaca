<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
//use Illuminate\Http\Request;
//use DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    //function insert(Request $req)
    //{
    //	$name = $req->input('name');
    //	$email = $req->input('email');
    //	$phone = $req->input('phone');
    //	$message = $req->input('message');

    //	$data = array('name'=>$name,"email"=>$email,"phone"=>$phone,"message"=>$message);

    //	DB::table('komentars')->insert($data);

    //	return redirect()->back();
    //}
}
