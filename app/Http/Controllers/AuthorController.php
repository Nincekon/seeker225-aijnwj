<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $authors = Author::all();

        return view('authors.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'fullname' => 'required|string|max:50',
            'nationality' => 'required|string|max:32',
            'description' => 'required|string|min:100',
        ]);

        Author::create($validated);

        return redirect(route('authors.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author): View
    {
        // $this->authorize('update', $author);

        return view('authors.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author): RedirectResponse
    {
        // $this->authorize('update', $author);

        $validated = $request->validate([
            'fullname' => 'required|string|max:50',
            'nationality' => 'required|string|max:32',
            'description' => 'required|string|min:100',
        ]);

        $author->update($validated);

        return redirect(route('authors.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author): RedirectResponse
    {
        // $this->authorize('delete', $author);

        $author->delete();

        return redirect(route('authors.index'));

    }
}
