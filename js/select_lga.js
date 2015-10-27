function get_lga_options(id) {
    document.getElementById('lga_field').innerHTML='<option>Loading...</option>';
    var xmlhttp=GetXmlHttpObject();
    if (xmlhttp==null) {
        alert ("Your browser does not support AJAX!");
        return;
    }
    var date=new Date();
    var timestamp=date.getTime();
    var url="ajax/select_lga.php";
    //var params="state_id="+id+"&timestamp="+timestamp;
    var params="state_id="+id;
    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 || xmlhttp.readyState=="complete") {
            var res=xmlhttp.responseText;
            document.getElementById('lga_field').innerHTML=res;
        }
    }
    xmlhttp.open("POST",url,true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // xmlhttp.setRequestHeader("Content-length", params.length);
    // xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(params);
}
function GetXmlHttpObject() {
    var xmlhttp=null;
    try {
        // Firefox, Opera 8.0+, Safari
        xmlhttp=new XMLHttpRequest();
    }
    catch (e) {
        // Internet Explorer
        try {
            xmlhttp=new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (e) {
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
    }
    return xmlhttp;
}