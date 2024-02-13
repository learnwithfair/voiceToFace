<?php

    if ( isset( $_POST['deletedata'] ) ) {
        $dlt_id  = $_POST['delete_id'];
        $dlt_mgs = $obj->btn_info_delete( $dlt_id );
    }

    if ( isset( $_POST['updateimg'] ) ) {
        $u_mgs = $obj->update_img( $_POST );
    }
    if ( isset( $_POST['updatevoice'] ) ) {
        $u_voice_mgs = $obj->update_voice( $_POST );
    }

    $btn_info = $obj->buttonInfo();
?>
<!-- EDIT Image POP UP FORM (Bootstrap MODAL) -->
<div class="modal fade" id="imgmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title modal_icon" id="exampleModalLabel"> Update Image </h5>

            </div>

            <form action="" method="POST" enctype="multipart/form-data">

                <div class="modal-body">
                    <input type="hidden" name="update_id" id="update_id">

                    <div class="form-group">
                        <label class="small mb-1" for="u_select_button"><b style="color:red;">*</b>
                            <b>Button Name : </b></label>
                        <div class="form-group">
                            <input type="text" name="u_select_button" id="u_select_button" class='form-control'
                                placeholder="Enter Name" required>

                        </div>
                    </div>


                    <div class="form-group">
                        <label><b style="color:red;">*</b> <b>Choose Image : </b></label>


                        <div>
                            <input type="file" class='form-control' id="u_btn_img" value="" name="u_btn_img" required
                                accept="image/jpg, image/png" />
                            <label for="validationCustom02" class="form-label"></label>
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please provide a valid address</div>
                        </div>

                    </div>
                </div>
                <div class="modal_icon">
                    <button style="margin:0px 10px; padding:6px 15px;" type="button" class="btn btn-secondary"
                        data-dismiss="modal">Cancel</button>
                    <button style="margin:0px 10px" type="submit" name="updateimg"
                        class="btn btn-success">Update</button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- EDIT Voice POP UP FORM (Bootstrap MODAL) -->
<div class="modal fade" id="voicemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title modal_icon" id="exampleModalLabel"> Update Voice </h5>

            </div>

            <form action="" method="POST" enctype="multipart/form-data">

                <div class="modal-body">
                    <input type="hidden" name="update_voice_id" id="update_voice_id">
                    <div class="form-group">
                        <label class="small mb-1" for="u_voice_select_button"><b style="color:red;">*</b>
                            <b>Button Name : </b></label>
                        <div class="form-group">
                            <input type="text" name="u_voice_select_button" id="u_voice_select_button"
                                class='form-control' placeholder="Enter Name" required>

                        </div>
                    </div>


                    <div class="form-group">
                        <label><b style="color:red;">*</b> <b>Choose Voice : </b></label>

                        <div>
                            <input type="file" class='form-control' id="u_btn_voice" value="" name="u_btn_voice"
                                required accept="audio/mp3,audio/*;capture=microphone" />
                            <label for="validationCustom02" class="form-label"></label>
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please provide a valid address</div>
                        </div>

                    </div>
                </div>
                <div class="modal_icon">
                    <button style="margin:0px 10px; padding:6px 15px;" type="button" class="btn btn-secondary"
                        data-dismiss="modal">Cancel</button>
                    <button style="margin:0px 10px" type="submit" name="updatevoice"
                        class="btn btn-success">Update</button>
                </div>
            </form>

        </div>
    </div>
</div>



<!-- DELETE POP UP FORM (Bootstrap MODAL) -->
<?php include "./include/delete_modal.php";?>
<br>
<div class="card mb-4">
    <div class="card-header">
        <h4>
            <i class="fas fa-table mr-1"></i> Manage VoiceToFace&reg; :
        </h4>
        <?php if ( isset( $u_mgs ) ) {
                if ( $u_mgs == "successful" ) {
                    $s_mgs = "SUCCESSFULLY UPDATED";
                    include './include/success_modal.php';

                } else {
                    include './include/error_modal.php';
                }
        }?>

        <?php if ( isset( $u_voice_mgs ) ) {
                if ( $u_voice_mgs == "successful" ) {
                    $s_mgs = "SUCCESSFULLY UPDATED";
                    include './include/success_modal.php';

                } else {
                    include './include/error_modal.php';
                }
        }?>
<?php if ( isset( $dlt_mgs ) ) {
        if ( $dlt_mgs == "successful" ) {
            $s_mgs = "SUCCESSFULLY DELETED";
            include './include/success_modal.php';

        } else {
            include './include/error_modal.php';
        }
}?>

        <div></div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered vertical_align" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col" style="display:none;"></th>
                        <th scope="col">S/N</th>
                        <th scope="col">Name</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Voice</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th scope="col" style="display:none;"></th>
                        <th scope="col">S/N</th>
                        <th scope="col">Name</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Voice</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $count = 1;while ( $info = mysqli_fetch_assoc( $btn_info ) ) {?>
                    <tr>
                        <td style="display:none;">
                            <?php echo $info['btn_id']; ?>
                        </td>
                        <td><?php echo $count++; ?></td>
                        <td><?php echo $info['btn_name']; ?></td>
                        <td><?php echo $info['btn_gender']; ?></td>






                        <td>



                            <audio controls>

                                <source src="../uploads/voice/<?php echo $info['btn_voice']; ?>" type="audio/mpeg">
                                Your browser does not support the audio element.
                            </audio>
                            <br>
                            <a href="#" class="voicebtn">Change</a>



                        </td>

                        <td><img src="../uploads/img/<?php echo $info['btn_img']; ?>" height="80px" width="70px"
                                alt="Not Found">
                            <br>



                            <a href="#" class="imgbtn">Change</a>


                        </td>



                        <form action="" method="post">

                            <td>
                                <button type="button" class="btn btn-danger deletebtn"
                                    style="padding-left:18px;padding-right:17px;"> Delete </button>
                            </td>
                        </form>


                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
$(document).ready(function() {
    $('#dataTable').DataTable({
        order: [
            [2, 'asc']
        ]
    });
});

$(document).ready(function() {

    $('.imgbtn').on('click', function() {

        $('#imgmodal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();



        $('#update_id').val(data[0]);
        $('#u_select_button').val(data[2]);



    });
});
$(document).ready(function() {

    $('.voicebtn').on('click', function() {

        $('#voicemodal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();



        $('#update_voice_id').val(data[0]);
        $('#u_voice_select_button').val(data[2]);


    });
});
</script>