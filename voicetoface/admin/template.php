<?php
    include "class/function.php";
    $obj = new voiceToFace();
    session_start();
    $id = $_SESSION['admin_id'];
    if ( $id == null ) {
        header( "location: index" );
    }
    if ( isset( $_GET['status'] ) ) {
        if ( $_GET['status'] == 'logout' ) {
            $obj->logout_info();
        }
    }

include_once "include/head.php";?>


<body class="sb-nav-fixed">
    <?php include_once "include/topnav.php";?>
    <div id="layoutSidenav">
        <?php include_once "include/sidenav.php";?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid" style="overflow:hidden;">
                    <?php
                        if ( !isset( $view ) ) {
                            include 'view/dashboard_view.php';
                        } else {
                            if ( $view == "dashboard" ) {
                                include 'view/dashboard_view.php';
                            } elseif ( $view == "sub_admin_list" ) {
                                include 'view/sub_admin_list_view.php';
                            } elseif ( $view == "add_sub_admin" ) {
                                include 'view/add_sub_admin_view.php';
                            } elseif ( $view == "manage_sub_admin" ) {
                                include 'view/manage_sub_admin_view.php';

                            } elseif ( $view == "upload" ) {
                                include 'view/upload_view.php';
                            } elseif ( $view == "manage" ) {
                                include 'view/manage_view.php';
                            }

                        }

                    ?>
                </div>
            </main>
            <?php include_once "include/footer.php";?>
        </div>
    </div>
    <?php include_once "include/script.php";?>
</body>

</html>