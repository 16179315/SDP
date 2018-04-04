<?php
    include 'navbar_template.html';
    
      if(isset($_POST["search"]) && isset($_POST["dropDown"])){
            include 'includes/db.php';

            $searchInput = mysqli_real_escape_string($conn, $_POST["data"]);
            $dropDownValue = mysqli_real_escape_string($conn, $_POST["dropDown"]);

            if(strcmp($dropDownValue, "users") == 0) {
                $query = mysqli_query($conn, "SELECT uFirstName FROM users " . 
                                                    "WHERE uFirstName LIKE" . "'%"."$searchInput"."%';");

                while($row = mysqli_fetch_row($query))
                {
                    printf("<ul><li>%s\n</li></ul>", $row[0]);
                }

            }elseif (strcmp($dropDownValue, "hotels") == 0) {
                $query = mysqli_query($conn, "SELECT hName FROM hotels " . 
                                                    "WHERE hName LIKE" . "'%"."$searchInput"."%';");
                while($row = mysqli_fetch_row($query))
                {
                    printf("<ul><li>%s\n</li></ul>", $row[0]);
                }

            }elseif(strcmp($dropDownValue, "vacancies") == 0) {
                $query = mysqli_query($conn, "SELECT vName FROM vacancies " . 
                                                "WHERE vName LIKE" . "'%"."$searchInput"."%';");

                while($row = mysqli_fetch_row($query))
                {
                    printf("<ul><li>%s\n</li></ul>", $row[0]);
                }
            }
            
            echo "$searchInput";
             mysqli_close($conn);
        }
?>