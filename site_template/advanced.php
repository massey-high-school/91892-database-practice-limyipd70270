  <?php include("topbit.php");

$app_name = mysqli_real_escape_string($dbconnect, $_POST['app_name']);
$devleoper = mysqli_real_escape_string($dbconnect, $_POST['dev_name']);
$genre = mysqli_real_escape_string($dbconnect, $_POST['genre']);
$cost = mysqli_real_escape_string($dbconnect, $_POST['cost']);

    $find_sql = "SELECT * FROM `L2_prac_game_details` 
    JOIN genre ON (`L2_prac_game_details`.`Genre ID` = `L2_prac_genre`.`Genre ID`)
    JOIN developer ON (`L2_prac_game_details`.`Developer ID` = `L2_prac_developer`.`Developer ID`)
    WHERE `Name` =0 AND `In App` =0
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