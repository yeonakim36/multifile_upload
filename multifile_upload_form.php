<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/folder_name/lib.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/folder_name/function.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/folder_name/dbconfig.php";


if (!function_exists('recruit_submit')) {
    function recruit_submit()
    {
		$sql = "INSERT INTO table_name SET board_no = '$_POST[board_no]',
                                            user_no = '$_POST[user_no]',
                                             name = '$_POST[name]',
                                             file_path = '$_POST[file_path]'";
		$recruit_user = sql_query($sql);

		if( $recruit_user == true ) {
			$return_value['resultMsg'] = "지원이 완료되었습니다.";
			$return_value['resultCode'] = 0;

		} else {
			$return_value['resultMsg'] = "DB 오류가 발생했습니다. 다시 시도해주시기 바랍니다.";
			$return_value['resultCode'] = -99;
		}

        $jsonObj = new Services_JSON();
        echo $jsonObj->encode($return_value);

        return true;
    }
}

// 함수 호출 부분
$function_name = '';
if (isset($_POST['function']) && !empty($_POST['function'])) {
    $function_name = $_POST['function'];
}

if (function_exists($function_name)) {
    // 변수값으로 함수 호출
    if ($function_name()) {
        // 트랜잭션 완료
//        $db->trans_commit();
    } else {
        // 트랜잭션 롤백
//        $db->trans_rollback();
    }
} else {
    // 함수가 존재 하지 않을 시 반환할 값
    echo json_encode(
        array(
            'function' => $function_name,
            'code' => -2,
            'msg' => '존재하지 않는 함수입니다.'
        )
    );
}
?>


