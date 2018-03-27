<?php
    include 'navbar_template.html';
    include 'db.php';


      if(isset($_POST["search"]) && isset($_POST["dropDown"])){
            $searchInput = mysqli_real_escape_string($conn, $_POST["data"]);
            $dropDownValue = mysqli_real_escape_string($conn, $_POST["dropDown"]);

            $query = mysqli_query($conn, "SELECT uFirstName FROM" . " $dropDownValue " . 
                                                    "WHERE uFirstName LIKE" . "'%"."$searchInput"."%';");

            while($row = mysqli_fetch_row($query))
            {
                printf("<ul><li>%s\n</li></ul>", $row[0]);
            }
        }

    mysqli_close($conn);
?>