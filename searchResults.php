<?php
    include 'navbar_template.html';
    
      if(isset($_POST["search"]) && isset($_POST["dropDown"])){
            include 'includes/db.php';

            $searchInput = mysqli_real_escape_string($conn, $_POST["data"]);
            $dropDownValue = mysqli_real_escape_string($conn, $_POST["dropDown"]);

            if(strcmp($dropDownValue, "users") == 0) {
                $query = mysqli_query($conn, "SELECT uFirstName,uLastName,uEmail,uContactNo,uAddress FROM users " . 
                                                    "WHERE uFirstName LIKE" . "'%"."$searchInput"."%';");

                while($row = mysqli_fetch_row($query))
                {   
                    printf("<table>
                              <tr>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Contact No</th>
                                <th>Address</th>
                                <th>Add Connection</th>
                              </tr>
                              <tr>
                                <td>%s %s</td>
                                <td>%s</td>
                                <td>%s</td>
                                <td>%s</td>
                                <td><button>Add</button></td>
                              </tr>
                            </table></br>", $row[0], $row[1], $row[2], $row[3],$row[4]);
                }

            }elseif (strcmp($dropDownValue, "hotels") == 0) {
                $query = mysqli_query($conn, "SELECT hName,contactNo,email,address FROM hotels " . 
                                                    "WHERE hName LIKE" . "'%"."$searchInput"."%';");

                while($row = mysqli_fetch_row($query))
                {
                    printf("<table>
                              <tr>
                                <th>Hotel Name</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Telephone</th>
                              </tr>
                              <tr>
                                <td>%s</td>
                                <td>%s</td>
                                <td>%s</td>
                                <td>%s</td>
                              </tr>
                            </table></br>", $row[0],$row[3],$row[2],$row[1]);
                }

            }elseif(strcmp($dropDownValue, "vacancies") == 0) {
                $query = mysqli_query($conn, "SELECT vName,vDescr,hId,status,amount FROM vacancies " . 
                                                "WHERE vName LIKE" . "'%"."$searchInput"."%';");

                while($row = mysqli_fetch_row($query))
                {
                    printf("<table>
                              <tr>
                                <th>Vacancy Type</th>
                                <th>Description</th>
                                <th>Hotel</th>
                                <th>Status</th>
                                <th>Salary</th>
                              </tr>
                              <tr>
                                <td>%s</td>
                                <td>%s</td>
                                <td>hotel</td>
                                <td>%s</td>
                                <td>%d</td>
                              </tr>
                            </table></br>", $row[0],$row[1],$row[3],$row[4]);
                }
            }
            
             mysqli_close($conn);
        }
?>