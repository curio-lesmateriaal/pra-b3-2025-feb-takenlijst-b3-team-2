document.addEventListener('DOMContentLoaded', function ()
{
    document.getElementById('toggle').addEventListener('click', function ()
    {
        this.classList.toggle('active');

        if (this.classList.contains('active'))
        {
            document.getElementById('login-form').style.display = 'none';
            document.getElementById('register-form').style.display = 'block';
        } else
        {
            document.getElementById('login-form').style.display = 'block';
            document.getElementById('register-form').style.display = 'none';
        }
    });
});
