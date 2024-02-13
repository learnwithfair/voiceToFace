<?php include_once "includes/head.php"?>
<?php
    session_start();

    //echo $_SESSION['shows'];
    // $_SESSION['shows'] = 1;
?>
<?php
    if ( isset( $_GET['status'] ) && isset( $_GET['id'] ) ) {
        if ( $_GET['status'] == 'show' ) {
            $id              = $_GET['id'];
            $btn_info        = $obj1->buttonInfo( $id );
            $gender          = $btn_info['btn_gender'];
            $option_btn_info = $obj1->optionalbuttonInfo( $id, $gender );
        }
    }

?>


<body>
    <div class="container">
        <center class="container">
            <div class="row">
                <div class="header">
                    <h1 class="title">VoiceToFace<b>&reg;</b></h1>
                    <p class="titleDescription">Created by John D. Blue from Sarnia, Ontario Canada</p>
                    <h2 class="gameTitle">Play the <span>"BETA"</span> Test Below</h2>
                    <h5 style="font-weight:600;">Name : <?php echo $btn_info['btn_name']; ?>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Gender
                        : <?php echo $btn_info['btn_gender']; ?>
                    </h5>
                </div>
            </div>

            <div class="row">

                <audio autoplay id="myAudio">
                    <source src="uploads/voice/<?php echo $btn_info['btn_voice']; ?>" type="audio/mp3">
                    Your browser does not support the audio element.
                </audio>


            </div>

        </center>
        <div class="row" id="popup-img">
            <img class="audio-img" src="assets/img/voiceimg.png" alt="">
        </div>
        <center>
            <div class="row">
                <span class="img-select-result"><b style="color:black"><span class="result">Result: </span><span
                            id="resultmgs">
                            <?php if ( $_SESSION['shows'] == 0 ) {?>
                            Please wait
                            until
                            the voice is
                            finished.
                            <?php } else {?>
                            <b style="color:red;"> Please go to the Home Page.</b>
                            <?php }?></span></b></span>
            </div>
        </center>
        <div class="row" id="popup-shows">
            <?php include_once './includes/popup.php';?>
        </div>
        <br>

        <div style="margin-left:20px;width:100%;">
            <a href="/voicetoface/" class="btn btn-primary"><i class="fa fa-arrow-circle-o-left"
                    style="color:white;"></i> Go
                Back</a>
        </div>

        <br>
        <!-- <div class="footer">
            <center>
                VoiceToFace&reg; is protected by <br>
                Copyrights, 1 Provisional Patent and 2 USA Federal registered <br>
                Service Marks #4,731,594 & #5,630,436 <br>
                &copy; 2013-2023 John D. Blue
            </center>
        </div>
    </div>
</body> -->
        <?php include_once './includes/footer.php';?>

        </html>