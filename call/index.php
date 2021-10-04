<form action="/call/index.php" method="post">
    <input type="text" name="id" placeholder="Url to call" required>
    <input type="submit" value="Submit">
</form>
<?php
if(isset($_POST['id'])) {
    $post_id = $_POST['id'];
    $res = file_get_contents($_POST['id']);
    if(isJson($res)) {
        dd(json_decode($res));
        echo $res;
    } elseif (isImage($_POST['id'])) {
        echo '<img src="' . $post_id . '">';
    } else {
        echo $res;
    }
}

function dd($data){
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}

function isJson($string) {
    json_decode($string);
    return json_last_error() === JSON_ERROR_NONE;
}
function isImage($image) {
    return is_array(getimagesize($image));
}
?>