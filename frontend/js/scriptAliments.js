var next = 1;
var active = 0;
var crud;

$(document).ready( function () {
    $('#aliments').DataTable();
    
} );

function display(ctl) {
    var row = $(ctl).parents("tr");
    var cols = row.children("td");
    active = $($(cols[0]).children("button")[0]).data("id");
    $("#label").val($(cols[1]).text());
    $("#type").val($(cols[2]).text());
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
    if ($("#aliments tbody").length == 0) {
        $("#aliments").append("<tbody></tbody>");
    }
    $("#aliments tbody").append(utilBuildTableRow(next));
    next += 1;
}

function updateTable(id) {
    var row = $("#aliments button[data-id='" + id + "']").parents("tr")[0];
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
    "<td>" + $("#type").val() + "</td>" +
    "<td>" + $("#energie").val() + "</td>" +
    "<td>" + $("#eau").val() + "</td>" +
    "<td>" + $("#proteines").val() + "</td>" +
    "<td>" + $("#glucides").val() + "</td>" +
    "<td>" + $("#lipides").val() + "</td>" +
    "<td>" + $("#sucres").val() + "</td>" +
    "<td>" + $("#glucose").val() + "</td>" +
    "<td>" + $("#fibres_alimentaires").val() + "</td>" +
    "<td>" + $("#cholesterol").val() + "</td>" +
    "<td>" + $("#calcium").val() + "</td>" +
    "<td>" + $("#fer").val() + "</td>" +
    "<td>" + $("#iode").val() + "</td>" +
    "<td>" + $("#magnesium").val() + "</td>" +
    "<td>" + $("#phosphore").val() + "</td>" +
    "<td>" + $("#potassium").val() + "</td>" +
    "<td>" + $("#sodium").val() + "</td>" +
    "<td>" + $("#vitamines_d").val() + "</td>" +
    "<td>" + $("#vitamines_e").val() + "</td>" +
    "<td>" + $("#vitamines_k1").val() + "</td>" +
    "<td>" + $("#vitamines_c").val() + "</td>" +
    "<td>" + $("#vitamines_b1").val() + "</td>" +
    "<td>" + $("#vitamines_b2").val() + "</td>" +
    "<td>" + $("#vitamines_b3").val() + "</td>" +
    "<td>" + $("#vitamines_b5").val() + "</td>" +
    "<td>" + $("#vitamines_b6").val() + "</td>" +
    "<td>" + $("#vitamines_b9").val() + "</td>" +
    "<td>" + $("#vitamines_b12").val() + "</td>" +
    "</td>" 
  "</tr>"

  return ret;
}

//let backendurl = "http://localhost/IDAW-projet/backend/"
let backendurl = "http://localhost/imangermieux/IDAW-projet/backend/"

function utilDelete(ctl) {
    crud="suppr";
    $(ctl).parents("tr").remove();
    $.ajax({
        url : backendurl + 'suppFood.php',
        type : 'POST',
        data : 'label='+ document.getElementById('label').value,
        dataType : 'application/json'
    });
}

$("#formutil").submit(function(){   
    $.ajax({
        url : backendurl + 'addFood.php',
        type : 'POST',
        data : 'label='+ document.getElementById('label').value +
        '&type='+ document.getElementById('type').value + 
        '&crud='+crud +
        '&energie='+ document.getElementById('energie').value + 
        '&eau='+ document.getElementById('eau').value + 
        '&proteines='+ document.getElementById('proteines').value + 
        '&glucides='+ document.getElementById('glucides').value + 
        '&lipides='+ document.getElementById('lipides').value + 
        '&sucres='+ document.getElementById('sucres').value + 
        '&glucose='+ document.getElementById('glucose').value + 
        '&fibres_alimentaires='+ document.getElementById('fibres_alimentaires').value + 
        '&cholesterol='+ document.getElementById('cholesterol').value + 
        '&calcium='+ document.getElementById('calcium').value + 
        '&fer='+ document.getElementById('fer').value + 
        '&iode='+ document.getElementById('iode').value + 
        '&magnesium='+ document.getElementById('magnesium').value + 
        '&phosphore='+ document.getElementById('phosphore').value + 
        '&potassium='+ document.getElementById('potassium').value + 
        '&sodium='+ document.getElementById('sodium').value + 
        '&vitamines_d='+ document.getElementById('vitamines_d').value + 
        '&vitamines_e='+ document.getElementById('vitamines_e').value + 
        '&vitamines_k1='+ document.getElementById('vitamines_k1').value + 
        '&vitamines_c='+ document.getElementById('vitamines_c').value + 
        '&vitamines_b1='+ document.getElementById('vitamines_b1').value + 
        '&vitamines_b2='+ document.getElementById('vitamines_b2').value + 
        '&vitamines_b3='+ document.getElementById('vitamines_b3').value + 
        '&vitamines_b5='+ document.getElementById('vitamines_b5').value + 
        '&vitamines_b6='+ document.getElementById('vitamines_b6').value+
        '&vitamines_b9='+ document.getElementById('vitamines_b9').value + 
        '&vitamines_b12='+ document.getElementById('vitamines_b12').value,

        dataType : 'application/json'
    });
});