<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.css" rel="stylesheet" />
<?php
    if ( isset( $_POST['add_btn_info'] ) ) {
        $upload_notice_return_mgs = $obj->add_btn_info( $_POST );
    }

?>


<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7" style="">
                        <div class="card shadow-lg border-0 rounded-lg mt-5"
                            style="border:2px solid #dee2e6;box-shadow: 0 .5rem 1rem rgb(0 0 0 / 18%) !important;">
                            <div class="card-header"
                                style="background-color: rgba(0, 0, 0, 0.03);border-bottom: 1px solid rgba(0, 0, 0, 0.125); ">
                                <h3 class="text-center my-2">Upload Voice and Image</h3>
                                <?php if ( isset( $upload_notice_return_mgs ) ) {
                                        if ( $upload_notice_return_mgs == "successful" ) {
                                            $s_mgs = "SUCCESSFULLY UPLODED";
                                            include './include/success_modal.php';

                                        } else {
                                            include './include/error_modal.php';
                                        }
                                }?>
                            </div>


                            <div class="card-body">
                                <form action="" method="POST" class='' enctype="multipart/form-data">
                                    <div style="color:red;font-size:12px;margin-bottom:5px;">Required Field *</div>
                                    <div class="form-group">
                                        <label class="small mb-1" for="select_button"><b style="color:red;">*</b>
                                            <b>Button Name : </b></label>
                                        <div class="form-group">
                                            <input type="text" name="select_button" id="select_button"
                                                class='form-control' placeholder="Enter Name" required>
                                        </div>
                                    </div>

                                    <div>
                                        <label class="small mb-1" for="btn_img"><b style="color:red;">*</b>
                                            <b>Select Gender
                                                :</b></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input class="form-check-input" type="radio" name="gender" id="gender"
                                            value="Men" checked>
                                        <label class="form-check-label" for="inlineRadio1">Men</label>

                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input class="form-check-input" type="radio" name="gender" id="gender"
                                            value="Ladies">
                                        <label class="form-check-label" for="inlineRadio2">Ladies</label>


                                    </div>

                                    <div style="">
                                        <label class="small mb-1" for="btn_img"><b style="color:red;">*</b>
                                            <b>Choose
                                                Image :</b></label>
                                        <div>
                                            <input type="file" class='form-control' id="btn_img" value="" name="btn_img"
                                                required accept="image/png, image/jpg" />
                                            <label for="validationCustom02" class="form-label"></label>
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please provide a valid address</div>
                                        </div>
                                    </div>
                                    <div style="margin-top:-10px;">
                                        <label class="small mb-1" for="btn_voice"><b style="color:red;">*</b>
                                            <b>Choose
                                                Voice :</b> </label>
                                        <div>
                                            <input type="file" class='form-control' id="btn_voice" value=""
                                                name="btn_voice" required
                                                accept="audio/mp3,audio/*;capture=microphone" />
                                            <label for="validationCustom02" class="form-label"></label>
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please provide a valid address</div>
                                        </div>


                                    </div>
                                    <br>

                                    <div class="row">
                                        <center class="col-md-2 col-sm-2" style="margin:0 auto;">
                                            <input type="submit" name='add_btn_info' value="Submit"
                                                class='btn btn-success'>

                                        </center>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.js"></script>
<script src="js/script.js"></script>