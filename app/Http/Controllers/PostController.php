<?php

namespace App\Http\Controllers;

use App\Posts;
use App\Category;
use App\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Posts::orderBy('id')->get();
        return view('admin.acarainfo.post.index', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tags::all();
        $category = Category::all();
        return view('admin.acarainfo.post.create', compact('category', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'category_id' => 'required',
            'content' => 'required',
            'image' => 'required'
        ]);

        $image = $request->image;
        $new_image = time().$image->getClientOriginalName();

        $post = Posts::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'content' => $request->content,
            'image' => 'public/uploads/posts/'.$new_image,
            'slug' => Str::slug($request->title),
            'users_id' => Auth::id()
        ]);

        $post->tags()->attach($request->tags);

        $image->move('public/uploads/posts/', $new_image);
        return redirect()->route('post.index')->with('success', 'Postingan anda berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::all();
        $tags = Tags::all();
        $post = Posts::findorfail($id);
        return view('admin.acarainfo.post.edit', compact('post', 'tags','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'category_id' => 'required',
            'content' => 'required'
        ]);

        

        $post = Posts::findorfail($id);

        if ($request->has('image')) {
            $image = $request->image;
            $new_image = time().$image->getClientOriginalName();
            $image->move('public/uploads/posts/', $new_image);

            $post_data = [
                'title' => $request->title,
                'category_id' => $request->category_id,
                'content' => $request->content,
                'image' => 'public/uploads/posts/'.$new_image,
                'slug' => Str::slug($request->title)
            ];
        }

        else {

            $post_data = [
                'title' => $request->title,
                'category_id' => $request->category_id,
                'content' => $request->content,
                'slug' => Str::slug($request->title)
            ];

        }


        $post->tags()->sync($request->tags);
        $post->update($post_data);
        return redirect()->route('post.index')->with('success', 'Postingan anda berhasil diubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post =Posts::findorfail($id);
        $post->delete();

        return redirect()->back()->with('success', 'Postingan berhasil dihapus (Cek Recyle Bin)');
    }

    public function show_deletes(){
        $post = Posts::onlyTrashed()->get();
        return view('admin.acarainfo.post.delete', compact('post'));
    }

    public function restore($id){
        $post = Posts::withTrashed()->where('id', $id)->first();

        $post->restore();

        return redirect()->back()->with('success', 'Postingan berhasil diRestore (Cek List Post)');
    }

    public function kill($id){
        $post = Posts::withTrashed()->where('id', $id)->first();
        $post->forceDelete();

        return redirect()->back()->with('success', 'Postingan berhasil dihapus permanen');
    }
}