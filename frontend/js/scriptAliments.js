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