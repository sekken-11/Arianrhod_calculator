<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            キャラクター 詳細
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
        <div x-data="{ show: true }">

            <div class="flex justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded fucus:outline-none focus:shadow-outline mt-3">
                    <a href="{{ route('charasheet.edit', $character->id) }}">編集</a>
                </button>
                <button @click="show = !show"  class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded fucus:outline-none focus:shadow-outline mt-3">
                    <span x-show="show">削除モード</span>
                    <span x-show="!show">削除モード中</span>
                </button>
            </div>

            <div>
                <div class="chara_name_box shadow-lg my-6 py-2 flex flex-wrap">
                    <div class="w-3/4">
                        <span class="chara_name">{{ $character->name }}</span>
                        <span>の詳細</span>
                    </div>
                    <div class="w-1/4 text-right">
                        <span class="player_name">プレイヤー名：{{ $character->player_name }}</span>
                    </div>
                    <div>
                    </div>
                </div>

                <!-- １段目 -->
                <div class="flex flex-wrap">
                    <!-- キャラクターステータス -->
                    <div class="w-full xl:w-1/2 xl:pe-2 mb-3">
                        <div class="bg-white shadow-md rounded">
                            <table class="min-w-max w-full table-auto">
                                <thead>
                                    <tr class="bg-gray-200 text-gray-600 text-xs leading-normal">
                                        <th class="table_title py-2 text-center" colspan="4">キャラクターステータス</th>
                                    </tr>
                                </thead>
                                <thead>
                                    <tr class="bg-gray-200 text-gray-600 text-xs leading-normal">
                                        <th class="py-1 text-center">種族</th>
                                        <th class="py-1 text-center">メインクラス</th>
                                        <th class="py-1 text-center">サポートクラス</th>
                                        <th class="py-1 text-center">称号クラス</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 text-xs font-light">
                                    <tr class="border-b border-gray-200">
                                        <td class="py-2 text-center whitespace-nowrap">{{ $character->tribe->name }}</td>
                                        <td class="py-2 text-center whitespace-nowrap">{{ $character->main_class->name }}</td>
                                        <td class="py-2 text-center whitespace-nowrap">{{ $character->support_class->name }}</td>
                                        <td class="py-2 text-center whitespace-nowrap">{{ $character->honor_class }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="min-w-max w-full table-auto">
                                <thead>
                                    <tr class="bg-gray-200 text-gray-600 text-xs leading-normal">
                                        <th class="mini_item py-1 text-center">キャラクター<br>レベル</th>
                                        <th class="py-1 text-center">成長点</th>
                                        <th class="py-1 text-center">HP上限</th>
                                        <th class="py-1 text-center">MP上限</th>
                                        <th class="mini_item py-1 text-center">フェイト<br>(使用上限)</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 text-xs font-light">
                                    <tr class="border-b border-gray-200">
                                        <td class="py-2 text-center whitespace-nowrap">{{ $character->level }}</td>
                                        <td class="py-2 text-center whitespace-nowrap">{{ $character->exp_point }}</td>
                                        <td class="py-2 text-center whitespace-nowrap">
                                            {{ $character->tribe->hp_base +
                                               $character->main_class->hp_correction + 
                                               $character->support_class->hp_correction +
                                               $character->main_class->hp_up * ($character->level - 1) +
                                               $character->hp_correction }}
                                        </td>
                                        <td class="py-2 text-center whitespace-nowrap">
                                            {{ $character->tribe->mp_base +
                                               $character->main_class->mp_correction + 
                                               $character->support_class->mp_correction +
                                               $character->main_class->mp_up * ($character->level - 1) +
                                               $character->mp_correction }}
                                        </td>
                                        <td class="py-2 text-center whitespace-nowrap">
                                             後記
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="min-w-max w-full table-auto">
                                <thead>
                                    <tr class="bg-gray-200 text-gray-600 text-xs leading-normal">
                                        <th class="py-1 text-center"></th>
                                        @foreach ($all_status as $status)
                                            <th class="py-1 text-center">{{ $status['jp'] }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 text-xs font-light">
                                    <tr class="border-b border-gray-200">
                                        <td class="py-2 text-center whitespace-nowrap">能力基本値</td>
                                        @foreach ($all_status as $status)
                                            <td class="py-1 text-center">
                                                {{
                                                    $character->tribe->{ $status['en'] . '_base' } +
                                                    $character->main_class->{ $status['en'] . '_correction' } +
                                                    $character->support_class->{ $status['en'] . '_correction' } +
                                                    $character->{ $status['en'] . '_bonus' } +
                                                    $character->{ $status['en'] . '_correction' }
                                                }}
                                            </td>
                                        @endforeach
                                    </tr>
                                </tbody>
                                <tbody class="text-gray-600 text-xs font-light">
                                    <tr class="border-b border-gray-200">
                                        <td class="py-2 text-center whitespace-nowrap">能力値</td>
                                        @foreach ($all_status as $status)
                                            <td class="py-1 text-center">
                                                {{
                                                    floor(
                                                        ( $character->tribe->{ $status['en'] . '_base' } +
                                                          $character->main_class->{ $status['en'] . '_correction' } +
                                                          $character->support_class->{ $status['en'] . '_correction' } +
                                                          $character->{ $status['en'] . '_bonus' } +
                                                          $character->{ $status['en'] . '_correction' } ) / 3 +
                                                          $character->{ $status['en'] . '_correction_second' }
                                                    )
                                                }}
                                            </td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- キャラクター設定 -->
                    <div class="w-full xl:w-1/2 xl:ps-2 mb-3">
                        <div class="bg-white shadow-md rounded">
                            <table class="min-w-max w-full table-auto">
                                <thead>
                                    <tr class="bg-gray-200 text-gray-600 text-xs leading-normal">
                                        <th class="table_title py-2 text-center" colspan="7">キャラクター設定</th>
                                    </tr>
                                </thead>
                                <thead>
                                    <tr class="bg-gray-200 text-gray-600 text-xs leading-normal">
                                        <th class="py-1 text-center">年齢</th>
                                        <th class="py-1 text-center">性別</th>
                                        <th class="py-1 text-center">身長</th>
                                        <th class="py-1 text-center">髪の色</th>
                                        <th class="py-1 text-center">瞳の色</th>
                                        <th class="py-1 text-center">肌の色</th>
                                        <th class="py-1 text-center">出身地</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 text-xs font-light">
                                    <tr class="border-b border-gray-200">
                                        <td class="py-2 text-center whitespace-nowrap">{{ $character->age }}</td>
                                        <td class="py-2 text-center whitespace-nowrap">{{ $character->gender }}</td>
                                        <td class="py-2 text-center whitespace-nowrap">{{ $character->height }}cm</td>
                                        <td class="py-2 text-center whitespace-nowrap">{{ $character->hair_color }}</td>
                                        <td class="py-2 text-center whitespace-nowrap">{{ $character->eye_color }}</td>
                                        <td class="py-2 text-center whitespace-nowrap">{{ $character->skin_color }}</td>
                                        <td class="py-2 text-center whitespace-nowrap">{{ $character->hometown }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="bg-white shadow-md rounded">
                            <table class="min-w-max w-full table-fixed">
                                <thead>
                                    <tr class="bg-gray-200 text-gray-600 text-xs leading-normal">
                                        <th class="py-1 text-center w-1/3">出自</th>
                                        <th class="py-1 text-center w-1/3">境遇</th>
                                        <th class="py-1 text-center w-1/3">目的</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 text-xs font-light">
                                    <tr class="border-b border-gray-200">
                                        <td class="py-2 text-center">{{ $character->origins }}</td>
                                        <td class="py-2 text-center">{{ $character->environment }}</td>
                                        <td class="py-2 text-center">{{ $character->purpose }}</td>
                                    </tr>
                                    <tr class="border-b border-gray-200">
                                    @foreach (['origins', 'environment', 'purpose'] as $lifepass)
                                        @if(!empty($character->{$lifepass . '_remarks'}))
                                            <td class="py-2 px-3 vertical-align-top">
                                                <span class="break-first">{{ $character->{$lifepass . '_remarks'} }}</span>
                                            </td>
                                        @else
                                            <td class="py-2 px-3 text-center">-</td>
                                        @endif
                                    @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- 2段目 -->
                <div class="flex flex-wrap">
                    <!-- スキル一覧 -->
                    <div class="w-full xl:w-1/2 xl:pe-2 mb-3">
                        <div class="bg-white shadow-md rounded">
                            <table class="min-w-max w-full table-auto">
                                <thead>
                                    <tr class="bg-gray-200 text-gray-600 text-xs leading-normal">
                                        <th class="table_title py-2 text-center" colspan="9">スキル一覧</th>
                                    </tr>
                                </thead>
                                <thead>
                                    <tr class="bg-gray-200 text-gray-600 text-xs leading-normal">
                                    @foreach ($skill_status as $skill)
                                        <th class="mini_status_title skill_{{ $skill['en'] }} py-1 text-center">{{ $skill['jp'] }}</th>
                                    @endforeach
                                    </tr>
                                </thead>
                                @if ($character->skills && count($character->skills) > 0)
                                    @foreach ($character->skills as $skill)
                                        <tbody class="text-gray-600 text-xs font-light">
                                            <tr class="border-b border-gray-100">
                                            @foreach ($skill_status as $skill_name)
                                                <td class="py-2 text-center">
                                                    @if ($skill->{$skill_name['en']})
                                                        {{ $skill->{$skill_name['en']} }}
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                            @endforeach
                                            </tr>
                                            <tr class="border-b border-gray-200">
                                                <td class="py-2 text-center bg-gray-100" colspan="1"></tf>
                                                <td class="py-1 px-2" colspan="8">
                                                    @if ($skill->effect)
                                                        <span class="break-first">{{ $skill->effect }}</span>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                @else
                                    <tbody class="text-gray-600 text-xs font-light">
                                        <tr class="border-b border-gray-100">
                                            <td class="py-4 text-center" colspan="9">スキルを習得していません</td>
                                        </tr>
                                    </tbody>
                                @endif
                            </table>
                        </div>
                    </div>
                    <!-- 装備一覧 -->
                    <div class="w-full xl:w-1/2 xl:pe-2 mb-3">
                        <div class="bg-white shadow-md rounded">
                            <table class="min-w-max w-full table-auto">
                                <thead>
                                    <tr class="bg-gray-200 text-gray-600 text-xs leading-normal">
                                        <th class="table_title py-2 text-center" colspan="11">装備一覧</th>
                                    </tr>
                                    <tr class="bg-gray-200 text-gray-600 text-xs leading-normal">
                                    @foreach ($equip_status as $equip)
                                        <th class="mini_status_title equip_{{ $equip['en'] }} py-1 text-center">{{ $equip['jp'] }}</th>
                                    @endforeach
                                    </tr>
                                </thead>
                                @foreach ($character->equippings as $equipping)
                                    <tbody class="text-gray-600 text-xs font-light">
                                        <tr class="border-b border-gray-100">
                                        @foreach ($equip_status as $equip)
                                            <td class="py-2 text-center equip_part_{{ $equip['en'] }}">
                                                @if ($equipping->{$equip['en']})
                                                    {{ $equipping->{$equip['en']} }}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                        @endforeach
                                        </tr>
                                        <tr class="border-b border-blue-300">
                                            <td class="py-2 text-center bg-gray-100" colspan="1"></tf>
                                            <td class="py-1 px-2" colspan="10">
                                                @if ($equipping->remarks)
                                                    <span class="break-first">{{ $equipping->remarks }}</span>
                                                @else
                                                    -
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        </div>
    </div>
</x-app-layout>

<style>
.chara_name_box {
    padding: 10px 20px;
    border-top: 8px solid lightblue;
    border-bottom: 8px solid lightblue;
    background: linear-gradient(90deg, white, white, whitesmoke, lightblue);
}
.chara_name {
    font-size: 25px;
    font-family: "Tsukushi A Round Gothic","筑紫A丸ゴシック";
    font-weight: 800;
    margin-right: 10px;
}
.player_name {
    font-size: 12px;
    font-weight: 600;
    font-family: "Tsukushi A Round Gothic","筑紫A丸ゴシック";
}
.mini_item {
    font-size: 9px;
}
.break-first {
    text-align: left;
    white-space: pre-line;
}
td:hover {
    background-color: #f3f4f6;
}
.table_title {
    background-color: gray !important;
    color: snow !important;
}
.mini_status_title {
    font-size: 10px;
}
.equip_part_type {
    font-weight: bold;
}
.equip_name {
    width: 150px;
}
.skill_name {
    width: 200px;
}
.vertical-align-top {
    vertical-align: top;
}
</style>