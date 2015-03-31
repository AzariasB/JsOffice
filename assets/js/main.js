
$(document).ready(function() {

    /*
     * Toutes les variables correspondant aux parties de la DOM
     */
    var m_tabs = $("#tabs"),
            tabContent = $("#accordion"),
            tabTemplate = "<li><a href='#{href}'>#{label}</a> <span class='ui-icon ui-icon-close' role='presentation'>Remove Tab</span></li>",
            tabCounter;

    /*
     * Ici, on charge les différentes parties du document
     * Comme ça on a pas un index.php tout moche et incompréhensible
     */
    $(function() {
        //Chargement de l'éditeur de texte
        $('#tabs-1').load(window.location.pathname + 'assets/views/textEditor.php', function() {
            initDoc();
        });
        //Chargement de l'accordeon latéral
        $('#accordion').
                load(window.location.pathname + 'assets/views/accordion.php', function() {
                    setUpAccordion();
                });

        //Gère les tabs du menu
        tabCounter = 2;
        m_tabs
                .tabs({
                    event: "click",
                    activate: function(event, ui) {
                        setTimeout(function() {
                            //On prévient qu'on change d'éditeur de texte, après avoir chargé celui-ci
                            // Si ce n'a pas déjà été fait
                            changeDoc($(ui.newPanel.selector).find("div[id*='textBox']").attr('id'));
                        }, 100);

                    }
                })
                .delegate("span.ui-icon-close", "click", function() {
                    var panelId = $(this).closest("li").remove().attr("aria-controls");
                    $("#" + panelId).remove();
                    m_tabs.tabs("refresh");
                });

        //On met un petit laps de temps pour pouvoir apprécier le chargement :)

     //   setTimeout(function() {
            $('#jsOffice').show();
    //    }, 500);
    });

    function setUpAccordion() {
        //L'accordéon en lui-même
        $('#accordion')
                .accordion({
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

        //Les documents JsTree qui doivent  ouvrir des tabs
        $(document.body).on('click', '.openable', function() {
            addTab($(this));
        });

        //Dès que le jsTree est modifié, on enregistre
        $('#tree').on('rename_node.jstree move_node.jstree delete_node.jstree create_node.jstree set_text.jstree',
                function(e, data) {
                    save_jsTree();
                });

        //Dès qu'on créer un fichier => celui-ci est la classe 'openable' pour pouvoir l'ouvrir
        $('#tree').on('create_node.jstree',
                function(e, data) {
                    if (data.node.type === "file") {
                        data.node.a_attr.class = "openable";

                    }
                });
    }


    function addTab(tabTitle) {
        //Si la tab exist déjà, on change d'index pour aller vers lui
        var trouve = false;
        $(m_tabs.find('#tabs_list>li')).each(function(index) {
            if ($(this).children('a').text() === $(tabTitle).text()) {
                trouve = true;
                //Faire en sorte que quand on change de tab, on change l'éditeur de text aussi
                m_tabs.tabs({active: index});
            }
        });

        //Sinon on en créé un nouveau
        if (!trouve) {
            var label = $(tabTitle).text() || "Tab " + tabCounter,
                    id = "tabs-" + tabCounter,
                    li = $(tabTemplate.replace(/#\{href\}/g, "#" + id).replace(/#\{label\}/g, label)),
                    tabContentHtml = tabContent.val() || "Tab " + tabCounter + " content.";
            m_tabs.find(".ui-tabs-nav").append(li);
            m_tabs.append("<div id='" + id + "'></div>");
            m_tabs.tabs("refresh");
            //On focus sur le tab que l'on vient de créer
            $("#tabs").tabs({
                active: tabCounter - 1
            });
            var editorId = '#' + id;
            $(editorId).load(window.location.pathname + 'assets/views/textEditor.php', function() {
                $(editorId).find('#textBox').attr('id', 'textBox-' + (tabCounter - 1));
                changeDoc("textBox-" + (tabCounter - 1));
            });
            tabCounter++;
        }

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

//       _      ____   __  __ _          
//      | |    / __ \ / _|/ _(_)         
//      | |___| |  | | |_| |_ _  ___ ___ 
//  _   | / __| |  | |  _|  _| |/ __/ _ \
// | |__| \__ \ |__| | | | | | | (_|  __/
//  \____/|___/\____/|_| |_| |_|\___\___|
//
// By Pierre & Azarias