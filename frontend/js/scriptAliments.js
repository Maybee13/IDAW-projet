var next = 1;
var active = 0;
var crud;

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
    "</td>" +
  "</tr>"

  return ret;
}

let backendurl = "http://localhost/IDAW-projet/backend/"

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
        "&crud="+crud,
        dataType : 'application/json'
    });
});