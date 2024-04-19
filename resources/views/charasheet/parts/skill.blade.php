<div class="bg-white shadow-md rounded my-6">
    <table class="min-w-max w-full table-auto">
        <thead>
            <tr class="bg-gray-400 text-gray-700 leading-normal">
                <th class="field_title w-2/3 text-center">所持スキル一覧</th>
                <th class="py-3 text-center">
                    <button type="button" onclick="toggleSkillFields()">表示切替</button>
                </th>
                <th class="py-3 text-center">
                    <button type="button" onclick="addSkillField()">スキル追加+</button>
                </th>
            </tr>
        </thead>
    </table>
    <table class="min-w-max w-full table-auto skills">
        <thead>
            <tr class="bg-gray-200 text-gray-600 leading-normal">
                <th class="py-3 text-center">名称</th>
                <th class="py-3 text-center">Lv</th>
                <th class="py-3 text-center">タイミング</th>
                <th class="py-3 text-center">判定</th>
                <th class="py-3 text-center">対象</th>
                <th class="py-3 text-center">射程</th>
                <th class="py-3 text-center">コスト</th>
                <th class="py-3 text-center">Lv上限</th>
                <th class="py-3 text-center">取得元</th>
            </tr>
        </thead>
        <tbody class="skills text-gray-600 text-xs font-light hover:bg-gray-200">
            <tr class="border-t border-gray-300">
                <td class="p-1 pt-2 text-center">
                    <input type="text"
                     class="skill_name border border-gray-300 rounded focus:outline-none focus:bg-white"
                     name="skills[0][name]" placeholder="スキル名">
                </td>
                <td class="p-1 pt-2 text-center">
                    <input type="number"
                     class="skill_level num-input border border-gray-300 rounded focus:outline-none focus:bg-white"
                     name="skills[0][level]" min="0">
                </td>
                <td class="p-1 pt-2 text-center">
                    <input type="text"
                     class="skill_timing border border-gray-300 rounded focus:outline-none focus:bg-white"
                     name="skills[0][timing]">
                </td>
                <td class="p-1 pt-2 text-center">
                    <input type="text"
                     class="skill_judge border border-gray-300 rounded focus:outline-none focus:bg-white"
                     name="skills[0][judge]">
                </td>
                <td class="p-1 pt-2 text-center">
                    <input type="text"
                     class="skill_target border border-gray-300 rounded focus:outline-none focus:bg-white"
                     name="skills[0][target]">
                </td>
                <td class="p-1 pt-2 text-center">
                    <input type="text"
                     class="skill_range num-input border border-gray-300 rounded focus:outline-none focus:bg-white"
                     name="skills[0][range]">
                </td>
                <td class="p-1 pt-2 text-center">
                    <input type="number"
                     class="skill_cost num-input border border-gray-300 rounded focus:outline-none focus:bg-white"
                     name="skills[0][cost]">
                </td>
                <td class="p-1 pt-2 text-center">
                    <input type="number"
                     class="skill_level_limit num-input border border-gray-300 rounded focus:outline-none focus:bg-white"
                     name="skills[0][level_limit]">
                </td>
                <td class="p-1 pt-2 text-center">
                    <input type="text"
                     class="skill_source border border-gray-300 rounded focus:outline-none focus:bg-white"
                     name="skills[0][source]">
                </td>
                <tr>
                    <td class="px-1 pb-2 text-center" colspan="8">
                        <textarea rows="1"
                         class="skill_effect border border-gray-300 rounded focus:outline-none focus:bg-white"
                         name="skills[0][effect]" placeholder="効果詳細"></textarea>
                    </td>
                    <td class="px-1 pb-2 text-center" colspan="1">
                        <button type="button" onclick="removeSkillField(this)">削除</button>
                    </td>
                </tr>
            </tr>
        </tbody>
    </table>
</div>

<style>
.field_title {
    font-size: 13px !important;
    letter-spacing: 3px;
}
.skill_name {
    width: 100% !important;
}
.skill_level {
    width: 35px !important;
}
.skill_level_limit {
    width: 35px !important;
}
.skill_timing {
    width: 90px !important;
}
.skill_judge {
    width: 60px !important;
}
.skill_target {
    width: 60px !important;
}
.skill_range {
    width: 60px !important;
}
.skill_effect {
    width: 100% !important;
}
.skill_source {
    width: 90px !important;
}
</style>

<script>
const skillRow = document.querySelector('.text-gray-600.text-xs.font-light.skills').cloneNode(true);
function addSkillField() {
    var skillsContainer = document.querySelector('.min-w-max.w-full.table-auto.skills');
    var newRow = skillRow.cloneNode(true);
    skillsContainer.append(newRow);

    var skillsColumnName = ['name', 'level', 'timing', 'judge', 'target', 'range', 'cost', 'level_limit', 'effect'];
    var skillRows = document.querySelectorAll('.text-gray-600.text-xs.font-light.skills');
    skillRows.forEach((skill, skillIndex) => {
        var inputs = skill.querySelectorAll('input, textarea');

        inputs.forEach((input, inputIndex) => {
            input.setAttribute('name', `skills[${skillIndex}][${skillsColumnName[inputIndex]}]`);
        });
    });
}

function removeSkillField(button) {
    var row = button.closest('tbody');
    var skillRows = document.querySelectorAll('.text-gray-600.text-xs.font-light.skills');
    if (skillRows.length !== 1) {
        row.remove();
    }
}

function toggleSkillFields() {
    var tbody = document.querySelector('.skills');
    if (tbody.style.display === 'none') {
        tbody.style.display = '';
    } else {
        tbody.style.display = 'none';
    }
}

function resize(){
    var textareas = document.getElementsByClassName("skill_effect");
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
var textareas = document.getElementsByClassName("skill_effect");
for (var i = 0; i < textareas.length; i++) {
    textareas[i].addEventListener("input", resize);
}
</script>