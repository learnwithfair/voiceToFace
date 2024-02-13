<?php
    include "../class/function.php";
    $obj1 = new voiceToFaceInfo();
?>

<?php
    $value          = $_POST['ratting'];
    $ratting_result = $obj1->add_ratting( $value );
    echo $ratting_result;

?>