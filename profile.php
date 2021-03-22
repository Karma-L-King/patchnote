<?php
include "db.conn.php";
session_start(); 
$email = $_SESSION['email'];
$stmt = $db_conn->prepare("SELECT * FROM users WHERE email = '$email'");
$stmt->execute();
error_reporting(0);

?>


<!doctype html>

<div class="container">
 <div class="card">
   <div class="card-head">
     <h3>Mijn Profiel</h3>
    </div>
    <table class="tableTasks">
                <tr>
                    <th>Naam</th>
                   
                    <th>Email</th>
                    <th>password</th>
             
                    <th>Bewerken</th>
                    
    </tr>
  
                <?php
                       $stmttasks = $db_conn->prepare("SELECT * FROM users WHERE email = '$email'");
                       $stmttasks->execute();
                         foreach($stmttasks as $rows){
                        
                          $idname = $rows['id'];
                            echo "<tr><td>" .$rows['firstname']. " " . $rows['lastname']."</td>";
                           
                         
                            echo "<td>" .$rows['email']."</td>";
                           
                            echo "<td>" .$rows['password']."</td>";
                        
                            echo "<td><a class='btn btn-warning' href='updatepfm.php?id=$idname'><i class='fas fa-pencil-alt'> </i></a></td></tr>";
                            
                            }
                           
                       ?>
       
          </table>
          
      </div>
                          </div>
    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
 
  </body>
</html>
      



