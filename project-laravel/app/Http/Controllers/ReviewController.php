<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, $film_id){
        $request->validate([
            'point' => 'required|integer|min:1|max:5',
            'content' => 'required|string|max:1000',
        ], [
            'point.required' => 'Point wajib diisi.',
            'point.integer' => 'Point harus berupa angka.',
            'point.min' => 'Point minimal adalah 1.',
            'point.max' => 'Point maksimal adalah 5.',
            'content.required' => 'Komentar wajib diisi.',
            'content.string' => 'Komentar harus berupa teks.',
            'content.max' => 'Komentar maksimal 1000 karakter.',
        ]);

        $user_id = Auth::id();

        $review = Review::create([
            'film_id' => $film_id,
            'user_id' => $user_id,
            'point' => $request->point,
            'content' => $request->content,
        ]);

        return redirect('/film/' . $film_id)->with('success', 'Review berhasil ditambahkan.');
    }
}
