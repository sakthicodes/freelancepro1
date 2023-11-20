<?php
session_start();
require_once "check/connection/db.php";
$id1 = $_SESSION['id'];
$fullname = $_SESSION['fullname'];
$login_time = $_SESSION['login_time'];
$branch = $_SESSION['branch'];
$acc_no = $_SESSION['acc_no'];
$balance = $_SESSION['balance'];
$query = "SELECT `id`,`datet`,`narration`,`deposit`,`withd` FROM `subusers` WHERE `id`='$id1'";
$stmt = $conn->prepare($query);
$stmt->execute();
$process = $stmt->get_result();                    

             
if ( $result > 0) {
     $userid1 = $result['id'];
     $datet = $result['datet'];
     $narration = $result['narration'];
     $dept = $result['deposit'];
     $withd = $result['withd'];
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
                                    WELCOME <span><?php echo $fullname; ?> </span></p>
                                <p style="font-size: 11px;line-height: 13px;color: #004a8f;"> Last Log in: <?php echo $login_time; ?> </p>
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
                                <li class="active"><a href="#"> Accounts </a></li>
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
            <div class="accordionScroll">
                <div class="accordion_cont">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button activeBtn" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                  <a href="entry.php">Accounts</a> 
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body" style="padding: 18px 12px !important;">
                                    <a href="#"> Account Summary </a>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Transact
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <ul>
                                        <li><a href="#"> Funds Transfer to own Accounts </a></li>
                                        <li><a href="#"> Open Fixed Deposit < Rs 5 Cr </a>
                                        </li>
                                        <li><a href="#"> Open Recurring Deposit </a></li>
                                        <li><a href="#"> Open New FCNR Deposit </a></li>
                                        <li><a href="#"> Fixed Deposit Sweep-in </a></li>
                                        <li><a href="#"> Overdraft against FD </a></li>
                                        <li><a href="#"> Liquidate Fixed Deposit </a></li>
                                        <li><a href="#"> Liquidate RD/My Passion Fund </a></li>
                                        <li><a href="#"> Liquidate FCNR Deposit </a></li>
                                        <li><a href="#"> CASA Sweepin </a></li>
                                        <li><a href="#"> Open My Passion Fund </a></li>
                                        <li><a href="#"> Top Up add to My Passion Fund </a></li>
                                        <li><a href="#"> Remove FD Overdraft </a></li>
                                        <li><a href="#"> Foreign Currency Inward Remittance </a></li>
                                        <li><a href="#"> Invest in RBI Bonds </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Enquire
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <ul>
                                        <li><a href="#"> View Account Balance </a></li>
                                        <li><a href="#"> A/c Statement - Current & Previous Month </a></li>
                                        <li><a href="#"> A/c Statement - Upto 5 Years </a></li>
                                        <li><a href="#"> A/c Statement - Upto 10 Years </a></li>
                                        <li><a href="#"> Fixed Deposit Summary </a></li>
                                        <li><a href="#"> Recurring Deposit Summary </a></li>
                                        <li><a href="#"> View Cheque Status </a></li>
                                        <li><a href="#"> TDS Inquiry </a></li>
                                        <li><a href="#"> Hold Enquiry </a></li>
                                        <li><a href="#"> Mailbox </a></li>
                                        <li><a href="#"> My Passion Fund Summary </a></li>
                                        <li><a href="#"> View Tax Credit Statements </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Request
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <ul>
                                        <li><a href="#"> View / Add GST No. </a></li>
                                        <li><a href="#"> Request CIBIL TU Score </a></li>
                                        <li><a href="#"> Confirm KYC Details </a></li>
                                        <li><a href="#"> Update Extended KYC </a></li>
                                        <li><a href="#"> Stop Payment of Cheque </a></li>
                                        <li><a href="#"> Cheque Book </a></li>
                                        <li><a href="#"> Demand Draft </a></li>
                                        <li><a href="#"> Add / Update PAN Number </a></li>
                                        <li><a href="#"> Email Statement Registration </a></li>
                                        <li><a href="#"> Form 15 G/H </a></li>
                                        <li><a href="#"> Interest Certificate Download </a></li>
                                        <li><a href="#"> Download Locker Nomination Form </a></li>
                                        <li><a href="#"> Generate MMID </a></li>
                                        <li><a href="#"> Retrieve MMID </a></li>
                                        <li><a href="#"> Cancel MMID </a></li>
                                        <li><a href="#"> Regenerate Direct Tax Challans </a></li>
                                        <li><a href="#"> Regenerate InDirect Tax Challans </a></li>
                                        <li><a href="#"> Modify Secure Access Profile </a></li>
                                        <li><a href="#"> View / Update Nomination Details </a></li>
                                        <li><a href="#"> Change FD Instruction </a></li>
                                        <li><a href="#"> Download Balance Certificate </a></li>
                                        <li><a href="#"> Apply For DTAA </a></li>
                                        <li><a href="#"> Change RD Instruction </a></li>
                                        <li><a href="#"> Download Mandate Form </a></li>
                                        <li><a href="#"> Download Deposit Slip </a></li>
                                        <li><a href="#"> Smart Slips </a></li>
                                        <li><a href="#"> Income Tax E-Filing </a></li>
                                        <li><a href="#"> Positive Pay </a></li>
                                        <li><a href="#"> IPO / Right Issue New </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="main_content">
            <div class="d-flex justify-content-between mb-2">
                <h2 style="font-weight: 500;">View / Download Account Statement</h2>

                <div class="d-flex flex-wrap align-items-center">
                    <img src="images/print_ico.gif" class="img-fluid" alt="HDFC">
                    <a href="#" style="color: #004a8f;text-decoration: underline;font-size: 13px;">Print This Page</a>
                </div>
            </div>

            <div class="statementAccount">
                <p style="color: #004a8f" class="mb-0">Savings Account No.: <b style="font-size: 15px;color: #004a8f"><?php echo $acc_no; ?></b></p>
            </div>
            <table class="table table-responsive table-bordered table-hover">
                                        <tr>
                                        <thead>
                                            <th>Date/Time</th>
                                            <th>Narration</th>
                                            <th>Deposit</th>
                                            <th>Withdrawal</th>
                                        </thead>
                                        </tr>
                                        <tbody>
                                            <?php
                                                $count = 1;
                                            while($array = $process->fetch_array()){?>
                                                <tr>
                                                    <td><?php echo $array['datet']; ?></td>
                                                    <td><?php echo $array['narration']; ?></td>
                                                    <td><?php echo $array['deposit']; ?></td>
                                                    <td><?php echo $array['withd']; ?></td>
                                                    <td>
                                                    <a style="color:white;text-decoration:none;" href="transact.php?uid=<?php echo $array['id'];?>">
                                                            <i class="fas fa-pen text-primary mr-3"></i>
                                                    </a>
                                                </td>
                                                    <td style="display: flex;">
                                                        <a style="color:white;text-decoration:none;" href="edituser.php?uid=<?php echo $array['id'];?>">
                                                            <i class="fas fa-pen text-primary mr-2"></i>
                                                        </a>
                                                        <a style="color:white;text-decoration:none;" href="deleteuser.php?uid=<?php echo $array['id'];?>">
                                                            <i class="fas fa-trash mr-2 text-danger"></i>
                                                        </a>
                                                        		
                                                </tr>
                                            <?php $count= $count+1; }?>
                                        </tbody>
                                    </table>
            <div class="period mt-3" style="margin-bottom: 80px !important;">
                <a href="#" style="color: #004a8f; font-size: 13px;"> [ Select Another Account / Period ] </a>
                <p class="mt-2" style="font-weight: 600; font-size: 13px;"> You do not have any transactions for the selected period. </p>
            </div>

            <div class="foot">
                <marquee class="text-danger fw-bold" style="font-size: 13px;" scrollamount="3"> Linking PAN with Aadhaar is mandatory! To avoid the restrictions on certain banking transactions and high TDS/TCS, please link your PAN with Aadhar <a href="#"> Click here</a> </marquee>
                <p class="text-center w-100 mb-0" style="font-size: 13px;"> Copyright HDFC Bank Ltd. <a href="#"> Terms and Conditions </a> | <a href="#"> Privacy Policy </a> </p>
            </div>
        </section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>