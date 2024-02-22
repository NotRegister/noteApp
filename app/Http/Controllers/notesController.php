<?php

namespace App\Http\Controllers;


use App\Models\Note;
use Illuminate\Http\Request;

class notesController extends Controller
{
    public function index()
    {
        return response()-> json(Note::orderBy('id', 'ASC')->get());
        // $notes = Note::all();
        // return ["status" => 1, "data" => $notes,];
        // return Note::all();
    }

    public function store(Request $request)
    {
        $request->validate(['note' => 'required']);
        $note = Note::create($request->all());
        return ["status" => 1, "data => $note"];
    }

    public function show(Note $note)
    {
        return ["status" => 1, "data => $note"];
    }

    public function update(Request $request, Note $note)
    {
        $request->validate([
            'tag' => 'required',
            'note' => 'required',
        ]);

        $note->update($request->all());

        return [
            "status" => 1,
            "data" => $note,
            "msg" => "Blog updated successfully"
        ];
    }

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
