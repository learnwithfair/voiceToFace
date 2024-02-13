<?php
    // Dashboard count
    $admin_info           = $obj->display_subadmin_list();
    $total_admin_count    = mysqli_num_rows( $admin_info );
    $total_visitors_count = $obj->displayVisitors();
    $ratting_info         = array();
    for ( $i = 0; $i < 5; $i++ ) {
        $value   = $i + 1;
        $ratting = $obj->displayRatting( $value );
        array_push( $ratting_info, $ratting );

    }
    $btn_info        = $obj->buttonInfo();
    $total_btn_count = mysqli_num_rows( $btn_info );

?>

<style>
.dashboard-icon img {
    border-radius: 50%;
    height: 60px;
    width: 60px;
    border: solid 2px #9b0000;
}

.dashboard-icon {

    text-align: center;
    padding: 15px;

}

.dashboard-banner {
    border: solid 2px blue;
}
</style>


<h1 class="mt-4">Dashboard</h1>

<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard</li>
</ol>
<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card bg-info text-white mb-4">
            <div class="dashboard-icon">
                <img class="" src="./assets/icon/admin.png" alt="">
                <br><br>
                <h5 class="">Total Admins</h5>
                <h6><span class="counter"><?php echo $total_admin_count; ?></span></h6>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-warning text-white mb-4">
            <div class="dashboard-icon">
                <img class="" src="./assets/icon/ratting-icon.jpg" alt="">
                <br><br>
                <h5 class="">Total Rattings</h5>
                <h6>
                    <?php for ( $i = 0; $i < 5; $i++ ) {?>
                    <span class="counter"><?php echo $ratting_info[$i]; ?> &nbsp;</span>
                    <?php }?>


                </h6>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-success text-white mb-4">
            <div class="dashboard-icon">
                <img class="" src="./assets/icon/visitors.png" alt="" style="background-color:white;">
                <br><br>
                <h5 class="">Total Visitors</h5>
                <h6><span class="counter"><?php echo $total_visitors_count; ?></span></h6>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-danger text-white mb-4">
            <div class="dashboard-icon">
                <img class="" src="./assets/icon/person-icon.png" alt="">
                <br><br>
                <h5 class="">Total Persons</h5>
                <h6><span class="counter"><?php echo $total_btn_count; ?></span></h6>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="row">


    <br>
    <div class="col-xl-6 col-md-6">
        <div class="card text-white mb-4">
            <img class="dashboard-banner" src="./assets/icon/dashboard1.webp" alt="" height=250px; width=100%;>
        </div>
    </div>
    <div class="col-xl-6 col-md-6">
        <div class="card text-white mb-4">
            <img class="dashboard-banner" src="./assets/icon/dashboard2.webp" alt="" height=250px; width=100%;>
        </div>
    </div>
</div>