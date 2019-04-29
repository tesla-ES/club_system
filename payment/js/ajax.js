function testPass(id,type,year,receipt_no,employee,session_user) {

    var creds = "id="+id+"&type="+type+"&year="+year+"&receipt_no="+receipt_no+"&employee="+employee+"&session_user="+session_user;
    var ajx = new XMLHttpRequest;
    ajx.open("POST", "printer_log.php", true);
    ajx.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    ajx.send(creds);

    alert("  „  ”ÃÌ· ÿ»«⁄Â «·ﬂ«—‰ÌÂ ");

    ajx.onreadystatechagne = function () {
        if (ajx.readyState == 4 && ajx.status == 200) {
            // document.getElementById("message").innerHTML = ajx.responseText;
            alert("ok");
        }
    };
    window.opener.document.getElementById("card_printed").value = parseInt(window.opener.document.getElementById("card_printed").value)+1;
    window.close();
}

function ivite_printed(id,type,year,receipt_no,employee,session_user) {

    var creds = "id="+id+"&type="+type+"&year="+year+"&receipt_no="+receipt_no+"&employee="+employee+"&session_user="+session_user;
    var ajx = new XMLHttpRequest;
    ajx.open("POST", "invite_print_log.php", true);
    ajx.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    ajx.send(creds);

    alert("  „  ”ÃÌ· ÿ»«⁄Â ﬂ«—  «·œ⁄ÊÂ ");

    ajx.onreadystatechagne = function () {
        if (ajx.readyState == 4 && ajx.status == 200) {
            // document.getElementById("message").innerHTML = ajx.responseText;
            alert("ok");
        }
    };
    window.opener.document.getElementById("invitation_printed").value = parseInt(window.opener.document.getElementById("invitation_printed").value)+1;
    window.close();
}
var map =
    [
        "&\#1632;","&\#1633;","&\#1634;","&\#1635;","&\#1636;",
        "&\#1637;","&\#1638;","&\#1639;","&\#1640;","&\#1641;"
    ]
function replaceDigits()
{
    //alert("1111");
    for (index = 0; index < document.getElementsByClassName("raplace").length; ++index) {
        document.getElementsByClassName("raplace")[index].innerHTML=document.getElementsByClassName("raplace")[index].innerHTML.replace(	/\d(?=[^<>]*(<|$))/g,function($0) { return map[$0] });
    }
}


/*
function getData() {
        var xmlHttp = createXMLHttp(success, error);
        xmlHttp.open('POST', 'printer_log.php', true);
        xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        var username ="1";
        var passwrd = "1";
        var creds = "uname="+username+"&passwd="+passwrd;
        xmlHttp.send(creds);
        xmlHttp.onreadystatechange = function() {
            if (xmlHttp.readyState === 4) {
                if (xmlHttp.status === 200) {
                    success.call(null, xmlHttp.responseText);
                    alert(xmlHttp.responseText);
                } else {
                    error.call(null, xmlHttp.responseText);
                }
            } else {
                //still processing
            }
        };
    }


function createXMLHttp() {
    //If XMLHttpRequest is available then using it
    if (typeof XMLHttpRequest !== undefined) {
        return new XMLHttpRequest;
        //if window.ActiveXObject is available than the user is using IE...so we have to create the newest version XMLHttp object
    } else if (window.ActiveXObject) {
        var ieXMLHttpVersions = ['MSXML2.XMLHttp.5.0', 'MSXML2.XMLHttp.4.0', 'MSXML2.XMLHttp.3.0', 'MSXML2.XMLHttp', 'Microsoft.XMLHttp'],
            xmlHttp;
        //In this array we are starting from the first element (newest version) and trying to create it. If there is an
        //exception thrown we are handling it (and doing nothing ^^)
        for (var i = 0; i < ieXMLHttpVersions.length; i++) {
            try {
                xmlHttp = new ActiveXObject(ieXMLHttpVersions[i]);
                return xmlHttp;
            } catch (e) {
            }
        }
    }
}


*/

function send_post(path, params, method) {
    method = method || "post"; // Set method to post by default if not specified.

    // The rest of this code assumes you are not using a library.
    // It can be made less wordy if you use one.
    var form = document.createElement("form");
    form.setAttribute("method", method);
    form.setAttribute("action", path);
    form.target='_blank';

    for(var key in params) {
        if(params.hasOwnProperty(key)) {
            var hiddenField = document.createElement("input");
            hiddenField.setAttribute("type", "hidden");
            hiddenField.setAttribute("name", key);
            hiddenField.setAttribute("value", params[key]);

            form.appendChild(hiddenField);
        }
    }

    document.body.appendChild(form);
    form.submit();
//using   ---   send_post('/contact/', {name: 'Johnny Bravo'});
}