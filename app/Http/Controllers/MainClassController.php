<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MainClass;

class MainClassController extends Controller
{   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $main_classes = MainClass::all();
        return view('admin.main_class.index', compact('main_classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.main_class.create');
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
            'strength_correction' => 'numeric',
            'dexterity_correction' => 'numeric',
            'agility_correction' => 'numeric',
            'intelligence_correction' => 'numeric',
            'sense_correction' => 'numeric',
            'mental_correction' => 'numeric',
            'luck_correction' => 'numeric',
            'hp_correction' => 'required|numeric',
            'mp_correction' => 'required|numeric',
            'hp_up' => 'required|numeric',
            'mp_up' => 'required|numeric',
        ]);

        $main_class = MainClass::create($request->only([
            'name',
            'strength_correction',
            'dexterity_correction',
            'agility_correction',
            'intelligence_correction',
            'sense_correction',
            'mental_correction',
            'luck_correction',
            'hp_correction',
            'mp_correction',
            'hp_up',
            'mp_up',
        ]));

        return redirect()->route('admin.main_class.index')->with('success', 'MainClass created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $main_class = MainClass::findOrFail($id);
        return view('admin.main_class.show', compact('main_class'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $main_class = MainClass::findOrFail($id);
        return view('admin.main_class.edit', compact('main_class'));
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
            'strength_correction' => 'numeric',
            'dexterity_correction' => 'numeric',
            'agility_correction' => 'numeric',
            'intelligence_correction' => 'numeric',
            'sense_correction' => 'numeric',
            'mental_correction' => 'numeric',
            'luck_correction' => 'numeric',
            'hp_correction' => 'required|numeric',
            'mp_correction' => 'required|numeric',
            'hp_up' => 'required|numeric',
            'mp_up' => 'required|numeric',
        ]);

        $main_class = MainClass::findOrFail($id);
        $attributes = [
            'name', 
            'strength_correction',
            'dexterity_correction',
            'agility_correction',
            'intelligence_correction',
            'sense_correction', 
            'mental_correction',
            'luck_correction',
            'hp_correction',
            'mp_correction',
            'hp_up',
            'mp_up',
        ];
        foreach ($attributes as $attribute) {
            $main_class->$attribute = $request->$attribute;
        }
        $main_class->save();

        return redirect()->route('admin.main_class.index')->with('success', 'MainClass updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $main_class = MainClass::findOrFail($id);
        $main_class->delete();

        return redirect()->route('admin.main_class.index')->with('success', 'MainClass deleted successfully.');
    }
}
