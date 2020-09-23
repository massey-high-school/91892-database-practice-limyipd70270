    <?php include("topbit.php");

        $app_name = mysqli_real_escape_string($dbconnect, $_POST['app_name']);
        $developer = mysqli_real_escape_string($dbconnect, $_POST['dev_name']);
        $genre = mysqli_real_escape_string($dbconnect, $_POST['genre']);
        $cost = mysqli_real_escape_string($dbconnect, $_POST['cost']);

        // Cost code (to handle when cost is not specified...)
        if ($cost=="") {
            $cost_op = ">=";
            $cost = 0;
        }

        else {
            $cost_op = "<=";
        }

        // In App Purchases...
        if (isset($_POST['in_app'])) {
            $in_app = 0;
        }

        else {
            $in_app = 1;
        }

        // Ratings
        $rating_more_less = mysqli_real_escape_string($dbconnect, $_POST['rate_more_less']);
        $rating = mysqli_real_escape_string($dbconnect, $_POST['rating']);

        if ($rating_more_less == "at least") {
            $rate_op = ">=";
        }

        elseif($rating_more_less == "at most") {
            $rate_op = "<=";
        }

        else {
            $rate_op = ">=";
            $rating = 0;

        } // end rating if / elseif / else

        // Ages
        $age_more_less = mysqli_real_escape_string($dbconnect, $_POST['age_more_less']);
        $age = mysqli_real_escape_string($dbconnect, $_POST['age']);

        if ($age_more_less == "at least") {
            $age_op = ">=";
        }

        elseif($age_more_less == "at most") {
            $age_op = "<=";
        }

        else {
            $age_op = ">=";
            $age = 0;

        } // end age if / elseif / else

            $find_sql = "SELECT * FROM `L2_prac_game_details` 
            JOIN `L2_prac_genre` ON (`L2_prac_game_details`.`Genre ID` = `L2_prac_genre`.`Genre ID`)
            JOIN `L2_prac_developer` on (`L2_prac_game_details`.`Developer ID` = `L2_prac_developer`.`Developer ID`)
            WHERE `Name` LIKE '%$app_name%'
            AND `Developer Name` LIKE '%$developer%'
            AND `Genre Name` LIKE '%$genre%'
            AND `Price` $cost_op '$cost'
            AND (`In App` = $in_app OR `In App` = 0)
            AND `User Rating` $rate_op $rating
            AND `Age` $age_op $age

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