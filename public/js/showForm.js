function showForm(formName, button)
{
    var form = document.getElementById(formName);
    form.style.display = "block";
    var btn = document.getElementById(button);
    btn.style.display = "none";
}
