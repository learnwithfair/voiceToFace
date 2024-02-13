<!-- EDIT Image POP UP FORM (Bootstrap MODAL) -->


<style>


</style>
<div class="modal fade" id="rightmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
            </div>
            <figure id="magnifying_area1" class="modal-xl">
                <img id="magnifying_img1" src="./assets/img/right-banner.jpeg">

            </figure>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function() {

    $('.right-banner').on('click', function() {

        $('#rightmodal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

    });
});
</script>
<script>
var magnifying_area1 = document.getElementById("magnifying_area1");
var magnifying_img1 = document.getElementById("magnifying_img1");

magnifying_area1.addEventListener("mousemove", function(event) {
    clientX = event.clientX - magnifying_area1.offsetLeft
    clientY = event.clientY - magnifying_area1.offsetTop

    var mWidth = magnifying_area1.offsetWidth
    var mHeight = magnifying_area1.offsetHeight
    clientX = clientX / mWidth * 100
    clientY = clientY / mHeight * 100

    //magnifying_img1.style.transform = 'translate(-50%,-50%) scale(2)'
    magnifying_img1.style.transform = 'translate(-' + clientX + '%, -' + clientY + '%) scale(2)'
})

magnifying_area1.addEventListener("mouseleave", function() {
    magnifying_img1.style.transform = 'translate(-50%,-50%) scale(1)'
})
</script>