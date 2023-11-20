<?php

session_start();
  // connecting to the database
require_once "check/connection/db.php";
$fullname = $_SESSION['fullname'];
$email = $_SESSION['email'];
$login_time = $_SESSION['login_time'];

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
    <div class="mainCont">
        <header class="p-0 m-0 fixedHead">
            <div class="contPrimary">
                <div class="headerTop">
                    <ul>
                        <li><a href="#">SmartBuy </a></li>
                        <li><a href="#">Personalize User ID </a></li>
                        <li><a href="#">Insta Alerts </a></li>
                        <li><a href="#">SMS Banking </a></li>
                        <li><a href="#">Registration </a></li>
                        <li><a href="#">Contact Us </a></li>
                    </ul>
                </div>

                <div class="headN">
                    <img src="images/hdfc_logo.jpg" class="img-fluid" alt="HDFC Logo">
                    <div class="welcomeContent">
                        <div class="d-flex nameLinks" style="margin-bottom: 4px;">
                            <div class="d-flex flex-column align-items-start ps-3 pt-2">
                                <p style="font-size: 11px;line-height: 13px;color: #004a8f;font-weight: bold;"
                                    class="m-0">
                                    WELCOME, <span><?php echo $fullname;?></span></p>
                                <p style="font-size: 11px;line-height: 13px;color: #004a8f;"> Last Log in: <?php echo $login_time; ?></p>
                            </div>
                            <div class="d-flex rt_details">
                                <ul>
                                    <li><a href="#"> Change Password </a></li>
                                    <li><a href="./profile-details.php"> Profile Details </a></li>
                                    <li> <a href="./logout.php" class="btn btn-primary btn_logout"> Logout</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="menu ps-3">
                            <ul class="d-flex">
                                <li class="active"><a href="entry.php">Accounts</a> 
</li>
                                <li><a href="#"> Fund Transfer </a></li>
                                <li><a href="#"> BillPay & Recharge </a></li>
                                <li><a href="#"> Cards </a></li>
                                <li><a href="#"> Demat </a></li>
                                <li><a href="#"> Mutual Fund </a></li>
                                <li><a href="#"> Insurance </a></li>
                                <li><a href="#"> Loans </a></li>
                                <li><a href="#"> Offers </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <section class="sidebar">
            <div class="sidebarContents">
                <ul>
                    <label> Profile Details </label>
                    <li style="background-color: #fff;">
                        <a href="#"> View Contact Details </a>
                    </li>

                    <li>
                        <a href="#"> Change Customer Profile </a>
                    </li>

                    <li>
                        <a href="#"> Update Address </a>
                    </li>

                    <li>
                        <a href="#" style="padding: 9px 15px;"> Transaction Consent For Senior Citizens </a>
                    </li>
                </ul>
            </div>
        </section>

        <section class="main_content">
            <div class="d-flex justify-content-between mb-2">
                <h2 style="font-weight: 500;">Contact Details</h2>

                <div class="d-flex flex-wrap align-items-center">
                    <a href="#" style="color: #004a8f;text-decoration: underline;font-size: 13px;">View Demo</a>
                </div>
            </div>

            <div class="profile_details">
                <ul>
                    <li>
                        <label> Customer Name: </label>
                        <span> <b><?php echo $fullname;?></b></span>
                    </li>

                    <li>
                        <label> Address: </label>
                        <span> B-5/67 SAFDARJUNG ENCLAVE </span>
                    </li>

                    <li>
                        <label>. </label>
                        <span> </span>
                    </li>

                    <li>
                        <label>. </label>
                        <span> </span>
                    </li>

                    <li>
                        <label> City: </label>
                        <span> NEW DELHI </span>
                    </li>

                    <li>
                        <label> State: </label>
                        <span> DELHI </span>
                    </li>

                    <li>
                        <label> Zip: </label>
                        <span> 110029 </span>
                    </li>

                    <li>
                        <label> Country: </label>
                        <span> INDIA </span>
                    </li>

                    <li>
                        <label> Date Of Birth: </label>
                        <span> 03/12/1986 </span>
                    </li>

                    <li>
                        <label> Pan Card No.: </label>
                        <div class="d-flex justify-content-between" style="width: 75%;">
                            <span> DFOPS0725A </span>
                            <a href="#" style="color: #104887;"> Edit PAN Number </a>
                        </div>
                    </li>
                </ul>

                <ul>
                    <li style="align-items: center;">
                        <label> Email ID: </label>
                        <div class="d-flex justify-content-between" style="width: 75%;align-items: center;">
                            <span><?php echo $email;?></span>
                            <a href="#" style="color: #104887;width: 22%;"> Download Email ID update form </a>
                        </div>
                    </li>

                    <li>
                        <label> Phone No. (Res.) : </label>
                        <span> </span>
                    </li>

                    <li>
                        <label> Phone No. (Off) : </label>
                        <span> </span>
                    </li>

                    <li>
                        <label> Fax No. : </label>
                        <span> </span>
                    </li>

                    <li>
                        <label> Mobile No. : </label>
                        <span> XXXXXXX53535 </span>
                    </li>
                </ul>
                <div class="d-flex justify-content-end">
                    <a href="#" style="color: #104887;font-size: 13px;">Return to Account Summary</a>
                </div>

                <div class="tableContainer">
                    <p>
                        The above address is applicable only to the following accounts.
                    </p>
                    <table class="table table-bordered border-secondary table-sm">
                        <thead class="table-secondary">
                            <tr>
                                <th scope="col" style="color: #666666; font-size: 12px;" class="py-2"> Account No.</th>
                                <th scope="col" style="color: #666666; font-size: 12px;" class="py-2">Account Type</th>
                                <th scope="col" style="color: #666666; font-size: 12px;" class="py-2">Relationship</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="py-2">50100262623405</td>
                                <td class="py-2">SAVINGS</td>
                                <td class="py-2">Sole Owner</td>
                            </tr>                            
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end">
                    <a href="#" style="color: #104887;font-size: 13px;margin-top: -15px;">Return to Top</a>
                </div>
            </div>

            <div class="note mt-5" style="margin-bottom: 80px !important;">
                <label class="fw-bold mb-3"> Note </label>
                <ul class="ps-3">
                    <li>
                        <p class="mb-1"> <img src="images/bulletIcon.png" class="img-fluid me-3" alt="">
                            To update PAN CARD details of non- individual entities (Partnerships, Companies, HUF, etc.),
                            please visit your nearest HDFC Bank branch to submit the same.
                        </p>
                    </li>
                    <li>
                        <p><img src="images/bulletIcon.png" class="img-fluid me-3" alt="">
                            In case you have any concern on your contact details being used for sales calls, you can
                            register for Do Not Call facility offered by HDFC Bank. <a href="#">Click here</a> to
                            register your contact no's under Do Not Call facility.
                            /p>
                    </li>
                </ul>
            </div>

            <div class="foot">
                <marquee class="text-danger fw-bold" style="font-size: 13px;" scrollamount="3"> Linking PAN with Aadhaar
                    is mandatory! To avoid the restrictions on certain banking transactions and high TDS/TCS, please
                    link your PAN with Aadhar <a href="#"> Click here</a> </marquee>
                <p class="text-center w-100 mb-0" style="font-size: 13px;"> Copyright HDFC Bank Ltd. <a href="#"> Terms
                        and Conditions </a> | <a href="#"> Privacy Policy </a> </p>
            </div>
        </section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>