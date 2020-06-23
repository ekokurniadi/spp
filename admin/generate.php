

    <?php 

     $connect = mysqli_connect("localhost", "dumet", "school", "test"); 

     $query ="SELECT * FROM import ORDER BY id desc"; 

     $result = mysqli_query($connect, $query); 

     ?> 

     <!DOCTYPE html> 

     <html> 

          <head> 

               <title>Membuat Export CSV Dari Mysql Menggunakan PHP</title> 

               <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> 

               <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> 

               <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

          </head> 

          <body> 

               <div class="container" style="width:900px;"> 

                    <h2 align="center">Membuat Export CSV Dari Mysql Menggunakan PHP</h2>

                    <form method="post" action="export.php" align="center"> 

                         Download File : <input type="submit" name="export" value="CSV Export" class="btn btn-success" /> 

                    </form> 

                    <br /> 

                    <div class="table-responsive" id="employee_table"> 

                         <table class="table table-bordered"> 

                              <tr> 

                                   <th width="20%">ID</th> 

                                   <th width="30%">Nama</th> 

                                   <th width="50%">Email</th> 

                              </tr> 

                         <?php  $i=1;

                         while($row = mysqli_fetch_array($result)){ 

                         ?> 

                              <tr> 

                                   <td><?php echo $i++; ?></td>

                                   <td><?php echo $row["name"]; ?></td>  

                                   <td><?php echo $row["email"]; ?></td> 

                              </tr> 

                         <?php } ?> 

                         </table> 

                    </div> 

               </div> 

          </body> 

     </html> 
