<!-- EDIT Image POP UP FORM (Bootstrap MODAL) -->


<style>


</style>
<div class="modal fade" id="footerleftmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
            </div>
            <figure id="footermagnifying_area" class="modal-xl">
                <img id="footermagnifying_img" src="./assets/img/left-banner.jpeg">

            </figure>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function() {

    $('.left-footer-banner').on('click', function() {

        $('#footerleftmodal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

    });
});
</script>
<script>
var footermagnifying_area = document.getElementById("footermagnifying_area");
var footermagnifying_img = document.getElementById("footermagnifying_img");

footermagnifying_area.addEventListener("mousemove", function(event) {
    clientX = event.clientX - footermagnifying_area.offsetLeft
    clientY = event.clientY - footermagnifying_area.offsetTop

    var mWidth = footermagnifying_area.offsetWidth
    var mHeight = footermagnifying_area.offsetHeight
    clientX = clientX / mWidth * 100
    clientY = clientY / mHeight * 100

    //footermagnifying_img.style.transform = 'translate(-50%,-50%) scale(2)'
    footermagnifying_img.style.transform = 'translate(-' + clientX + '%, -' + clientY + '%) scale(2)'
})

footermagnifying_area.addEventListener("mouseleave", function() {
    footermagnifying_img.style.transform = 'translate(-50%,-50%) scale(1)'
})
</script>