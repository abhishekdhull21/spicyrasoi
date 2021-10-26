<div class="bg-primary">
    <?php
    // session_start();

    if (!isset($_SESSION['tables']))
        $_SESSION['tables'] = array();
    $sql = "SELECT table_id FROM tables_session WHERE status =1";
    $res = mysqli_query($con, $sql);
    $arr = array();
    if (mysqli_num_rows($res) > 0);
    while ($row = mysqli_fetch_assoc($res))
        array_push($arr, $row['table_id']);
    $_SESSION['tables'] = $arr;
    // $arr = $_SESSION['tables'];
    //print_r($_SESSION['tables']);


    ?>
</div>