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
