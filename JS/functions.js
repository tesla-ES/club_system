function doPreview(form_id,action)
{
    form=document.getElementById(form_id);
    form.target='_blank';
    form.action=action;
    form.submit();
}

function post(path) {
    alert(path);
}

function send_post(path, params, method,windowWidth,windowHight) {
    method = method || "post"; // Set method to post by default if not specified.

    // The rest of this code assumes you are not using a library.
    // It can be made less wordy if you use one.
    var form = document.createElement("form");
    form.setAttribute("method", method);
    form.setAttribute("action", path);
    form.target='result';
    form.onsubmit=window.open('','result','width='+windowWidth+',height='+windowHight );

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

function textCounter(field,field2,maxlimit)
{
    if(typeof field == 'string')
    {
        field=document.getElementById(field);
    }
    var countfield = document.getElementById(field2);
    if ( field.value.length > maxlimit ) {
        field.value = field.value.substring( 0, maxlimit );
        return false;
    } else {
        countfield.value = maxlimit - field.value.length;
    }
}




