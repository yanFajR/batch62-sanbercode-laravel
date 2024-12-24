<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Genre;
use File;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $films = Film::all();
        return view('film.index', compact('films'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $films = Film::all();
        $genres = Genre::all();
        return view('film.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:films',
            'summary' => 'required',
            'release_year' => 'required|integer|min:1900|max:' . date('Y'),
            'poster' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'genre_id' => 'required|exists:genres,id',
        ], [
            'title.required' => 'Judul film wajib diisi.',
            'title.unique' => 'Judul film sudah ada.',
            'summary.required' => 'Ringkasan film wajib diisi.',
            'release_year.required' => 'Tahun rilis film wajib diisi.',
            'release_year.integer' => 'Tahun rilis film harus berupa angka.',
            'release_year.min' => 'Tahun rilis film tidak valid.',
            'release_year.max' => 'Tahun rilis film tidak valid.',
            'poster.required' => 'Poster film wajib diunggah.',
            'poster.image' => 'Poster film harus berupa gambar.',
            'poster.mimes' => 'Poster film harus berupa file jpeg, png, jpg, atau gif.',
            'poster.max' => 'Ukuran poster film maksimal 2MB.',
            'genre_id.required' => 'Genre film wajib dipilih.',
            'genre_id.exists' => 'Genre film tidak valid.',
        ]);

        $newPosterName = time() . '.' . $request->poster->extension();
        $request->poster->move(public_path('uploads'), $newPosterName);

        Film::create([
            'title' => $request->title,
            'summary' => $request->summary,
            'release_year' => $request->release_year,
            'poster' => $newPosterName,
            'genre_id' => $request->genre_id,
        ]);

        return redirect('/film')->with('success', 'Film berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $film = Film::find($id);
        $genre = Genre::find($film->genre_id);

        return view('film.show', compact('film','genre'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $film = Film::find($id);
        $genres = Genre::all();

        return view('film.edit', compact('film', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'summary' => 'required',
            'release_year' => 'required|integer|min:1900|max:' . date('Y'),
            'poster' => 'image|mimes:jpeg,png,jpg|max:2048',
            'genre_id' => 'required|exists:genres,id',
        ], [
            'title.required' => 'Judul film wajib diisi.',
            'title.unique' => 'Judul film sudah ada.',
            'summary.required' => 'Ringkasan film wajib diisi.',
            'release_year.required' => 'Tahun rilis film wajib diisi.',
            'release_year.integer' => 'Tahun rilis film harus berupa angka.',
            'release_year.min' => 'Tahun rilis film tidak valid.',
            'release_year.max' => 'Tahun rilis film tidak valid.',
            'poster.image' => 'Poster film harus berupa gambar.',
            'poster.mimes' => 'Poster film harus berupa file jpeg, png, jpg, atau gif.',
            'poster.max' => 'Ukuran poster film maksimal 2MB.',
            'genre_id.required' => 'Genre film wajib dipilih.',
            'genre_id.exists' => 'Genre film tidak valid.',
        ]);

        $film = Film::find($id);

        if($request->has('poster')) {
            File::delete(public_path('uploads/' . $film->poster));

            $newPosterName = time() . '.' . $request->poster->extension();
            $request->poster->move(public_path('uploads'), $newPosterName);

            $film->poster = $newPosterName;
        }

        $film->update([
            'title' => $request->title,
            'summary' => $request->summary,
            'release_year' => $request->release_year,
            'genre_id' => $request->genre_id,
        ]);

        return redirect('/film')->with('success', 'Film berhasil diperbarui.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $film = Film::find($id);
        File::delete(public_path('uploads/' . $film->poster));
        $film->delete();

        return redirect('/film')->with('success', 'Film berhasil dihapus.');
    }
}
