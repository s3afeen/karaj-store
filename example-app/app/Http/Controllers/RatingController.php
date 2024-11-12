<?php
namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function index()
    {
        $ratings = Rating::all();
        return view('ratings.index', compact('ratings'));
    }

    public function create()
    {
        return view('ratings.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Rating::create($validatedData);
        return redirect()->route('ratings.index')->with('success', 'Rating created successfully.');
    }

    public function show($id)
    {
        $rating = Rating::findOrFail($id);
        return view('ratings.show', compact('rating'));
    }

    public function edit($id)
    {
        $rating = Rating::findOrFail($id);
        return view('ratings.edit', compact('rating'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $rating = Rating::findOrFail($id);
        $rating->update($validatedData);
        return redirect()->route('ratings.index')->with('success', 'Rating updated successfully.');
    }

    public function destroy($id)
    {
        $rating = Rating::findOrFail($id);
        $rating->delete();
        return redirect()->route('ratings.index')->with('success', 'Rating deleted successfully.');
    }
}
