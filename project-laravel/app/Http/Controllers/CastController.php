<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CastController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $casts = DB::table('casts')->get();
        return view('cast.index', compact('casts'));
    }

    public function create()
    {
        return view('cast.create');
    }

    public function store(Request $request)
    {
        $messages = [
            'name.required' => 'Nama wajib diisi.',
            'name.unique' => 'Nama sudah ada.',
            'age.required' => 'Umur wajib diisi.',
            'age.integer' => 'Umur harus berupa angka.',
            'bio.required' => 'Biografi wajib diisi.',
        ];
        $request->validate([
            'name' => 'required|unique:casts',
            'age' => 'required|integer',
            'bio' => 'required',
        ], $messages);

        DB::table('casts')->insert([
            'name' => $request->name,
            'age' => $request->age,
            'bio' => $request->bio,
        ]);

        return redirect('/cast');
    }

    public function show($id)
    {
        $cast = DB::table('casts')->where('id', $id)->first();
        return view('cast.show', compact('cast'));
    }

    public function edit($id)
    {
        $cast = DB::table('casts')->where('id', $id)->first();
        return view('cast.edit', compact('cast'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:casts,name,' . $id,
            'age' => 'required|integer',
            'bio' => 'required',
        ]);

        DB::table('casts')->where('id', $id)->update([
            'name' => $request->name,
            'age' => $request->age,
            'bio' => $request->bio,
        ]);

        return redirect('/cast');
    }

    public function destroy($id)
    {
        DB::table('casts')->where('id', $id)->delete();
        return redirect('/cast');
    }
}