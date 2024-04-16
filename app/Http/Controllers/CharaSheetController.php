<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Character;
use App\Models\Tribe;
use App\Models\MainClass;
use App\Models\SupportClass;

use Illuminate\Support\Facades\Auth;

class CharaSheetController extends Controller
{   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $characters = $user->characters;
        return view('charasheet.index', compact('characters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tribes = Tribe::all();
        $main_classes = MainClass::all();
        $support_classes = SupportClass::all();
        $all_status = [
            ['jp' => '筋力', 'en' => 'strength'],
            ['jp' => '器用', 'en' => 'dexterity'],
            ['jp' => '敏捷', 'en' => 'agility'],
            ['jp' => '知力', 'en' => 'intelligence'],
            ['jp' => '感知', 'en' => 'sense'],
            ['jp' => '精神', 'en' => 'mental'],
            ['jp' => '幸運', 'en' => 'luck']
        ];
        $all_status_second = [
            ['jp' => 'HP', 'en' => 'hp'],
            ['jp' => 'MP', 'en' => 'mp'],
            ['jp' => 'フェイト', 'en' => 'fate'],
            ['jp' => '使用上限', 'en' => 'fate_limit'],
        ];
        $all_status_second = [
            ['jp' => 'HP', 'en' => 'hp'],
            ['jp' => 'MP', 'en' => 'mp'],
            ['jp' => 'フェイト', 'en' => 'fate'],
            ['jp' => '使用上限', 'en' => 'fate_limit'],
        ];
        $weight_limit = [
            ['jp' => '武器重量', 'en' => 'weapon_weight_limit'],
            ['jp' => '装備重量', 'en' => 'armor_weight_limit'],
            ['jp' => '携帯品重量', 'en' => 'item_weight_limit'],
        ];

        return view('charasheet.create', [
            'tribes' => $tribes,
            'main_classes' => $main_classes,
            'support_classes' => $support_classes,
            'all_status' => $all_status,
            'all_status_second' => $all_status_second,
            'weight_limit' => $weight_limit,
        ]);
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