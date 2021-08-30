<?php

namespace App\Http\Controllers;


use Illuminate\Database\Eloquent\Model;
use Auth;

use App\Models\Post;
use App\Models\code;
use App\Models\Coupons;
use App\Models\UserCoupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Session;

use BeyondCode\codes\Traits\Hascodes ;
use BeyondCode\codes\Traits\CanRedeemcodes ;
use BeyondCode\codes\Models\codej;
use BeyondCode\codes\Facades;
use Illuminate\Support\Facades\Facade;



use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')->get();
        $posts = DB::table('posts')->get();


        return view('/welcome', ['users' => $users],['posts' => $posts]);

     
    
    }
public function show()
    {
        $users = DB::table('users')->get();
        $posts = DB::table('posts')->get();


        return view('/dashboard', ['users' => $users],['posts' => $posts]);

    
    }
public function view(Request $request,$id)
    {
         $p = DB::table('posts')->find($id);
           DB::table('posts')
                ->where('id',$id)
                ->update(['count_read' => $p->count_read+1]);
    // code

 
$count_user = DB::table('users')->count();
$count1 = DB::table('coupons')->where('post_id', $id)->count();
 $count2=  DB::table('user_coupons')->where('post_id', $id)->count();
$count_code=$count1+$count2;

// echo "Số User". $count_user.'<br>';
// echo "Bảng Coupons".  $count1.'<br>';
// echo "Bảng UserCoupon". $count2.'<br>';


for ($i=0; $i < $count_user-$count_code; $i++) { 
     $random = substr(md5(mt_rand()), 0, 5);
     $c = new Coupons;
    $c->code = "$random";
     $c->post_id = $id;
       $c->save();    
}

$user_id=Auth::user()->id;
 // $cod=  DB::table('user_coupons')->where('post_id', $id)->first();
$user_coupons=  DB::table('user_coupons')->where('post_id', $id)->where('user_id', $user_id)->first();
        // $code = DB::table('coupons')->where('post_id', $id)->;
      
        return view('/view',['p'=>$p],['user_coupons'=>$user_coupons]);
    }

 public function getcoupon($id)
    {
    $code = DB::table('Coupons')->where('post_id',$id)->first();
// echo $code->code;

    // DB::transaction(function () {
                // DB::update('update users set votes = 1');
        // $id=$id;
// $code = DB::table('Coupons')->where('post_id',$id)->first();

                $c = new UserCoupon;
                $c->code = $code->code;
                $c->post_id = $code->post_id;
                $c->user_id=Auth::user()->id;
                $c->save();
// echo $c->code;

                // DB::delete('delete from posts');
                // $code->delete();
    // $cod = DB::table('UserCoupon')->where('code',$code);
    DB::table('Coupons')->where('code',$code->code)->delete();



// });
                $user_id=Auth::user()->id;

  $user_coupons=  DB::table('user_coupons')->where('post_id', $id)->where('user_id', $user_id)->first();   
     $p = DB::table('posts')->find($id);
      return view('/view',['p'=>$p],['user_coupons'=>$user_coupons],['code'=>$code]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

return view('/create');

    } 


     public function viewcoupon($id)
    {
         $p = DB::table('user_coupons')->find($id);

// return view('/getcoupon/$id');
        return view('/getcoupon',['p'=>$p]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $rq)
    {      
        $post = new Post;
            $post->title = $rq->title;
            $post->body =$rq->body;
            $post->count_read = 1;
            $post->user_id = Auth::user()->id;

       $post->save();
       $rq->session()->flash('status', 'Task was successful!');

         $random = substr(md5(mt_rand()), 0, 5);
     $c = new Coupons;
    $c->code = "$random";
     $c->post_id = $post->id;

       $c->save();
return redirect('/dashboard');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit(Posts $posts)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function get_update($id)
    {
        // $p = Post::find($id);
        // return view('/update',['p'=>$p]);
        $p = DB::table('posts')->find($id);       
        return view('/update',['p'=>$p]);
        }
        
    
    public function post_update(Request $request,$id)
    {
        // $p = Post::find($id);

            // return redirect()->route('list-post');
        }
        
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Posts $posts)
    {
        //
    }
}

