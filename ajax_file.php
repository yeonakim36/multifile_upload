<?php
header("Content-Type: text/html; charset=UTF-8");
if ($_FILES['fileToUpload']['name']) {
    $c_year = date("Y");
    $c_date = date("m");
    $current_day = date("Ymd");
    $u_name = $_POST["u_name"];
    $folder_name = $current_day.$u_name;

    $base_path = $_SERVER['DOCUMENT_ROOT']."/recruit/upload_file/".$c_year."/".$c_date."/".$folder_name."/"; //local
    // $base_path = $_SERVER['DOCUMENT_ROOT']."recruit/upload_file/".$c_year."/".$c_date."/".$folder_name."/"; //live
    
    if(!is_dir($base_path)){
        if(!mkdir($base_path, 0777, true)){
            echo "error: Failed to create directory";
            exit;
        }
    }
    
    $success = true;
    
    foreach ($_FILES['fileToUpload']['name'] as $i => $name) {
        if ($_FILES['fileToUpload']['error'][$i] === UPLOAD_ERR_OK) {
            $tmp_name = $_FILES['fileToUpload']['tmp_name'][$i];
            $name = "file".$name; // 한글 파일명 처리
            $name = urldecode($name);
            $name = mb_convert_encoding($name, 'UTF-8', 'auto');
            $name = str_replace(' ', '_', $name);
            $name = preg_replace('/[^가-힣a-zA-Z0-9_. -]/u', '', $name);
            
            $target_file = $base_path.basename($name);
            
            if (move_uploaded_file($tmp_name, $target_file)) {
                $success = true;
            } else {
                $success = false;
                break;
            }
        } else {
            $success = false;
            break;
        }
    }

    if ($success) {
        echo $base_path;
    } else {
        echo "error";
    }
}
else {
    echo "empty_error";
}
?>
