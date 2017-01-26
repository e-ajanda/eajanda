<?php
	include('session.php');
	header('Content-Type: text/html; charset=utf-8');
	
	function draw_calendar($month,$year)
	{
		/* draw table */
		$calendar = '<table class="calendar" width="50%" align="center" background="img/wallpaper6.jpg" cellpadding="10" cellspacing="0" border="6" style="border: 1px solid black; text-align:center;">';

		/* table headings */
		$headings = array('PAZAR','PAZARTESİ','SALI','ÇARŞAMBA','PERŞEMBE','CUMA','CUMARTESİ');
		$calendar.= '<tr class="calendar-row" ><th class="calendar-day-head">'.implode('</th><th class="calendar-day-head">',$headings).'</th></tr>';

		/* days and weeks vars now ... */
		$running_day = date('w',mktime(0,0,0,$month,1,$year));
		$days_in_month = date('t',mktime(0,0,0,$month,1,$year));
		$days_in_this_week = 1;
		$day_counter = 0;
		$dates_array = array();

		/* row for week one */
		$calendar.= '<tr class="calendar-row">';

		/* print "blank" days until the first of the current week */
		for($x = 0; $x < $running_day; $x++):
			$calendar.= '<td class="calendar-day-np"> </td>';
			$days_in_this_week++;
		endfor;

		/* keep going with days.... */
		for($list_day = 1; $list_day <= $days_in_month; $list_day++):
			$calendar.= '<td class="calendar-day" style="font-size:18px;">';
				/* add in the day number */
				$calendar.= '<div class="day-number">'.$list_day.'</div>';

				/** QUERY THE DATABASE FOR AN ENTRY FOR THIS DAY !!  IF MATCHES FOUND, PRINT THEM !! **/
				$calendar.= str_repeat('<p> </p>',2);
				
			$calendar.= '</td>';
			if($running_day == 6):
				$calendar.= '</tr>';
				if(($day_counter+1) != $days_in_month):
					$calendar.= '<tr class="calendar-row">';
				endif;
				$running_day = -1;
				$days_in_this_week = 0;
			endif;
			$days_in_this_week++; $running_day++; $day_counter++;
		endfor;

		/* finish the rest of the days in the week */
		if($days_in_this_week < 8):
			for($x = 1; $x <= (8 - $days_in_this_week); $x++):
				$calendar.= '<td class="calendar-day-np"> </td>';
			endfor;
		endif;

		/* final row */
		$calendar.= '</tr>';

		/* end the table */
		$calendar.= '</table>';
		
		/* all done, return result */
		return $calendar;
	}
	
	$bugun=getdate();
	(isset($_POST['ay'])) ? $ay = $_POST['ay'] : $ay=$bugun['mon'];
	(isset($_POST['yil'])) ? $yil = $_POST['yil'] : $yil=$bugun['year'];
	
?>


<html>
	
<head>

	<meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">
	
	<style type="text/css">
		
		a:link
		{
			text-decoration:none;
			font-weight:bold;
			color:#801a00;;
		}
		
		a:active
		{
			color:#801a00;;
		}
		
		a:visited
		{
			color:#801a00;;
		}
		
	</style>

	<title>Takvim</title>
	
</head>

<body background="img/wallpaper5.jpg">
		
	<table align="center" cellspacing="30" style="font-size:30px;">
		
		<tr>
			<td> <img src="img/icons/back.png" width="80" height="50"> </img> <a href="index.php" target=""> Geri Dön </a> </td>
		</tr>
		
	</table>
	
	<div id="rehber" align="center">
		<td><img src="img/icons/takvim.png" width="80" height="50">
	</div>
	
	</br> </br>
	<form align="center" action="" method="POST">
		
		<table align="center" background="img/wallpaper6.jpg" cellpadding="1" cellspacing="0" border="5" style="width:40%; font-size:40px; border: 1px solid black;"  >
			
			<tr>
				<td align="center">
					<select name="ay">
						<option <?php if ($ay==1) echo 'selected'; ?> value="1" >Ocak</option>
						<option <?php if ($ay==2) echo 'selected'; ?> value="2" >Şubat</option>
						<option <?php if ($ay==3) echo 'selected'; ?> value="3" >Mart</option>
						<option <?php if ($ay==4) echo 'selected'; ?> value="4" >Nisan</option>
						<option <?php if ($ay==5) echo 'selected'; ?> value="5" >Mayıs</option>
						<option <?php if ($ay==6) echo 'selected'; ?> value="6" >Haziran</option>
						<option <?php if ($ay==7) echo 'selected'; ?> value="7" >Temmuz</option>
						<option <?php if ($ay==8) echo 'selected'; ?> value="8" >Ağustos</option>
						<option <?php if ($ay==9) echo 'selected'; ?> value="9" >Eylül</option>
						<option <?php if ($ay==10) echo 'selected'; ?> value="10" >Ekim</option>
						<option <?php if ($ay==11) echo 'selected'; ?> value="11" >Kasım</option>
						<option <?php if ($ay==12) echo 'selected'; ?> value="12" >Aralık</option>
					</select>
				</td>
				
				<td align="center">
					<select name="yil">
						<option <?php if ($yil==2017) echo 'selected'; ?> value="2017" >2017</option>
						<option <?php if ($yil==2018) echo 'selected'; ?> value="2018" >2018</option>
						<option <?php if ($yil==2019) echo 'selected'; ?> value="2019" >2019</option>
						<option <?php if ($yil==2020) echo 'selected'; ?> value="2020" >2020</option>
						<option <?php if ($yil==2021) echo 'selected'; ?> value="2021" >2021</option>
						<option <?php if ($yil==2022) echo 'selected'; ?> value="2022" >2022</option>
						<option <?php if ($yil==2023) echo 'selected'; ?> value="2023" >2023</option>
						<option <?php if ($yil==2024) echo 'selected'; ?> value="2024" >2024</option>
						<option <?php if ($yil==2025) echo 'selected'; ?> value="2025" >2025</option>
					</select>
				</td>
				
				<td align="center">
					<input type="submit" name="submit" value="Görüntüle" />
				</td>
			</tr>
		
		</table>
			
	</form>
	</br>
	
	<?php
		if(isset($_POST['ay']))
            $ay=$_POST['ay'];
			
		if(isset($_POST['yil']))
			$yil=$_POST['yil'];
		echo draw_calendar($ay,$yil);
	?>
	
</body>

	<script type="text/JavaScript">
				
	</script>

</html>