//       _      ____   __  __ _          
//      | |    / __ \ / _|/ _(_)         
//      | |___| |  | | |_| |_ _  ___ ___ 
//  _   | / __| |  | |  _|  _| |/ __/ _ \
// | |__| \__ \ |__| | | | | | | (_|  __/
//  \____/|___/\____/|_| |_| |_|\___\___|
//

/*
 * Ici, on charge les différentes parties du document
 * Comme ça on a pas un index.php tout moche et incompréhensible
 */
$(function () {
    //Chargement de l'éditeur de texte
    $('#tabs-1').load(window.location.pathname + 'assets/views/textEditor.php');

    //Chargement de l'accordeon latéral
    $('#accordion').
            load(window.location.pathname + 'assets/views/accordion.php', function () {
                setUpAccordion();
            });

});

// Gère les tabs du menu
$(function () {
    $("#tabs").tabs({
        event: "click"
    });
});

function setUpAccordion() {
    var icons = {
        header: "fa fa-expand",
        activeHeader: "fa fa-compress"
    };

    $('#accordion').accordion({
        header: "div>h3",
        heightStyle: "fill",
        active: false,
        collapsible: true
    })
            .sortable({
                axis: "y",
                handle: "h3",
                stop: function (event, ui) {
                    // IE doesn't register the blur when sorting
                    // so trigger focusout handlers to remove .ui-state-focus
                    ui.item.children("h3").triggerHandler("focusout");

                    // Refresh accordion to handle new order
                    $(this).accordion("refresh");
                }
            });
}

$(document).ready(function () {
    var arr =
            [
                '      _      ____   __  __ _    ',
                '     | |    / __ \\ / _|/ _(_)  ',
                '     | |___| |  | | |_| |_ _  ___ ___ ',
                ' _   | / __| |  | |  _|  _| |/ __/ _ \\ ',
                '| |__| \\__ \\ |__| | | | | | | (_|  __/',
                ' \\____/|___/\\____/|_| |_| |_|\\___\\___|'
            ];
            
    for(var off in arr ){
        console.log(arr[off]);
    }
    console.log('By Pierre & Azarias');
});