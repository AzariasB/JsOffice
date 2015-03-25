<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="utf-8">
        <title>JsOffice</title>


        <!--Liens css-->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <link href="assets/css/mystyle.css" rel="stylesheet">
        <link href="assets/css/textEditor_style.css" rel="stylesheet">
        <link href="http://www-info.iut2.upmf-grenoble.fr/intranet/enseignements/M4103C/projet/jquery-ui.css" rel="stylesheet">
        <link href="http://www-info.iut2.upmf-grenoble.fr/intranet/enseignements/M4103C/projet/style.css" rel="stylesheet">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/calculatrice.css">
        <link rel="stylesheet" href="assets/jstree/dist/themes/default/style.min.css">
    </head>
    <body>
        <!--Tout les liens javascript, à ajouter dans le bone ordre-->
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script src = "assets/js/main.js" ></script>
        <script src="assets/js/textEditor.js"></script>
        

        <h1>JsOffice</h1>
        <div id="kernel" >
            <!-- Partie de gauche : l'accordéon -->
            <div id="leftSide" >
                <div id="accordion">
                </div>
            </div>

            <!-- Partie de droite: le reste -->
            <div id="rightSide" >
                <div id="tabs">
                    <ul>
                        <li><a href="#tabs-1"> fichier.html </a> <span class="ui-icon ui-icon-close" role="presentation">Remove Tab</span> </li>
                    </ul>
                    <div id="tabs-1">

                    </div>
                </div>
            </div>
        </div>
    </body>
</html>


