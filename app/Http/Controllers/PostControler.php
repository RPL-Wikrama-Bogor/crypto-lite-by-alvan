<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use DateTime;
use DateTimeZone;

class PostControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate(5);

        return view('post.index',compact('posts'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }
    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [ 
    //         'foto' => ['required', 'image|file'],
    //         'desc' => ['string', 'max:255'],
    //         'posted_by' => ['required', 'string', 'max:255'],
    //         'tgl' => ['required', 'date', 'max:255'],

    //     ]);
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $timezone = 'Asia/Jakarta';
        $date = new DateTime('now',new DateTimeZone($timezone));
        $tanggal = $date->format('y-m-d');
        $image = $request->foto->getClientOriginalName();

        $request->validate([
            'desc',
            'posted_by' => 'required',
        ]);
        Post::create([
            'foto' => $image,
            'desc' => $request->desc,
            'posted_by' => $request->posted_by,
            'tgl' => $tanggal,
        ]);
        $request->foto->storeAs('post-image',$image);

        return redirect()->route('post.create')
        ->with('success',' your image has been uploaded');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     //
    // }
}
