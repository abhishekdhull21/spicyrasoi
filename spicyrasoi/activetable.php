<div class="bg-primary">
    <?php
    // session_start();

    if (!isset($_SESSION['tables']))
        $_SESSION['tables'] = array();
    $arr = $_SESSION['tables'];
    print_r($_SESSION['tables']);


    ?>
</div>