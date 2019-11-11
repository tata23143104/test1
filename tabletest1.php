<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8" />
<style>
        if(){}
        td{background-color:green;}
           
        td:hover{background-color:#ddd;;cursor: pointer}

        .blue {   background: blue; } 
        .green {   background: green; }
        .red {   background: red; }

</style>

</head>

<?php

include('dbconnect.php');
include('head.html');
$sql = "SELECT AVG(PM1) AS PM1,
AVG(PM2_5) AS PM2_5,
AVG(PM10) AS PM10,
 DATE_FORMAT(DATE, '%H') AS DATE
FROM pm
GROUP BY DATE_FORMAT(DATE, '%H%')
";


$sql1 = "SELECT * FROM pm GROUP by id DESC LIMIT 60";

$sql2 = "SELECT AVG(PM1) AS PM1,
AVG(PM2_5) AS PM2_5,
AVG(PM10) AS PM10,
 DATE_FORMAT(DATE, '%H') AS DATE
FROM pm
GROUP BY DATE_FORMAT(DATE, '%H%')
";

$result = $conn->query($sql);
$result1 = $conn->query($sql1);
$result2 = $conn->query($sql2);
$conn->close();

$date = array();
$pm1= array();
$pm2_5= array();
$pm10= array();
$date = 'DATE';
$pm1 = 'PM1';
$pm2_5 = 'PM2_5';
$pm10 = 'PM10';
?>

<body>
    <table id="tbl" border="1">
        <tr>
            <td>ONE</td>
            <td>TWO</td>
            <td>THREE</td>
        </tr>
        <tr>
            <td>FOUR</td>
            <td>FIVE</td>
            <td>SIX</td>
        </tr>
        <tr>
            <td>SEVEN</td>
            <td>EIGHT</td>
            <td>NINE</td>
        </tr>
    </table>

    <table id="table" width="400" border="1" cellpadding="0"  cellspacing="0" align="center">
  <thead>
  <tr>
    <th width="40%"> เวลา </th>
    <th width="20%"> PM1 </th>
    <th width="20%"> PM2.5 </th>
    <th width="20%"> PM10 </th>
  </tr>
  </thead>

  <?php while($row = mysqli_fetch_array($result2)) {  ?>
    <tr>
        <td align="center"><?php echo $row['DATE'];?></td>
        <td align="right" ><?php echo number_format($row['PM2_5'],2);?></td>
        <td align="right" ><?php echo number_format($row['PM2_5'],2);?></td>
        <td align="right" ><?php echo number_format($row['PM10'],2);?></td>

                                        <?php } ?>
    </tr>
</table>

    <script type="text/javascript">
        //var table = document.getElementById("tbl");
        var PM2_5 = document.getElementById("$pm2_5");
        var table = document.getElementById("table");
        // table rows
        for (var i = 0 ; i < table.rows.length; i++) 
        {
            // row cells
            for (var j = 0; j < table.rows[i].cells.length; j++) 
            {
                /*if(PM2_5 <= 25)
                {
                table.rows[i].cells[j]
                }*/

                table.rows[i].cells[j].onclick = function()
                    {
                        rIndex = this.parentElement.rowIndex;
                        cIndex = this.cellIndex+1;
                        console.log("Row : "+rIndex+" , Cell : "+cIndex);
                    };

            }
 
            
        }
    </script>


</body>
</html>