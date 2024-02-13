<?php
    $result_id  = array();
    $result_img = array();

    while ( $optional_data = mysqli_fetch_assoc( $option_btn_info ) ) {
        array_push( $result_id, $optional_data['btn_id'] );
        array_push( $result_img, $optional_data['btn_img'] );
    }
    array_push( $result_id, $btn_info['btn_id'] );
    array_push( $result_img, $btn_info['btn_img'] );
?>
<?php

    $currentpos = array();
    array_push( $currentpos, rand( 0, 2 ) );

    $res = 0;
    for ( $i = 0; $i < 50; $i++ ) {
        if ( count( $currentpos ) >= 3 ) {

            break;
        }

        $n = rand( 0, 2 );
        for ( $j = 0; $j < count( $currentpos ); $j++ ) {
            if ( $currentpos[$j] == $n ) {
                $res = 1;
            }
        }
        if ( $res == 0 ) {
            array_push( $currentpos, $n );
        }
        $res = 0;

    }

?>
<center>
    <br>
    <h2 class="popup-title">Choose Image</h2>
    <br>
</center>
<form action="" method="post">
    <!-- <div class="row popup-img-title" align="middle" width=100%>
        <center>
            <div>#1</div>
            <div>#2</div>
            <div>#3</div>
        </center>
    </div> -->
    <div class="row" align="middle" width=100% style="justify-content: center;">
        <center class="popup-section">


            <div class="popup-img-title">
                <div id="optitle1">#1</div>
                <input type="hidden" id="opid1" value="<?php echo $result_id[$currentpos[0]]; ?>">
                <img src="./uploads/img/<?php echo $result_img[$currentpos[0]]; ?>" class="popup-img-pos" id="opimg1"
                    alt="Image does not support">
            </div>
            <div class="popup-img-title">
                <div id="optitle2">#2</div>
                <input type="hidden" id="opid2" value="<?php echo $result_id[$currentpos[1]]; ?>">
                <img src="./uploads/img/<?php echo $result_img[$currentpos[1]]; ?>" class="popup-img-pos" id="opimg2"
                    alt="Image does not support">
            </div>
            <div class="popup-img-title">
                <div id="optitle3">#3</div>
                <input type="hidden" id="opid3" value="<?php echo $result_id[$currentpos[2]]; ?>">
                <img src="./uploads/img/<?php echo $result_img[$currentpos[2]]; ?>" class="popup-img-pos" id="opimg3"
                    alt="Image does not support">
                <input type="hidden" id="resultid" value="<?php echo $btn_info['btn_id']; ?>">
            </div>
        </center>
    </div>
    <br>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
$("#opimg1").click(function() {

    var read = "";
    var opid1 = $("#opid1").val();
    var resultid = $("#resultid").val();
    document.getElementById("opimg1").style.borderColor = "blue";
    document.getElementById("opimg2").style.borderColor = "#ddd";
    document.getElementById("opimg3").style.borderColor = "#ddd";
    document.getElementById("optitle1").style.color = "blue";
    document.getElementById("optitle2").style.color = "black";
    document.getElementById("optitle3").style.color = "black";
    // document.getElementById("opimg1").style.borderWidth = "2px";
    if (opid1 == resultid) {
        document.getElementById("resultmgs").innerHTML = "Congratulations! You have selected the right choice.";
        document.getElementById("resultmgs").style.color = "green";

        $.ajax({
            method: "POST",
            url: "./includes/tryagain.php",
            data: {
                read: read
            },
            success: function(data) {
                if (data > 0) {
                    document.getElementById("myAudio").style.display = "none";
                    document.getElementById("popup-img").style.display = "inherit";
                    document.getElementById("popup-shows").style.display = "none";
                    document.getElementById("resultmgs").innerHTML =
                        "Congratulations! You have selected the right choice.";
                    document.getElementById("resultmgs").style.color = "green";
                }
            }
        });


    } else {
        document.getElementById("resultmgs").innerHTML = "You have selected wrong! Please guess again.";
        document.getElementById("resultmgs").style.color = "red";
        $.ajax({
            method: "POST",
            url: "./includes/tryagain.php",
            data: {
                read: read
            },
            success: function(data) {
                if (data > 1) {
                    document.getElementById("myAudio").style.display = "none";
                    document.getElementById("popup-img").style.display = "inherit";
                    document.getElementById("popup-shows").style.display = "none";
                    document.getElementById("resultmgs").innerHTML =
                        "You have failed. Please go to the Home page.";
                    document.getElementById("resultmgs").style.color = "red";
                }
            }
        });

    }


});
$("#opimg2").click(function() {
    var read = "";
    var opid2 = $("#opid2").val();
    var resultid = $("#resultid").val();
    document.getElementById("opimg1").style.borderColor = "#ddd";
    document.getElementById("opimg2").style.borderColor = "blue";
    document.getElementById("opimg3").style.borderColor = "#ddd";
    document.getElementById("optitle1").style.color = "black";
    document.getElementById("optitle2").style.color = "blue";
    document.getElementById("optitle3").style.color = "black";
    if (opid2 == resultid) {
        document.getElementById("resultmgs").innerHTML = "Congratulations! You have selected the right choice.";
        document.getElementById("resultmgs").style.color = "green";
        $.ajax({
            method: "POST",
            url: "./includes/tryagain.php",
            data: {
                read: read
            },
            success: function(data) {
                if (data > 0) {
                    document.getElementById("myAudio").style.display = "none";
                    document.getElementById("popup-img").style.display = "inherit";
                    document.getElementById("popup-shows").style.display = "none";
                    document.getElementById("resultmgs").innerHTML =
                        "Congratulations! You have selected the right choice.";
                    document.getElementById("resultmgs").style.color = "green";
                }
            }
        });
    } else {
        document.getElementById("resultmgs").innerHTML = "You have selected wrong! Please guess again.";
        document.getElementById("resultmgs").style.color = "red";
        $.ajax({
            method: "POST",
            url: "./includes/tryagain.php",
            data: {
                read: read
            },
            success: function(data) {
                if (data > 1) {
                    document.getElementById("myAudio").style.display = "none";
                    document.getElementById("popup-img").style.display = "inherit";
                    document.getElementById("popup-shows").style.display = "none";
                    document.getElementById("resultmgs").innerHTML =
                        "You have failed. Please go to the Home page.";
                    document.getElementById("resultmgs").style.color = "red";
                }
            }
        });

    }

});
$("#opimg3").click(function() {
    var read = "";
    var opid3 = $("#opid3").val();
    var resultid = $("#resultid").val();
    document.getElementById("opimg1").style.borderColor = "#ddd";
    document.getElementById("opimg2").style.borderColor = "#ddd";
    document.getElementById("opimg3").style.borderColor = "blue";
    document.getElementById("optitle1").style.color = "black";
    document.getElementById("optitle2").style.color = "black";
    document.getElementById("optitle3").style.color = "blue";
    if (opid3 == resultid) {
        document.getElementById("resultmgs").innerHTML = "Congratulations! You have selected the right choice.";
        document.getElementById("resultmgs").style.color = "green";
        $.ajax({
            method: "POST",
            url: "./includes/tryagain.php",
            data: {
                read: read
            },
            success: function(data) {
                if (data > 0) {
                    document.getElementById("myAudio").style.display = "none";
                    document.getElementById("popup-img").style.display = "inherit";
                    document.getElementById("popup-shows").style.display = "none";
                    document.getElementById("resultmgs").innerHTML =
                        "Congratulations! You have selected the right choice.";
                    document.getElementById("resultmgs").style.color = "green";
                }
            }
        });
    } else {
        document.getElementById("resultmgs").innerHTML = "You have selected wrong! Please guess again.";
        document.getElementById("resultmgs").style.color = "red";
        $.ajax({
            method: "POST",
            url: "./includes/tryagain.php",
            data: {
                read: read
            },
            success: function(data) {

                if (data > 1) {
                    document.getElementById("myAudio").style.display = "none";
                    document.getElementById("popup-img").style.display = "inherit";
                    document.getElementById("popup-shows").style.display = "none";
                    document.getElementById("resultmgs").innerHTML =
                        "You have failed. Please go to the Home page.";
                    document.getElementById("resultmgs").style.color = "red";
                }
            }
        });

    }

});
</script>