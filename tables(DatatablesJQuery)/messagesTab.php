<?php
require('../../include/db.php');
?>

<!DOCTYPE html>  
 <html>  
      <head>  
           <title>Messages List</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
           <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      </head>  
      <body>  
           <br /><br />  
           <div class="container-fluid">  
                <h3 align="center">Messages List</h3>  
                <br />  
                <div class="table-responsive">  
                     <table class="table table-striped table-bordered" id="messagesData">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone Number</th>
                      <th>Subject</th>
                      <th>Message</th>
                      <th>Date Reception</th>               
                      <th style="width: 40px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  
               <?php $q = "SELECT * from message ORDER BY date_message DESC"; $r=mysqli_query($db,$q);?>
                    
                            
                

      <?php $c =1; while($pi=mysqli_fetch_array($r)){ ?>
                    <tr>
                      <td><?=$c?></td>
                      <td><?=$pi['name']?></td>
                      <td><?=$pi['email']?></td>
                      <td><?=$pi['phone']?></td>
                      <td><?=$pi['subject']?></td>
                      <td><?=$pi['message']?></td>
                      <td><?=$pi['date_message']?></td>
                      <td> <a style="color:#FF0000;" href="../include/deletemessage.php?id=<?=$pi['id']?>"><i class="fas fa-trash-alt"></i></a> </td>
                    </tr>
     <?php $c++; } ?>
                    
                    
                  </tbody>
                </table>
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#messagesData').DataTable();  
 });  
 </script>  