<?php

function pcfcb_calculate($day, $month, $year){
    $date = strtotime($day.'-'.$month.'-'.$year);
    
    $remaining = $date - time();
    $days = floor($remaining/86400);
    $days++;
    $weeks = floor($days/7);
    $day_remainder = (int)($days % 7);
    
    $sleeps = $days - 1;
    
    return array($days, $weeks, $day_remainder, $sleeps);
}

function pcfcb_checkDateInput($day, $month){
    $monthdays = array(
        1 => 31, 2 => 28, 3 => 31, 4 => 30, 5 => 31, 6 => 30, 7 => 31, 8 => 31, 9 => 30, 10 => 31, 11 => 30, 12 => 31
    );
    
    if(date("L") == 1){
        $monthdays[2] = 29;
    }
    
    if($day > $monthdays[$month]){
        $day = $monthdays[$month];
    }
    
    return $day;
}

function pcfcb_countdown($id, $type){
    $day = get_option('pcfcb_day');
    $month = get_option('pcfcb_month');
    $year = date("Y");
    
    $day = pcfcb_checkDateInput($day, $month);
    
    list($days, $weeks, $day_remainder, $sleeps) = pcfcb_calculate($day, $month, $year);
    
    if($days <= 0){
        $year = date("Y", strtotime('+1 year'));
    }
    
    list($days, $weeks, $day_remainder, $sleeps) = pcfcb_calculate($day, $month, $year);
    
/****************************************************** Change Output ******************************************************/
    $daysop = "$days days";
    
    if($day_remainder != 0 && $weeks != 0){
        $weeksop = "$weeks weeks and $day_remainder days";
    }
    elseif($day_remainder == 0){
        $weeksop = "exactly $weeks weeks";
    }
    elseif($weeks == 0){
        $weeksop = "only $day_remainder days";
    }
    
    $sleepsop = "$sleeps sleeps";
    
    $name = get_option('pcfcb_name');
    $name = ucfirst($name);
    if(substr($name, -1) == 's'){
        $event = "$name' Birthday";
    }
    else{
        $event = "$name's Birthday";
    }
    
/****************************************************** Set Output ******************************************************/
    if($type == 'weeks'){
        if($day_remainder == 1 && $weeks == 1){
            $weeksop = str_replace('days', 'day', $weeksop);
            $weeksop = str_replace('weeks', 'week', $weeksop);
        }
        elseif($weeks == 1){
            $weeksop = str_replace('weeks', 'week', $weeksop);
        }
        elseif($days == 1){
            $weeksop = str_replace('days', 'day', $weeksop);
        }
        
        $output = $weeksop;
    }
    elseif($type == 'sleeps'){
        if($sleeps == 1){
            $sleepsop = str_replace('sleeps', 'sleep', $sleepsop);
        }
        $output = $sleepsop;
    }
    else{
        if($days == 1){
            $daysop = str_replace('days', 'day', $daysop);
        }
        $output = $daysop;
    }
    
/****************************************************** Output ******************************************************/
    if($id){
		if($days != 0){
        	echo "<p id='$id'>It's $output until $event!</p>";
		}
		else{
			echo "<p id='$id'>It's $event!</p>";
		}
	}
    else{
		if($days != 0){
        	echo "<p>It's $output until $event!</p>";
		}
		else{
			echo "<p>It's $event!</p>";
		}
    }
}

function pcfcb_shortcode($atts){
    ob_start();
    
    $atts = shortcode_atts(
        array(
            'id' => '',
            'type' => 'days'
        ),
    $atts);
    
    if(empty($atts['id'])){
        pcfcb_countdown('', $atts['type']);
    }
    else{
        pcfcb_countdown($atts['id'], $atts['type']);
    }
    
    return ob_get_clean();
}

add_shortcode('pcf_bday_countdown', 'pcfcb_shortcode');

?>