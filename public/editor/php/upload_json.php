<?php

/*
 * author: zhao
 */
require_once('JSON.php');

//if a valid file
if (!empty($_FILES)) {

	//import class for uploading
	require_once('./../upload.class.php');
	$upload_info = UploadFile('imgFile');
    
	/*
	 * 返回上传状态，是数组则表示上传成功
	 * 非数组则是直接返回发生的问题
	 */
	if (!is_array($upload_info)) {
		alert($upload_info);
		exit();
	} else {
// 		$file_url = '../../uploads/'.$upload_info[2];     //old version
		$file_url = $upload_info[2];                      //new version by zhao
		
		header('Content-type: text/html; charset=UTF-8');
		$json = new Services_JSON();
		echo $json->encode(array('error' => 0, 'url' => $file_url));
		exit();
	}
}

function alert($msg)
{
	header('Content-type: text/html; charset=UTF-8');
	$json = new Services_JSON();
	echo $json->encode(array('error' => 1, 'message' => $msg));
	exit();
}
?>