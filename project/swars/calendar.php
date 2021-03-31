<?php
/*          INSERT THIS IN SQL QUERY WHEN CREATING TABLES FOR DATABASE(bookingcalendar)

CREATE TABLE `bookings` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `date` date NOT NULL,
 `name` varchar(255) NOT NULL,
 `timeslot` VARCHAR(255) NOT NULL,
 `email` varchar(255) NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1

*/
function build_calendar($month, $year) {
    
    $mysqli = new mysqli('localhost','root','','bookingcalendar');
     // Create array containing abbreviations of days of week.
     $daysOfWeek = array('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday');
     $firstDayOfMonth = mktime(0,0,0,$month,1,$year);
     // How many days does this month contain?
     $numberDays = date('t',$firstDayOfMonth);
     // Retrieve some information about the first day of the
     // month in question.
     $dateComponents = getdate($firstDayOfMonth);
     // What is the name of the month in question?
     $monthName = $dateComponents['month'];
     // What is the index value (0-6) of the first day of the
     // month in question.
     $dayOfWeek = $dateComponents['wday'];
    if($dayOfWeek==0){
        $dayOfWeek = 6;
    }else{
        $dayOfWeek = $dayOfWeek-1;
    }
     // Create the table tag opener and day headers
    $datetoday = date('Y-m-d');
    
    $calendar = "<table class='table table-bordered'>";
    echo '<a href="Navigation.php"><i style="color:black;font-size:30px;margin-left:-50px;padding-top:20px;" class="fa fa-arrow-left"></i></a>';
    $calendar .= "<center><h2 style='margin-top:-25px;font-weight:bold'>$monthName $year</h2>";
    $calendar.= "<a style='position:static;margin-left:1px;margin-top:-80px;font-weight:bold;font-size:20px;padding-top:0;height:30px;width:30px;border:none;border-radius:50%;background-color:#f9b79f;color:white;' class='btn btn-xs btn-primary' href='?month=".date('m', mktime(0, 0, 0, $month-1, 1, $year))."&year=".date('Y', mktime(0, 0, 0, $month-1, 1, $year))."'>&#8249;</a> ";
    
    $calendar.= " <a style='margin-left:90px;padding: 5px 15px;border-radius:20px;border:none;background-color:#f9b79f' class='btn btn-xs btn-primary' href='?month=".date('m')."&year=".date('Y')."'>Current Month</a> ";
    
    $calendar.= "<a style='position:static;margin-left:90px;margin-top:-80px;font-weight:bold;font-size:20px;padding-top:0;height:30px;width:30px;border:none;border-radius:50%;background-color:#f9b79f;color:white;' class='btn btn-xs btn-primary' href='?month=".date('m', mktime(0, 0, 0, $month+1, 1, $year))."&year=".date('Y', mktime(0, 0, 0, $month+1, 1, $year))."'>&#8250;</a></center><br>";

      $calendar .= "<tr>";
     // Create the calendar headers
     foreach($daysOfWeek as $day) {
          $calendar .= "<th  class='header'>$day</th>";
     } 
     // Create the rest of the calendar
     // Initiate the day counter, starting with the 1st.
     $currentDay = 1;
     $calendar .= "</tr><tr>";
     // The variable $dayOfWeek is used to
     // ensure that the calendar
     // display consists of exactly 7 columns.

     if ($dayOfWeek > 0) { 
         for($k=0;$k<$dayOfWeek;$k++){
                $calendar .= "<td  class='empty'></td>"; 
         }
     }

     $month = str_pad($month, 2, "0", STR_PAD_LEFT);
  
     while ($currentDay <= $numberDays) {
          // Seventh column (Saturday) reached. Start a new row.
        if ($dayOfWeek == 7) {
            $dayOfWeek = 0;
            $calendar .= "</tr><tr>";
        }
        $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
        $date = "$year-$month-$currentDayRel";
        $dayname = strtolower(date('l', strtotime($date)));
        $eventNum = 0;
        $today = $date==date('Y-m-d')? "today" : "";
                     // BLOCK A DAY OF A WEEK 
        if($dayname=='' || $dayname==''){
            $calendar.="<td><h4>$currentDay</h4> <button class='btn btn-danger btn-xs'>Holiday</button>";
        } 
        elseif($date<date('Y-m-d')){
            $calendar.="<td style='background-color:#f2f2f2'><h4>$currentDay</h4> <button class='btn btn-danger btn-xs' style='visibility:hidden'>Disabled</button>";
        }else{
            $totalbookings = checkSlots($mysqli,$date);
            if($totalbookings==20){
                $calendar.="<td class='$today'><h4>$currentDay</h4> <a href='#' class='btn btn-danger btn-xs'>All Booked</a>";
            }else{
                $availableslots = 20 - $totalbookings;
                $calendar.="<td class='$today'><h4>$currentDay</h4> <a href='book.php?date=".$date."' style='border-color:#71c171;background-color:#71c171;border-radius:20px;padding: 2px 8px;' class='btn btn-success btn-xs'>Book</a><br><small><i>$availableslots slots left</i></small>";
            }
        }
        
        $calendar .="</td>";
        // Increment counters
        $currentDay++;
        $dayOfWeek++;
     }
     
     // Complete the row of the last week in month, if necessary
     if ($dayOfWeek != 7) { 
          $remainingDays = 7 - $dayOfWeek;
            for($l=0;$l<$remainingDays;$l++){
                $calendar .= "<td class='empty'></td>"; 
         }
     }
     $calendar .= "</tr>";
     $calendar .= "</table>";
     return $calendar;
}

    function checkSlots($mysqli, $date){
        $stmt = $mysqli->prepare("select * from bookings where date = ?");
        $stmt->bind_param('s',$date);
        $totalbookings = 0;
        if($stmt->execute()){
            $result = $stmt->get_result();
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $totalbookings++;
                }
                $stmt->close();
            }
        }
        return $totalbookings;
    }
?>

<html lang="en">
<head>
    <title>Calendar</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="calendar.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                     $dateComponents = getdate();
                     if(isset($_GET['month']) && isset($_GET['year'])){
                         $month = $_GET['month']; 			     
                         $year = $_GET['year'];
                     }else{
                         $month = $dateComponents['mon']; 			     
                         $year = $dateComponents['year'];
                     }
                    echo build_calendar($month,$year);
                ?>
                <div class="form-group">
                    <form action="calendar.php" method="get">
                    <button type="submit" name="reserve">Display Reservation</button>
                    </form>
                </div>

                <?php
                if(isset($_GET['reserve'])) {
                    echo '<script type="text/javascript">swal("AWW", "You have no reservations yet!", "warning");</script>'; //if user has no reservations yet

                }
                ?>
            </div>
        </div>
    </div>
    <section class="main-content">
        <div class="container">
            <h1>Reservations</h1>
            <br>
            <table class="table-1">
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Guests</th>
                    <th>Contact</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>2021-03-31</td>
                    <td>18:00-21:00</td>
                    <td>Jeanie</td>
                    <td>limborock15@gmail.com</td>
                    <td>3</td>
                    <td> 09167642651 </td>
                    <td>
                        <form action="calendar.php" method="get">
                            <button style="cursor:pointer;padding:8px;font-size:12px;border-radius:4px;background-color:#ff6666;color:white;border:none"name="del_button">CANCEL</button>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>2021-03-31</td>
                    <td>18:00-21:00</td>
                    <td>Jeanie</td>
                    <td>limborock15@gmail.com</td>
                    <td>3</td>
                    <td> 09167642651 </td>
                    <td>
                        <form action="calendar.php" method="get">
                            <button style="cursor:pointer;padding:8px;font-size:12px;border-radius:4px;background-color:#ff6666;color:white;border:none"name="del_button">CANCEL</button>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>2021-03-31</td>
                    <td>18:00-21:00</td>
                    <td>Jeanie</td>
                    <td>limborock15@gmail.com</td>
                    <td>3</td>
                    <td> 09167642651 </td>
                    <td>
                        <form action="calendar.php" method="get">
                            <button style="cursor:pointer;padding:8px;font-size:12px;border-radius:4px;background-color:#ff6666;color:white;border:none"name="del_button">CANCEL</button>
                        </form>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </section>
  
</body>

</html>
