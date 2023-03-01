// login 空白確認

function loginCheck() {
    if (document.getElementById("login-email").value == "") {
        alert("IDを入力してください。");
        return false;
    }
    if (document.getElementById("login-password").value == "") {
        alert("PWを入力してください。");
        return false;
    }
};





// register
// メールアドレスやパスワード、名前欄が空白だと、DBに登録するんじゃなく、警告を出す。


// root 1 - fail

// function inputCheck() {
//     if (document.getElementById("register-email").value == "") {
//         alert("IDを入力してください。");
//         return false;
//     }
//     if (document.getElementById("register-password").value == "") {
//         alert("PWを入力してください。");
//         return false;
//     }
//     if (document.getElementById("register-name").value == "") {
//         alert("名前を入力してください。");
//         return false;
//     }
// }



// root 2 - fail

// function signInCheck() {
//     var sign = document.getElementById("register-email")
//     if (!sign.id.value == "") {
//         alert('IDを入力してください。');
//         sign.id.value = "";
//         sign.id.focus();
//         return false;
//     }
// }



// root 3 - fail

// document.querySelector('form').addEventListener('submit', function(e) {
//     if (document.getElementById('register-email').value == '') {
//         e.preventDefault() // 提出されないように！
//         alert('IDを入力してください。')} 
//     if (document.getElementById('register-password').value == '') {
//         e.preventDefault()
//         alert('PWを入力してください。')}
//     if (document.getElementById('register-name').value == '') {
//         e.preventDefault()
//         alert('名前を入力してください。')
//     }
//     if (document.getElementById('register-password').value.length < 6) {
//         e.preventDefault()
//         alert('PWは6文字以上にしてください。')
//     }
// });



// root 4 - fail

// $("$submit").click(function() {
//     if ($("$register-name").val() == '') {
//         alert('名前を入力してください！')
//         return false
//     }
// });



// root 5 - success!

var formChecker = function() {
    if (document.getElementById('register-email').value.length == 0) {
        alert('emailを入力してください。');
        return false;
    }

    if (document.getElementById('register-password').value.length == 0) {
        alert('passwordを入力してください。');
        return false;
    }

    if (document.getElementById('register-name').value.length == 0) {
        alert('名前を入力してください。');
        return false;
    }
}
