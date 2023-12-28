<footer class="np-footer col-100 floatLft">
      <div class="wrapper-1650">
        <div class="np-footer__inner col-100 floatLft">
          <div class="np-left  floatLft">
            <div class="np-left-logo floatLft">
              <a href="javascript:;" class="inlineBlk">
                <img src="<?php echo base_url();?>front/images/flogo.png" alt>
              </a>
            </div>
            <div class="np-left-icons col-100 floatLft">
              <span><a href="javascript:;"><img
                    src="<?php echo base_url();?>front/images/instagram.svg" alt></a></span>
              <span><a href="javascript:;"><img
                    src="<?php echo base_url();?>front/images/facebook.svg" alt></a></span>
              <span><a href="javascript:;"><img
                    src="<?php echo base_url();?>front/images/twiter-x.svg" alt></a></span>
              <span><a href="javascript:;"><img
                    src="<?php echo base_url();?>front/images/youtube.svg" alt></a></span>
            </div>
          </div>
          <div class="np-right  floatLft">
            <div class="np-right-add floatLft">
              <p>
                18 - B, Juhu Tara Road, Near Kishor Kumar’s Bungalow, <br>
                Shivaji Nagar, Juhu, Mumbai, Maharashtra - 400049
              </p>
              <a href="mail:info@nbsdp.com">info@nbsdp.com</a>
            </div>
          </div>
        </div>
        <div class="np-copywrite col-100 floatLft textCenter">
          <span>Copyright © 2023. All Rights Reserved.</span>
          <a href="javascript:;">Terms of Use</a>
          <a href="javascript:;">Privacy
            Policy</a> <a href="javascript:;">AML Policy</a>
          <a href="javascript:;">Use of cookies</a>
        </div>
      </div>

    </footer>

    <div class="np-registrationPop white-popup mfp-hide col-100 floatLft"  id="registerPop">
      <div class="wrapper-717">
        <div class="np-registrationPop__inner col-100 floatLft relative">
          <form name="registerfrm" id="registerfrm" method="post" action="" class="np-form ">
          <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />
            <div class="np-registrationPop__title col-100 floatLft">
              <h3>Register</h3>
            </div>
             
               
            <ul class="np-registrationPop__inputs col-100 floatLft">
              <li>
                <div class="np-rInputs col-100 floatLft">
                  <input type="text" placeholder="Name*" class=textalpha" name="name" id="name">
                  <span id="name_validate" class="error_info"></span>
                </div>
              </li>
              <li>
                <div class="np-rInputs col-100 floatLft">
                  <input type="text" placeholder="Email ID*" name="email" id="email">
                  <span id="email_validate" class="error_info"></span>
                </div>
              </li>
              <li>
                <div class="np-rInputs col-100 floatLft">
                  <input type="text" placeholder="Mobile number*" class="numberOnly" maxlength="10" name="mobile" id="mobile">
                  <span id="mobile_validate" class="error_info"></span>
                </div>
              </li>
              <li>
                <div class="np-rInputs col-100 floatLft">
                  <input type="text" placeholder="Area" class="textalpha" name="area" id="area">
                  <span id="area_validate" class="error_info"></span>
                </div>
              </li>
              <li>
                <div class="np-rInputs col-100 floatLft">
                  <input type="text" placeholder="City" class="textalpha" name="city" id="city">
                  <span id="city_validate" class="error_info"></span>
                </div>
              </li>
              <li>
                <div class="np-rInputs col-100 floatLft">
                  <input type="text" placeholder="Pincode" maxlength="6" name="pincode" id="pincode" class="numberOnly">
                  <span id="pincode_validate" class="error_info"></span>
                </div>
              </li>
            </ul>
            <button class="np-submitBtn col-100 floatLft" name="submitRegisterForm" id="submitRegisterForm" type="button">Register</button>
            <span id="registerSuccessMSG"></span>

            <div class="np-termCond col-100 floatLft">
              <p>By continuing, you agree to our <a href="">Terms of Service</a>  and <a href="">Privacy Policy</a></p>
            </div>
          </form>
          <div class="btnClose">
            <img src="<?php echo base_url();?>front/images/btnClose.png" alt="">
          </div>
        </div>
      </div>
    </div>
    <div class="np-scannerPop white-popup mfp-hide col-100 floatLft"  id="scanPop">
      <div class="wrapper-550">
        <div class="np-registrationPop__inner col-100 floatLft relative">
            <div class="np-registrationPop__title col-100 floatLft">
              <h3>Scan & Help</h3>
            </div>
            <div class="np-scanImg col-100 floatLft">
              <img src="<?php echo base_url();?>front/images/QRcode.png" alt="">
            </div>
            <div class="np-scanTxt col-100 floatLft">
              <p>Scan this QR code to <br>
                donate and support our cause</p>
            </div>
          <div class="btnClose">
            <img src="<?php echo base_url();?>front/images/btnClose.png" alt="">
          </div>
        </div>
      </div>
    </div>
    <script src="<?php echo base_url();?>front/js/jQuery/jquery-3.6.min.js"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.Marquee/1.6.0/jquery.marquee.min.js"></script>
    <script src="<?php echo base_url();?>front/js/slick-slider/slick.min.js"></script>
    <script src="<?php echo base_url();?>front/js/magnific/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo base_url();?>front/js/site.inc.js"></script>
    <script src="<?php echo base_url();?>/front/js/mainsite.inc.js"></script>

  </body>
</html>