<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Character;
use App\Models\Tribe;
use App\Models\MainClass;
use App\Models\SupportClass;
use App\Http\Requests\CharacterRequest;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $characters = $user->characters()->with('tribe', 'main_class', 'support_class')->get();
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
    public function store(CharacterRequest $request)
    {
        $validatedData = $request->validated();

        DB::transaction(function () use ($validatedData) {
            $user = Auth::user();
            $mainClass = MainClass::find($validatedData['main_class_id']);
            $supportClass = SupportClass::find($validatedData['support_class_id']);
            $validatedData['initial_main_class'] = $mainClass->name;
            $validatedData['initial_support_class'] = $supportClass->name;
            $validatedData['level'] = 1;
            $character = $user->characters()->create($validatedData);

            if (!empty($validatedData['skills'])) {
                $character->skills()->createMany($validatedData['skills']);
            }

            if (!empty($validatedData['equippings'])) {
                $character->equippings()->createMany($validatedData['equippings']);
            }
        });

        return redirect()->route('charasheet.index')->with('success', 'Tribe created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}