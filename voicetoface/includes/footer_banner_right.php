<!-- EDIT Image POP UP FORM (Bootstrap MODAL) -->


<style>


</style>
<div class="modal fade" id="footerrightmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
            </div>
            <figure id="footermagnifying_area1" class="modal-xl">
                <img id="footermagnifying_img1" src="./assets/img/right-banner.jpeg">

            </figure>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function() {

    $('.right-footer-banner').on('click', function() {

        $('#footerrightmodal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

    });
});
</script>
<script>
var footermagnifying_area1 = document.getElementById("footermagnifying_area1");
var footermagnifying_img1 = document.getElementById("footermagnifying_img1");

footermagnifying_area1.addEventListener("mousemove", function(event) {
    clientX = event.clientX - footermagnifying_area1.offsetLeft
    clientY = event.clientY - footermagnifying_area1.offsetTop

    var mWidth = footermagnifying_area1.offsetWidth
    var mHeight = footermagnifying_area1.offsetHeight
    clientX = clientX / mWidth * 100
    clientY = clientY / mHeight * 100

    //footermagnifying_img1.style.transform = 'translate(-50%,-50%) scale(2)'
    footermagnifying_img1.style.transform = 'translate(-' + clientX + '%, -' + clientY + '%) scale(2)'
})

footermagnifying_area1.addEventListener("mouseleave", function() {
    footermagnifying_img1.style.transform = 'translate(-50%,-50%) scale(1)'
})
</script>