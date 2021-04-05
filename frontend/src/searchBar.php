
<div class="wrapper">
      <div class="search-input">
        <a href="" target="_blank" hidden></a>
        <input type="text" placeholder="Type to search..">
        <div class="autocom-box">
          <!-- here list are inserted from javascript -->
        </div>
        <div class="icon"><i class="fas fa-search"></i></div>
      </div>
    </div>
    <?php 
    $conn= mysqli_connect("localhost", "root", "", "imangermieux");
    if($conn == false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    if (!mysqli_set_charset($conn, "utf8")) {
      printf("Erreur lors du chargement du jeu de caractères utf8 : %s\n", mysqli_error($link));
      exit();
  }
    $sql = mysqli_query($conn,"SELECT food.FOOD_LABEL, food.ID_FOOD FROM food");
    $result = mysqli_fetch_all($sql);
    $foods  = array();
    for($i=0;$i<sizeof($result);$i++){
      array_push($foods,$result[$i][0]);
    }
    ?>

    <script type =  "text/javascript"> js_variable_name = <?php echo json_encode($foods); ?>;</script>

    <script src="js/suggestions.js"></script>
    <script src="js/searchBar.js"></script>