</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script>
    (function($) {
        "use strict";

        // Add active state to sidbar nav links
        var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
        $("#layoutSidenav_nav .sb-sidenav a.nav-link").each(function() {
            if (this.href === path) {
                $(this).addClass("active");
            }
        });

        // Toggle the side navigation
        $("#sidebarToggle").on("click", function(e) {
            e.preventDefault();
            $("body").toggleClass("sb-sidenav-toggled");
        });
    })(jQuery);


    $('#resetPassword').on('show.bs.modal', function(e) {
        var userid = $(e.relatedTarget).data('userid');
        $(e.currentTarget).find('input[name="useridModalReset"]').val(userid);
    });

    $('#deleteuser').on('show.bs.modal', function(e) {
        var userid = $(e.relatedTarget).data('deluserid');
        $(e.currentTarget).find('input[name="userIdDelete"]').val(userid);
    });

    $('#deleteCon').on('show.bs.modal', function(e) {
        var conid = $(e.relatedTarget).data('delid');
        $(e.currentTarget).find('input[name="conIdDelete"]').val(conid);
    });

    $('#deleteMes').on('show.bs.modal', function(e) {
        var conid = $(e.relatedTarget).data('preid');
        $(e.currentTarget).find('input[name="preDelid"]').val(conid);
    });
</script>
</body>


</html>