<?php
if (isset($_SESSION['email'])) {
    if (isset($_POST['update_cart']) && ($_POST['update_cart'])) {

        $id = $_POST['id'];
        $soluong = $_POST['so_luong'];

        if (isset($_SESSION['myCart'])) {
            foreach ($_SESSION['myCart'] as $key => $value) {
                if ($value[0] == $id) {
                    $_SESSION['myCart'][$key][3] = $soluong;
                }
            }
        }

        // include "./views/client/gio_hang/v_gio_hang.php";
        echo header("refresh: 0");
        exit();
    } else {
        include "./views/client/gio_hang/v_gio_hang.php";
    }
} else {
    echo '<script>alert("Vui lòng đăng nhập!")</script>';
    header('Location: ./views/v_login.php');
}
