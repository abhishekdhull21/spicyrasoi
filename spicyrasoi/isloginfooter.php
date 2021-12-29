<?php
if (!$isLogined) { ?>
    <script>
        swal("Start from login", "Something went wrong", "warning")
            .then(() => {
                location.href = "user/login.php";
            });
    </script>
<?php } ?>