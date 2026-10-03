<?php session_start();
   include_once('../include/config.php');
   if (strlen($_SESSION['id']==0)) {
   header('location:logout.php');
   die();
   }
   $pid = $_GET['pid'];
   $query=mysqli_query($con,"SELECT * FROM srv_tranaction JOIN customer ON srv_tranaction.CustID = customer.CustID WHERE srv_tranaction.pID = '$pid'");
   while($result=mysqli_fetch_array($query)){
    $payment_id = $result['payment_id']; 
    $CustID = $result['CustID']; 
    $name = $result['name'];
    $email = $result['email'];
    $contact = $result['contact'];
    $service = $result['service']; 
    $amt = $result['amt'];
    $payment_status = $result['payment_status'];
    $original_date = $result['regdate'];
    $timestamp = strtotime($original_date);
    $new_date = date("d/m/y", $timestamp);
   }
?>
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
  <!-- Meta Tags -->
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Laralink">
  <!-- Site Title -->
  <title><?= $name ?>-<?= $pid ?> </title>
  <link rel="stylesheet" href="assets/style.css">
</head>

<body>
  <div class="tm_container">
    <div class="tm_invoice_wrap">
      <div class="tm_invoice tm_style1 tm_type2" id="tm_download_section">
        <div class="tm_bars">
          <span class="tm_accent_bg"></span>
          <span class="tm_accent_bg"></span>
          <span class="tm_accent_bg"></span>
        </div>
        <div class="tm_bars tm_type1">
          <span class="tm_accent_bg"></span>
          <span class="tm_accent_bg"></span>
          <span class="tm_accent_bg"></span>
        </div>
        <div class="tm_shape">
          <div class="tm_shape_in tm_accent_bg"></div>
        </div>
        <div class="tm_shape_2 tm_primary_color">
          <div class="tm_shape_2_in tm_accent_color"></div>
        </div>
        <div class="tm_shape_2 tm_type1 tm_primary_color">
          <div class="tm_shape_2_in tm_accent_color"></div>
        </div>
        <!-- <div class="tm_shape_4 tm_primary_bg"></div> -->
        <div class="tm_shape tm_type1">
          <div class="tm_shape_in tm_accent_bg"></div>
        </div>
        <div class="tm_invoice_in">
          <div class="tm_invoice_head tm_align_center tm_mb20">
            <div class="tm_invoice_left">
              <div class="tm_logo"><img src="../logo.png" alt="Logo"></div>
            </div>
            <div class="tm_invoice_right tm_text_right">
            </div>
          </div>
          <div class="tm_invoice_info tm_mb20">
            <div class="tm_invoice_info_list">
              <p class="tm_invoice_date tm_m0">Date: <b class="tm_primary_color"><?= $new_date ?></b></p>
              <p class="tm_invoice_number tm_m0">Invoice No: <b class="tm_primary_color">#<?= $pid ?></b></p>
            </div>
          </div>
          <div class="tm_invoice_head tm_mb10">
            <div class="tm_invoice_left">
              <p class="tm_mb2"><b class="tm_primary_color">Invoice To:</b></p>
              <p>
                <b><?= $name ?> </b><br>
                +91 <?= $contact ?> <br>
                <?= $email ?>
              </p>
            </div>
            <div class="tm_invoice_right">
              <p class="tm_mb2"><b class="tm_primary_color">Pay To:</b></p>
              <p>
                <b>Finservkart</b><br>
                <small>Plot No 31 Jankipuram Garden Lucknow,<br/>UP, 226021<br/>
                +91 8795174006<br>
                info@finservkart.com</small>
              </p>
            </div>
          </div>
          <div class="tm_table tm_style1 tm_mb30">
            <div class="">
              <div class="tm_table_responsive">
                <table>
                  <thead>
                    <tr>
                      <th class="tm_width_3 tm_medium tm_white_color tm_accent_bg">Service</th>
                      <th class="tm_width_2 tm_medium tm_white_color tm_accent_bg">Price</th>
                      <th class="tm_width_1 tm_medium tm_white_color tm_accent_bg">Qty</th>
                      <th class="tm_width_2 tm_medium tm_white_color tm_accent_bg tm_text_right">Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="tm_width_3"><?= $service ?></td>
                      <td class="tm_width_2">₹<?= $amt ?></td>
                      <td class="tm_width_1">1</td>
                      <td class="tm_width_2 tm_text_right">₹<?= $amt ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="tm_invoice_footer">
              <div class="tm_left_footer">
                <p class="tm_mb2"><b class="tm_primary_color">Payment info:</b></p>
                <p class="tm_m0"><b>Payment ID -</b> <?= $payment_id ?> <br><b>Payment Mode -</b> Online</p>
              </div>
              <div class="tm_right_footer">
                <table>
                  <tbody>
                    <tr>
                      <td class="tm_width_3 tm_primary_color tm_border_none tm_bold">Grand Total</td>
                      <td class="tm_width_3 tm_primary_color tm_text_right tm_border_none tm_bold">₹<?= $amt ?></td>
                    </tr>
                  </tbody>
                </table>
                <div class="tm_shape_3 tm_accent_bg_10"></div>
                <center><img src="assets/paid.png" height="100" width="100"></center>
              </div>
            </div>
            <div class="tm_invoice_footer tm_type1">
              <div class="tm_left_footer"></div>
              <div class="tm_right_footer">
                <div class="tm_sign tm_text_center">
                  <img src="../admin/assets/sign.png" alt="Sign">
                  <p class="tm_m0 tm_ternary_color">Subhawati Devi</p>
                  <p class="tm_m0 tm_f16 tm_primary_color">Founder & Owner</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="tm_invoice_btns tm_hide_print">
        <a href="javascript:window.print()" class="tm_invoice_btn tm_color1">
          <span class="tm_btn_icon">
            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M384 368h24a40.12 40.12 0 0040-40V168a40.12 40.12 0 00-40-40H104a40.12 40.12 0 00-40 40v160a40.12 40.12 0 0040 40h24" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><rect x="128" y="240" width="256" height="208" rx="24.32" ry="24.32" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><path d="M384 128v-24a40.12 40.12 0 00-40-40H168a40.12 40.12 0 00-40 40v24" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><circle cx="392" cy="184" r="24" fill='currentColor'/></svg>
          </span>
          <span class="tm_btn_text">Print</span>
        </a>
        <button id="tm_download_btn" class="tm_invoice_btn tm_color2">
          <span class="tm_btn_icon">
            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M320 336h76c55 0 100-21.21 100-75.6s-53-73.47-96-75.6C391.11 99.74 329 48 256 48c-69 0-113.44 45.79-128 91.2-60 5.7-112 35.88-112 98.4S70 336 136 336h56M192 400.1l64 63.9 64-63.9M256 224v224.03" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>
          </span>
          <span class="tm_btn_text">Download</span>
        </button>
      </div>
    </div>
  </div>
    <script>
 
  window.onafterprint = function(){
    window.location.href = "dashboard.php"; 
  };
</script>
  <script src="assets/jquery.min.js"></script>
  <script src="assets/jspdf.min.js"></script>
  <script src="assets/html2canvas.min.js"></script>
  <script src="assets/main.js"></script>
</body>
</html>