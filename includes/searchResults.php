<?php
    include 'navbar_template.html';

      if(isset($_POST["search"])){
            $serverName = "sql11.freemysqlhosting.net";
            $username = "sql11225471";
            $password = "cbgPE8apID";
            $name = "sql11225471";

            $conn = mysqli_connect($serverName, $username, $password, $name);
            $searchInput = mysqli_real_escape_string($conn, $_POST["data"]);

            $users = mysqli_query($conn, "SELECT uFirstName FROM users 
                                                    WHERE uFirstName LIKE" . "'%"."$searchInput"."%';");

            while($row = mysqli_fetch_row($users))
            {
                printf("<ul>%s\n</ul>", $row[0]);
            }
            var_dump($searchInput);
            echo $searchInput;
        }
    ?>