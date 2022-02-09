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
        window.location.href = 'stats.php?q=' + obj + '&alpha=u&mode=1';
    } else if (cmd == 'footd') {
        window.location.href = 'stats.php?q=' + obj + '&alpha=d&mode=1';
    } else if (cmd == 'footl') {
        window.location.href = 'stats.php?q=' + obj + '&alpha=l&mode=1';
    } else if (cmd == 'footr') {
        window.location.href = 'stats.php?q=' + obj + '&alpha=r&mode=1';
    }
    return false;
}
