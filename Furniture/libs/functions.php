<?php
require_once('libs/database.php');

function checkForm()
{
    global $errors;
    if (empty($_POST['name'])) {
        $errors[] = 'Tên danh mục không được bỏ trống';
    }
}

function confirm_query_result($result)
{
    global $db;
    if (!$result) {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    } else {
        return $result;
    }
}

function isFormValidated()
{
    global $errors;
    return count($errors) == 0;
}

//function find_all($tbl, $option = 'id')
//{
//    global $db;
//
//    $sql = "SELECT * FROM `" . $tbl . "`";
//    $sql .= "ORDER BY `" . $option . "` DECS";
//
//    $result = mysqli_query($db, $sql);
//    return $result;
//}

function find_all_category()
{
    global $db;

    $sql = "SELECT * FROM categories ";
    $sql .= "ORDER BY `id` DESC";

    $result = mysqli_query($db, $sql);
    return $result;
}

function find_category_by_id($id)
{
    global $db;

    $sql = "SELECT * FROM categories ";
    $sql .= "WHERE id='" . $id . "'";

    $result = mysqli_query($db, $sql);
    confirm_query_result($result);

    $category = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $category;
}

function update_category($category)
{
    global $db;

    $sql = "UPDATE categories SET ";
    $sql .= "`name`='" . $category['name'] . "' ";
    $sql .= "WHERE id='" . $category['id'] . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    confirm_query_result($result);
}

function insert_category($category)
{
    global $db;

    $sql = "INSERT INTO categories ";
    $sql .= "(`name`) ";
    $sql .= "VALUES (";
    $sql .= "'" . $category['name'] . "'";
    $sql .= ")";

    $result = mysqli_query($db, $sql);
    confirm_query_result($result);
    return $result;
}

function delete_category($id)
{
    global $db;

    $sql = "DELETE FROM categories ";
    $sql .= "WHERE id='" . $id . "' ";
    $sql .= "LIMIT 1;";
    $result = mysqli_query($db, $sql);

    return confirm_query_result($result);
}


?>
<?php
function redirect_to($location)
{
}


?>
