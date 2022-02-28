<?php
require('../../include/db.php');

header('Content-Type: application/vnd-ms-excel');
  header('Content-Disposition:attachment; filename="download.xls"');


 $query = "SELECT * FROM visitors_info ORDER BY time DESC";
 $result = mysqli_query($db, $query);
 //header('Content-Type: application/vnd-ms-excel');
//header('Content-Disposition:attachment; filename="download.xls"');

 if(mysqli_num_rows($result) > 0)
 {?>
 
   <table class="table" border="1">  
                    <tr style="background-color:#98FB98">  
                      <th style="width: 10px">#</th>
                      <th>ISP</th>
                      <th>Country</th>
                      <th>Country Code</th>
                      <th>Region Name</th>
                      <th>City</th> 
                      <th>ZIP</th> 
                      <th>Latitude</th> 
                      <th>Longitude</th> 
                      <th>Timezone</th> 
                      <th>ORG</th> 
                      <th>AS</th> 
                      <th>IP</th>
                      <th>OS</th>
                      <th>Browser</th>
                      <th>Device</th> 
                      <th>Time</th> 
                    </tr>
                    <?php
 
  $c=1;
  while($row = mysqli_fetch_array($result))
  {
 ?>
    <tr>  
                      <td width=3%><CENTER><?=$c?></CENTER></td>
                      <td><?=$row["isp"]?></td>
                      <td><?=$row["country"]?></td>
                      <td><?=$row["countryCode"]?></td>
                      <td><?=$row["regionName"]?></td>
                      <td><?=$row["city"]?></td>
                      <td><?=$row["zip"]?></td>
                      <td><?=$row["latitude"]?></td>
                      <td><?=$row["longitude"]?></td>
                      <td><?=$row["timezone"]?></td>
                      <td><?=$row["org"]?></td>
                      <td><?=$row["as_ip"]?></td>
                      <td><?=$row["ip"]?></td>
                      <td><?=$row["os"]?></td>
                      <td><?=$row["browser"]?></td>
                      <td><?=$row["device"]?></td>
                      <td width=7%><CENTER><?=$row["time"]?></CENTER></td>
                    </tr>
<?php
   $c++;
  }
 }



?>