function civ(id, bulk)
{
    if (window.XMLHttpRequest) {
        xmlhttp=new XMLHttpRequest();
    } else {
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
            if (bulk !== true) {
                document.location.reload();
            }
        }
    }
    xmlhttp.open("GET","civ.php?id="+id,false);
    xmlhttp.send();
}
function timeTravel(era) {
    var eras = [];
    eras['i'] = -2000;
    eras['ii'] = -1000;
    eras['iii'] = 476;
    eras['iv'] = 1500;
    eras['v'] = 1700;
    eras['vi'] = 1900;
    eras['vii'] = 1950;
    eras['viii'] = 1990;
    eras['ix'] = 2050;
    eras['x'] = 2100;
    set('year', eras[era], true);
}
