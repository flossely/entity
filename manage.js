function manage(mode, id, data) {
    var dataString = 'mode=' + mode + '&id=' + id + '&data=' + data;
    $.ajax({
        type: "POST",
        url: "manage.php",
        data: dataString,
        cache: false,
        success: function(html) {
            document.location.reload();
        }
    });
    return false;
}
