<!-- L'accordeon contient aussi le JsTree ! -->
<div>
    <h3>HomeDir</h3>

    <div id="tree" >
    </div>

    <script src="assets/js/jstree.min.js"></script>
    <script>
        init();
        // création du menu contextuel ouvert sur clic droit
        function createmenu(node)
        {
            var tree = $("#tree").jstree(true);
            return {
                "item1":
                        {
                            "label": "Create Directory",
                            "action": function()
                            {
                                node = tree.create_node(node);
                                tree.edit(node);
                            }
                        },
                "item2":
                        {
                            "label": "Create File",
                            "action": function()
                            {
                                node = tree.create_node(node, {"type": "file"});
                                tree.edit(node);
                            }
                        },
                "item3":
                        {
                            "label": "Rename",
                            "action": function(obj)
                            {
                                tree.edit(node);
                            }
                        },
                "item4":
                        {
                            "label": "Remove",
                            "action": function(obj)
                            {
                                tree.delete_node(node);
                            }
                        }
            };
        }


        function init()
        {
            // initialisation de l'arbre
            $('#tree').jstree({
                'core': {
                    "animation": 10,
                    "check_callback": true,
                    "themes": {"stripes": true},
                    'data': {"url": "./assets/js/data/root.json", "dataType": "json"}// needed only if you do not supply JSON headers,
                },
                "types": {
                    "#": {"max_children": 1, "max_depth": 4, "valid_children": ["root"]},
                    "root": {'icon': "./assets/images/folder.png", "valid_children": ["default"]},
                    "default": {'icon': "./assets/images/folder.png", "valid_children": ["default", "file"]},
                    "file": {'icon': "./assets/images/blog.png", "valid_children": []}
                },
                "plugins": ["contextmenu", "dnd", "state", "types", "wholerow"],
                "contextmenu": {"items": createmenu},
            });
        }
    </script>
</div>
<div>
    <h3>Calculatrice</h3>
    <div>
        <div id="calc">
            <div id="ligne_affichage">
                <input name="zone_affichage" id="zone_affichage" type="text" ondblclick="move()" >
            </div>
            <div class="ligne_boutons">
                <input class="bouton_classique" value="MC" type="button" onclick="raz_memory()" >
                <input id="MR" class="bouton_classique" value="MR" type="button" onclick="affiche_memory()">
                <input class="bouton_classique" value="MS" type="button" onclick="range_memory()">
                <input class="bouton_classique" value="+-" type="button" onclick="plusmoins()" >
                <input id="libre1" class="bouton_simple bouton_libre" value=" " type="button">
            </div>
            <div class="ligne_boutons">
                <input class="bouton_classique" value="CE" type="button" onclick="rab()" >
                <input class="bouton_classique bouton_simple" value="(" type="button">
                <input class="bouton_classique bouton_simple" value=")" type="button">
                <input class="bouton_classique bouton_simple" value="/" type="button">
                <input id="libre2" class="bouton_simple bouton_libre" value=" " type="button">
            </div>
            <div class="ligne_boutons">
                <input class="bouton_classique bouton_simple" value="7" type="button">
                <input class="bouton_classique bouton_simple" value="8" type="button">
                <input class="bouton_classique bouton_simple" value="9" type="button">
                <input class="bouton_classique bouton_simple" value="*" type="button">
                <input id="libre3" class="bouton_simple bouton_libre" value=" " type="button">
            </div>
            <div class="ligne_boutons">
                <input class="bouton_classique bouton_simple" value="4" type="button">
                <input class="bouton_classique bouton_simple" value="5" type="button">
                <input class="bouton_classique bouton_simple" value="6" type="button">
                <input class="bouton_classique bouton_simple" value="-" type="button">
                <input id="libre4" class="bouton_simple bouton_libre" value=" " type="button">
            </div>
            <div class="ligne_boutons">
                <input class="bouton_classique bouton_simple" value="1" type="button">
                <input class="bouton_classique bouton_simple" value="2" type="button">
                <input class="bouton_classique bouton_simple" value="3" type="button">
                <input class="bouton_classique bouton_simple" value="+" type="button">
                <input id="libre5" class="bouton_simple bouton_libre" value=" " type="button">
            </div>
            <div class="ligne_boutons">
                <input class="bouton_classique bouton_simple" value="0" type="button">
                <input id="E" class="bouton_classique" value="E" onclick="mode_edition()" type="button">
                <input class="bouton_classique bouton_simple" value="." type="button">
                <input class="bouton_classique" value="=" onclick="calcul()" type="button">
                <input id="libre6" class="bouton_simple bouton_libre" value=" " type="button">
            </div>
            <strong>constantes et fonctions disponibles</strong> 
            <span draggable="true" id="Math.abs" >Math.abs</span>
            <span draggable="true" id="Math.ceil" >Math.ceil</span> 
            <span draggable="true" id="Math.cos" >Math.cos</span>
            <span draggable="true" id="Math.E" >Math.E</span>
            <span draggable="true" id="Math.exp" >Math.exp</span>
            <span draggable="true" id="Math.floor" >Math.floor</span>
            <span draggable="true" id="Math.log" >Math.log</span>
            <span draggable="true" id="Math.max" >Math.max</span>
            <span draggable="true" id="Math.min" >Math.min</span>
            <span draggable="true" id="Math.PI" >Math.PI</span>
            <span draggable="true" id="Math.pow" >Math.pow</span>
            <span draggable="true" id="Math.round" >Math.round</span >
            <span draggable="true" id="Math.sin" >Math.sin</span>
            <span draggable="true" id="Math.sqrt" >Math.sqrt</span>
        </div>

        <div id="dialog" title="Alert" hidden="" >
            <p id="textContent" ></p>
        </div>

        <script src="assets/js/calculatrice.js"></script>
    </div>
</div>
<div >
    <h3>Calendrier</h3>
    <div id="calendrier">
        <script>
                    $(function() {
                        $("#datepicker").datepicker();
                    });
        </script>
        <div id="datepicker"></div>
    </div>
</div>
<div>
    <h3>Jeu</h3>
    <div id="jeu">
        <table style="margin:0 0 10px 0; width:100%; background:#fff; border:1px solid #F3F3F3;" cellspacing="0" cellpadding="0">
            <tr>
                <td style="font-family:verdana; font-size:11px; color:#000; padding:5px 5px;">
                    <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="640" height="480">
                        <param name="movie" value="http://www.jeuxclic.com/jeux/54c5730da2418.swf">
                        <param name="quality" value="high"></param>
                        <param name="menu" value="false"></param>
                        <embed src="http://www.jeuxclic.com/jeux/54c5730da2418.swf" width="360" height="280" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" menu="false" wmode="direct"></embed>
                    </object>
                </td>
            </tr>
        </table>
    </div>
</div>
<div >
    <h3>Musique</h3>
    <div id="calendrier">
        <iframe width="100%" height="450" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/playlists/43594047&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true"></iframe>
    </div>
</div>
<div>




