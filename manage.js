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

function interact(sub, act, obj) {
    var dataString = 'sub=' + sub + '&act=' + act + '&obj=' + obj;
    $.ajax({
        type: "POST",
        url: "interact.php",
        data: dataString,
        cache: false,
        success: function(html) {
            document.location.reload();
        }
    });
    return false;
}

function launch(cmd, obj) {
    if (cmd == 'run') {
        window.location.href = obj;
    } else if (cmd == 'show') {
        window.location.href = obj + '/favicon.png';
    } else if (cmd == 'footu') {
        window.location.href = 'stats.php?q=' + obj + '&v=1&a=u.png';
    } else if (cmd == 'footd') {
        window.location.href = obj + '/footd.png';
    } else if (cmd == 'footl') {
        window.location.href = obj + '/footl.png';
    } else if (cmd == 'footr') {
        window.location.href = obj + '/footr.png';
    }
    return false;
}