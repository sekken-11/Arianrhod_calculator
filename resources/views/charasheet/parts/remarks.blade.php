<div class="bg-white shadow-md rounded my-6">
    <table class="min-w-max w-full table-auto">
        <thead>
            <tr class="bg-gray-400 text-gray-700 leading-normal">
                <th class="field_title w-3/4 text-center">キャラクターについて</th>
                <th class="py-3 text-center">
                    <button type="button" onclick="toggleRemarksFields()">表示切替</button>
                </th>
            </tr>
        </thead>
    </table>
    <table class="remarks_fields min-w-max w-full table-auto">
        <thead>
        </thead>
        <tbody class="skills text-gray-600 text-xs font-light hover:bg-gray-200">
            <tr class="border-t border-gray-300">
                <td class="p-2 text-center">
                    <textarea type="text"
                     rows="8"
                     class="border border-gray-300 rounded focus:outline-none focus:bg-white"
                     name="remarks" id="remarks">{{ $character->remarks ?? '' }}</textarea>
                </td>
            </tr>
        </tbody>
    </table>

</div>

<style>
.field_title {
    font-size: 13px !important;
    letter-spacing: 3px;
}
#remarks {
    width: 100%;
}
</style>

<script>
function toggleRemarksFields() {
    var tbody = document.querySelector('.remarks_fields');
    if (tbody.style.display === 'none') {
        tbody.style.display = '';
    } else {
        tbody.style.display = 'none';
    }
}
</script>