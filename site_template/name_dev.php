  <?php include("topbit.php");

    $name_dev = $_POST['dev_name'];

    $find_sql = "SELECT * FROM `L2_prac_game_details` 
    JOIN `L2_prac_genre` ON (`L2_prac_game_details`.`Genre ID` = `L2_prac_genre`.`Genre ID`)
    JOIN `L2_prac_developer` on (`L2_prac_game_details`.`Developer ID` = `L2_prac_developer`.`Developer ID`)
    WHERE `Name` LIKE '%$name_dev%' OR `Developer Name` LIKE '%$name_dev%'
    ";
    $find_query = mysqli_query($dbconnect, $find_sql);
    $find_rs = mysqli_fetch_assoc($find_query);
    $count = mysqli_num_rows($find_query);

?>

        <div class="box main">
            <h2>Name / Developer Results</h2>
            
            <?php
            include ("results.php")
            ?>  
            
        </div> <!-- / main -->

  <?php include("bottombit.php") ?>      