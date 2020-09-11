<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\User;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\File as HttpFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //with('category') is used to redure number of query execution
        $posts = Post::with('category','user')->orderBy('id','desc')->paginate(6);
        
        return view('backend.layout.post',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $users = User::all();
        return view('backend.layout.addpost',compact('category','users'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post();
    //     $request->validate([
    //         'title'=>'required|min:3',
    //         'description'=>'required',
    //         'catagory'=>'required',
    //         //'image'=>'required|max:1024'
    //     ],
    // [
    //     'title.required'=>'dont forget to enter the title',

    // ]
    // );
      
        $post->title = $request->title;
        $post->description = $request->description;
        $post->category_id = $request->category;
        $post->user_id = Auth::user()->id;
        $image = $request->file('image');
        //dd( $image);
        
        if($request->hasFile('image')){
            $extention = strtolower($image->getClientOriginalExtension());
            $filename = time().'.'.$extention;
            $imgpath ='images/';
            $imglink= $imgpath.$filename;
            $success=  $image->move($imgpath,$filename);
            $post->image =$imglink;

            //dd($post->image);

            $post->save();
            $request->session()->flash('msg','post Inserted successfully ');
            return redirect()->route('post.index');
        

        }else{
            $post->save();
            $request->session()->flash('msg','post Inserted successfully');
            return redirect()->route('post.index');
        
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $posts = Post::with('category','user')->orderBy('id','desc')->get();
        $showcat = Category::all();
        $singlepost = Post::Find($post->id);
        return view('fontend.details',compact('singlepost','showcat','posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $posts = Post::Find($post->id);
        $category = Category::all();
        $users = User::all();

        //dd($posts);
        return view('backend.layout.editpost',compact('posts','category','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //$post = Post::Find($post->id);
        //     $request->validate([
        //         'title'=>'required|min:3',
        //         'description'=>'required',
        //         'catagory'=>'required',
                
        //     ],
        //     [
        //         'title.required'=>'Dont forget to enter the title',

        //     ]
        // );
      
        $post->title = $request->title;
        $post->description = $request->description;
        $post->category_id = $request->category;
        $post->user_id = Auth::user()->id;
        $image = $request->file('image');

        
        //  $post->save();
        //     $request->session()->flash('msg','post updated Successfully');
        //     return redirect()->route('post.index');
         
        if($request->hasFile('image')){
            $extention = strtolower($image->getClientOriginalExtension());
            $filename = time().'.'.$extention;
            $imgpath ='images/';
            $imglink= $imgpath.$filename;
            $success=  $image->move($imgpath,$filename);
            $post->image =$imglink;

            if($request->oldimg != null){
                unlink($request->oldimg);
            }

          

            $post->save();
            $request->session()->flash('msg','post updated Successfully');
            return redirect()->route('post.index');
        

        }else{
            $post->image = $request->oldimg;
            $post->save();
            $request->session()->flash('msg','post updated Successfully');
            return redirect()->route('post.index');
        
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if($post->image){
            unlink($post->image);
        }
         $post->delete();

       session()->flash('msg','post Deleted successfully');
       return redirect()->back();
    }
}
