<?php

namespace App\Http\Controllers;

use App\Models\Schematic;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSchematicRequest;
use App\Http\Requests\UpdateSchematicRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;
use Illuminate\Http\Request;

class SchematicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schematics = Schematic::with('user')->get();
        return view('schematics.index', ['schematics' => $schematics]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('schematics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSchematicRequest $request): RedirectResponse
    {


        $validated = $request->validate([
            'title' => 'bail|required|unique:schematics|profanity|max:30',
            'description' => 'bail|required|profanity|max:255',
            'file' => 'required|file|mimes:gz|max:1000000',
        ]);

        $userid = Auth::id();

        $schematic = new Schematic;
        $schematic->title = $request->title;
        $schematic->description = $request->description;
        $schematic->user_id = $userid;

        $schematic->save();

        $id = $schematic->id;

        $filename = $id . ".schematic";

        $request->file('file')->storeAs('public', $filename);

        $schematic->file = $filename;
        $schematic->save();


        return redirect('schematics');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $schematic = schematic::find($id);
        return view('schematics/show', ['schematic' => $schematic]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $schematic = schematic::find($id);

        return view('schematics/edit', ['schematics' => $schematic]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSchematicRequest $request, Schematic $schematic): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'bail|required|unique:schematics|profanity|max: 30',
            'description' => 'bail|required|unique:schematics|profanity|max: 255'
        ]);

        $schematic->title = $request->title;
        $schematic->description = $request->description;
        $schematic->active = isset($request->active);

        $schematic->save();


        return redirect()->route('schematics.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schematic $schematic)
    {

        $schematic->delete();

        return redirect()->route('schematics.index');
    }

    /**
     * Adds a way for users to download the schematic
     */

    public function downloadFile($id)
    {
        $schematic = Schematic::findOrFail($id);
        $filePath = storage_path("app/public/{$schematic->file}");

        return response()->download($filePath, $schematic->file);
    }
    /**
     * Adds a way for users to search for specific schematics
     */
    public function search(Request $request)
    {
        $keyword = $request->input('keyword', '');
        $schematics = Schematic::search($keyword)->get();

        return view('schematics.search', compact('schematics', 'keyword'));
    }





}
