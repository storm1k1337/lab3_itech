var ajax = new XMLHttpRequest();

function get(form, selectName ,adress, updateFunction){
    if (!ajax) {
        alert("Ошибка инициализации AJAX"); 
        return;
    }

    let val, params, url;

    if(form !== null) {
        val = document.getElementById(form).value;
        params = selectName + '=' + encodeURIComponent(val);
        url = adress + "?" + params;
    }
    else {
        url = adress;
    }

    ajax.onreadystatechange = updateFunction;
    ajax.open("GET", url, true);
    ajax.send(null);
}

function UpdateSelect1() {
    if (ajax.readyState == 4) {
        if (ajax.status == 200) {
            var select = document.getElementById('result');
            let names = JSON.parse(ajax.responseText);

            let str = 'Result:<br><br>';
            str += "<ol>";
            for (let i = 0; i < names.length; i++)
                str += '<li>' + names[i].netname + '</li>';
            str += "</ol>";

            select.innerHTML = str;
        }
        else alert(ajax.status + " - " + ajax.statusText);
        ajax.abort();
    }
}

function UpdateSelect2() {
    if (ajax.readyState == 4) {
        if (ajax.status == 200) {
            var select = document.getElementById('result');
            let names = ajax.responseXML.firstChild.children;

            let str = 'Result:<br><br>';
            str += "<ol>";
            for (let i = 0; i < names.length; i++)
                str += '<li>' + names[i].textContent + '</li>';
            str += "</ol>";

            select.innerHTML = str;
        }
        else alert(ajax.status + " - " + ajax.statusText);
        ajax.abort();
    }
}

function UpdateSelect3() {
    if (ajax.readyState == 4) {
        if (ajax.status == 200) {
            var select = document.getElementById('result');
            select.innerHTML = 'Result:<br><br>' + ajax.responseText;
        }
        else alert(ajax.status + " - " + ajax.statusText);
        ajax.abort();
    }
}