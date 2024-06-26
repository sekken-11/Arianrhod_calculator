<div class="bg-white shadow-md rounded my-6">
    <table class="min-w-max w-full table-auto">
        <thead>
            <tr class="bg-gray-400 text-gray-700 leading-normal">
                <th class="field_title w-2/3 text-center">装備品一覧</th>
                <th class="py-3 text-center">
                    <button type="button" onclick="toggleEpuipFields()">表示切替</button>
                </th>
            </tr>
        </thead>
    </table>
    <table class="equip_fields min-w-max w-full table-auto">
        <thead>
            <tr class="bg-gray-200 text-gray-600 leading-normal">
                <th class="py-3 text-center">装備部分</th>
                <th class="py-3 text-center">名称</th>
                <th class="py-3 text-center">重量</th>
                <th class="py-3 text-center">命中修正</th>
                <th class="py-3 text-center">攻撃力</th>
                <th class="py-3 text-center">回避修正</th>
                <th class="py-3 text-center">物理防御力</th>
                <th class="py-3 text-center">魔法防御力</th>
                <th class="py-3 text-center">行動修正</th>
                <th class="py-3 text-center">移動修正</th>
                <th class="py-3 text-center">射程</th>
            </tr>
        </thead>
        @foreach (['右手', '左手', '頭部', '胴部', '補助防具', '装身具'] as $index => $equipping)
            <tbody class="equips text-gray-600 text-xs font-light hover:bg-gray-200">
                <tr class="border-t border-gray-300">
                    <td class="equip_type p-1 pt-2 text-center">
                        {{ $equipping }}
                        <!-- 隠し要素 -->
                        <input type="hidden" name="equippings[{{ $index }}][type]" value="{{ $equipping }}">
                        <input type="hidden" name="equippings[{{ $index }}][id]" value="{{ $character->equippings[$index]->id ?? '' }}">
                    </td>
                    <td class="p-1 pt-2 text-center" id="equip_name">
                        <input type="text"
                         class="equip_name num-input border border-gray-300 rounded focus:outline-none focus:bg-white"
                         name="equippings[{{ $index }}][name]" placeholder="装備品名" value="{{ $character->equippings[$index]->name ?? '' }}">
                    </td>
                    <td class="p-1 pt-2 text-center" id="{{ $index < 2 ? 'weapon_weight' : 'armor_weight' }}">
                        <input type="number"
                         class="num-input border border-gray-300 rounded focus:outline-none focus:bg-white"
                         name="equippings[{{ $index }}][weight]" value="{{ $character->equippings[$index]->weight ?? '' }}">
                    </td>
                    <td class="p-1 pt-2 text-center" id="equip_accuracy">
                        <input type="number"
                         class="num-input border border-gray-300 rounded focus:outline-none focus:bg-white"
                         name="equippings[{{ $index }}][accuracy_correction]" value="{{ $character->equippings[$index]->accuracy_correction ?? '' }}">
                    </td>
                    <td class="p-1 pt-2 text-center" id="equip_power">
                        <input type="number"
                         class="num-input border border-gray-300 rounded focus:outline-none focus:bg-white"
                         name="equippings[{{ $index }}][power]" value="{{ $character->equippings[$index]->power ?? '' }}">
                    </td>
                    <td class="p-1 pt-2 text-center" id="equip_avoid">
                        <input type="number"
                         class="num-input border border-gray-300 rounded focus:outline-none focus:bg-white"
                         name="equippings[{{ $index }}][avoid_correction]" value="{{ $character->equippings[$index]->avoid_correction ?? '' }}">
                    </td>
                    <td class="p-1 pt-2 text-center" id="equip_physical_defense">
                        <input type="number"
                         class="num-input border border-gray-300 rounded focus:outline-none focus:bg-white"
                         name="equippings[{{ $index }}][physical_defense]" value="{{ $character->equippings[$index]->physical_defense ?? '' }}">
                    </td>
                    <td class="p-1 pt-2 text-center" id="equip_magic_defense">
                        <input type="number"
                         class="num-input border border-gray-300 rounded focus:outline-none focus:bg-white"
                         name="equippings[{{ $index }}][magic_defense]" value="{{ $character->equippings[$index]->magic_defense ?? '' }}">
                    </td>
                    <td class="p-1 pt-2 text-center" id="equip_action">
                        <input type="number"
                         class="num-input border border-gray-300 rounded focus:outline-none focus:bg-white"
                         name="equippings[{{ $index }}][action_correction]" value="{{ $character->equippings[$index]->action_correction ?? '' }}">
                    </td>
                    <td class="p-1 pt-2 text-center" id="equip_move">
                        <input type="number"
                         class="num-input border border-gray-300 rounded focus:outline-none focus:bg-white"
                         name="equippings[{{ $index }}][move_correction]" value="{{ $character->equippings[$index]->move_correction ?? '' }}">
                    </td>
                    <td class="p-1 pt-2 text-center" id="equip_range">
                        <input type="number"
                         class="num-input border border-gray-300 rounded focus:outline-none focus:bg-white"
                         name="equippings[{{ $index }}][range]" value="{{ $character->equippings[$index]->range ?? '' }}">
                    </td>
                    <tr>
                        <td class="px-1 pb-2 text-center" colspan="1"></td>
                        <td class="px-1 pb-2 text-center" colspan="10" id="equip_remarks">
                            <textarea rows="1"
                             class="equip_remarks border border-gray-300 rounded focus:outline-none focus:bg-white"
                             name="equippings[{{ $index }}][remarks]" placeholder="備考">{{ $character->equippings[$index]->remarks ?? '' }}</textarea>
                        </td>
                    </tr>
                </tr>
            </tbody>
        @endforeach
        <thead>
            <tr class="bg-gray-200 text-gray-600 leading-normal">
                <th class="py-3 text-center" colspan="1"></th>
                <th class="py-3 text-center" colspan="2">
                    <div class="dounble_weight">武器重量</div>
                    <div class="dounble_weight">防具重量</div>
                </th>
                <th class="py-3 text-center" colspan="1">命中修正</th>
                <th class="py-3 text-center" colspan="1">攻撃力</th>
                <th class="py-3 text-center" colspan="1">回避修正</th>
                <th class="py-3 text-center" colspan="1">物理防御力</th>
                <th class="py-3 text-center" colspan="1">魔法防御力</th>
                <th class="py-3 text-center" colspan="1">行動修正</th>
                <th class="py-3 text-center" colspan="1">移動修正</th>
                <th class="py-3 text-center" colspan="1"></th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-xs font-light hover:bg-gray-200">
            <tr class="border-t border-gray-300">
                <td class="py-3 text-center" colspan="1">合計</th>
                <td class="py-3 text-center" colspan="2">
                    <div class="dounble_weight">
                        <span id="total_weapon_weight">0</span>
                    </div>
                    <div class="dounble_weight">
                        <span id="total_armor_weight">0</span>
                    </div>
                </td>
                <td class="py-3 text-center" colspan="1" id="total_accuracy">0</td>
                <td class="py-3 text-center" colspan="1" id="total_power">0</td>
                <td class="py-3 text-center" colspan="1" id="total_avoid">0</td>
                <td class="py-3 text-center" colspan="1" id="total_physical_defense">0</td>
                <td class="py-3 text-center" colspan="1" id="total_magic_defense">0</td>
                <td class="py-3 text-center" colspan="1" id="total_action">0</td>
                <td class="py-3 text-center" colspan="1" id="total_move">0</td>
                <td class="py-3 text-center" colspan="1"></td>
            </tr>
        </tbody>
    </table>

</div>

<style>
.field_title {
    font-size: 13px !important;
    letter-spacing: 3px;
}
.equip_type {
    font-weight: bold;
}
.equip_name {
    width: 100% !important;
}
.equip_remarks {
    width: 100% !important;
}
.dounble_weight {
    width: 50%;
    float: left;
    text-align: center;
}
</style>

<script>
function toggleEpuipFields() {
    var tbody = document.querySelector('.equip_fields');
    if (tbody.style.display === 'none') {
        tbody.style.display = '';
    } else {
        tbody.style.display = 'none';
    }
}

function calculateTotals() {
    let totalWeaponWeight = 0;
    let totalArmorWeight = 0;
    let totalAccuracy = 0;
    let totalPower = 0;
    let totalAvoid = 0;
    let totalPhysicalDefense = 0;
    let totalMagicDefense = 0;
    let totalAction = 0;
    let totalMove = 0;
    document.querySelectorAll('.equips').forEach((equip, index) => {
        let weaponWeight = 0;
        let armorWeight = 0;
        if (index < 2) {
            weaponWeight = parseFloat(equip.querySelector('#weapon_weight input').value) || 0;
        } else {
            armorWeight = parseFloat(equip.querySelector('#armor_weight input').value) || 0;
        }
        const accuracy = parseFloat(equip.querySelector('#equip_accuracy input').value) || 0;
        const power = parseFloat(equip.querySelector('#equip_power input').value) || 0;
        const avoid = parseFloat(equip.querySelector('#equip_avoid input').value) || 0;
        const physicalDefense = parseFloat(equip.querySelector('#equip_physical_defense input').value) || 0;
        const magicDefense = parseFloat(equip.querySelector('#equip_magic_defense input').value) || 0;
        const action = parseFloat(equip.querySelector('#equip_action input').value) || 0;
        const move = parseFloat(equip.querySelector('#equip_move input').value) || 0;
        const range = parseFloat(equip.querySelector('#equip_range input').value) || 0;
        totalWeaponWeight += weaponWeight;
        totalArmorWeight += armorWeight;
        totalAccuracy += accuracy;
        totalPower += power;
        totalAvoid += avoid;
        totalPhysicalDefense += physicalDefense;
        totalMagicDefense += magicDefense;
        totalAction += action;
        totalMove += move;
    });
    document.getElementById('total_weapon_weight').textContent = totalWeaponWeight;
    document.getElementById('total_armor_weight').textContent = totalArmorWeight;
    document.getElementById('total_accuracy').textContent = totalAccuracy;
    document.getElementById('total_power').textContent = totalPower;
    document.getElementById('total_avoid').textContent = totalAvoid;
    document.getElementById('total_physical_defense').textContent = totalPhysicalDefense;
    document.getElementById('total_magic_defense').textContent = totalMagicDefense;
    document.getElementById('total_action').textContent = totalAction;
    document.getElementById('total_move').textContent = totalMove;
}

const equipInputs = document.querySelectorAll('.equips input');
equipInputs.forEach(input => {
    input.addEventListener('input', calculateTotals);
});

function resize(){
    var textareas = document.getElementsByClassName("equip_remarks");
    for (var i = 0; i < textareas.length; i++) {
        var textarea = textareas[i];
        var tval = textarea.value;
        var num = tval.match(/\n|\r\n/g);

        if (tval == ""){
            textarea.style.height = "2.1em";
            continue;
        }
        if (num != null){
            var len = num.length + 1;
        } else {
            return;
        }
        len = len + 1;
        if (len == 2){
            continue;
        }
        textarea.style.height = len * 1.4 + "em";
    }
}
var textareas = document.getElementsByClassName("equip_remarks");
for (var i = 0; i < textareas.length; i++) {
    textareas[i].addEventListener("input", resize);
}
</script>