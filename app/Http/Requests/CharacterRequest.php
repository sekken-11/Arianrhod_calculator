<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CharacterRequest extends FormRequest
{
    protected function prepareForValidation()
    {
        $defaults = [
            'strength_bonus' => $this->strength_bonus ?? 0,
            'dexterity_bonus' => $this->dexterity_bonus ?? 0,
            'agility_bonus' => $this->agility_bonus ?? 0,
            'strength_correction' => $this->strength_correction ?? 0,
            'strength_correction_second' => $this->strength_correction_second ?? 0,
            'dexterity_correction' => $this->dexterity_correction ?? 0,
            'dexterity_correction_second' => $this->dexterity_correction_second ?? 0,
            'agility_correction' => $this->agility_correction ?? 0,
            'agility_correction_second' => $this->agility_correction_second ?? 0,
            'intelligence_bonus' => $this->intelligence_bonus ?? 0,
            'intelligence_correction' => $this->intelligence_correction ?? 0,
            'intelligence_correction_second' => $this->intelligence_correction_second ?? 0,
            'sense_bonus' => $this->sense_bonus ?? 0,
            'sense_correction' => $this->sense_correction ?? 0,
            'sense_correction_second' => $this->sense_correction_second ?? 0,
            'mental_bonus' => $this->mental_bonus ?? 0,
            'mental_correction' => $this->mental_correction ?? 0,
            'mental_correction_second' => $this->mental_correction_second ?? 0,
            'luck_bonus' => $this->luck_bonus ?? 0,
            'luck_correction' => $this->luck_correction ?? 0,
            'luck_correction_second' => $this->luck_correction_second ?? 0,
            'hp_correction' => $this->hp_correction ?? 0,
            'mp_correction' => $this->mp_correction ?? 0,
            'fate_correction' => $this->fate_correction ?? 0,
            'fate_limit_correction' => $this->fate_limit_correction ?? 0,
            'weapon_weight_correction' => $this->weapon_weight_correction ?? 0,
            'armor_weight_correction' => $this->armor_weight_correction ?? 0,
            'item_weight_correction' => $this->item_weight_correction ?? 0,
        ];
        $this->merge($defaults);

        if ($this->has('skills')) {
            // スキルを取得し、nameがnullでないものだけを残す
            $skills = $this->input('skills');
            $this->merge(['skills' => collect($skills)->reject(function ($skill) {
                return is_null($skill['name']);
            })->values()->all()]);

            $skills = $this->input('skills');
            foreach ($skills as &$skill) {
                $skillDefaults = [
                    'level' => 1,
                    'level_limit' => 1,
                    'id' => 0,
                ];
                foreach ($skillDefaults as $key => $value) {
                    $skill[$key] = $skill[$key] ?? $value;
                }
            }
            $this->merge(['skills' => $skills]);
        }
        
        $equippingDefaults = [
            'weight' => 0,
            'accuracy_correction' => 0,
            'power' => 0,
            'avoid_correction' => 0,
            'physical_defense' => 0,
            'magic_defense' => 0,
            'action_correction' => 0,
            'move_correction' => 0,
            'range' => 0,
        ];
        if ($this->has('equippings')) {            
            $equippings = $this->input('equippings');
            foreach ($equippings as &$equip) {
                $equippingDefaults = [
                    'weight' => 0,
                    'accuracy_correction' => 0,
                    'power' => 0,
                    'avoid_correction' => 0,
                    'physical_defense' => 0,
                    'magic_defense' => 0,
                    'action_correction' => 0,
                    'move_correction' => 0,
                    'range' => 0,
                ];
                foreach ($equippingDefaults as $key => $value) {
                    $equip[$key] = $equip[$key] ?? $value;
                }
            }
            $this->merge(['equippings' => $equippings]);
        }
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'player_name' => ['nullable', 'string', 'max:255'],
            'exp_point' => ['nullable', 'numeric'],
            'age' => ['nullable', 'numeric'],
            'gender' => ['nullable', 'string'],
            'height' => ['nullable', 'numeric'],
            'hair_color' => ['nullable', 'string'],
            'eye_color' => ['nullable', 'string'],
            'skin_color' => ['nullable', 'string'],
            'origins' => ['nullable', 'string'],
            'origins_remarks' => ['nullable', 'string'],
            'environment' => ['nullable', 'string'],
            'environment_remarks' => ['nullable', 'string'],
            'purpose' => ['nullable', 'string'],
            'purpose_remarks' => ['nullable', 'string'],
            'hometown' => ['nullable', 'string'],

            'tribe_id' => ['required', 'string'],
            'main_class_id' => ['required', 'string'],
            'support_class_id' => ['required', 'string'],

            'strength_bonus' => ['nullable', 'numeric'],
            'strength_correction' => ['nullable', 'numeric'],
            'strength_correction_second' => ['nullable', 'numeric'],
            'dexterity_bonus' => ['nullable', 'numeric'],
            'dexterity_correction' => ['nullable', 'numeric'],
            'dexterity_correction_second' => ['nullable', 'numeric'],
            'agility_bonus' => ['nullable', 'numeric'],
            'agility_correction' => ['nullable', 'numeric'],
            'agility_correction_second' => ['nullable', 'numeric'],
            'intelligence_bonus' => ['nullable', 'numeric'],
            'intelligence_correction' => ['nullable', 'numeric'],
            'intelligence_correction_second' => ['nullable', 'numeric'],
            'sense_bonus' => ['nullable', 'numeric'],
            'sense_correction' => ['nullable', 'numeric'],
            'sense_correction_second' => ['nullable', 'numeric'],
            'mental_bonus' => ['nullable', 'numeric'],
            'mental_correction' => ['nullable', 'numeric'],
            'mental_correction_second' => ['nullable', 'numeric'],
            'luck_bonus' => ['nullable', 'numeric'],
            'luck_correction' => ['nullable', 'numeric'],
            'luck_correction_second' => ['nullable', 'numeric'],
            
            'hp_correction' => ['nullable', 'numeric'],
            'mp_correction' => ['nullable', 'numeric'],
            'fate_correction' => ['nullable', 'numeric'],
            'fate_limit_correction' => ['nullable', 'numeric'],

            'weapon_weight_correction' => ['nullable', 'numeric'],
            'armor_weight_correction' => ['nullable', 'numeric'],
            'item_weight_correction' => ['nullable', 'numeric'],

            'remarks' => ['nullable', 'string'],

            'skills' => ['nullable', 'array'],
            'skills.*.id' => ['nullable'],
            'skills.*.name' => ['required_if:skills,array', 'string', 'max:255'],
            'skills.*.level' => ['nullable', 'numeric', 'min:1'],
            'skills.*.timing' => ['nullable', 'string', 'max:255'],
            'skills.*.judge' => ['nullable', 'string', 'max:255'],
            'skills.*.target' => ['nullable', 'string', 'max:255'],
            'skills.*.range' => ['nullable', 'string', 'max:255'],
            'skills.*.cost' => ['nullable', 'numeric'],
            'skills.*.level_limit' => ['nullable', 'numeric', 'min:1'],
            'skills.*.effect' => ['nullable', 'string'],
            'skills.*.source' => ['nullable', 'string'],

            'equippings' => ['nullable', 'array', 'max:6'],
            'equippings.*.id' => ['nullable'],
            'equippings.*.name' => ['nullable', 'string', 'max:255'],
            'equippings.*.type' => ['required_if:equippings,array', 'string', 'max:255'],
            'equippings.*.weight' => ['nullable', 'numeric'],
            'equippings.*.accuracy_correction' => ['nullable', 'numeric'],
            'equippings.*.power' => ['nullable', 'numeric'],
            'equippings.*.avoid_correction' => ['nullable', 'numeric'],
            'equippings.*.physical_defense' => ['nullable', 'numeric'],
            'equippings.*.magic_defense' => ['nullable', 'numeric'],
            'equippings.*.action_correction' => ['nullable', 'numeric'],
            'equippings.*.move_correction' => ['nullable', 'numeric'],
            'equippings.*.range' => ['nullable', 'numeric'],
            'equippings.*.remarks' => ['nullable', 'string'],
        ];
    }
}