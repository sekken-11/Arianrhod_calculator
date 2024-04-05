<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tribe;

class TribeController extends Controller
{   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tribes = Tribe::all();
        return view('admin.tribe.index', compact('tribes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tribe.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'strength_base' => 'required|numeric',
            'dexterity_base' => 'required|numeric',
            'agility_base' => 'required|numeric',
            'intelligence_base' => 'required|numeric',
            'sense_base' => 'required|numeric',
            'mental_base' => 'required|numeric',
            'luck_base' => 'required|numeric',
            'hp_base' => 'required|numeric',
            'mp_base' => 'required|numeric',
            'fate_base' => 'required|numeric',
            'weight_limit' => 'required|numeric',
        ]);

        $tribe = Tribe::create($request->only([
            'name',
            'strength_base',
            'dexterity_base',
            'agility_base',
            'intelligence_base',
            'sense_base',
            'mental_base',
            'luck_base',
            'hp_base',
            'mp_base',
            'fate_base',
            'weight_limit',
        ]));

        return redirect()->route('admin.tribe.index')->with('success', 'Tribe created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tribe = Tribe::findOrFail($id);
        return view('admin.tribe.show', compact('tribe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tribe = Tribe::findOrFail($id);
        return view('admin.tribe.edit', compact('tribe'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'strength_base' => 'required|numeric',
            'dexterity_base' => 'required|numeric',
            'agility_base' => 'required|numeric',
            'intelligence_base' => 'required|numeric',
            'sense_base' => 'required|numeric',
            'mental_base' => 'required|numeric',
            'luck_base' => 'required|numeric',
            'hp_base' => 'required|numeric',
            'mp_base' => 'required|numeric',
            'fate_base' => 'required|numeric',
            'weight_limit' => 'required|numeric',
        ]);

        $tribe = Tribe::findOrFail($id);
        $attributes = [
            'name', 
            'strength_base',
            'dexterity_base',
            'agility_base',
            'intelligence_base',
            'sense_base', 'mental_base',
            'luck_base',
            'hp_base',
            'mp_base',
            'fate_base',
            'weight_limit'
        ];
        foreach ($attributes as $attribute) {
            $tribe->$attribute = $request->$attribute;
        }
        $tribe->save();

        return redirect()->route('admin.tribe.index')->with('success', 'Tribe updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tribe = Tribe::findOrFail($id);
        $tribe->delete();

        return redirect()->route('admin.tribe.index')->with('success', 'Tribe deleted successfully.');
    }
}
