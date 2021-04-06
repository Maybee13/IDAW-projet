
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Ingrédient</th>
                    <th scope="col">Quantité</th>
                </tr>
            </thead>
            <tbody id="foodTableBody">
            </tbody>
        </table>
        <form id="addFoodForm" action=""  onsubmit="event.preventDefault();onFormSubmit();"  autocomplete="off" >
            <div class="form-group row">
                <label for="inputQty" class="col-sm-2 col-form-label">Quantité</label>
                <div class="col-sm-3">
                    <input type="number" class="form-control" id="inputQty">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputFood" class="col-sm-2 col-form-label">Chercher (Tapez, puis sélectionnez une suggestion)</label>
                <div class="col-sm-3">
                    
                    <?php require_once('src/searchBar.php')?>
                </div>
            </div>
            <div class="form-group row">
                <span class="col-sm-2"></span>
                <div class="col-sm-2">
                    <button type="submit" class="btn btn-primary form-control">Submit</button>
                </div>
            </div>
        </form>
        <script src="js/crudIngredients.js"></script>

