<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Result</h4>
            <div class="breadcrumb-list">

            </div>
        </div>
        <!-- < ?php print_r($Fetch_data['awardID']);?> -->
        <!-- <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="< ?=base_url();?>admin/nominee"><button class="btn btn-primary-rgba"> <i class="feather icon-list mr-2"></i>Nominees List</button></a>
            </div>                        
        </div> -->
    </div>
</div>
<div class="contentbar">
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <div class="card-body">
                        <!-- For Messages -->
                        <?php $this->load->view('admin/includes/_messages.php') ?>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <select name="awardsID" class="form-control" id="awardsID" placeholder="">
                                    <option selected disabled value="">Select Award Category</option>
                                    <?php foreach ($awards as $value => $display_text) { ?>
                                        <option value="<?php echo $display_text['awardID']; ?>" <?php echo (isset($Fetch_data['awardID']) && $Fetch_data['awardHeading'] != '' && ($display_text['awardID'] == $Fetch_data['awardID'])) ? "selected" : ''; ?>>
                                            <?php echo $display_text['awardHeading']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                                <span id="ErrawardsID"></span>
                            </div>
                            <div class="form-group col-md-1.5">
                                <label for="submit"> </label>
                                <input type="submit" name="search" value="Search" class="btn btn-primary-rgba font-16"
                                    onclick="search()">
                            </div>
                            <!-- < ?php echo form_open_multipart(base_url('admin/result/exportResult'), 'class="form-horizontal"');  ?>  -->
                            <div class="form-group col-md-1.5">
                                <label for="submit"> </label>
                                <input type="submit" name="export" value="Export" class="btn btn-primary-rgba font-16"
                                    onclick="exportData()">
                            </div>
                            <!-- < ?php echo form_close(); ?> -->
                        </div>



                    </div>
                </div>
            </div>
            <!-- End col -->
        </div> <!-- End row -->
    </div>

    <div class="box-container">
        <!-- < ?php echo "<pre>";print_r($awardRecord); die(); ?> -->
        <?php if (!empty($awardRecord)) {
            $i = 1;
            foreach ($awardRecord as $val) {
                ?>
                <div class="square-box">
                    <div class="resultHead">
                        <p><strong>Price:
                                <?php echo $i++ ?>
                            </strong></p>
                        <p><strong>NomineeID:</strong>
                            <?php echo $val['nomineeID']; ?>
                        </p>
                        <p><strong>Name:</strong>
                            <?php echo $val['client_name']; ?>
                        </p>
                        <p><strong>Email:</strong>
                            <?php echo $val['client_email']; ?>
                        </p>
                        <p><strong>Mobile:</strong>
                            <?php echo $val['client_whatsapp_number']; ?>
                        </p>
                        <p><strong>Total Remark:</strong>
                            <?php echo $val['totalRemark']; ?>
                        </p>
                    </div>
                </div>
            <?php }
        } else { ?>
            <div class="resultHead">
                <p><strong>No Records Found...!</strong></p>
            </div>
        <?php } ?>
    </div>



    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Include Select2 CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <!-- Include Select2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <script>
        $(document).ready(function () {
            $('.js-juryID-multiple').select2();
        });
    </script>
    <script>
        function search() {

            var awardsID = $("#awardsID").val();
            if (awardsID == null) {
                document.getElementById("ErrawardsID").innerHTML = "Please Select Award Category..!";
            }
            else {
                window.location.href = '?awardsID=' + awardsID;
            }

            //   alert(window.location.href);
        }


        function exportData() {
            var awardsID = $("#awardsID").val();
            if (awardsID == null) {
                document.getElementById("ErrawardsID").innerHTML = "Please Select Award Category..!";
            }
            else {
                window.location.href = base_url + 'admin/result/exportResult/' + awardsID;
            }
        }
    </script>



    <script src="<?php echo base_url(); ?>ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('awardDescription', {
            allowedContent: true,
            filebrowserUploadUrl: "<?php echo base_url() ?>upload.php",
            filebrowserUploadMethod: "form"
        });
    </script>

    <style>
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: mediumblue;
            border: 1px solid #010101;
            border-radius: 4px;
            cursor: default;
            float: left;
            margin-right: 5px;
            margin-top: 5px;
            padding: 0 5px;
        }

        .box-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin: 0 auto;

        }

        .square-box {
            width: 330px;
            height: 180px;
            background-color: gainsboro;
            text-align: left;
            padding: 21px;
            margin: 10px;
        }

        .resultHead {
            /* font-weight: bold; */
            margin-bottom: 10px;
        }

        .square-box p {
            margin: 0;
            line-height: 1.5;
        }

        #ErrawardsID {
            padding: 10px;
            font-size: 13px;
            color: red;
            font-weight: 500;
        }
    </style>