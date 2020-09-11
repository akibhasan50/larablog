<?php

namespace App\Http\Controllers;

use App\Category;
use App\Contact;
use App\Fontend;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class FontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
        // $posts = Cache::get('posts',function(){
        //     return Post::with('category','user')->orderBy('id','desc')->paginate(5);
        // });
        $showcat = Cache::get('showcat',function(){
            return  Category::select('name','status','id')->where('status',1)->orderBy('id','desc')->get();
        });

        $posts = Post::with('category','user')->orderBy('id','desc')->paginate(5);
        $banner = Post::orderBy('id','desc')->limit(1)->first();
        // $showcat = Category::select('name','status')->where('status',1)->orderBy('id','desc')->get();
         return view('fontend.index',compact('posts','showcat','banner'));
        
          
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contact()
    {
        $posts = Post::with('category','user')->orderBy('id','desc')->paginate(5);
        $showcat = Category::select('name','status')->where('status',1)->orderBy('id','desc')->get();
         return view('fontend.contact',compact('posts','showcat'));
    }
    public function about()
    {
        $posts = Post::with('category','user')->orderBy('id','desc')->paginate(5);
        $showcat = Category::select('name','status')->where('status',1)->orderBy('id','desc')->get();
         return view('fontend.about',compact('posts','showcat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $query = $request->search;
        $search = Post::where('title','LIKE',"%$query%")->get();
         $posts = Cache::get('posts',function(){
            return Post::with('category','user')->orderBy('id','desc')->paginate(5);
        });
        $showcat = Cache::get('showcat',function(){
            return  Category::select('name','status','id')->where('status',1)->orderBy('id','desc')->get();
        });
         return view('fontend.search',compact('posts','showcat','search','query'));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fontend  $fontend
     * @return \Illuminate\Http\Response
     */
    public function category($id)
    {
        $showcat = Cache::get('showcat',function(){
            return  Category::select('name','status','id')->where('status',1)->orderBy('id','desc')->get();
        });
       
        $postcat = Post::with('category','user')->where('category_id',$id)->get();

        $posts = Post::with('category','user')->orderBy('id','desc')->limit(5)->get();

        return view('fontend.category',compact(['postcat','showcat','posts']));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fontend  $fontend
     * @return \Illuminate\Http\Response
     */
    public function message(Request $request)
    {
        
        $contact = new Contact();
            $request->validate([
                'name'=>'required',
                'email'=>'required',
                'message'=>'required',
               
            ]);
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->message = $request->message;
    
        $contact->save();
        session()->flash('msg','message send successfully');
        return redirect()->back();
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fontend  $fontend
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fontend $fontend)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fontend  $fontend
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fontend $fontend)
    {
        //
    }
}
