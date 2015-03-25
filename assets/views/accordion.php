<!-- L'accordeon contient aussi le JsTree ! -->
<div>
    <h3>HomeDir</h3>
    <div id="container">
        <ul>
            <li data-jstree='{ "selected" : true, "opened" : true }'>Root node
                <ul>
                    <li class="openable" >Child node 1</li>
                    <li class="openable">Child node 2</li>
                </ul>
            </li>
        </ul>
    </div>
    <script>
        $('#container').jstree();
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
    <div>
        <p>HAHAHAHAHAHHA</p>
    </div>
</div>
<div>
    <h3>Jeu</h3>
    <div>
        <p>HAHAHAHAHAHHA</p>
    </div>
</div>


