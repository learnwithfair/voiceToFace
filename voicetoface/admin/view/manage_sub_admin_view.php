<?php
    if ( isset( $_POST['deletedata'] ) ) {
        $dlt_id  = $_POST['delete_id'];
        $dlt_mgs = $obj->subadmin_dlt( $dlt_id );
    }

    $data = $obj->display_subadmin_list();
?>
<!-- DELETE POP UP FORM (Bootstrap MODAL) -->
<?php include "./include/delete_modal.php";?>
<br>
<div class="card mb-4">
    <div class="card-header">


        <h4> <i class="fas fa-table mr-1"></i> Manage Admin:</h4>
        <h6 style="color:red;"><?php if ( isset( $dlt_mgs ) ) {
                                       if ( $dlt_mgs == "successful" ) {
                                           $s_mgs = "SUCCESSFULLY DELETED";
                                           include './include/success_modal.php';

                                       } else {
                                           include './include/error_modal.php';
                                   }
                               }?></h6>
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
                        <th scope="col">Email</th>
                        <th scope="col">Password</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th scope="col" style="display:none;"></th>
                        <th scope="col">S/N</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Password</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php

                        $cout = 1;

                    while ( $info = mysqli_fetch_assoc( $data ) ) {?>
                    <tr>
                        <td style="display:none;">
                            <?php echo $info['admin_id']; ?>
                        </td>
                        <td><?php echo $cout++; ?></td>
                        <td><?php echo $info['admin_name']; ?></td>
                        <td>
                            <a href="mailto:<?php echo $info['admin_email']; ?>">
                                <?php echo $info['admin_email']; ?>
                            </a>
                        </td>
                        <td><?php echo $info['admin_password']; ?></td>
                        <td><img src="./assets/img/<?php echo $info['admin_img']; ?>" height="80px" width="70px"
                                alt="Not Found"></td>

                        <td><button type="button" class="btn btn-danger deletebtn"> Delete </button></td>

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
            [1, 'asc']
        ]
    });
});
</script>