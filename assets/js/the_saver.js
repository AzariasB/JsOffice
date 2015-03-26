


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
        success: function (response) {
            //Do Something
        }
    });
}

function get_jsTree() {

}
