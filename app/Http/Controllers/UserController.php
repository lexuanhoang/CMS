<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Posts;

use App\Http\Controllers\Controller;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\DB;




class UserController extends Controller
{
	
    public function get($id)
    {
    	return view('user/list',compact('id'));
    }

    public function post(Request $request)
    {
    	return $request;
    }

    
    public function listuser()	
    {
    	$list = User::all();
    	foreach ($list as $key => $value) {
    		echo $value;
    	}
    }
    public function view_user($id)
    {
        $p= DB::table('users')->find($id);       
        return view('/view_user',['p'=>$p]);
    }
       
    public function view_user_edit($id)
    {
        $p= DB::table('users')->find($id);  

        return view('/register',['p'=>$p]);   
    }

    
}
