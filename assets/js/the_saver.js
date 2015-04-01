


//Sauvegarder l'état de l'arbre
function save_jsTree() {
    var v = $('#tree').jstree(true).get_json('#', {flat: true})
    var mytext = JSON.stringify(v);

    $.ajax({
        url: "./assets/views/the_saver.php",
        type: "get", //send it through get method
        data: {
            action: 'save_jstree',
            data: mytext,
        },
        success: function(response) {
            //Do Something
        }
    });
}

//Sauver le texte de l'éditeur de texte
function save_texte() {
    var active = $('#tabs').tabs('option', 'active');

    var nomTab = $('#tabs_list').children().eq(active);
    var nomFichier = nomTab.text().replace(/\s/g, "").replace("RemoveTab", "");
    
    // 
    var texte = oDoc.innerHTML;
    

    $.ajax({
        url: "./assets/views/the_saver.php",
        type: "get", //send it through get method
        data: {
            action: 'save_text',
            fileName : nomFichier,
            data: texte,
        },
        success: function(response) {
           if(response !== 'success'){
               //Alert pour le moment, autres choses plus tard
               alert("Le fichier n'a pas pu être sauvegardé");
           }
        }
    });

}
