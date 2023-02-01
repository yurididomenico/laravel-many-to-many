<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Category;
use App\Mail\CreatePostMail;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $userId = Auth::id();
        // $user = Auth::user();

        $data =
        [
            'posts' => Post::with('category')->paginate(10)
        ];

        // $post =
        // [
        //     'title' => 'Il Lonfo',
        //     'body' => 'Il Lonfo non vaterca mai',
        //     'category' =>
        //     [
        //         'name' => 'nomeCategoria',
        //         'created_at' => '26/01/23',
        //     ]
        // ];

        return view('admin.post.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::All();
        $tags = Tag::All();

        return view('admin.post.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        // dd($data);

        $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $newPost = new Post();
        //Controllo immagine caricata nell'input
        if( array_key_exists('image', $data) )
        {
            $cover_url = Storage::put('post_covers', $data['image']);
            $data['cover'] = $cover_url;
        }
        $newPost->fill($data);
        $newPost->save();

        //Controllo utente checkbox
        if( array_key_exists( 'tags', $data ) )
        {
            $newPost->tags()->sync( $data['tags'] );
        }

        //Invio mail di creazione
        $mail = new CreatePostMail();

        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $singolo_post = Post::findOrFail($id);

        return view('admin.post.show', compact('singolo_post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        $categories = Category::All();

        $tags = Tag::All();

        return view('admin.post.edit', compact('post', 'categories', 'tags'));
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
        $data = $request->all();
        $singoloPost = Post::findOrFail($id);

        $singoloPost->update($data);

        //Controllo utente checkbox
        if( array_key_exists( 'tags', $data ) )
        {
            $singoloPost->tags()->sync( $data['tags'] );
        }
        else
        {
            $singoloPost->tags()->sync([]);
        }


        return redirect()->route('admin.posts.show', $singoloPost->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $singoloPost = Post::findOrFail($id);
        if($singoloPost->cover)
        {
            Storage::delete($singoloPost->cover);
        }
        $singoloPost->tags()->sync([]);
        $singoloPost->delete();

        return redirect()->route('admin.posts.index');
    }
}
