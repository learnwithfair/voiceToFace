<?php include_once "includes/head.php"?>


<?php
    session_start();
    $_SESSION['shows'] = 0;
    if ( !isset( $_SESSION['visitors'] ) ) {

        $obj1->updateVisitors();
        $_SESSION['visitors'] = 1;
    }
    $visitors_count = $obj1->displayVisitors();
    $malebtn        = $obj1->displayMalebtn();
    $femalebtn      = $obj1->displayFemalebtn();
?>
<style>

</style>


<body>
    <div>
        <center class="container">
            <?php //include_once "includes/left_banner.php"?>
            <?php //include_once "includes/right_banner.php"?>
            <div class="row">


                <div class="header">
                    <h5 class="welcome">Welcome to</h5>

                    <h1 class="title">VoiceToFace<b>&reg;</b></h1>
                    <p class="titleDescription">Created by John D. Blue from Sarnia, Ontario Canada</p>
                    <p class="visitorCount">(You are <span>VISITOR</span> <?php echo $visitors_count; ?>)</p>
                    <h2 class="gameTitle">Play the <span>"BETA"</span> Test Below</h2>
                </div>
                <!-- <div class="banner left-banner">
                    <img class="" src="assets/img/left-banner.jpeg" alt="">
                </div>
                <div class="banner right-banner">
                    <img class="" src="assets/img/right-banner.jpeg" alt="">
                </div> -->
            </div>




            <br>
            <div class="row">
                <center class="rule">
                    <h5 style="font-weight:bolder;"><u>Rules:</u></h5>

                    <div>
                        <p>1. Select & Tap on any person's name.</p>
                        <p>2. Listen to their recorded voice message.</p>
                        <p>3. Next, three FACE pictures will pop up.</p>
                        <p>4. Select the FACE you BELIEVE matches that VOICE.</p>
                        <P>5. Is it #1, #2, or #3?</P>
                        <P>6. If you are wrong the 1st time, guess again.</P>
                        <br>

                    </div>

                    <div class="description">
                        <p class="description" style="font-weight:bold">In the near future become a VoiceToFace&reg;
                            member. </p>
                        <p style="font-weight:bold">Meet people from around the world.</p>
                        <p style="font-weight:bold">There are 4.74 billion social media users around the world in
                            October
                            2022</p>
                        <p style="font-weight:bold">VoiceToFace&reg; is the next GLOBAL SOCIAL MEDIA sensation!</p>
                    </div>
                </center>
            </div>
            <br><br>
            <div class="row">
                <div class="col-md-4  align-self-center " id="video1">
                    <center>

                        <h4 class="p-2" style="border:4px solid blue;font-weight:600; display:inline-block;"><i
                                class="fa fa-long-arrow-down"></i> Elvis
                            Shuffle
                            Dance
                            <i class="fa fa-long-arrow-down"></i>
                        </h4>

                        <br><br>
                        <div class="video">
                            <embed style="height:auto;
                            width:100%;min-height:250px;" src="https://www.youtube.com/embed/6H6TNo6SHC0">
                        </div>
                    </center>

                </div>
                <div class="col-md-4">
                    <center>
                        <h3>
                            <u>Ladies</u>
                        </h3>
                        <div class="female">
                            <?php while ( $info = mysqli_fetch_assoc( $femalebtn ) ) {?>
                            <p><a href="gamePage?status=show&&id=<?php echo $info['btn_id']; ?>"><button
                                        class="btn rounded-pill"><?php echo $info['btn_name']; ?></button>
                                </a></p>

                            <?php }?>
                        </div>
                    </center>

                </div>
                <div class="col-md-4  align-self-center  mt-4" id="video2">
                    <center>


                        <h4 class="p-2" style="border:4px solid blue;font-weight:600;"><i
                                class="fa fa-long-arrow-down"></i> Elvis
                            Shuffle
                            Dance
                            <i class="fa fa-long-arrow-down"></i>
                        </h4>

                        <br>
                        <div class="video">
                            <embed style="height:auto;
                            width:100%;min-height:200px;" src="https://www.youtube.com/embed/6H6TNo6SHC0">
                        </div>
                    </center>

                </div>
                <div class="col-md-4 ">
                    <center>

                        <h3><u>Men</u></h3>
                        <div class="male">
                            <?php while ( $info = mysqli_fetch_assoc( $malebtn ) ) {?>
                            <p> <a href="gamePage?status=show&&id=<?php echo $info['btn_id']; ?>"><button
                                        class="btn rounded-pill"><?php echo $info['btn_name']; ?></button>
                                </a></p>

                            <?php }?>

                        </div>
                    </center>
                </div>

            </div>
            <!-- <hr class="hroll"> -->

            <br>
            <h6 class="ratting-title">(Please Rate VoiceToFace&reg;)</h6>
            <div class="center">

                <fieldset class="rating">
                    <fieldset class="rating">
                        <input type="radio" id="star5" name="rating" value="5" /><label for="star5" class="full"
                            title="Awesome"></label>
                        <input type="radio" id="star4" name="rating" value="4" /><label for="star4"
                            class="full"></label>
                        <input type="radio" id="star3" name="rating" value="3" /><label for="star3"
                            class="full"></label>
                        <input type="radio" id="star2" name="rating" value="2" /><label for="star2"
                            class="full"></label>
                        <input type="radio" id="star1" name="rating" value="1" /><label for="star1"
                            class="full"></label>

                    </fieldset>
            </div>
            <h4 id="rating-value">0 out of 5</h4>



        </center>
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