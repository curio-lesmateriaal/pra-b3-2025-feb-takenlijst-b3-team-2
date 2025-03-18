document.addEventListener('DOMContentLoaded', function () {

    document.getElementById('toggle').addEventListener('click', function () {
        if (document.getElementById("loginform").style.display = 'flex') {
            document.getElementById('loginform').style.display = 'none';
            document.getElementById('registerform').style.display = 'flex';
        } else if (document.getElementById("loginform").style.display = 'none') {
            document.getElementById('loginform').style.display = 'flex';
            document.getElementById('registerform').style.display = 'none';
        }
    });
});
