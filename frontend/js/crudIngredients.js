let foods = [];
        let nbOfFood = 0;
        let idEdited = -1;
            function logThis(){
                console.log(this);

            }
            logThis();
        function edit(id){
            idEdited  = id;
        }

        function del(id){
            $("#food-"+id).empty();
        }

        function food(index,label, qty)
        {
            this.index = index;
            this.label = label;
            this.qty = qty;

        }

        function onFormSubmit()
        {
            let index = nbOfFood;
            let label = $("#inputFood").val();
            let qty = $("#inputQty").val();

            //console.log("numberOfStudents = ", nbOfStudents);
            //console.log("idEdited = "+ idEdited);
           // myStudent = new student(index, nom, mail, commentaire, date, PLS);
            if(idEdited!=-1)
            {
                foods[idEdited].label =label;
                foods[idEdited].qty = qty;
                //console.log(students[idEdited].nom);
                $("#food-"+foods[idEdited].index).empty();
                    $("#food-"+foods[idEdited].index).append(
                        `<td>${foods[idEdited].label}</td>
                        <td>${foods[idEdited].qty}</td>
                        <td><button onclick="edit(${foods[idEdited].index});">Edit</button></td>
                        <td><button onclick="del(${myFood.index})">Delete</button></td>`);
                idEdited=-1;
            }
            else
            {
                myFood = new food(index, label, qty);
                foods.push(myFood);
    
            $("#foodTableBody").append
               (
               `<tr id="food-${myFood.index}">
                    <td>${myFood.label}</td>
                    <td>${myFood.qty}</td>
                    <td><button onclick="edit(${myFood.index});">Edit</button></td>
                    <td><button onclick="del(${myFood.index})">Delete</button></td>
                </tr>`
                );
                nbOfFood+=1;

                
            }

        }
        // let urlbackend = "http://localhost/IDAW/TP04/AJAX/";

        // $("#addStudentForm").submit(function(){   
        //     $.ajax({
        //         url : urlbackend + 'addUser.php',
        //         type : 'POST',
        //         data : 'inputNom='+ document.getElementById("inputNom").value 
        //         + '&inputAddress='+ document.getElementById("inputAddress").value
        //         + "&inputCom=" + inputCom,
                
        //         dataType : 'application/json'
        //     });

        // });