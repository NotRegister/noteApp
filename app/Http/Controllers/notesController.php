<?php

namespace App\Http\Controllers;


use App\Models\Note;
use Illuminate\Http\Request;

class notesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()-> json(Note::orderBy('id', 'ASC')->get());
        // $notes = Note::all();
        // return ["status" => 1, "data" => $notes,];
        // return Note::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['note' => 'required']);
        $note = Note::create($request->all());
        return ["status" => 1, "data => $note"];
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        return ["status" => 1, "data => $note"];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        $request->validate([
            'note' => 'required',
        ]);

        $note->update($request->all());

        return [
            "status" => 1,
            "data" => $note,
            "msg" => "Blog updated successfully"
        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        $note->delete();
        return [
            "status" => 1,
            "data" => $note,
            "msg" => "Blog deleted successfully"
        ];
    }
}
