var pattern = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-])+\.([A-Za-z]{2,4})$/;
var password = /^(?=.\d)(?=.[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/;
var alpha_regrex = /^[A-Za-z ]+$/;
var alpha_regrex2 = /^[a-zA-Z'-`’]+$/;
var regex = /^[0-9]+$/;


$(document).ready(function () {
    $('#submitRegisterForm').click(function () {
        var contact_flag = 0;

        var name = $("#name").val();
        var email = $("#email").val();
        var mobile = $("#mobile").val();
        var area = $("#area").val();
        var city = $("#city").val();
        var pincode = $("#pincode").val();

        if (name == "") {
            $("#name_validate").html('Please enter name.');
            contact_flag = contact_flag + 1;
        } else {
            $('#name_validate').html("");
            contact_flag = 0;
        }
        if (email == "" && pattern.test(email) == false) {
            $("#email_validate").html('Please enter email.');
            contact_flag = contact_flag + 1;
        } else {
            $("#email_validate").html("");
            contact_flag = 0;
        }
        // if (mobile == "") {
        //     $("#mobile_validate").html('Please enter mobile no.');
        //     contact_flag = contact_flag + 1;
        // } else {
        //     $("#mobile_validate").html("");
        //     contact_flag = 0;
        // }

        if (mobile == "") {
            $("#mobile_validate").html('Please enter mobile no.');
            contact_flag = contact_flag + 1;
        } else if (!regex.test(mobile)) {
            $("#mobile_validate").html('Please enter valid mobile no.');
            contact_flag = contact_flag + 1;
        } else if (mobile.length !== 10) { // Check the length of mobile
            $("#mobile_validate").html('Please enter valid mobile no.');
            contact_flag = contact_flag + 1;
        } else {
            contact_flag = 0;
        }
        // if (area == "") {
        //     $("#area_validate").html('Please enter area.');
        //     contact_flag = contact_flag + 1;
        // } else {
        //     $("#area_validate").html("");
        //     contact_flag = 0;
        // }
        // if (city == "") {
        //     $("#city_validate").html('Please enter city.');
        //     contact_flag = contact_flag + 1;
        // } else {
        //     $("#city_validate").html("");
        //     contact_flag = 0;
        // }

        // if (pincode == "") {
        //     $("#pincode_validate").html('Please enter pincode.');
        //     contact_flag = contact_flag + 1;
        // } else {
        //     $("#pincode_validate").html("");
        //     contact_flag = 0;
        // }
        if (contact_flag == 0) {
            // if (alpha_regrex.test(name) == true && mobile != '' && area != '' && city != '' && pincode != '' && email != '' && pattern.test(email) == true) {
            if (alpha_regrex.test(name) == true && mobile != ''  && email != '' && pattern.test(email) == true) {
                var form = $('#registerfrm')[0];
                var formData = new FormData(form);
                $.ajax({
                    url: base_url + 'home/registerForm',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    cache: false,
                    async: false,
                    dataType: 'json',
                    success: function (data) {
                        if (data.success == "ok") {
                            $("#registerSuccessMSG").css({ "color": "green", "font-size": "13px", "text-align": "center" });
                            $("#registerSuccessMSG").html("Thank you for contacting us we will get back to you shortly!!");
                            $("#registerSuccessMSG").show();
                            $("#registerSuccessMSG").delay(5000).fadeOut();
                            $.magnificPopup.open({
                                items: {
                                  src: '#scanPop'
                                },
                                type: 'inline',
                                closeOnBgClick: false,
                                enableEscapeKey: false,
                                showCloseBtn:false,
                                closeOnBgClick: false
                              });
                            // window.location.reload();
                            $("#registerfrm").trigger("reset");
                            // window.location.href = base_url + 'thank-you';
                        } else {
                            $("#registerSuccessMSG").css({ "color": "red", "font-size": "15px", "font-weight": "800", "margin-top": "10px", "text-align": "center" });
                            $("#registerSuccessMSG").html("Something went wrong ,please try again!");
                            $("#registerSuccessMSG").show();
                            $("#registerSuccessMSG").delay(5000).fadeOut();
                        }
                    }
                });
            }
        }
    });
    $("#name").keyup(function () {
        var user_Name = $("#name").val();
        if (user_Name == "") {
            $("#name_validate").html('Please enter full name.');
        } else {
            $("#name_validate").html('');
        }
    });

    $("#email").keyup(function () {
        var Email = $("#email").val();
        if (Email == "") {
            $("#email_validate").html('Please enter email.');
        } else if (pattern.test(Email) == false) {
            $("#email_validate").html('Please enter valid email.');
            contact_flag = 0;
        } else {
            $("#email_validate").html('');
        }
    });
    $("#mobile").keyup(function () {
        var user_Mobile = $("#mobile").val();
        if (user_Mobile == "") {
            $("#mobile_validate").html('Please enter mobile no.');
            contact_flag = 0;
        }
        else if (user_Mobile.password <= 8 && user_Mobile.password >= 12) {
            $("#mobile_validate").html('Please enter valid mobile no..');
            contact_flag = 0;
        }
        else if (user_Mobile != "") {
            $("#mobile_validate").html('');
        } else {
            $("#mobile_validate").html('');
        }
    });
    // $("#area").keyup(function () {
    //     var area = $("#area").val();
    //     if (area == "") {
    //         $("#area_validate").html('Please enter your area.');
    //     } else {
    //         $("#area_validate").html('');
    //     }
    // });
    // $("#city").keyup(function () {
    //     var city = $("#city").val();
    //     if (city == "") {
    //         $("#city_validate").html('Please enter your city.');
    //     } else {
    //         $("#city_validate").html('');
    //     }
    // });

    // $("#pincode").keyup(function () {
    //     var pincode = $("#pincode").val();
    //     if (pincode == "") {
    //         $("#pincode_validate").html('Please enter your pincode.');
    //     } else {
    //         $("#pincode_validate").html('');
    //     }
    // });
})


$( '.numberOnly' ).keypress( function ( e ) {
    var unicode = e.charCode ? e.charCode : e.keyCode
    if ( unicode != 8 ) { 
      if ( unicode < 48 || unicode > 57 ){ 
         return false 
      }
    }
 });
  $(document).on('keypress', '.SpaceNot', function(e) {
     if (e.keyCode == 32) return false;
 });
$(document).on('keyup blur', '.textalpha', function () {
    var node = $(this);
    var varID = $(this).attr('id');
    $('#' + varID).val($('#' + varID).val().replace(/[^A-Za-z_\s]/, ''), function (str) {
        return '';
    });
});
$(document).on('keydown', '.textalpha', function (event) {
    var keyCode = event.keyCode || event.which;
    if (!((keyCode >= 65 && keyCode <= 90) || (keyCode >= 97 && keyCode <= 122) || keyCode === 32 || keyCode === 95)) {
        event.preventDefault();
    }
});