<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SupportClass;

class SupportClassController extends Controller
{   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $support_classes = SupportClass::all();
        return view('admin.support_class.index', compact('support_classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.support_class.create');
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
        ]);

        $support_class = SupportClass::create($request->only([
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
        ]));

        return redirect()->route('admin.support_class.index')->with('success', 'SupportClass created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $support_class = SupportClass::findOrFail($id);
        return view('admin.support_class.show', compact('support_class'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $support_class = SupportClass::findOrFail($id);
        return view('admin.support_class.edit', compact('support_class'));
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
        ]);

        $support_class = SupportClass::findOrFail($id);
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
        ];
        foreach ($attributes as $attribute) {
            $support_class->$attribute = $request->$attribute;
        }
        $support_class->save();

        return redirect()->route('admin.support_class.index')->with('success', 'SupportClass updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $support_class = SupportClass::findOrFail($id);
        $support_class->delete();

        return redirect()->route('admin.support_class.index')->with('success', 'SupportClass deleted successfully.');
    }
}

