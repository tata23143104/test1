<html>
<head>
<meta http-equiv="refresh" content="100">

<style>
       td1{background-color:#ddd;}
       .selected{background-color: red;color: #fff;font-weight: bold}
   </style>

<title>Overall</title>
</head>
<body>
  <style>
  table.pos_right {
    position: relative;
    left: 100px;
    top: 30px;
  }

  </style>
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

//$sql1 = "SELECT * FROM pm GROUP by PM2_5 DESC LIMIT 60";
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
    <table width = "1000" border="0" class="info" align="center">
    <tr>
    	<td></td>
    	<td width="100" align="center" valign="bottom">
    		<font style="font-family: Kunlasatri;text-shadow: 1px 1px #c0c0c0;" color="#3bccff" size="3">
    			0 - 25		</font>
    	</td>
    	<td width="100" align="center" valign="bottom">
    		<font style="font-family: Kunlasatri;text-shadow: 1px 1px #c0c0c0;" color="#92d050" size="3">
    			26 - 50		</font>
    	</td>
    	<td width="100" align="center" valign="bottom">
    		<font style="font-family: Kunlasatri;text-shadow: 1px 1px #c0c0c0;" color="#ffff00" size="3">
    			51 - 100		</font>
    	</td>
    	<td width="100" align="center" valign="bottom">
    		<font style="font-family: Kunlasatri;text-shadow: 1px 1px #c0c0c0;" color="#ffa200" size="3">
    			101 - 200		</font>
    	</td>
    	<td width="100" align="center" valign="bottom">
    		<font style="font-family: Kunlasatri;text-shadow: 1px 1px #c0c0c0;" color="#ff3b3b" size="3">
    			 201 ขึ้นไป 		</font>
    	</td>
    	<td width="100" rowspan="2" align="center"></td>
    </tr>
    <tr height="50">
    	<td width="150" align="center" valign="middle">
    		<font style="font-family: Kunlasatri;" color="gray" size="5">
    		ความหมายของสี		</font>
    	</td>
    	<td width="100" align="center" valign="middle" bgcolor="#3bccff">
    		<font style="font-family: Kunlasatri;" color="#000000" size="3">
    		ดีมาก		</font>
    	</td>
    	<td width="100" align="center" valign="middle" bgcolor="#92d050">
    		<font style="font-family: Kunlasatri;" color="#000000" size="3">
    		ดี		</font>
    	</td>
    	<td width="100" align="center" valign="middle" bgcolor="#ffff00">
    		<font style="font-family: Kunlasatri;" color="#000000" size="3">
    		ปานกลาง		</font>
    	</td>
    	<td width="100" align="center" valign="middle" bgcolor="#ffa200">
    		<font style="font-family: Kunlasatri;" color="#000000" size="3">
    		เริ่มมีผลกระทบ<br>ต่อสุขภาพ		</font>
    	</td>
    	<td width="100" align="center" valign="middle" bgcolor="#ff3b3b">
    		<font style="font-family: Kunlasatri;" color="#000000" size="3">
    		มีผบกระทบ<br>ต่อสุขภาพ		</font>
    	</td>
    </tr>
    </table>


    <table width = "1000" border="0" class="info" align="center">

    <tr height="50">
      <td width="500" align="center" valign="middle" bgcolor="#3bccff">
        <br>
        คุณภาพอากาศดีมาก เหมาะสำหรับกิจกรรมกลางแจ้งและการท่องเที่ยว
      </td>
   </tr>
   <tr height="50">
     <td width="500" align="center" valign="middle" bgcolor="#92d050">
       <br>
       คุณภาพอากาศดี สามารถทำกิจกรรมกลางแจ้งและการท่องเที่ยวได้ตามปกติ
     </td>
  </tr>
  <tr height="50">
    <td width="500" align="center" valign="middle" bgcolor="#ffff00">
      <br>
      ประชาชนทั่วไป : สามารถทำกิจกรรมกลางแจ้งได้ตามปกติ
ผู้ที่ต้องดูแลสุขภาพเป็นพิเศษ : หากมีอาการเบื้องต้น เช่น ไอ หายใจลำบาก ระคายเคืองตา ควรลดระยะเวลาการทำกิจกรรมกลางแจ้ง
    </td>
 </tr>
 <tr height="50">
   <td width="500" align="center" valign="middle" bgcolor="#ffa200">
     <br>
     ประชาชนทั่วไป : ควรเฝ้าระวังสุขภาพ ถ้ามีอาการเบื้องต้น เช่น ไอ หายใจลำบาก ระคายเคืองตา
      ควรลดระยะเวลาการทำกิจกรรมกลางแจ้ง หรือใช้อุปกรณ์ป้องกันตนเองหากมีความจำเป็น
ผู้ที่ต้องดูแลสุขภาพเป็นพิเศษ : ควรลดระยะเวลาการทำกิจกรรมกลางแจ้ง หรือใช้อุปกรณ์ป้องกันตนเองหากมีความจำเป็น
ถ้ามีอาการทางสุขภาพ เช่น ไอ หายใจลำบาก ตาอักเสบ
 แน่นหน้าอก ปวดศีรษะ หัวใจเต้นไม่เป็นปกติ คลื่นไส้ อ่อนเพลีย ควรปรึกษาแพทย์
   </td>
</tr>
<tr height="50">
  <td width="500" align="center" valign="middle" bgcolor="#ff3b3b">
    <br>
    ทุกคนควรหลีกเลี่ยงกิจกรรมกลางแจ้งหลีกเลี่ยงพื้นที่ที่มีมลพิษทางอากาศสูง หรือใช้อุปกรณ์ป้องกันตนเองหากมีความจำเป็น
    หากมีอาการทางสุขภาพควรปรึกษาแพทย์
  </td>
</tr>
    </table>

    <table width="200" border="1" cellpadding="0"  cellspacing="0" align="center">
      <thead>
      <tr>
        <th width="20%"> ชั่วโมง </th>
        <th width="20%"> AV_PM1 </th>
        <th width="20%"> AV_PM2.5 </th>
        <th width="20%"> AV_PM10 </th>
      </tr>
      </thead>

      <?php while($row = mysqli_fetch_array($result)) { ?>
        <tr>
          <td align="center"><?php echo $row['DATE'];?></td>
          <td align="right" ><?php echo number_format($row['PM1'],2);?></td>
          <td align="right"><?php echo number_format($row['PM2_5'],2);?></td>
          <td align="right"><?php echo number_format($row['PM10'],2);?></td>
        </tr>
        <?php } ?>

    </table>
<br>

    <table width="400" border="1" cellpadding="0"  cellspacing="0" align="center">
      <thead>
      <tr>
        <th width="40%"> เวลา </th>
        <th width="20%"> PM1 </th>
        <th width="20%"> PM2.5 </th>
        <th width="20%"> PM10 </th>
      </tr>
      </thead>

      <?php while($row = mysqli_fetch_array($result1)) {  ?>
        <tr>
          <?php if($pm2_5 <= 25) { ?>
           <td align="center"><?php echo $row['DATE'];?></td>
            <td align="right"  bgcolor="#00FF00"><?php echo number_format($row['PM1'],1);?></td>
            <td align="right"  bgcolor="#00FF00"><?php echo number_format($row['PM2_5'],1);?></td>
            <td align="right"  bgcolor="#00FF00"><?php echo number_format($row['PM10'],1);?></td>
          </tr>
          <tr>
          <?php } elseif($pm2_5 <= 37) { ?>
            <td align="center"><?php echo $row['DATE'];?></td>
             <td align="right"  bgcolor="#FFFF00"><?php echo number_format($row['PM1'],2);?></td>
             <td align="right"  bgcolor="#FFFF00"><?php echo number_format($row['PM2_5'],2);?></td>
             <td align="right"  bgcolor="#FFFF00"><?php echo number_format($row['PM10'],2);?></td>
          </tr>
        <?php } else { ?>
          <tr>
          <td align="center"><?php echo $row['DATE'];?></td>
           <td align="right"  bgcolor="#DC143C"><?php echo number_format($row['PM1'],2);?></td>
           <td align="right"  bgcolor="#DC143C"><?php echo number_format($row['PM2_5'],2);?></td>
           <td align="right"  bgcolor="#DC143C"><?php echo number_format($row['PM10'],2);?></td>
          <?php } ?>
        </tr>


<?php } ?>
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
      <?php if($pm2_5 <= 25) { ?>
        <td1 align="center"><?php echo $row['DATE'];?></td>
        <td align="right"  bgcolor="#00FF00"><?php echo number_format($row['PM2_5'],2);?></td1>
        <td align="right"  bgcolor="#00FF00"><?php echo number_format($row['PM2_5'],2);?></td>
        <td align="right"  bgcolor="#00FF00"><?php echo number_format($row['PM10'],2);?></td>
      <?php } elseif($pm2_5 <= 37) { ?>
        <td align="center"><?php echo $row['DATE'];?></td>
         <td align="right"  bgcolor="#FFFF00"><?php echo number_format($row['PM1'],2);?></td>
         <td align="right"  bgcolor="#FFFF00"><?php echo number_format($row['PM2_5'],2);?></td>
         <td align="right"  bgcolor="#FFFF00"><?php echo number_format($row['PM10'],2);?></td>
    <?php } else { ?>
      <td align="center"><?php echo $row['DATE'];?></td>
       <td align="right"  bgcolor="#DC143C"><?php echo number_format($row['PM1'],2);?></td>
       <td align="right"  bgcolor="#DC143C"><?php echo number_format($row['PM2_5'],2);?></td>
       <td align="right"  bgcolor="#DC143C"><?php echo number_format($row['PM10'],2);?></td>
      <?php } ?>
    </tr>

                                        <?php } ?>
</table>

<script>

            var table = document.getElementById("table"),rIndex,cIndex;

            // table rows
            for(var i = 1; i < table.rows.length; i++)
            {
                // row cells
                for(var j = 0; j < table.rows[i].cells.length; j++)
                {
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
