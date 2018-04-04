<?php
    include 'navbar_template.html';
    
      if(isset($_POST["search"]) && isset($_POST["dropDown"])){
            include 'db.php';

            $searchInput = mysqli_real_escape_string($conn, $_POST["data"]);
            $dropDownValue = mysqli_real_escape_string($conn, $_POST["dropDown"]);

            if ($dropDownValue == "Users") {
                $query = mysqli_query($conn, "SELECT uFirstName FROM users " . 
                                                    "WHERE uFirstName LIKE" . "'%"."$searchInput"."%';");

                while($row = mysqli_fetch_row($query))
                {
                    printf("<ul><li>%s\n</li></ul>", $row[0]);
                }

            }else if ($dropDownValue == "Hotels") {
                $query = mysqli_query($conn, "SELECT hName FROM hotels" . 
                                                    "WHERE hName LIKE" . "'%"."$searchInput"."%';");
                while($row = mysqli_fetch_row($query))
                {
                    printf("<ul><li>%s\n</li></ul>", $row[1]);
                }

            }else if($dropDownValue == "Vacancies") {
                 $query = mysqli_query($conn, "SELECT vName FROM vacancies " . 
                                                    "WHERE vName LIKE" . "'%"."$searchInput"."%';");

                while($row = mysqli_fetch_row($query))
                {
                    printf("<ul><li>%s\n</li></ul>", $row[0]);
                }
            }
           
             echo "$dropDownValue";
             echo "$searchInput";
             mysqli_close($conn);
        }
?>