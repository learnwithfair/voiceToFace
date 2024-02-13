<?php

class voiceToFaceInfo
{

    private $conn1;

    public function __CONSTRUCT()
    {
        $bdhost      = "localhost";
        $dbuser      = "root";
        $dbpassword  = "";
        $dbname      = "voicetoface";
        $this->conn1 = mysqli_connect( $bdhost, $dbuser, $dbpassword, $dbname );
        // $this->preconn = mysqli_connect( $bdhost, $dbuser, $dbpassword, "previous_data" );
        if ( !( $this->conn1 ) ) {
            die( "Database connection Error!!" );
        }
    }

    // Add visitors
    public function updateVisitors()
    {

        $visitors_display_query = "SELECT * FROM visitors_info";
        $visitors               = mysqli_query( $this->conn1, $visitors_display_query );
        $visitor                = mysqli_fetch_assoc( $visitors );
        if ( $visitor ) {
            $id     = $visitor['visitors_id'];
            $count  = $visitor['visitors'];
            $counts = $count + 1;

            $visitors_update_query = "UPDATE visitors_info SET visitors=$counts WHERE visitors_id=$id";
            $result                = mysqli_query( $this->conn1, $visitors_update_query );
        } else {
            $add_visitor_query = "INSERT INTO visitors_info(visitors) VALUES(1)";
            $return_mgs        = mysqli_query( $this->conn1, $add_visitor_query );
            if ( $return_mgs ) {

            }
        }

    }

    public function displayVisitors()
    {

        $visitors_display_query = "SELECT * FROM visitors_info";
        $visitors               = mysqli_query( $this->conn1, $visitors_display_query );
        $visitor                = mysqli_fetch_assoc( $visitors );
        $count                  = $visitor['visitors'];
        if ( isset( $count ) ) {
            return $count;
        } else {
            return "None";
        }

    }

    // Display Male Button Info
    public function displayMalebtn()
    {
        $display_btn_query = "SELECT * FROM btn_info WHERE btn_gender='Men' order by rand()";
        $display_btn_info  = mysqli_query( $this->conn1, $display_btn_query );
        if ( isset( $display_btn_info ) ) {
            return $display_btn_info;
        }
    }

    // Display Female Button Info
    public function displayFemalebtn()
    {
        $display_btn_query = "SELECT * FROM btn_info WHERE btn_gender='Ladies' order by rand()";
        $display_btn_info  = mysqli_query( $this->conn1, $display_btn_query );
        if ( isset( $display_btn_info ) ) {
            return $display_btn_info;
        }
    }

    // Display Button Info
    public function buttonInfo( $id )
    {
        $display_btn_query = "SELECT * FROM btn_info WHERE btn_id=$id";
        $display_btn_info  = mysqli_query( $this->conn1, $display_btn_query );
        $btn_info          = mysqli_fetch_assoc( $display_btn_info );
        if ( isset( $btn_info ) ) {
            return $btn_info;
        }
    }

    // Display Optional Button Info
    public function optionalbuttonInfo( $id, $gender )
    {
        $display_btn_query = "SELECT * FROM btn_info WHERE (btn_id!=$id&&btn_gender='$gender') order by rand() limit 2";
        $display_btn_info  = mysqli_query( $this->conn1, $display_btn_query );

        if ( isset( $display_btn_info ) ) {
            return $display_btn_info;
        }
    }

    // Display Optional Button Info
    public function add_ratting( $value )
    {
        $add_rat_query = "INSERT INTO ratting_info(ratting) VALUES($value)";
        $return_mgs    = mysqli_query( $this->conn1, $add_rat_query );
        if ( $return_mgs ) {
            return 1;
        } else {
            return 0;
        }
    }

    ##########################################################################

}