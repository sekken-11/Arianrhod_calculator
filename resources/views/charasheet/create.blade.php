<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('キャラクター') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 overflow-x-auto">

                    <div class="container small">
                        <form action="{{ route('charasheet.store') }}" method="POST">
                        @csrf
                            <fieldset>
                                <div class="form-group">

                                    <!-- 初期値 -->
                                    <div class="bg-white shadow-md rounded my-6">
                                        <table class="min-w-max w-full table-auto">
                                            <thead>
                                                <tr class="bg-gray-200 text-gray-600 leading-normal">
                                                    <th class="py-3 text-center">レベル</th>
                                                    <th class="py-3 text-center">成長点</th>
                                                    <th class="py-3 text-center">初期メインクラス</th>
                                                    <th class="py-3 text-center">初期サポートクラス</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-gray-600 text-xs font-light">
                                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                                    <td class="py-3 text-center">1</td>
                                                    <td class="py-3 text-center">5</td>
                                                    <td class="py-3 text-center" id="initial_main_class">-</td>
                                                    <td class="py-3 text-center" id="initial_support_class">-</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- キャラクター名・プレイヤー名 -->
                                    <div class="flex flex-wrap">
                                        <div class="w-full w-1/2 px-2">
                                            <div class="my-2">
                                                <label for="name" class="font-bold mb-1">{{ __('キャラクター名') }}</label>
                                                <input type="text" class="form-control block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white"
                                                 name="name" id="name">
                                            </div>
                                        </div>
                                        <div class="w-full w-1/2 px-2">
                                            <div class="my-2">
                                                <label for="player_name" class="font-bold mb-1">{{ __('プレイヤー名') }}</label>
                                                <input type="text" class="form-control block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white"
                                                 name="player_name" id="player_name">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- キャラクター情報 -->
                                    <div class="flex flex-wrap">
                                        <div class="w-full w-1/3 px-2">
                                            <div class="my-2">
                                                <label for="age" class="font-bold mb-1">{{ __('年齢') }}</label>
                                                <input type="text" class="form-control block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white"
                                                 name="age" id="age">
                                            </div>
                                        </div>
                                        <div class="w-full w-1/3 px-2">
                                            <div class="my-2">
                                                <label for="gender" class="font-bold mb-1">{{ __('性別') }}</label>
                                                <input type="text" class="form-control block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white"
                                                 name="gender" id="gender">
                                            </div>
                                        </div>
                                        <div class="w-full w-1/3 px-2">
                                            <div class="my-2">
                                                <label for="height" class="font-bold mb-1">{{ __('身長') }}</label>
                                                <input type="number" min="0" class="form-control block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white"
                                                 name="height" id="height">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-wrap">
                                        <div class="w-full w-1/3 px-2">
                                            <div class="my-2">
                                                <label for="hair_color" class="font-bold mb-1">{{ __('髪の色') }}</label>
                                                <input type="text" class="form-control block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white"
                                                 name="hair_color" id="hair_color">
                                            </div>
                                        </div>
                                        <div class="w-full w-1/3 px-2">
                                            <div class="my-2">
                                                <label for="eye_color" class="font-bold mb-1">{{ __('瞳の色') }}</label>
                                                <input type="text" class="form-control block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white"
                                                 name="eye_color" id="eye_color">
                                            </div>
                                        </div>
                                        <div class="w-full w-1/3 px-2">
                                            <div class="my-2">
                                                <label for="skin_color" class="font-bold mb-1">{{ __('肌の色') }}</label>
                                                <input type="text" class="form-control block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white"
                                                 name="skin_color" id="skin_color">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ライフパス -->
                                    <div class="flex flex-wrap">
                                        <div class="w-full w-1/3 px-2">
                                            <div class="mt-2 mb-1">
                                                <label for="origins" class="font-bold mb-1">{{ __('出自') }}</label>
                                                <input type="text" class="form-control block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white"
                                                 name="origins" id="origins" oninput="toggleRemarks('origins', 'origins_remarks')">
                                            </div>
                                            <div class="mb-2" id="origins_remarks_container" style="display: none;">
                                                <textarea rows="2" class="form-control block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white"
                                                 name="origins_remarks" id="origins_remarks" placeholder="備考"></textarea>
                                            </div>
                                        </div>
                                        <div class="w-full w-1/3 px-2">
                                            <div class="mt-2 mb-1">
                                                <label for="environment" class="font-bold mb-1">{{ __('境遇') }}</label>
                                                <input type="text" class="form-control block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white"
                                                 name="environment" id="environment" oninput="toggleRemarks('environment', 'environment_remarks')">
                                            </div>
                                            <div class="mb-2" id="environment_remarks_container" style="display: none;">
                                                <textarea rows="2" class="form-control block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white"
                                                 name="environment_remarks" id="environment_remarks" placeholder="備考"></textarea>
                                            </div>
                                        </div>
                                        <div class="w-full w-1/3 px-2">
                                            <div class="mt-2 mb-1">
                                                <label for="purpose" class="font-bold mb-1">{{ __('目的') }}</label>
                                                <input type="text" class="form-control block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white"
                                                 name="purpose" id="purpose" oninput="toggleRemarks('purpose', 'purpose_remarks')">
                                            </div>
                                            <div class="mb-2" id="purpose_remarks_container" style="display: none;">
                                                <textarea rows="2" class="form-control block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white"
                                                 name="purpose_remarks" id="purpose_remarks" placeholder="備考"></textarea>
                                            </div>
                                        </div>
                                        <div class="w-full w-1/3 px-2">
                                            <div class="mt-2 mb-1">
                                                <label for="hometown" class="font-bold mb-1">{{ __('出身地') }}</label>
                                                <input type="text" class="form-control block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white"
                                                 name="hometown" id="hometown">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- 種族・クラス -->
                                    <div class="flex flex-wrap">
                                        <div class="w-full w-1/3 px-2">
                                            <div class="my-2">
                                                <label for="tribe" class="font-bold mb-1">{{ __('種族') }}</label>
                                                <select class="form-control block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white"
                                                 name="tribe_id" id="tribe">
                                                    <option value="">選択してください</option>
                                                @foreach($tribes as $tribe)
                                                    <option value="{{ $tribe->id }}">{{ $tribe->name }}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="w-full w-1/3 px-2">
                                            <div class="my-2">
                                                <label for="main_class" class="font-bold mb-1">{{ __('メインクラス') }}</label>
                                                <select class="form-control block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white"
                                                 name="main_class_id" id="main_class">
                                                    <option value="">選択してください</option>
                                                @foreach($main_classes as $main_class)
                                                    <option value="{{ $main_class->id }}">{{ $main_class->name }}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="w-full w-1/3 px-2">
                                            <div class="my-2">
                                                <label for="support_class" class="font-bold mb-1">{{ __('サポートクラス') }}</label>
                                                <select class="form-control block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white"
                                                 name="support_class_id" id="support_class">
                                                    <option value="">選択してください</option>
                                                @foreach($support_classes as $support_class)
                                                    <option value="{{ $support_class->id }}">{{ $support_class->name }}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ステータス -->
                                    <div class="bg-white shadow-md rounded my-6">
                                        <table class="min-w-max w-full table-auto">
                                            <thead>
                                                <tr class="bg-gray-200 text-gray-600 text-xs leading-normal">
                                                    <th class="p-1 text-center"></th>
                                                    <th class="p-1 text-center">能力<br>基本値</th>
                                                    <th class="p-1 text-center">能力<br>ボーナス</th>
                                                    <th class="p-1 text-center">クラス補正<br>（メイン）</th>
                                                    <th class="p-1 text-center">クラス補正<br>（サポート）</th>
                                                    <th class="p-1 text-center">スキル等</th>
                                                    <th class="p-1 text-center">能力値</th>
                                                    <th class="p-1 text-center">スキル等</th>
                                                </tr>
                                            </thead>
                                            @foreach ($all_status as $status)
                                            <tbody class="text-gray-600 text-xs font-light" id="{{ $status['en'] }}_each_value">
                                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                                    <td class="p-1 text-center ">{{ $status['jp'] }}</td>
                                                    <td class="p-1 text-center" id="{{ $status['en'] }}_base">-</td>
                                                    <td class="p-1 text-center" id="status_bonus">
                                                        <input type="number" min="0"
                                                         class="num-input border border-gray-300 rounded focus:outline-none focus:bg-white"
                                                         name="{{ $status['en'] }}_bonus" id="{{ $status['en'] }}_bonus">
                                                    </td>
                                                    <td class="p-1 text-center" id="{{ $status['en'] }}_main_class">-</td>
                                                    <td class="p-1 text-center" id="{{ $status['en'] }}_support_class">-</td>
                                                    <td class="p-1 text-center" id="skill_bonus">
                                                        <input type="number" min="0"
                                                         class="num-input border border-gray-300 rounded focus:outline-none focus:bg-white"
                                                         name="{{ $status['en'] }}_correction" id="{{ $status['en'] }}_skill">
                                                    </td>
                                                    <td class="p-1 text-center key-data" id="{{ $status['en'] }}_main">-</td>
                                                    <td class="p-1 text-center" id="skill_bonus_second">
                                                        <input type="number" min="0"
                                                         class="num-input border border-gray-300 rounded focus:outline-none focus:bg-white"
                                                         name="{{ $status['en'] }}_correction_second" id="{{ $status['en'] }}_skill_second">
                                                    </td>
                                                </tr>
                                            </tbody>
                                            @endforeach
                                        </table>
                                    </div>

                                    <!-- ステータス2 -->
                                    <div class="flex flex-wrap">
                                        <div class="w-full md:w-3/5 bg-white shadow-md rounded">
                                            <table class="min-w-max w-full table-auto">
                                                <thead>
                                                    <tr class="bg-gray-200 text-gray-600 text-xs leading-normal">
                                                        <th class="p-1 text-center"></th>
                                                        <th class="p-1 text-center">種族<br>基本値</th>
                                                        <th class="p-1 text-center">クラス補正<br>（メイン）</th>
                                                        <th class="p-1 text-center">クラス補正<br>（サポート）</th>
                                                        <th class="p-1 text-center">スキル等</th>
                                                        <th class="p-1 px-3 text-center">合計</th>
                                                    </tr>
                                                </thead>
                                                @foreach ($all_status_second as $status)
                                                <tbody class="text-gray-600 text-xs font-light" id="{{ $status['en'] }}_each_value">
                                                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                                                        <td class="p-1 text-center">{{ $status['jp'] }}</td>
                                                        <td class="p-1 text-center" id="{{ $status['en'] }}_base">-</td>
                                                        <td class="p-1 text-center" id="{{ $status['en'] }}_main_class">-</td>
                                                        <td class="p-1 text-center" id="{{ $status['en'] }}_support_class">-</td>
                                                        <td class="p-1 text-center" id="skill_bonus">
                                                            <input type="number" min="0"
                                                             class="num-input border border-gray-300 rounded focus:outline-none focus:bg-white"
                                                             name="{{ $status['en'] }}_correction" id="{{ $status['en'] }}_skill">
                                                            </td>
                                                        </td>
                                                        <td class="p-1 px-3 text-center key-data" id="{{ $status['en'] }}_main">-</td>
                                                    </tr>
                                                </tbody>
                                                @endforeach
                                            </table>
                                        </div>
                                        <div class="w-full md:w-2/5 bg-white shadow-md rounded">
                                            <table class="min-w-max w-full table-auto">
                                                <thead>
                                                    <tr class="bg-gray-200 text-gray-600 text-xs leading-normal">
                                                        <th class="p-1 text-center"></th>
                                                        <th class="p-1 text-center">種族<br>基本値</th>
                                                        <th class="p-1 text-center">スキル等</th>
                                                        <th class="p-1 text-center">合計</th>
                                                    </tr>
                                                </thead>
                                                @foreach ($weight_limit as $limit)
                                                <tbody class="text-gray-600 text-xs font-light" id="{{ $status['en'] }}_each_value">
                                                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                                                        <td class="p-1 text-center">{{ $limit['jp'] }}</td>
                                                        <td class="p-1 text-center" id="{{ $limit['en'] }}_base">-</td>
                                                        <td class="p-1 text-center" id="skill_bonus">
                                                            <input type="number" min="0"
                                                             class="num-input border border-gray-300 rounded focus:outline-none focus:bg-white"
                                                             name="{{ $limit['en'] }}_correction" id="{{ $limit['en'] }}_skill">
                                                            </td>
                                                        </td>
                                                        <td class="p-1 text-center key-data" id="{{ $limit['en'] }}_main">-</td>
                                                    </tr>
                                                </tbody>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>

                                    @include('charasheet.parts.skill')

                                    @include('charasheet.parts.equipping')

                                <div class="d-flex justify-content-between pt-3">
                                    <div class="flex justify-center">
                                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded fucus:outline-none focus:shadow-outline mt-3">
                                            {{ __('登録') }}
                                        </button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<style>
label {
    font-size: 0.75rem;
    line-height: 1.25rem;
}
select {
    font-size: 12px;
    height: 30px;
    padding: 0.2rem 0.5rem;
}
.num-input {
    font-size: 15px !important;
    height: 30px;
    width: 45px;
    padding:  0.2rem 0.1rem 0.2rem 0.5rem !important;
}
input {
    font-size: 15px !important;
    height: 30px;
    padding:  0.2rem 0.1rem 0.2rem 0.5rem !important;
}
th {
    font-size: 10px;
}
.key-data {
    font-size: 15px;
    font-weight: bold;
}
</style>

<script>
// 基本値・補正値セット関数
function updateStatusValues(event, classData, classType) {
    var classId = event.target.value;
    var selectedClass = classData.find(function(classItem) {
        return classItem.id == classId;
    });

    var statusElements = {!! json_encode($all_status) !!};
    statusElements.forEach(function(status) {
        var classElement = document.getElementById(status.en + '_' + classType);
        if ( classType == 'base' ) {
            classElement.textContent = selectedClass ? selectedClass[status.en + '_base'] : '-';
        } else {
            classElement.textContent = selectedClass ? selectedClass[status.en + '_correction'] : '-';
        }
    });

    var statusSecondElements = {!! json_encode($all_status_second) !!};
    statusSecondElements.forEach(function(status) {
        var classElement = document.getElementById(status.en + '_' + classType);
        if ( classType == 'base' ) {
            classElement.textContent = selectedClass ? selectedClass[status.en + '_base'] : '-';
        } else {
            classElement.textContent = selectedClass ? selectedClass[status.en + '_correction'] : '-';
        }
    });

    if (classType != 'base') {
        var initialElement = document.getElementById('initial_' + classType);
        initialElement.textContent = selectedClass ?  selectedClass['name'] : '-';
    }

    var weightElements = {!! json_encode($weight_limit) !!};
    if (classType == 'base') {
        weightElements.forEach(function(status) {
            var tribeElement = document.getElementById(status.en + '_' + classType);
                tribeElement.textContent = selectedClass ? selectedClass['weight_limit'] : '-';
        });
    }
}
// フェイトセット関数
function setOtherTextToTwo() {
    var mainClassId = document.getElementById('main_class').value;
    var supportClassId = document.getElementById('support_class').value;

    if (mainClassId && supportClassId) {
        var mainClass = {!! json_encode($main_classes) !!}.find(function(classItem) {
            return classItem.id == mainClassId;
        });
        var supportClass = {!! json_encode($support_classes) !!}.find(function(classItem) {
            return classItem.id == supportClassId;
        });

        if (mainClass['name'] == supportClass['name']) {
            var finalfate = parseInt(document.getElementById('fate_main').textContent) + 1;
            document.getElementById('fate_main').textContent = finalfate;
        }
    }
}
// 合計値計算関数
function calculateAndSetMainValues() {
    var statusElements = {!! json_encode($all_status) !!};    
    statusElements.forEach(function(status) {
        var baseElement = document.getElementById(status.en + '_base');
        var bonusElement = document.getElementById(status.en + '_bonus');
        var mainClassElement = document.getElementById(status.en + '_main_class');
        var supportClassElement = document.getElementById(status.en + '_support_class');
        var skillElement = document.getElementById(status.en + '_skill');
        var skillSecondElement = document.getElementById(status.en + '_skill_second');
        var totalValue = (parseInt(baseElement.textContent) || 0) +
                         (parseInt(bonusElement.value) || 0) +
                         (parseInt(mainClassElement.textContent) || 0) + 
                         (parseInt(supportClassElement.textContent) || 0) +
                         (parseInt(skillElement.value) || 0);
        var finalValue = Math.floor(totalValue / 3) + (parseInt(skillSecondElement.value) || 0);
        var mainElement = document.getElementById(status.en + '_main');
        mainElement.textContent = isNaN(finalValue) ? '-' : finalValue;
    });

    var statusSecondElements = {!! json_encode($all_status_second) !!};    
    statusSecondElements.forEach(function(status) {
        var baseSecondElement = document.getElementById(status.en + '_base');
        var mainSecondClassElement = document.getElementById(status.en + '_main_class');
        var supportSecondClassElement = document.getElementById(status.en + '_support_class');
        var skillSecondElement = document.getElementById(status.en + '_skill');
        var totalSecondValue = (parseInt(baseSecondElement.textContent) || 0) +
                         (parseInt(mainSecondClassElement.textContent) || 0) + 
                         (parseInt(supportSecondClassElement.textContent) || 0) +
                         (parseInt(skillSecondElement.value) || 0);
        var finalSecondValue = totalSecondValue; // 合計を3で割る
        var mainSecondElement = document.getElementById(status.en + '_main');
        mainSecondElement.textContent = isNaN(finalSecondValue) ? '-' : finalSecondValue;
    });

    var tribeElements = {!! json_encode($weight_limit) !!};    
    tribeElements.forEach(function(limit) {
        var weightBaseElement = document.getElementById(limit.en + '_base');
        var weightSkillElement = document.getElementById(limit.en + '_skill');
        var weightTotalValue = (parseInt(weightBaseElement.textContent) || 0) +
                         (parseInt(weightSkillElement.value) || 0);
        var weightFinalValue = weightTotalValue; // 合計を3で割る
        var weightMainElement = document.getElementById(limit.en + '_main');
        weightMainElement.textContent = isNaN(weightFinalValue) ? '-' : weightFinalValue;
    });

    var fateLimit = document.getElementById('fate_limit_main');
    var luckMain = document.getElementById('luck_main');
    var fateLimitSkill = document.getElementById('fate_limit_skill');
    fateLimit.textContent = (parseInt(luckMain.textContent) || 0) +
                            (parseInt(fateLimitSkill.value) || 0);
}
// 種族変更イベント
document.getElementById('tribe').addEventListener('change', function(event) {
    updateStatusValues(event, {!! json_encode($tribes) !!}, 'base');
    calculateAndSetMainValues();
    setOtherTextToTwo();
});
// メインクラス変更イベント
document.getElementById('main_class').addEventListener('change', function(event) {
    updateStatusValues(event, {!! json_encode($main_classes) !!}, 'main_class');
});
document.getElementById('main_class').addEventListener('change', function(event) {
    calculateAndSetMainValues();
    setOtherTextToTwo();
});
// サポートクラス変更イベント
document.getElementById('support_class').addEventListener('change', function(event) {
    updateStatusValues(event, {!! json_encode($support_classes) !!}, 'support_class');
});
document.getElementById('support_class').addEventListener('change', function(event) {
    calculateAndSetMainValues();
    setOtherTextToTwo();
});

var statusBonusElements = document.querySelectorAll('[id^="status_bonus"]');
statusBonusElements.forEach(function(element) {
    element.addEventListener('input', calculateAndSetMainValues);
});

var skillBonusElement = document.querySelectorAll('[id^="skill_bonus"]');
skillBonusElement.forEach(function(element) {
    element.addEventListener('input', calculateAndSetMainValues);
});

var skillBonusSecondElement = document.querySelectorAll('[id^="skill_bonus_second"]');
skillBonusSecondElement.forEach(function(element) {
    element.addEventListener('input', calculateAndSetMainValues);
});

function toggleRemarks(inputId, remarksId) {
    var input = document.getElementById(inputId);
    var remarksContainer = document.getElementById(remarksId + '_container');

    if (input.value.trim() !== '') {
        remarksContainer.style.display = 'block';
    } else {
        remarksContainer.style.display = 'none';
    }
}
</script>