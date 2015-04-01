<!DOCTYPE html>
<!--
JsOffice
Un bureau virtuel réalisé en HTML5/CSS3/Js ecma5
-->
<html>
    <head>
        <meta charset="utf-8">
        <title>JsOffice</title>
        <link rel="shortcut icon" type="img/ico" href="assets/images/favicon.ico">

        <!-- Pour le chargement de la page -->
        <script src="assets/js/pace.js"></script>
        <link href="assets/css/pace_style.css" rel="stylesheet" >
        
        <!--Liens css-->
        <!--<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">-->
        <link href="assets/css/mystyle.css" rel="stylesheet">
        <link href="assets/css/textEditor_style.css" rel="stylesheet">
        <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/themes/smoothness/jquery-ui.css" rel="stylesheet">
        <link href="http://www-info.iut2.upmf-grenoble.fr/intranet/enseignements/M4103C/projet/style.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/font/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/calculatrice.css">
        <link rel="stylesheet" href="assets/jstree/dist/themes/default/style.min.css">
    </head>
    <body>

        <!--Tout les liens javascript, à ajouter dans le bone ordre-->
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
        <script src = "assets/js/main.js" ></script>
        <!-- Tout le javascript de l'éditeur de texte-->
        <script src="assets/js/textEditor.js"></script>
        <!-- Toutes les fonctions js qui permettent de faire des accès ajax à la BDD et sauvegarder/récupérer des données-->
        <script src="assets/js/the_saver.js"></script>

        <div id="jsOffice" >
            <h1>JsOffice</h1>

            <div id="kernel">
                <!-- Partie de gauche : l'accordéon -->
                <div id="leftSide" >
                    <div id="accordion">
                    </div>
                </div>

                <!-- Partie de droite: le reste -->
                <div id="rightSide" >
                    <div id="tabs">
                        <ul id="tabs_list">
                            <li><a href="#tabs-1"> fichier.html </a> <span class="ui-icon ui-icon-close" role="presentation">Remove Tab</span> </li>
                        </ul>
                        <div id="tabs-1">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>


