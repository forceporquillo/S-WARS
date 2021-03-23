<?php session_start()
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {font-family: Arial;font-size: 17px;padding: 8px;}
* {box-sizing: border-box;}
.row {display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;margin: 0 -16px;
}

.col-25 {-ms-flex: 25%; /* IE10 */ flex: 25%;}
.col-50 {-ms-flex: 50%; /* IE10 */flex: 50%;}
.col-75 {-ms-flex: 75%; /* IE10 */flex: 75%;}
.col-25,.col-50,.col-75 {padding: 0 16px;}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {margin-bottom: 10px;display: block;}
.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}
.btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}
.btn:hover {background-color: #45a049;}
a {color: #2196F3;}
hr {border: 1px solid lightgrey;}
span.price {float: right; color: grey;}
/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {.row {flex-direction: column-reverse;}.col-25 {margin-bottom: 20px;}}
</style>

</head>
<body>

<h2>S-Wars Membership Checkout Form</h2>
<p><?php echo $_SESSION['note'] ?></p>
<div class="row">
  <div class="col-75">
    <div class="container">
      <form method="post" action="payment.php">
      
        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="firstname" required value="John M. Doe">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" required value="john@example.com">
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" required value="542 W. 15th Street">
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" required value="New York">

            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" required name="state" value="NY">
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" required name="zip" value="10001">
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" required value="John More Doe">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" required value="1111-2222-3333-4444">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" required value="September">
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" required value="2018">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" required value="352">
              </div>
            </div>
          </div>
          
        </div>
        <input type="submit" value="<?php echo $_SESSION['button'] ?>" class="btn" name='update'>
      </form>
      <?php
        if(isset($_POST['update'])){
          $db = mysqli_connect('localhost', 'root', '', 'registration');
          $res_username = $_SESSION['username']; ;
          $memberhsip_query = "SELECT membership FROM users WHERE username='$res_username'";
          $result = mysqli_query($db, $memberhsip_query);
          $member = mysqli_fetch_assoc($result);
          if($member['membership']=='basic'){
            $plan = 'member';
          }
          if($member['membership']=='member'){
            $plan = 'basic';
          }
          $update_query = "UPDATE users SET membership='$plan' WHERE username='$res_username'";
          if (mysqli_query($db, $update_query)) {
            echo "<script type='text/javascript'>alert('Membership Plan updated successfully');</script>";
          } else {
            echo "<script type='text/javascript'>alert('Error updating record: '". mysqli_error($db).");</script>";
          }mysqli_close($db);
          echo '<script> location.replace("Navigation.php"); </script>';
        }
      ?>
    </div>
  </div>
  <div class="col-25">
    <div class="container">
      <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>1</b></span></h4>
      <p><a href="#"><?php echo $_SESSION['product'] ?></a> <span class="price"><?php echo $_SESSION['price']?></span></p>
      <hr>
      <p>Total <span class="price" style="color:black"><b><?php echo substr($_SESSION['price'],0,3) ?></b></span></p>
    </div>
  </div>
</div>

</body>
</html>
