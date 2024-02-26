<?php

namespace App\Http\Controllers;


use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


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

    public function update(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'tag' => 'required',
        'note' => 'required',
    ]);

    if ($validator->fails()) {
        return response()->json([
            "status" => 0,
            "msg" => "Validation failed",
            "errors" => $validator->errors()
        ], 400);
    }

    $note = Note::find($id);

    $note->tag = $request->tag;
    $note->note = $request->note;
    $note->save();

    return response()->json([
        "status" => 1,
        "data" => $note,
        "msg" => "Note updated successfully"
    ], 200);
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
