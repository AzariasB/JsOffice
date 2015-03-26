

var oDoc, sDefTxt;

function initDoc() {
    oDoc = document.getElementById("textBox");
    sDefTxt = oDoc.innerHTML;
    if (document.compForm.switchMode.checked) {
        setDocMode(true);
    }

}

/**
 *  Quand on change de tab, il faut changer certains paramètres de l'éditeur de texte
 * @param {string} idTexBox l'id de la nouvelle TextBox que l'on va éditer
 * @returns {undefined}
 */
function changeDoc(idTexBox){
    oDoc = document.getElementById(idTexBox);
    sDefTxt = oDoc.innerHTML;
    return;
}

function formatDoc(sCmd, sValue) {
    if (validateMode()) {
        document.execCommand(sCmd, false, sValue);
        oDoc.focus();
    }
}

function validateMode() {
    if (!document.compForm.switchMode.checked) {
        return true;
    }
    alert("Uncheck \"Show HTML\".");
    oDoc.focus();
    return false;
}

function setDocMode(bToSource) {
    var oContent;
    if (bToSource) {
        oContent = document.createTextNode(oDoc.innerHTML);
        oDoc.innerHTML = "";
        var oPre = document.createElement("pre");
        oDoc.contentEditable = false;
        oPre.id = "sourceText";
        oPre.contentEditable = true;
        oPre.appendChild(oContent);
        oDoc.appendChild(oPre);
    } else {
        if (document.all) {
            oDoc.innerHTML = oDoc.innerText;
        } else {
            oContent = document.createRange();
            oContent.selectNodeContents(oDoc.firstChild);
            oDoc.innerHTML = oContent.toString();
        }
        oDoc.contentEditable = true;
    }
    oDoc.focus();
}

function printDoc() {
    if (!validateMode()) {
        return;
    }
    var oPrntWin = window.open("", "_blank", "width=450,height=470,left=400,top=100,menubar=yes,toolbar=no,location=no,scrollbars=yes");
    oPrntWin.document.open();
    oPrntWin.document.write("<!doctype html><html><head><title>Print<\/title><\/head><body onload=\"print();\">" + oDoc.innerHTML + "<\/body><\/html>");
    oPrntWin.document.close();
}