 <?php
session_start();
include '../connection.php';

$acc = 0;
$msg = 0;

if(isset($_POST['signup']))
{
    $username = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $location = $_POST['district'];

    $pass = password_hash($password, PASSWORD_DEFAULT);

    $sql = "SELECT * FROM admin WHERE email='$email'";
    $result = mysqli_query($connection,$sql);

    if(!$result){
        die("Query error: ".mysqli_error($connection));
    }

    $num = mysqli_num_rows($result);

    if($num > 0){
        $acc = 1;
    }
    else{

        $query = "INSERT INTO admin(name,email,password,location)
                  VALUES('$username','$email','$pass','$location')";

        $query_run = mysqli_query($connection,$query);

        if($query_run){
            $msg = 1;
        }
        else{
            echo "<script>alert('Data not saved');</script>";
        }
    }
}


if(isset($_POST['Login']))
{
    $email = mysqli_real_escape_string($connection,$_POST['email']);
    $password = mysqli_real_escape_string($connection,$_POST['password']);

    $sql = "SELECT * FROM admin WHERE email='$email'";
    $result = mysqli_query($connection,$sql);

    $num = mysqli_num_rows($result);

    if($num == 1){
        $row = mysqli_fetch_assoc($result);

        if(password_verify($password,$row['password'])){
            $_SESSION['email'] = $row['email'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['location'] = $row['location'];

            header("Location: admin.php");
            exit();
        }
        else{
            $msg = 2;
        }
    }
    else{
        $msg = 3;
    }
}
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- ===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="login.css">
         
    <!--<title>Login & Registration Form</title>-->
</head>
<body>
    
    <div class="container">
        <div class="forms">
            <p style="color:"></p>
            <div class="form login">
                <?php
                
                    if($msg==1){
                        echo "<center style='color:#06C167;'>Account created successfully</center>";
                    }
                    if($acc==1){
                        echo "<center style='color:red;'>Account already exists</center>";
                    }
                    if($msg==2){
                        echo "<center style='color:red;'>Incorrect Password</center>";
                    }
                    if($msg==3){
                        echo "<center style='color:red;'>Account does not exist</center>";
                    }
                    ?>
    
                <!-- <p style="color:aqua;">account</p> -->
                <span class="title">Login</span>

                <form action="" method="post">
                    <div class="input-field">
                        <input type="text" placeholder="Enter your email" name="email"required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" id="password" name="password" placeholder="Enter your password" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>
<!-- 
                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="logCheck">
                            <label for="logCheck" class="text">Remember me</label>
                        </div>
                        
                        <a href="#" class="text">Forgot password?</a>
                    </div> -->

                    <div class="input-field button">
                        <button type="submit" name="Login">Login</button>
                        <!-- <input type="button" value="Login" name="Login"> -->
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">Not a member?
                        <a href="#" class="text signup-link">Signup Now</a>
                    </span>
                </div>
            </div>

            <!-- Registration Form -->
            <div class="form signup">
                <?php
                if($msg==1){
                  echo '<p ><center style=\"color:red;\">Account already exists</center></p>';
                }
                ?>
                <span class="title">Registration</span>
            

                <form action="" method="post">
                    <div class="input-field">
                        <input type="text" placeholder="Enter your name" name="name"required>
                        <i class="uil uil-user"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" placeholder="Enter your email" name="email" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <!-- <label for="district">District:</label> -->
                        <select id="district" name="district" style="padding:10px; padding-left: 20px;">
                          <option value="chennai">Chennai</option>
                          <option value="kancheepuram">Kancheepuram</option>
                          <option value="thiruvallur">Thiruvallur</option>
                          <option value="vellore">Vellore</option>
                          <option value="tiruvannamalai">Tiruvannamalai</option>
                          <option value="tiruvallur">Tiruvallur</option>
                          <option value="tiruppur">Tiruppur</option>
                          <option value="coimbatore">Coimbatore</option>
                          <option value="erode">Erode</option>
                          <option value="salem">Salem</option>
                          <option value="namakkal">Namakkal</option>
                          <option value="tiruchirappalli">Tiruchirappalli</option>
                          <option value="thanjavur">Thanjavur</option>
                          <option value="pudukkottai">Pudukkottai</option>
                          <option value="karur">Karur</option>
                          <option value="ariyalur">Ariyalur</option>
                          <option value="perambalur">Perambalur</option>
                          <option value="madurai" selected>Madurai</option>
                          <option value="virudhunagar">Virudhunagar</option>
                          <option value="dindigul">Dindigul</option>
                          <option value="ramanathapuram">Ramanathapuram</option>
                          <option value="sivaganga">Sivaganga</option>
                          <option value="thoothukkudi">Thoothukkudi</option>
                          <option value="tirunelveli">Tirunelveli</option>
                          <option value="tiruppur">Tiruppur</option>
                          <option value="tenkasi">Tenkasi</option>
                          <option value="kanniyakumari">Kanniyakumari</option>
                        </select> 
                        

                        <!-- <input type="password" class="password" placeholder="Create a password" required> -->
                        <i class="uil uil-map-marker icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" id="password" name="password" placeholder="Confirm a password" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>
                   
<!-- 
                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="termCon">
                            <label for="termCon" class="text">I accepted all terms and conditions</label>
                        </div>
                    </div> -->

                    <div class="input-field button">
                       <button type="submit" name="signup">Signup</button>
                        <!-- <input type="button" value="signup" name="signup"> -->
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">Already a member?
                        <a href="#" class="text login-link">Login Now</a>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <script src="login.js"></script>
</body>
</html>
