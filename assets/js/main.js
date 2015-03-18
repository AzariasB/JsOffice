



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