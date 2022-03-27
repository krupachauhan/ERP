<?php
    session_start();
    include "include/db.php";
    if(isset($_POST['login'])){
        $mobile = $_POST['mobile'];
        $pwd = $_POST['pwd'];
        $user = "SELECT * FROM `admin` WHERE email = '$mobile' AND password = '$pwd'";
        $user_r = mysqli_query($con,$user);
        $row = mysqli_fetch_assoc($user_r);
        $rows = mysqli_num_rows($user_r);
        if($rows == 1){
            $_SESSION['id'] = $row['id'];
            $_SESSION['type'] = $row['type'];
            echo "<script>window.location.href='index1.php';</script>";
        }else{
           echo "<script>alert('User not found. Please try again!');</script>";
        }
    }
?>
<?php include 'layouts/header.php'; ?>

<?php include 'layouts/headerStyle.php'; ?>

    <body class="fixed-left">

        <?php include 'layouts/loader.php'; ?>

        <!-- Begin page -->
        <div class="accountbg" style="background: url('public/assets/images/bg3.jpg'); height: 100%;
    width: 100%;"></div>
        <div class="wrapper-page">

            <div class="card" style="box-shadow: 5px 5px 20px 4px #d6d2c3;">
                <div class="card-body">

                    <h3 class="text-center m-0">
                        <a href="index.php" class="logo logo-admin">
                            <!-- <img src="public/assets/images/logo.png" height="100" alt="logo"> -->
                        </a>
                    </h3>

                    <div class="p-3">
                        <h4 class="font-18 m-b-5 text-center">Admin Login</h4>

                        <form class="form-horizontal m-t-30" method="POST">

                            <div class="form-group">
                                <label for="username">Email</label>
                                <input type="email" class="form-control" id="username" placeholder="Enter email" name="mobile" value="<?php echo isset($_POST['mobile']) ? $_POST['mobile']: '' ?>" required="">
                            </div>

                            <div class="form-group">
                                <label for="userpassword">Password</label>
                                <input type="password" class="form-control" id="userpassword" placeholder="Enter password" name="pwd" required="">
                            </div>

                            <div class="form-group row m-t-20  text-center">
                              
                                <div class="col-sm-12  text-center">
                                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit" name="login">Log In</button>
                                </div>
                            </div>

                         
                        </form>
                    </div>

                </div>
            </div>

           

        </div>

        <?php include 'layouts/footerScript.php'; ?>

        <!-- App js -->
        <script src="public/assets/js/app.js"></script>

    </body>
</html>