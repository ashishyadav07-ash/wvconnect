$(document).ready(function(){

    // $('#searchFilterFrm').submit(function(){
    //     //alert(base_url);
    //     //return false;
    //     var form = $('#searchFilterFrm')[0];
    //     var formData = new FormData(form);
    //     //console.log(formData);return false;
    //     //alert(formData);
    //     $.ajax({
    //         url: base_url+'admin/enquiries/searchFilter',
    //         type: 'POST',                         
    //         data: formData,
    //         processData:false,
    //         contentType:false,
    //         cache:false,
    //         async:false,
    //         dataType :'json',
    //         success: function (data) 
    //         {
    //             //alert(data);return false;
    //             if(data.success=="ok"){
    //                 // $("#enquirySuccessMSG").css({"color": "green", "font-size": "13px","text-align": "center"});
    //                 // $("#enquirySuccessMSG").html("Thank you for contacting us we will get back to you shortly!!");
    //                 // $("#enquirySuccessMSG").show();
    //                 // $("#enquirySuccessMSG").delay(5000).fadeOut();
    //                 $("#enquiryfrm").trigger("reset");
    //                 window.location.href = base_url+'thank-you';
    //             }else{
    //                 $("#enquirySuccessMSG").css({"color": "red", "font-size": "15px", "font-weight": "800", "margin-top": "10px","text-align": "center"});
    //                 $("#enquirySuccessMSG").html("Something went wrong ,please try again!");
    //                 $("#enquirySuccessMSG").show();
    //                 $("#enquirySuccessMSG").delay(5000).fadeOut();
    //             }
    //         }
    //     });

    var fromDate = jQuery('#fromDate').datepicker({

        maxDate:0,

        dateFormat: 'yy-mm-dd',

        timepicker:false,

       onSelect: function(dateStr)

        {

            $("#toDate").datepicker("option",{ minDate: new Date(dateStr)})

        }

    });

    var toDate = jQuery('#toDate').datepicker({

        dateFormat: 'yy-mm-dd',

        timepicker:false,

        maxDate:0,

        onSelect: function(dateStr)

        {
            $("#fromDate").datepicker("option",{ maxDate: new Date(dateStr)})

        }

    }); 

        




    // });



});