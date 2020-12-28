<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['posts']=Posts::get();
        return view ('admin.post.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view ('admin.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos=[
            'titulo'=>'required|string|max:100',
            'imagen'=>'required|max:10000|mimes:jpeg,png,jpg',
            'contenido'=>'required'
        ];

        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);

        $user=auth()->user();

        $datosPost= new Posts();

        $datosPost->titulo=request('titulo');
        $datosPost->contenido=request('contenido');

        if($request->hasFile('imagen')){

           $datosPost['imagen']=request()->file('imagen')->store('uploads','public'); 

        }
        $datosPost->user_id=$user->id;

        $datosPost->save();
        return redirect('post');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function show(Posts $posts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Posts::findOrFail($id);
        return view('admin.post.edit',compact('post'));;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        $post=new Posts();
        $this->authorize('update',$post);

        $campos=[
            'titulo'=>'required|string|max:100',
            'contenido'=>'required'
        ];

        //Validacion Imagen
        if ($request->hasFile('imagen')) {
           $campos+=['imagen'=>'required|max:10000|mimes:jpeg,png,jpg'];
        }

        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);

        $datosPost=request()->except(['_token','_method']);
       
        if ($request->hasFile('imagen')) {
            $post= Posts::findOrFail($id);
            Storage::delete('public/'.$post->imagen);
            $datosPost['imagen']=$request->file('imagen')->store('uploads','public');
        }

        Posts::where('id','=',$id)->update($datosPost);

        //$empleado= Empleados::findOrFail($id);
        //return view('empleados.edit',compact('empleado'));

        return redirect('post');
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
