<?php
class voiceToFace
{
    private $conn, $preconn;

    public function __CONSTRUCT()
    {
        $bdhost     = "localhost";
        $dbuser     = "root";
        $dbpassword = "";
        $dbname     = "voicetoface";
        $this->conn = mysqli_connect( $bdhost, $dbuser, $dbpassword, $dbname );
        // $this->preconn = mysqli_connect( $bdhost, $dbuser, $dbpassword, "previous_data" );
        if ( !( $this->conn ) ) {
            die( "Database connection Error!!" );
        }
    }

    // Add Subadmin
    public function add_subadmin( $data )
    {
        $admin_name          = $data['admin_name'];
        $admin_email         = $data['admin_email'];
        $password            = $data['admin_password'];
        $admin_img_name      = $_FILES['admin_img']['name'];
        $admin_img_tmp_name  = $_FILES['admin_img']['tmp_name'];
        $admin_password      = md5( $password );
        $admin_display_query = "SELECT * FROM admin_info WHERE admin_email='$admin_email'";
        $admins              = mysqli_query( $this->conn, $admin_display_query );
        if ( mysqli_fetch_assoc( $admins ) ) {
            return "unsuccessful";
        } else {
            $add_admin_query = "INSERT INTO admin_info(admin_name,admin_email,admin_password,admin_img) VALUES('$admin_name','$admin_email','$admin_password','$admin_img_name')";
            $return_mgs      = mysqli_query( $this->conn, $add_admin_query );
            if ( $return_mgs ) {
                move_uploaded_file( $admin_img_tmp_name, "./assets/img/" . $admin_img_name );
                return "successful";
            } else {
                return "unsuccessful";
            }
        }
    }

    // Checking Login Info
    public function getAdminData( $data )
    {
        $admin_check    = 0;
        $email          = $data['admin_email'];
        $password       = md5( $data['admin_password'] );
        $get_query      = "SELECT * FROM admin_info";
        $all_admin_info = mysqli_query( $this->conn, $get_query );
        // checking query admin table
        while ( $match_data = mysqli_fetch_assoc( $all_admin_info ) ) {
            if ( $email == $match_data['admin_email'] && $password == $match_data['admin_password'] ) {
                $admin_check             = 1;
                $_SESSION['admin_id']    = $match_data['admin_id'];
                $_SESSION['admin_name']  = $match_data['admin_name'];
                $_SESSION['admin_email'] = $match_data['admin_email'];
                $_SESSION['admin_img']   = $match_data['admin_img'];
                header( "location:template" );
                break;
            }
        }
        if ( $admin_check == 0 ) {
            return "unsuccesfull";

        }
    }

    // Display Admin Email for help
    public function helpAdmin()
    {
        $display_admin_officer_query = "SELECT * FROM admin_info";
        $display_admin_officer_list  = mysqli_query( $this->conn, $display_admin_officer_query );
        $admin_officer_name          = mysqli_fetch_assoc( $display_admin_officer_list );
        if ( isset( $admin_officer_name ) ) {
            return $admin_officer_name['admin_email'];
        }
    }

    // Logout Section
    public function logout_info()
    {
        unset( $_SESSION['admin_id'] );
        unset( $_SESSION['admin_name'] );
        unset( $_SESSION['admin_email'] );
        unset( $_SESSION['admin_img'] );
        header( "location: index" );
    }

    // Display Admin List
    public function display_subadmin_list()
    {
        $display_subadmin_list_query = "SELECT * FROM admin_info ORDER BY admin_id DESC";
        $display_subadmin_list       = mysqli_query( $this->conn, $display_subadmin_list_query );
        if ( isset( $display_subadmin_list ) ) {
            return $display_subadmin_list;
        }
    }

    // Delete Sub Admin List
    public function subadmin_dlt( $id )
    {
        $display_subadmin_list_query = "SELECT * FROM admin_info WHERE admin_id=$id";
        $display_subadmin_list       = mysqli_query( $this->conn, $display_subadmin_list_query );
        $admin_info                  = mysqli_fetch_assoc( $display_subadmin_list );
        $dlt_subadmin_list_query     = "DELETE FROM admin_info WHERE admin_id=$id";
        $dlt_subadmin_list           = mysqli_query( $this->conn, $dlt_subadmin_list_query );
        if ( isset( $dlt_subadmin_list ) ) {

            if ( isset( $admin_info ) ) {
                $img = $admin_info['admin_img'];
                unlink( "./assets/img/$img" );

                return "successful";

            } else {
                return "Delete Unsuccessful.";
            }
        } else {
            return "unsuccessful";
        }
    }

    // Display Button Info
    public function buttonInfo()
    {
        $display_btn_query = "SELECT * FROM btn_info ORDER BY btn_name ASC";
        $display_btn_info  = mysqli_query( $this->conn, $display_btn_query );
        if ( isset( $display_btn_info ) ) {
            return $display_btn_info;
        }
    }

    // Add Button Info
    public function add_btn_info( $data )
    {
        $btn_name       = $data['select_button'];
        $btn_gender     = $data['gender'];
        $btn_img        = $_FILES['btn_img']['name'];
        $btn_img_temp   = $_FILES['btn_img']['tmp_name'];
        $btn_voice      = $_FILES['btn_voice']['name'];
        $btn_voice_temp = $_FILES['btn_voice']['tmp_name'];

        // Insert  Button info
        $add_btn_query = "INSERT INTO btn_info(btn_name,btn_voice,btn_img,btn_gender) VALUES('$btn_name','$btn_voice','$btn_img','$btn_gender')";
        $return_mgs    = mysqli_query( $this->conn, $add_btn_query );
        if ( $return_mgs ) {
            move_uploaded_file( $btn_img_temp, "../uploads/img/" . $btn_img );
            move_uploaded_file( $btn_voice_temp, "../uploads/voice/" . $btn_voice );
            return "successful";
        } else {
            return "unsuccessful";
        }

    }

    // Delete Button Info
    public function btn_info_delete( $id )
    {
        // Get Button Info
        $search_btn        = "SELECT * FROM btn_info WHERE btn_id=$id";
        $search_btn_result = mysqli_query( $this->conn, $search_btn );
        $btn_data          = mysqli_fetch_assoc( $search_btn_result );

        if ( isset( $btn_data ) ) {
            $btn_dlt_query = "DELETE FROM btn_info WHERE btn_id=$id";
            $btn_dlt_mgs   = mysqli_query( $this->conn, $btn_dlt_query );
            if ( isset( $btn_dlt_mgs ) ) {
                $img   = $btn_data['btn_img'];
                $voice = $btn_data['btn_voice'];
                unlink( "../uploads/img/$img" );
                unlink( "../uploads/voice/$voice" );

                return "successful";

            } else {
                return "Delete Unsuccessful.";
            }
        }
    }

    // Update Image
    public function update_img( $data )
    {
        $id           = $data['update_id'];
        $btn_name     = $data['u_select_button'];
        $btn_img      = $_FILES['u_btn_img']['name'];
        $btn_img_temp = $_FILES['u_btn_img']['tmp_name'];

// Get Image Name
        $search_btn        = "SELECT * FROM btn_info WHERE btn_id=$id";
        $search_btn_result = mysqli_query( $this->conn, $search_btn );
        $btn_data          = mysqli_fetch_assoc( $search_btn_result );
        $img               = $btn_data['btn_img'];

        $btn_u_query = "UPDATE btn_info SET btn_name='$btn_name',btn_img='$btn_img' WHERE btn_id=$id";

        $return_update_mgs = mysqli_query( $this->conn, $btn_u_query );

        if ( $return_update_mgs ) {
            unlink( "../uploads/img/$img" );
            move_uploaded_file( $btn_img_temp, "../uploads/img/" . $btn_img );
            return "successful";

        } else {
            return "Unsuccessfull.";
        }
    }

    // Update Voice
    public function update_voice( $data )
    {
        $id           = $data['update_voice_id'];
        $btn_name     = $data['u_voice_select_button'];
        $btn_img      = $_FILES['u_btn_voice']['name'];
        $btn_img_temp = $_FILES['u_btn_voice']['tmp_name'];

// Get Image Name
        $search_btn = "SELECT * FROM btn_info WHERE btn_id=$id";

        $search_btn_result = mysqli_query( $this->conn, $search_btn );

        $btn_data = mysqli_fetch_assoc( $search_btn_result );
        $img      = $btn_data['btn_voice'];

        $btn_u_query = "UPDATE btn_info SET  btn_name='$btn_name',btn_voice='$btn_img' WHERE btn_id=$id";

        $return_update_mgs = mysqli_query( $this->conn, $btn_u_query );

        if ( $return_update_mgs ) {
            unlink( "../uploads/voice/$img" );
            move_uploaded_file( $btn_img_temp, "../uploads/voice/" . $btn_img );
            return "successful";

        } else {
            return "Unsuccessfull.";
        }
    }

// Display visitors
    public function displayVisitors()
    {

        $visitors_display_query = "SELECT * FROM visitors_info";
        $visitors               = mysqli_query( $this->conn, $visitors_display_query );
        $visitor                = mysqli_fetch_assoc( $visitors );
        $count                  = $visitor['visitors'];
        if ( isset( $count ) ) {
            return $count;
        } else {
            return "None";
        }

    }

// Display Ratting
    public function displayRatting( $value )
    {

        $ratting_display_query = "SELECT * FROM ratting_info WHERE ratting=$value";
        $ratting_info          = mysqli_query( $this->conn, $ratting_display_query );
        $ratting               = mysqli_num_rows( $ratting_info );

        if ( isset( $ratting ) ) {
            return $ratting;
        } else {
            return 0;
        }

    }

    ###########################################################################################

    ###########################################################################################

}