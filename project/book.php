<?php

//connect to database
$mysqli = new mysqli('localhost', 'root', '', 'bookingcalendar');

$username = $_POST['username'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$people = $_POST['people'];
$date = $_POST['date'];
$time = $_POST['time'];


if(isset($_POST['last_check'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $people = $_POST['people'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    
    $stmt = $mysqli->prepare("INSERT INTO bookings (name, email, phone, people, date, time) VALUES ($username, $email, $phone, $people, $date, $time)");
    $stmt->bind_param('sss', $name, $email, $phone, $people, $date, $time);
    $stmt->execute();
    $msg = "<div class='alert alert-success'>Booking Successful</div>";
    $stmt->close();
    $mysqli->close();
}
?>

<!doctype html>
<html lang="en">
  <head>
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">
  </head>

  <body>
    <div class="container">
        <h1 class="text-center">Book for Date: <?php echo date('M d, Y', strtotime($date)); ?></h1><hr>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
               <?php echo isset($msg)?$msg:''; ?>
                <form action="" method="post" autocomplete="off">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="username" value="<?php echo $username ?>"></input>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email" value="<?php echo $email ?>"></input>
                    </div>
                    <div class="form-group">
                        <label for="">Phone</label>
                        <input type="number" class="form-control" name="phone" value="<?php echo $phone ?>"></input>
                    </div>
                    <div class="form-group">
                        <label for="">Number of People</label>
                        <input type="number" class="form-control" name="people" value="<?php echo substr($people,0,1) ?>"></input>
                    </div>
                    <div class="form-group">
                        <label for="">Time</label>
                        <input type="text" class="form-control" name="time" value="<?php echo $time ?>"></input>
                    </div>
                    <button class="btn btn-primary" type="submit" name="last_check">Submit</button>
                </form>
            </div>
        </div>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>

</html>

