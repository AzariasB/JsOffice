var memory;
var edition = false;
var up = true;
var z_a = $('#zone_affichage');

$(document).ready(function() {
    init();
});



function init() {
    $('.bouton_simple').bind('click', function() {
        affiche(this);
    });
    var donnes = recup_donnee();
    donnes = JSON.parse(donnes);
    for (var index in donnes.fonctions) {
        $('#' + donnes.fonctions[index].id).val(donnes.fonctions[index].val);
    }

    memory = donnes.memoire;
    initDrag();
}


function affiche(todisplay) {
    z_a.val(z_a.val() + todisplay.value);
}

function rab() {
    z_a.val("");
}

function calcul() {
    var toEval = z_a.val();
    toEval.trim();
    try {
        z_a.val(eval(toEval));
        $('');
    } catch (ex) {
        z_a.val("Execption lors du calcul : " + ex);
    }
}

function plusmoins() {
    var monCalcul = z_a.val();
    if (monCalcul.charAt(0) === '-') {
        monCalcul = monCalcul.slice(1, monCalcul.length);
    } else {
        monCalcul = '-' + monCalcul;
    }
    z_a.val(monCalcul)
}


function mode_edition() {
    edition = true;
    $('#E').css("color", "red")
            .bind("click", function() {
                mode_calcul();
            });

    $('.bouton_libre')
            .unbind("click")
            .bind("dblclick", function() {
                edit(this);
            });
}

function mode_calcul() {
    edition = false;
    $('#E')
            .css("color", "black")
            .bind("click", function() {
                mode_edition();
            });

    $('.bouton_libre')
            .unbind("dblclick")
            .attr("type", "button")
            .bind("click", affiche(this));
}

function edit(doubleClicked) {
    $(doubleClicked)
            .attr("type", "text")
            .bind("dblclick", function() {
                fix((this));
            })
            .bind("blur", function() {
                save();
                fix(this);
            });
}

function fix(doubleClicked) {
    save();
    $(doubleClicked)
            .attr("type", "button")
            .unbind("blur")
            .bind("dblclick", function() {
                edit(this);
            });
}


function range_memory() {
    var pattern = /^-?\d+\.?\d*$/;
    var expression = z_a.val();
    expression.trim();

    if (pattern.test(expression)) {
        memory = expression;
        save();
    } else {
        dialog("Il ne s'agit pas d'un calcul");
    }
}

function affiche_memory() {
    if (typeof memory !== 'undefined') {
        z_a.val(z_a.val() + memory);
    }
}

function raz_memory() {
    memory = undefined;
}

function move() {
    var parent = $('#calc');
    var toMove = $('#ligne_affichage');

    if (up) {
        up = false;

        $(parent)
                .append(toMove);
    } else {
        up = true;
        $(parent)
                .prepend(toMove);
    }
}

function initDrag() {
    $('span').draggable({
        containment: "parent",
        cursor: "crosshair",
        revert: true
    });

    $('.bouton_libre').droppable({
        hoverClass: "hover",
        drop: function(event, ui) {
            console.log(ui.draggable.context.textContent);
            $(this)
                    .val(ui.draggable.context.textContent);
        }
    });
}

//Sauvegarde par ajax
function save() {
    $.post("assets/views/server_save.php",
            {
                "data": toJson()
            },
    function(data, status) {
        console.log(data + "\nStatus: " + status);
    });
}

function recup_donnee() {
    var retour;
    $.ajax({
        url: "assets/views/recup_etat.php",
        async: false
    }).done(function(data) {
        retour = data;
    });
    return retour;
}

function toJson() {
    var string = {
        "fonctions": [],
        "memoire": 0
    };

    $('.bouton_libre').each(function(index) {
        string.fonctions[index] = {"id": $(this).attr("id"), "val": $(this).val()};
    });
    console.log(memory);
    string.memoire = (memory === 'undefined' ? "" : memory);

    return JSON.stringify(string);
}

function dialog(text) {
    $("#textContent").text(text);
    $('#dialog').dialog({
        show: {
            effect: "fade",
            duration: 100
        },
        hide: {
            effect: "fade",
            duration: 100
        }
    });
}