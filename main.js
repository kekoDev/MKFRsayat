function escapeHtml(text) {
    return text.toString()
        .replace(/&/g, "&amp;")
        .replace(/</g, "&lt;")
        .replace(/>/g, "&gt;")
        .replace(/"/g, "&quot;")
        .replace(/'/g, "&#039;");
}
function errorkeko(msg) {
    document.getElementById("error").innerText = escapeHtml(msg)
    window.setTimeout(function () {
        document.getElementById("error").innerText = "";
    }, 6000);
}
function spinner_keko(id) {
    document.getElementById(id).innerHTML = `<center><div class="spinner-border" style="color: #35ace0;width: auto; height: auto;" role="status">
            <span class="sr-only">Loading...</span>
          </div><br><br><h3>جاري الارسال ..</h3></center>`;
}
function send_keko(username) {
    var text = document.getElementById("textareakeko").value;
    if (!text){
        alert("لا يوجد نص");
        return 0;
    }
    document.getElementById("error").innerText = "";
    var sendbkeko = document.getElementById("sendbkeko").innerHTML;
    spinner_keko("sendbkeko");
    $.post("https://sayat.keko.dev/api.php?username="+encodeURIComponent(username)+"&text=" + encodeURIComponent(text), function (data) {
        if (data) {
            var keko = JSON.parse(data);
            if (keko.ok) {
                document.getElementById("textareakeko").value = "";
                document.getElementById("content").innerHTML =  document.getElementById("content").innerHTML + `<div class="alert alert-success show" role="alert">
                `+ escapeHtml(keko.msg) + `
                </div>`;
                document.getElementById("sendbkeko").innerHTML = sendbkeko;
                window.setTimeout(function () {
                    $(".alert").fadeTo(500, 0).slideUp(500, function () {
                        $(this).remove();
                    });
                }, 6000);
            } else {
                document.getElementById("sendbkeko").innerHTML = sendbkeko;
                errorkeko(escapeHtml(keko.msg))
            }
        }
    });
}
