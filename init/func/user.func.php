<?php
function usernameExists($username)
{
    global $db;
    $query = $db->query("SELECT id_user FROM tbl_user WHERE username = '$username'");
    if ($query->num_rows) {
        return true;
    }
    return false;
}

function logUserIn($username, $passwd)
{
    global $db;
    $query = $db->query("SELECT * FROM tbl_user WHERE username = '$username' AND passwd = '$passwd'");
    if ($query->num_rows) {
        $_SESSION['id_user'] = $query->fetch_object()->id_user;
        return true;
    }
    return false;
}


function LoggedInUser()
{
    global $db;
    if (isset($_SESSION['id_user'])) {
        $id_user = $_SESSION['id_user'];
        $query = $db->query("SELECT id_user, user_label FROM tbl_user WHERE id_user = '$id_user'");
        if ($query->num_rows) {
            return $query->fetch_object();
        } else {
            return false;
        }
    } else {
        return false;
    }
}
