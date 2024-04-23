<!-- 種族・クラス -->
<div class="flex flex-wrap">
    <div class="w-full w-1/3 px-2">
        <div class="my-2">
            <label for="tribe" class="font-bold mb-1">{{ __('種族') }}<span class="text-red-500">（必須項目）</span></label>
            <select
                class="form-control block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white"
                name="tribe_id" id="tribe">
                <option value="">選択してください</option>
                @foreach($tribes as $tribe)
                <option value="{{ $tribe->id }}" @if(isset($character) && $tribe->id == $character->tribe->id) selected @endif>
                    {{ $tribe->name }}
                </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="w-full w-1/3 px-2">
        <div class="my-2">
            <label for="main_class" class="font-bold mb-1">{{ __('メインクラス') }}<span class="text-red-500">（必須項目）</span></label>
            <select
                class="form-control block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white"
                name="main_class_id" id="main_class">
                <option value="">選択してください</option>
                @foreach($main_classes as $main_class)
                <option value="{{ $main_class->id }}" @if(isset($character) && $main_class->id == $character->main_class->id) selected
                    @endif>
                    {{ $main_class->name }}
                </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="w-full w-1/3 px-2">
        <div class="my-2">
            <label for="support_class" class="font-bold mb-1">{{ __('サポートクラス') }}<span class="text-red-500">（必須項目）</span></label>
            <select
                class="form-control block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white"
                name="support_class_id" id="support_class">
                <option value="">選択してください</option>
                @foreach($support_classes as $support_class)
                <option value="{{ $support_class->id }}" @if(isset($character) && $support_class->id == $character->support_class->id)
                    selected @endif>
                    {{ $support_class->name }}
                </option>
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
                <td class="p-1 text-center" id="{{ $status['en'] }}_tribe">-</td>
                <td class="p-1 text-center" id="status_bonus">
                    <input type="number" min="0"
                        class="num-input border border-gray-300 rounded focus:outline-none focus:bg-white"
                        name="{{ $status['en'] }}_bonus" id="{{ $status['en'] }}_bonus"
                        value="{{ $character->{$status['en'] . '_bonus'} ?? '' }}">
                </td>
                <td class="p-1 text-center" id="{{ $status['en'] }}_main_class">-</td>
                <td class="p-1 text-center" id="{{ $status['en'] }}_support_class">-</td>
                <td class="p-1 text-center" id="skill_bonus">
                    <input type="number" min="0"
                        class="num-input border border-gray-300 rounded focus:outline-none focus:bg-white"
                        name="{{ $status['en'] }}_correction" id="{{ $status['en'] }}_skill"
                        value="{{ $character->{$status['en'] . '_correction'} ?? '' }}">
                </td>
                <td class="p-1 text-center key-data" id="{{ $status['en'] }}_main">-</td>
                <td class="p-1 text-center" id="skill_bonus_second">
                    <input type="number" min="0"
                        class="num-input border border-gray-300 rounded focus:outline-none focus:bg-white"
                        name="{{ $status['en'] }}_correction_second" id="{{ $status['en'] }}_skill_second"
                        value="{{ $character->{$status['en'] . '_correction_second'} ?? '' }}">
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
                    <td class="p-1 text-center" id="{{ $status['en'] }}_tribe">-</td>
                    <td class="p-1 text-center" id="{{ $status['en'] }}_main_class">-</td>
                    <td class="p-1 text-center" id="{{ $status['en'] }}_support_class">-</td>
                    <td class="p-1 text-center" id="skill_bonus">
                        <input type="number"
                            class="num-input border border-gray-300 rounded focus:outline-none focus:bg-white"
                            name="{{ $status['en'] }}_correction" id="{{ $status['en'] }}_skill"
                            value="{{ $character->{$status['en'] . '_correction'} ?? '' }}">
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
                    <td class="p-1 text-center" id="{{ $limit['en'] }}_tribe">-</td>
                    <td class="p-1 text-center" id="skill_bonus">
                        <input type="number"
                            class="num-input border border-gray-300 rounded focus:outline-none focus:bg-white"
                            name="{{ $limit['en'] }}_correction" id="{{ $limit['en'] }}_skill"
                            value="{{ $character->{$limit['en'] . '_correction'} ?? '' }}">
                    </td>
                    </td>
                    <td class="p-1 text-center key-data" id="{{ $limit['en'] }}_main">-</td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
</div>

<script>
    // 基本値・補正値セット関数
    function updateStatusValues(event, classData, classType) {
        if (event) {
            var classId = event.target.value;
        } else {
            var classId = document.getElementById(classType).value;
        }
        var selectedClass = classData.find(function(classItem) {
            return classItem.id == classId;
        });
    
        var statusElements = {!! json_encode($all_status) !!};
        statusElements.forEach(function(status) {
            var classElement = document.getElementById(status.en + '_' + classType);
            if ( classType == 'tribe' ) {
                classElement.textContent = selectedClass ? selectedClass[status.en + '_base'] : '-';
            } else {
                classElement.textContent = selectedClass ? selectedClass[status.en + '_correction'] : '-';
            }
        });
    
        var statusSecondElements = {!! json_encode($all_status_second) !!};
        statusSecondElements.forEach(function(status) {
            var classElement = document.getElementById(status.en + '_' + classType);
            if ( classType == 'tribe' ) {
                classElement.textContent = selectedClass ? selectedClass[status.en + '_base'] : '-';
            } else {
                classElement.textContent = selectedClass ? selectedClass[status.en + '_correction'] : '-';
            }
        });
    
        if (classType != 'tribe') {
            var initialElement = document.getElementById('initial_' + classType);
            initialElement.textContent = selectedClass ?  selectedClass['name'] : '-';
        }
    
        var weightElements = {!! json_encode($weight_limit) !!};
        if (classType == 'tribe') {
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
            var baseElement = document.getElementById(status.en + '_tribe');
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
            var baseSecondElement = document.getElementById(status.en + '_tribe');
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
            var weightBaseElement = document.getElementById(limit.en + '_tribe');
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
        updateStatusValues(event, {!! json_encode($tribes) !!}, 'tribe');
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
</script>