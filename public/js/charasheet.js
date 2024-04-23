document.getElementById('charasheet_form').addEventListener('submit', function(event) {
    if (!validateCharasheetForm()) {
        event.preventDefault();
    }
});

function validateCharasheetForm() {
    var chara_name = document.getElementById('name').value;
    var tribe = document.getElementById('tribe_id').value;
    var main_class = document.getElementById('main_class_id').value;
    var support_class = document.getElementById('support_class_id').value;

    if (chara_name === '' || tribe === '' || main_class === '' || support_class === '') {
        alert('必須項目が入力されていません');
        return false;
    }
    return true;
}