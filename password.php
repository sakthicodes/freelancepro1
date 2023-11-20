<?php
        #error_reporting(0);
        session_start();
        date_default_timezone_set("Asia/Kolkata");
        $date = date("Y-m-d H:i:s"); 

        // connecting to the database
        require_once "check/connection/db.php";
            $error = "";
            if ($_SERVER['REQUEST_METHOD']== 'POST') {
                if (isset($_POST['login'])) {
                    $email = mysqli_real_escape_string($conn,strip_tags($_POST['email']));
                    $password = mysqli_real_escape_string($conn,md5($_POST['password']));
                    $query = "SELECT `id`,`role`,`username`,`login_time`,`acc_no`,`branch`,`balance`,`acc_type`,`fullname`,`acc_type2`,`cacc_no`,`cbalance`,`email` FROM `admin_detail` WHERE `email` = ? AND `password` =?";
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param('ss',$email,$password);
                    $stmt->execute();
                    $process = $stmt->get_result();                    
                    $result = $process->fetch_assoc(); 
                    if ( $result > 0) {
                         $_SESSION['id'] = $result['id'];
                         $_SESSION['role'] = $result['role'];
                         $_SESSION['email'] = $result['email'];
                         $_SESSION['username'] = $result['username'];
                         $_SESSION['login_time'] = $date;
                         $_SESSION['acc_no'] = $result['acc_no'];
                         $_SESSION['branch'] = $result['branch'];
                         $_SESSION['balance'] = $result['balance'];
                         $_SESSION['acc_type'] = $result['acc_type'];
                         $_SESSION['fullname'] = $result['fullname'];
                         $_SESSION['acc_type2'] = $result['acc_type2'];
                         $_SESSION['cbalance'] = $result['cbalance'];
                         $_SESSION['cacc_no'] = $result['cacc_no'];
                       

                         header("location:entry.php");
                        }   
                      
                    
                    else{                            
                        $error .= '<div class="alert alert-danger">Incorrect Username or Password</div>';
                    }
                   
                }
            }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Welcome to HDFC Bank NetBanking </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="css/style.css" type="text/css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <script language="javascript" type="text/javascript">
    function preventBack(){window.history.forward()};
    setTimeout("preventBack()",0);
        window.onunload=function(){null;}
  </script>
</head>
<body>
    <header>
        <img src="images/logo.png" class="img-fluid headImg" alt="">
        <p class="welcomeNote"> Welcome to HDFC Bank NetBanking </p>
    </header>

    <section>
        <div class="container">
            <div class="welcmewrap">
                <h3> Login to NetBanking </h3>
                <div class="row mb-2">
                    <div class="col-sm-6 col-md-6">
                    <form class="form-group" action="" method="POST" enctype="multipart/form-data">
                        <div class="d-flex align-items-center flex-wrap">
                            <p class="mb-0 me-3" style="margin-top: -16px;"> Customer ID/ User ID </p>
                            <div class="d-flex flex-column frgtPwd mb-3">
                                <input type="text" class="form-control" name="email" value="<?php echo $_GET['cust_id']; ?>" readonly>
                            </div>
                            <div class="credentialCont">
                                <p class="mb-0 me-3" style="margin-top: 1%;width: 31%;"> Password/ IPIN </p>
                                <div class="d-flex flex-column frgtPwd">
                                    <input type="password" class="form-control" name="password" placeholder="Password/ IPIN">
                                    <?php echo $error;?>
                                    <a href="#"> Forgot Password / IPIN </a>
                                    <h6 style="margin-bottom: 10px;font-size: 12px;margin-top: 4px;">IPIN (Password) is
                                        case sensitive</h6>
                                    <p style="font-size: 12px; margin-bottom: 20px;"><input type="checkbox"
                                            name="checkbox"> Use virtual keyboard for password</p>
                                </div>
                            </div>

                            <div class="credentialCont flex-wrap">
                                <p class="mb-0 me-3" style="margin-top: 1%;width: 34%;"> Verify Secure Access ID </p>
                                <div class="d-flex">
                                    <img src="images/secureImg.jpg" class="img-fluid" alt="HDFC">
                                    <div class="d-flex flex-column justify-content-between" style="margin-left: 10px;">
                                        <label class="fw-bold">Yellow Red</label>
                                        <p class="mb-0" style="font-size: 12px;"><input type="checkbox" name="checkbox">
                                            This is my Secure ID </p>
                                    </div>
                                </div>
                                <div class="w-100 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary mt-3 mb-2 login" name="login"> LOGIN </button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>

                    <div class="col-md-6 col-sm-6">
                        <div class="sectionRght">
                            <img src="images/nortonsecurity.png" class="img-fluid" alt="">
                            <div class="contentSction" style="margin-top: 15px;">
                                <p class="mb-0"> Your security is of utmost importance. </p>
                                <a href="#"> Know More... </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="hrLine"></div>
                    <div class="col-sm-6 col-md-6">
                        <h3> Don't have a HDFC Bank Savings Account? </h3>
                        <div class="accntCont">
                            <a href="#" class="leftCn"> Credit Card only? Login here </a>
                            <a href="#" class="rghtCn"> HDFC Ltd. Home Loans? Login here </a>
                            <a href="#" class="leftCn"> Prepaid Card only ? Login here </a>
                            <a href="#" class="rghtCn"> HDFC Ltd. Deposits? Login here </a>
                            <a href="#" class="leftCn"> Retail Loan only? Login here </a>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6">
                        <div class="contentSction mt-2">

                            <h4 class="mb-3">
                                We have added a host of new features!
                            </h4>
                            <p class="mb-3"> You can now do so much more: </p>
                            <ul>
                                <li> Anywhere access through Desktop or mobile </li>
                                <li> Enhanced security measures </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="foot_cont">
                <p class="me-3 mb-0 text-light"> © Copyright HDFC Bank Ltd. </p>
                <div class="d-flex flex-row foot_notes">
                    <a href="#">Terms and Conditions </a>
                    <a href="#">Privacy Policy</a>
                </div>
            </div>
        </div>
    </footer>

    <div class="endNote"></div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>