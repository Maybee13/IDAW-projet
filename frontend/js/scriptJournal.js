var next = 1;
var active = 0;
var crud;

$(document).ready(function() {
    var table = $('#repas').DataTable( {
        scrollY:        "300px",
        scrollX:        true,
        scrollCollapse: true,
        paging:         true,
        columnDefs: [
            { width: '20%', targets: 0 }
        ],
        fixedColumns: true
    } );
} );

function display(ctl) {
    var row = $(ctl).parents("tr");
    var cols = row.children("td");
    active = $($(cols[0]).children("button")[0]).data("id");
    $("#label").val($(cols[2]).text());
    $("#date").val($(cols[3]).text());
}

function update() {
    if ($("#updateButton").text() == "Modifier") {
        crud = "modif";
        updateTable(active);
    }
    else {
        crud ="ajout";
        ajoutTable();
    }
    $("#nom").focus();
}

function ajoutTable() {
    if ($("#repas tbody").length == 0) {
        $("#repas").append("<tbody></tbody>");
    }
    $("#repas tbody").append(utilBuildTableRow(next));
    next += 1;
}

function updateTable(id) {
    var row = $("#repas button[data-id='" + id + "']").parents("tr")[0];
    $(row).after(utilBuildTableRow(id));
    $(row).remove();
    $("#updateButton").text("Ajouter");
}

function utilBuildTableRow(id) {
  var ret =
  "<tr>" +
    "<td>" +
      "<button type='button' " +
              "onclick='display(this);' " +
              "class='btn btn-default' " +
              "data-id='" + id + "'>" +
              "<i class='fas fa-edit'/>" +
      "</button>" +
      "<td>" +
      "<button type='button' " +
              "onclick='utilDelete(this);' " +
              "class='btn btn-default' " +
              "data-id='" + id + "'>" +
              "<i class='fas fa-trash' />" +
      "</button>" +
    "</td>" +
    "<td>" + $("#label").val() + "</td>" +
    "<td>" + $("#date").val() + "</td>" +
    "</td>" 
  "</tr>"

  return ret;
}

let backendurl = "http://localhost/IDAW-projet/backend/"
//let backendurl = "http://localhost/imangermieux/IDAW-projet/backend/";

function utilDelete(ctl) {
    crud ="suppr";
    $(ctl).parents("tr").remove();
    $.ajax({
        url : backendurl + 'suppMeal.php',
        type : 'POST',
        data : 'label='+ document.getElementById('label').value,
        dataType : 'application/json'
    });
}

$(document).ready(function(){
    $.ajax({
        url: backendurl + "journal.php",
        method: 'POST',
        dataType : 'application/json'
      })
        .fail(function(data) {
          // data contient le résultat produit par le backend
          console.log("salut fail");
          $json = data;
    })
        .done(function(data) {
            // data contient le résultat produit par le backend
            console.log("salut done");
            $json = data;
  });;
});


$("#formutil").submit(function(){ 
    var donnees = $("#formutil").serialize();  
    $.ajax({
        url : backendurl + 'addMeal.php',
        type : 'POST',
        //data : donnees,
        data : 'label='+ document.getElementById('label').value +
        '&date='+ document.getElementById('date').value + 
        '&crud='+ crud +
        +'&login ='+ $user
        +'&ibgredients='+ingredients,
        dataType : 'application/json'
    });
});