<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Author::all();
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $table = Author::create([
            "name" => $request->name,
            "date_of_birth" => $request->date_of_birth,
            "place_of_birth" => $request->place_of_birth,
            "gender" => $request->gender,
            "email" => $request->email,
            "hp" => $request->hp
        ]);

        return response()->json([
            'success' => 201,
            'massage' => 'data berhasil disimpan',
            'data' => $table
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        $Author = Author::find($id);
        if ($Author) {
            return response()->json([
                'status' => 200,
                'data' => $Author

            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'massage' => 'id atas' . $id . 'tidak ditemukan'
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        $Author = Author::find($id);
        if($Author){
            $Author->name = $request->name ? $request->name : $Author->name;
            $Author->date_of_birth = $request->date_of_birth ? $request->date_of_birth : $Author->date_of_birth;
            $Author->place_of_birth = $request->place_of_birth ? $request->place_of_birth : $Author->place_of_birth;
            $Author->gender = $request->gender ? $request->gender : $Author->gender;
            $Author->email = $request->email ? $request->email : $Author->email;
            $Author->hp = $request->hp ? $request->hp : $Author->hp;
            $Author->save();
            return response()->json([
                'status' => 200,
                'data' => $Author
            ], 200);
        }else{
            return response()->json([
                'status' =>404,
                'massage' => $id . 'tidak ditemukan'
    
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        $Author = Author::where('id', $id)->first();
        if($Author){
            $Author->delete();
            return response()->json([
                'status' =>200,
                'data' => $Author
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'id' . $id .'tidak ditemukan'
            ], 404);
        }
    }
}
