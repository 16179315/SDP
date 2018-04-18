<?php
    include 'navbar_template.html';
    
      if(isset($_POST["search"]) && isset($_POST["dropDown"])){
            include 'includes/db.php';

            $searchInput = mysqli_real_escape_string($conn, $_POST["data"]);
            $dropDownValue = mysqli_real_escape_string($conn, $_POST["dropDown"]);

            if(strcmp($dropDownValue, "users") == 0) {
                $query = mysqli_query($conn, "SELECT uFirstName,uLastName,uEmail,uContactNo,uAddress, uId 
                                                    FROM users " . 
                                                    "WHERE uFirstName LIKE" . "'%"."$searchInput"."%';");
                $row_count = mysqli_num_rows($query);
                if($row_count > 0){
                    while($row = mysqli_fetch_row($query))
                    {   
                        echo  "<table>";
                        echo  "<tr>";
                        echo  "<th>User Name</th>";
                        echo  "<th>Email</th>";
                        echo  "<th>Contact No</th>";
                        echo  "<th>Address</th>";
                        echo  "<th>Add Connection</th>";
                        echo  "</tr>";
                        echo  "<tr>";
                        echo  "<td><a href=\"Profile.php?uId=".$row[5]."\">$row[0] $row[1]</a></td>";
                        echo  "<td>$row[2]</td>";
                        echo  "<td>$row[3]</td>";
                        echo  "<td>$row[4]</td>";
                        echo  "<td><button>Add</button></td>";
                        echo  "</tr>";
                        echo  "</table></br>";
                    }
                }else
                {
                    echo "<h3>No matching search results</h2>";
                }

            }elseif (strcmp($dropDownValue, "hotels") == 0) {
                $query = mysqli_query($conn, "SELECT hName,contactNo,email,address,hId FROM hotels " . 
                                                    "WHERE hName LIKE" . "'%"."$searchInput"."%';");
                $row_count = mysqli_num_rows($query);

                if($row_count > 0){
                    while($row = mysqli_fetch_row($query))
                    {
                       echo  "<table>";
                        echo  "<tr>";
                        echo  "<th>Hotel Name</th>";
                        echo  "<th>Email</th>";
                        echo  "<th>Contact No</th>";
                        echo  "<th>Address</th>";
                        echo  "</tr>";
                        echo  "<tr>";
                        echo  "<td><a href=\"hotel.php?hId=".$row[4]."\">$row[0]</a></td>";
                        echo  "<td>$row[2]</td>";
                        echo  "<td>$row[1]</td>";
                        echo  "<td>$row[3]</td>";
                        echo  "</tr>";
                        echo  "</table></br>";
                    }
                }else{
                    echo "<h3>No matching search results</h2>";
                
                }

            }elseif(strcmp($dropDownValue, "vacancies") == 0) {
                $query = mysqli_query($conn, "SELECT vName,vDescr,hId,status,amount FROM vacancies " . 
                                                "WHERE vName LIKE" . "'%"."$searchInput"."%';");
                $row_count = mysqli_num_rows($query);

                if($row_count > 0){
                    while($row = mysqli_fetch_row($query))
                    {
                        $hotelNameQuery = mysqli_query($conn, "SELECT hName FROM hotels WHERE hId = $row[2];");
                        $nameResult = mysqli_fetch_row($hotelNameQuery);
                        echo  "<table>";
                        echo  "<tr>";
                        echo  "<th>Vacancy</th>";
                        echo  "<th>Description</th>";
                        echo  "<th>Hotel</th>";
                        echo  "<th>Status</th>";
                        echo  "<th>Amount</th>";
                        echo  "</tr>";
                        echo  "<tr>";
                        echo  "<td><a href='homepage.php'>$row[0]</a></td>";
                        echo  "<td>$row[1]</td>";
                        echo  "<td>$nameResult[0]</td>";
                        echo  "<td>$row[3]</td>";
                        echo  "<td>$row[4]</td>";
                        echo  "</tr>";
                        echo  "</table></br>";
                    }
                }else{
                     echo "<h3>No matching search results</h2>";
                }
            }elseif (strcmp($dropDownValue, "skills") == 0) {
                $sidQuery = mysqli_query($conn, "SELECT sId FROM skills " .  
                                                    "WHERE sTitle LIKE" . "'%"."$searchInput"."%';");

                while ($row = mysqli_fetch_row($sidQuery)) {
                   /*
                    $vacancyQuery = mysqli_query($conn, "SELECT hId,vName,vDescr,status,amount FROM vacancies WHERE vId =  (SELECT vId FROM skillRequired WHERE sId = $row[0]) ;");
                    var_dump($vacancyQuery);

                        echo  "<table>";
                        echo  "<tr>";
                        echo  "<th>Vacancy</th>";
                        echo  "<th>Description</th>";
                        echo  "<th>Hotel</th>";
                        echo  "<th>Status</th>";
                        echo  "<th>Amount</th>";
                        echo  "</tr>";
                        echo  "<tr>";
                        echo  "<td><a href='homepage.php'>$row[0]</a></td>";
                        echo  "<td>$row[1]</td>";
                        echo  "<td>$nameResult[0]</td>";
                        echo  "<td>$row[3]</td>";
                        echo  "<td>$row[4]</td>";
                        echo  "</tr>";
                        echo  "</table></br>";
                        */
                        printf("sId = %d",$sidQuery[0]);
                       /* $query = mysqli_query($conn,"SELECT vId FROM skillRequired WHERE sId = $row[0];");
                        $resultQuery = mysqli_fetch_row($query);
                        echo $resultQuery[0];*/
                }

            }
            
             mysqli_close($conn);
        }
?>