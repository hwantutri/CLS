<?php

  include ('./pdfclass/class.ezpdf.php');
  
  session_start();
  include_once 'class_login.php';

  $login = new Login();
  $uid = $_SESSION['uid_new'];
  
  $month = $_POST['report_month'];
  $year = $_POST['report_year'];
  
  if(strlen($month) == 1){
	$month = '0'.$month;
  }
  
  $faculty_info = mysql_query("SELECT faculty.name AS NAME, college_code.cdesc AS DESCR, faculty.dept AS DEPT from faculty, college_code where faculty.faculty_uid='$uid' and college_code.ccode=faculty.college");
  while($get_data = mysql_fetch_object($faculty_info)){
	$f_name = $get_data->NAME;
	$desc = $get_data->DESCR;
	$dept = $get_data->DEPT;
  }
  
  $month_and_year = $year.'-'.$month;
  
  $current_month_year = date('F', strtotime($month_and_year)) .' '. $year;

  $start_date = strtotime($month_and_year . "-01");
  $start_date_week_number = (int) date("W", $start_date);

  $get_end_date = strtotime($month_and_year);
  $no_of_days_in_a_month = date("t", $get_end_date);

  $end_date = strtotime($month_and_year . "-" . $no_of_days_in_a_month);
  $end_date_week_number = (int) date("W", $end_date);
  
  while($end_date_week_number==1){
	$no_of_days_in_a_month--;
	$end_date = strtotime($month_and_year . "-" . $no_of_days_in_a_month);
	$end_date_week_number = (int) date("W", $end_date);
  }
  
// add two timestamps 
  
function sum_the_time($time1, $time2){
	$times = array($time1, $time2);
	$seconds = 0;
	foreach ($times as $time){
		list($hour,$minute,$second) = explode(':', $time);
		$seconds += $hour*3600;
		$seconds += $minute*60;
		$seconds += $second;
	}
	$hours = floor($seconds/3600);
	$seconds -= $hours*3600;
	$minutes  = floor($seconds/60);
	$seconds -= $minutes*60;
	if(strlen($minutes)==1){
		$minutes = '0'.$minutes;
	}
	if(strlen($seconds)==1){
		$seconds = '0'.$seconds;
	}
	if(strlen($hours)==1){
		$hours = '0'.$hours;
	}

	$grand = ($hours.':'.$minutes.':'.$seconds);
	return $grand;
}
  
  
  $n = $start_date_week_number;
  $w = 1;
  $date = date('Y-m-d',$start_date);
  
  //Create PDF instance
  $pdf = new Cezpdf($paper='FOLIO',$orientation='landscape');
  $pdf->ezSetmargins(60,80,40,40);
  $pdf->selectFont('../pdfclass/fonts/Helvetica.afm');

  $center = array('','','','justification'=>'center');
  $pdf->ezText('<b>Mindanao State University - Iligan Institute of Technology</b>',12,$center);
  $pdf->ezText('A. Bonifacio Ave., Tibanga, 9200 Iligan City, Philippines ',12,$center);
  $pdf->ezText('',12);
  $pdf->ezText('',12);
  $pdf->ezText('',12);
  $pdf->ezText('',12);
  
  
  $day_and_date = array();
  $tag = array();
  $total = array();
  $sub = array();
  
  $i = 0;
  $b = 0;
  
  while($n==52){
	$s = (int) date("w",$start_date);
	$e = 6;
	
	$midnight = strtotime("00:00:00");
	$total[$w] = "00:00:00";
	$data[$w][' ']= 'Week ' . $w;
	while($s<=$e){
		$day_and_date[$i] = $i+1;
		$query = mysql_query("SELECT hours_per_day from daily_timer where hours_per_day LIKE '%$date%'");
		while($row = mysql_fetch_array($query)){
			$hours = date('H:i:s', strtotime($row['hours_per_day']));
			$day_and_date[$i] = $i+1 .'       '.$hours;
			$old_total = strtotime($total[$w]) - $midnight;
			$add_total = strtotime($hours) - $midnight;
			$new_total = $old_total + $add_total;
			
			$secs = $new_total%60;
			$mins = floor($new_total/60);
			$hours = floor($mins/60);
			$mins = $mins%60;
			
			$total[$w] = $hours.':'.$mins.':'.$secs;
		}	
		$tag[$i] = $s;
		
		$date = strftime("%Y-%m-%d", strtotime("$date +1 day"));
		
		$s++; $i++;
	}
	$w = 2;
	$n = 2;
  }
  
  while($n <= $end_date_week_number) {
    $s = 0;
    $e = 6;
	
	$midnight = strtotime("00:00:00");
	$total[$w] = "00:00:00";
	$data[$w][' ']= 'Week ' . $w;
    if($n == $start_date_week_number){$s = (int) date("w", $start_date);}
    elseif($n == $end_date_week_number){if($n==52){ $s =(int) date("w", strtotime($date)); $e=(int) date("w",$end_date-1);}else{ $e=(int) date("w", $end_date);}}
    while($s <= $e){
		$day_and_date[$i] = $i+1;
		$query = mysql_query("SELECT hours_per_day from daily_timer where hours_per_day LIKE '%$date%'");
		while($row = mysql_fetch_array($query)){
			$hours = date('H:i:s', strtotime($row['hours_per_day']));
			$day_and_date[$i] = $i+1 .'       '.$hours;
			$old_total = strtotime($total[$w]) - $midnight;
			$add_total = strtotime($hours) - $midnight;
			$new_total = $old_total + $add_total;
			
			$secs = $new_total%60;
			$mins = floor($new_total/60);
			$hours = floor($mins/60);
			$mins = $mins%60;
			
			if(strlen($mins)==1){
				$mins = '0'.$mins;
			}
			if(strlen($secs)==1){
				$secs = '0'.$secs;
			}
			if(strlen($hours)==1){
				$hours = '0'.$hours;
			}
			
			$total[$w] = $hours.':'.$mins.':'.$secs;
		}	
		$tag[$i] = $s;
		
		$date = strftime("%Y-%m-%d", strtotime("$date +1 day"));
		
		$s++; $i++;
    }
    $n++; $w++;
  }
 
	$week=1; $j = 0;
	
	for($week;$week<$w;$week++){	
			if($tag[$j]==0){
				$data[$week]['Sun']= $day_and_date[$j];
				$data[$week]['Mon']= $day_and_date[$j+1];
				$data[$week]['Tue']= $day_and_date[$j+2];
				$data[$week]['Wed']= $day_and_date[$j+3];
				$data[$week]['Thu']= $day_and_date[$j+4];
				$data[$week]['Fri']= $day_and_date[$j+5];
				$data[$week]['Sat']= $day_and_date[$j+6];
			}
			else if($tag[$j]==1){
				$data[$week]['Sun']= $day_and_date[$j-1];
				$data[$week]['Mon']= $day_and_date[$j];
				$data[$week]['Tue']= $day_and_date[$j+1];
				$data[$week]['Wed']= $day_and_date[$j+2];
				$data[$week]['Thu']= $day_and_date[$j+3];
				$data[$week]['Fri']= $day_and_date[$j+4];
				$data[$week]['Sat']= $day_and_date[$j+5];
			}
			else if($tag[$j]==2){
				$data[$week]['Sun']= $day_and_date[$j-2];
				$data[$week]['Mon']= $day_and_date[$j-1];
				$data[$week]['Tue']= $day_and_date[$j];
				$data[$week]['Wed']= $day_and_date[$j+1];
				$data[$week]['Thu']= $day_and_date[$j+2];
				$data[$week]['Fri']= $day_and_date[$j+3];
				$data[$week]['Sat']= $day_and_date[$j+4];
			}
			else if($tag[$j]==3){
				$data[$week]['Sun']= $day_and_date[$j-3];
				$data[$week]['Mon']= $day_and_date[$j-2];
				$data[$week]['Tue']= $day_and_date[$j-1];
				$data[$week]['Wed']= $day_and_date[$j];
				$data[$week]['Thu']= $day_and_date[$j+1];
				$data[$week]['Fri']= $day_and_date[$j+2];
				$data[$week]['Sat']= $day_and_date[$j+3];
			}
			else if($tag[$j]==4){
				$data[$week]['Sun']= $day_and_date[$j-4];
				$data[$week]['Mon']= $day_and_date[$j-3];
				$data[$week]['Tue']= $day_and_date[$j-2];
				$data[$week]['Wed']= $day_and_date[$j-1];
				$data[$week]['Thu']= $day_and_date[$j];
				$data[$week]['Fri']= $day_and_date[$j+1];
				$data[$week]['Sat']= $day_and_date[$j+2];
			}
			else if($tag[$j]==5){
				$data[$week]['Sun']= $day_and_date[$j-5];
				$data[$week]['Mon']= $day_and_date[$j-4];
				$data[$week]['Tue']= $day_and_date[$j-3];
				$data[$week]['Wed']= $day_and_date[$j-2];
				$data[$week]['Thu']= $day_and_date[$j-1];
				$data[$week]['Fri']= $day_and_date[$j];
				$data[$week]['Sat']= $day_and_date[$j+1];
			}
			else if($tag[$j]==6){
				$data[$week]['Sun']= $day_and_date[$j-6];
				$data[$week]['Mon']= $day_and_date[$j-5];
				$data[$week]['Tue']= $day_and_date[$j-4];
				$data[$week]['Wed']= $day_and_date[$j-3];
				$data[$week]['Thu']= $day_and_date[$j-2];
				$data[$week]['Fri']= $day_and_date[$j-1];
				$data[$week]['Sat']= $day_and_date[$j];
			}
			
		$data[$week]['Total Hours']= $total[$week];
		
		$j=$j+7; 
	}
  
  for($q=0;$q<$w;$q++){
	$st = $total[$q];
	$en = $total[$q+1];
	$total[$q+1] = sum_the_time($st, $en);
  }
  
  $data[' ']['Total Hours']= ' ';
  $data['Total Hours'][' '] = 'Total Hours';
  $data['Total Hours']['Total Hours'] = $total[$q];
  
    $pdf->ezText('<b>WEEKLY CONSULTATION REPORT</b>',12,$center);
	$pdf->ezText($current_month_year,12,$center);
    $pdf->ezText('',12);
    $pdf->ezText('',12);
	$pdf->ezText('',12);
	$pdf->ezText('                                     <b>Name</b>		: ' . $f_name,12);
	$pdf->ezText('                                     <b>College / School</b>		: ' . $desc,12);
	$pdf->ezText('                                     <b>Department</b>		: ' . $dept,12);
	$pdf->ezText('',12);
	$pdf->ezText('                                     <b>Date Printed</b>		: ' . date('Y-m-d'),12);
	$pdf->ezText('',12);
    $pdf->ezText('',12);

  $pdf->ezTable($data,"","",array('width'=>600,
                                  'cols'=>array('Total Hours'=>array('justification'=>right))));

  $pdf->ezStream();

?>