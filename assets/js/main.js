//       _      ____   __  __ _          
//      | |    / __ \ / _|/ _(_)         
//      | |___| |  | | |_| |_ _  ___ ___ 
//  _   | / __| |  | |  _|  _| |/ __/ _ \
// | |__| \__ \ |__| | | | | | | (_|  __/
//  \____/|___/\____/|_| |_| |_|\___\___|
//

$(document).ready(function() {

    /*
     * Toutes les variables correspondant aux parties de la DOM
     */
    var tabs = $("#tabs"),
            tabContent = $("#tab_content"),
            tabTemplate = "<li><a href='#{href}'>#{label}</a> <span class='ui-icon ui-icon-close' role='presentation'>Remove Tab</span></li>",
            tabCounter;


    /*
     * Ici, on charge les différentes parties du document
     * Comme ça on a pas un index.php tout moche et incompréhensible
     */
    $(function() {
        $.ajax({async: false});
        //Chargement de l'éditeur de texte
        $('#tabs-1').load(window.location.pathname + 'assets/views/textEditor.php', function() {
            initDoc();
        });
        //Chargement de l'accordeon latéral
        $('#accordion').
                load(window.location.pathname + 'assets/views/accordion.php', function() {
                    setUpAccordion();
                });
    });
// Gère les tabs du menu
    $(function() {
        tabCounter = 1;
        tabs
                .tabs({
                    event: "click"
                })
                .delegate("span.ui-icon-close", "click", function() {
                    var panelId = $(this).closest("li").remove().attr("aria-controls");
                    $("#" + panelId).remove();
                    tabs.tabs("refresh");
                });
    });

    function setUpAccordion() {
        //L'accordéon en lui-même
        $('#accordion').accordion({
            header: "div>h3",
            heightStyle: "fill",
            active: false,
            collapsible: true
        })
                .sortable({
                    axis: "y",
                    handle: "h3",
                    stop: function(event, ui) {
                        // IE doesn't register the blur when sorting
                        // so trigger focusout handlers to remove .ui-state-focus
                        ui.item.children("h3").triggerHandler("focusout");
                        // Refresh accordion to handle new order
                        $(this).accordion("refresh");
                    }
                });

        //Le jsTree qui doit ouvrir des tabs
        $('.openable').bind('click', function() {
            addTab($(this).children('a'));
        });
    }


    function addTab(tabTitle) {
        var label = $(tabTitle).text() || "Tab " + tabCounter,
                id = "tabs-" + tabCounter,
                li = $(tabTemplate.replace(/#\{href\}/g, "#" + id).replace(/#\{label\}/g, label)),
                tabContentHtml = tabContent.val() || "Tab " + tabCounter + " content.";
        tabs.find(".ui-tabs-nav").append(li);
        tabs.append("<div id='" + id + "'><p>" + tabContentHtml + "</p></div>");
        tabs.tabs("refresh");
        tabCounter++;
    }







    /*
     * Bonus
     */
    var arr =
            [
                '      _      ____   __  __ _    ',
                '     | |    / __ \\ / _|/ _(_)  ',
                '     | |___| |  | | |_| |_ _  ___ ___ ',
                ' _   | / __| |  | |  _|  _| |/ __/ _ \\ ',
                '| |__| \\__ \\ |__| | | | | | | (_|  __/',
                ' \\____/|___/\\____/|_| |_| |_|\\___\\___|'
            ];
    for (var off in arr) {
        console.log(arr[off]);
    }
    console.log('By Pierre & Azarias');

});