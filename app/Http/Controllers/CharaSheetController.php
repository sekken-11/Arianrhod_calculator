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
        $characters = $user->characters()->with('tribe','main_class', 'support_class')->get();
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
            ['jp' => '武器重量', 'en' => 'weapon_weight'],
            ['jp' => '装備重量', 'en' => 'armor_weight'],
            ['jp' => '携帯品重量', 'en' => 'item_weight'],
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
            $validatedData['exp_point'] = 0;
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
        $user = Auth::user();
        $character = $user
                    ->characters()
                    ->with(
                        'tribe',
                        'main_class',
                        'support_class',
                        'skills',
                        'equippings'
                    )->findOrFail($id);

        $all_status = [
            ['jp' => '筋力', 'en' => 'strength'],
            ['jp' => '器用', 'en' => 'dexterity'],
            ['jp' => '敏捷', 'en' => 'agility'],
            ['jp' => '知力', 'en' => 'intelligence'],
            ['jp' => '感知', 'en' => 'sense'],
            ['jp' => '精神', 'en' => 'mental'],
            ['jp' => '幸運', 'en' => 'luck']
        ];
        $skill_status = [
            ['jp' => '名称', 'en' => 'name'],
            ['jp' => 'Lv', 'en' => 'level'],
            ['jp' => 'タイミング', 'en' => 'timing'],
            ['jp' => '判定', 'en' => 'judge'],
            ['jp' => '対象', 'en' => 'target'],
            ['jp' => '射程', 'en' => 'range'],
            ['jp' => 'コスト', 'en' => 'cost'],
            ['jp' => 'Lv上限', 'en' => 'level_limit'],
            ['jp' => '取得元', 'en' => 'source'],
        ];
        $equip_status = [
            ['jp' => '装備部分', 'en' => 'type'],
            ['jp' => '名称', 'en' => 'name'],
            ['jp' => '重量', 'en' => 'weight'],
            ['jp' => '命中修正', 'en' => 'accuracy_correction'],
            ['jp' => '攻撃力', 'en' => 'power'],
            ['jp' => '回避修正', 'en' => 'avoid_correction'],
            ['jp' => '物理防御力', 'en' => 'physical_defense'],
            ['jp' => '魔法防御力', 'en' => 'magic_defense'],
            ['jp' => '行動修正', 'en' => 'action_correction'],
            ['jp' => '移動修正', 'en' => 'move_correction'],
            ['jp' => '射程', 'en' => 'range'],
        ];

        return view('charasheet.show', [
            'character' => $character,
            'all_status' => $all_status,
            'equip_status' => $equip_status,
            'skill_status' => $skill_status,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $character = $user
                    ->characters()
                    ->with(
                        'tribe',
                        'main_class',
                        'support_class',
                        'skills',
                        'equippings'
                    )->findOrFail($id);
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
            ['jp' => '武器重量', 'en' => 'weapon_weight'],
            ['jp' => '装備重量', 'en' => 'armor_weight'],
            ['jp' => '携帯品重量', 'en' => 'item_weight'],
        ];

        return view('charasheet.edit', [
            'character' => $character,
            'tribes' => $tribes,
            'main_classes' => $main_classes,
            'support_classes' => $support_classes,
            'all_status' => $all_status,
            'all_status_second' => $all_status_second,
            'weight_limit' => $weight_limit,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CharacterRequest $request, $id)
    {
        $validatedData = $request->validated();

        DB::transaction(function () use ($validatedData, $id) {
            $user = Auth::user();
            $character = $user->characters()->findOrFail($id);
            $character->update($validatedData);

            $level = 1;
            $count = 0;
            $exp_point = $validatedData['exp_point'];
            while ($exp_point >= 0) {
                $count++;
                $level++;
                $exp_point -= $count * 10;
            }
            $level -= 1;
            $character->update(['level' => $level]);

            if (!empty($validatedData['skills'])) {
                $newSkillIds = collect($validatedData['skills'])->pluck('id')->all();
                $character->skills()->whereNotIn('skills.id', $newSkillIds)->delete();
                foreach ($validatedData['skills'] as $newSkillData) {
                    $character->skills()->updateOrCreate(['skills.id' => $newSkillData['id']], $newSkillData);
                }
            } else {
                $character->skills()->delete();
            }

            if (!empty($validatedData['equippings'])) {
                foreach ($validatedData['equippings'] as $newEquippingData) {
                    $character->equippings()->updateOrCreate(['equippings.id' => $newEquippingData['id']], $newEquippingData);
                }
            }
        });
        return redirect()->route('charasheet.show', $id);
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