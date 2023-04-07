<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     * URL: GET https://127.0.0.1:8080/api/authors
     *
     * @param Illuminate\Http\Request $request
     *
     * @return json
     */
    public function index()
    {
        return response()->json([
            'status' => 1,
            'message' => "L'auteur a été ajouté avec succès",
            'authors' => Author::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * URL: POST https://127.0.0.1:8080/api/authors
     *
     * @param Illuminate\Http\Request $request
     *
     * @return json
     */
    public function create(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'nationality' => 'required',
            'birthday' => 'required',
            'description' => 'required',
            'contact' => 'required'
        ]);

        // Load a new instance
        $author = new Author();

        $author->fullname = $request->fullname;
        $author->nationality = $request->nationality;
        $author->birthday = $request->birthday;
        $author->description = $request->description;
        $author->contact = $request->contact;

        // Create a new author line in the database
        $author->save();

        // Succeed
        return response()->json([
            'status' => 1,
            'message' => "L'auteur a été ajouté avec succès",
        ]);
    }

    /**
     * Display the specified resource.
     * URL: GET https://127.0.0.1:8080/api/authors/{author}
     *
     * @param App\Models\Author
     *
     * @return json
     */
    public function show(Author $author)
    {
        if (!is_a($author, Author)) {
            return response()->json([
                'status' => 0,
                'message' => "Désolé, l'auteur n'a pas été trouvé.",
            ], 404);
        }

        return response()->json([
            'status' => 1,
            'message' => "L'auteur a été trouvé avec succès",
            'auteur' => $author,
        ]);
    }

    /**
     * Update the specified resource in storage.
     * URL: PUT|PATCH https://127.0.0.1:8080/api/authors/{author}
     *
     * @param Illuminate\Http\Request $request
     * @param App\Models\Author
     *
     * @return json
     */
    public function update(Request $request, Author $author)
    {
        $request->validate([
            'fullname' => 'required',
            'nationality' => 'required',
            'birthday' => 'required',
            'description' => 'required',
            'contact' => 'required'
        ]);

        if (!is_a($author, Author)) {
            return response()->json([
                'status' => 0,
                'message' => "Désolé, l'auteur n'a pas été trouvé.",
            ], 404);
        }

        $author->fullname = $request->fullname;
        $author->nationality = $request->nationality;
        $author->birthday = $request->birthday;
        $author->description = $request->description;
        $author->contact = $request->contact;
        $author->save();

        return response()->json([
            'status' => 1,
            'message' => "L'auteur a été modifié avec succès",
            'auteur' => $author,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     * URL: DELETE https://127.0.0.1:8080/api/authors/{author}
     *
     * @param App\Models\Author
     *
     * @return json
     */
    public function destroy(Author $author)
    {
        if (!is_a($author, Author)) {
            return response()->json([
                'status' => 0,
                'message' => "Désolé, l'auteur n'a pas été trouvé.",
            ], 404);
        }

        $author->delete();

        return response()->json([
            'status' => 1,
            'message' => "L'auteur a été modifié avec succès",
        ]);
    }
}
