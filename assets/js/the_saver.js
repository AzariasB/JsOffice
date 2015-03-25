



function save_jsTree(node) {
    var v = $.tree.reference("#tree").get();
    var apres = JSON.stringify(v);
    console.log(apres);
    $.ajax({
        url: "./assets/views/the_saver.php",
        type: "get", //send it through get method
        data: {
            action: 'save_jstree',
            data: apres,
        },
        success: function(response) {
            //Do Something
        },
    });
}

function get_jsTree() {

}
