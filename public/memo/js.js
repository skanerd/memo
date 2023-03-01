// new 空白確認

var blankCheck = function() {
    if (document.getElementById('new-memo').value.length == 0) {
        alert('メモを入力してください。');
        return false;
    }
}
