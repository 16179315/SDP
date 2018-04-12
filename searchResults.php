<?php
    include 'navbar_template.html';
    
      if(isset($_POST["search"]) && isset($_POST["dropDown"])){
            include 'includes/db.php';

            $searchInput = mysqli_real_escape_string($conn, $_POST["data"]);
            $dropDownValue = mysqli_real_escape_string($conn, $_POST["dropDown"]);

            if(strcmp($dropDownValue, "users") == 0) {
                $query = mysqli_query($conn, "SELECT uFirstName FROM users " . 
                                                    "WHERE uFirstName LIKE" . "'%"."$searchInput"."%';");
                var_dump($query);

                while($row = mysqli_fetch_row($query))
                {   
                    printf("<table>
                              <tr>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Contact No</th>
                                <th>Address</th>
                              </tr>
                              <tr>
                                <td>%s</td>
                                <td>email</td>
                                <td>contact no</td>
                                <td>address</td>
                              </tr>
                            </table></br>", $row[0]);
                }

            }elseif (strcmp($dropDownValue, "hotels") == 0) {
                $query = mysqli_query($conn, "SELECT hName FROM hotels " . 
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
                                <td>address</td>
                                <td>email</td>
                                <td>telephone</td>
                              </tr>
                            </table></br>", $row[0]);
                }

            }elseif(strcmp($dropDownValue, "vacancies") == 0) {
                $query = mysqli_query($conn, "SELECT vName FROM vacancies " . 
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
                                <td>description</td>
                                <td>hotel</td>
                                <td>status</td>
                                <td>salary</td>
                              </tr>
                            </table></br>", $row[0]);
                }
            }
            
             mysqli_close($conn);
        }
?>