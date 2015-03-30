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

        <!-- Pour animer l'écran de chargement -->
        <script src="assets/js/DrawSVGPlugin.min.js"></script>
        <script src="assets/js/TweenMax.min.js"></script>

        <!--Tout les liens javascript, à ajouter dans le bone ordre-->
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script src = "assets/js/main.js" ></script>
        <!-- Tout le javascript de l'éditeur de texte-->
        <script src="assets/js/textEditor.js"></script>
        <!-- Toutes les fonctions js qui permettent de faire des accès ajax à la BDD et sauvegarder/récupérer des données-->
        <script src="assets/js/the_saver.js"></script>

        <div id="jsOffice" hidden="" >
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

        <!-- Div de chargement -->
        <div class="container" id="chargement" >
            <div class="content">
                <div id="container">
                    <svg width="300px" height="200px" viewBox="0 0 187.3 93.7" preserveAspectRatio="xMidYMid meet">
                    <path style="-webkit-filter:url(#f2)" stroke="#ededed" id="outline" fill="none" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="
                          M93.9,46.4c9.3,9.5,13.8,17.9,23.5,17.9s17.5-7.8,17.5-17.5s-7.8-17.6-17.5-17.5c-9.7,0.1-13.3,7.2-22.1,17.1
                          c-8.9,8.8-15.7,17.9-25.4,17.9s-17.5-7.8-17.5-17.5s7.8-17.5,17.5-17.5S86.2,38.6,93.9,46.4z" />
                    <path id="outline-bg" opacity="0.05" fill="none" stroke="#ededed" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="
                          M93.9,46.4c9.3,9.5,13.8,17.9,23.5,17.9s17.5-7.8,17.5-17.5s-7.8-17.6-17.5-17.5c-9.7,0.1-13.3,7.2-22.1,17.1
                          c-8.9,8.8-15.7,17.9-25.4,17.9s-17.5-7.8-17.5-17.5s7.8-17.5,17.5-17.5S86.2,38.6,93.9,46.4z" />
                    </svg>
                </div>
            </div>

            <script>
                (function () {
                    var container = document.getElementById('container');

                    TweenMax.set(['svg'], {
                        position: 'absolute',
                        top: '0',
                        left: '0',
                        xPercent: -50,
                        yPercent: -50
                    })

                    TweenMax.set([container], {
                        position: 'absolute',
                        top: '50%',
                        left: '35%',
                        xPercent: -50,
                        yPercent: -50
                    })

                    var tl = new TimelineMax({
                        repeat: -1
                    });

                    tl.set('#outline', {
                        drawSVG: '0% 0%'
                    })
                            .to('#outline', 0.2, {
                                drawSVG: '11% 25%',
                                ease: Linear.easeNone
                            })
                            .to('#outline', 0.5, {
                                drawSVG: '35% 70%',
                                ease: Linear.easeNone
                            })
                            .to('#outline', 0.9, {
                                drawSVG: '99% 100%',
                                ease: Linear.easeNone
                            })
                })();
            </script>
            <h1 id="titre_chargement" >Chargement</h1>
        </div>
    </body>
</html>


