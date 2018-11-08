<?php
/*
 * 
 * author: zhao
 */

//no time limit for response
@set_time_limit(0);

/*
 * 上传函数
 * @access         public
 * @upfile         string  上传表单name
 */
function UploadFile($upfile) {
    
    $cfg_max_file_size = 10 * 1024 * 1024;
    $cfg_upload_img_type = "gif|jpg|jpeg|png|bmp|tiff";
    $cfg_upload_media_type = "swf|flv|mpg|mp3|rm|rmvb|wmv|wma|wav|mp4|3gp|mkv";
    $cfg_upload_soft_type = "zip|gz|rar|iso|doc|xls|ppt|wps|txt|docx|xlsx|pptx";
    
    //!!! the directory needs to be defined !!!
    $cfg_image_dir = $_SERVER['DOCUMENT_ROOT']."/tjctime/public/uploads";
    $cfg_soft_dir = $cfg_image_dir;
    $cfg_media_dir = $cfg_image_dir;

	//check if there is really a file to be uploaded
	$tempfile_tn = isset($_FILES[$upfile]['tmp_name']) ? $_FILES[$upfile]['tmp_name'] : '';
    if ($tempfile_tn=='' or !is_uploaded_file($tempfile_tn)) {
		return '请选择上传文件或您上传的文件超过php.ini设定最大文件上传限制['.ini_get('upload_max_filesize').']！';
	}

	//获取上传文件信息
	$tempfile      = $_FILES[$upfile];
	$tempfile_name = $tempfile['name'];
	$tempfile_size = $tempfile['size'];
	$tempfile_ext  = strtolower(substr(strrchr($tempfile_name, '.'), 1));

	//formats that are NOT allowed for uploading (forbidden formats)
	if (in_array($tempfile_ext, explode('|', 'php|pl|cgi|asp|aspx|jsp|php3|shtm|shtml'))) {
		return '您上传的文件类型为：['.$tempfile_ext.']，该类文件不允许通过后台上传！';
	}

	//检查文件类型,上传文件目录
	$upload_dir = $_SERVER['DOCUMENT_ROOT'];
	if (in_array($tempfile_ext, explode('|', strtolower($cfg_upload_img_type)))) {
		$upload_url = 'image';
		$upload_dir = $cfg_image_dir;
	} else if(in_array($tempfile_ext, explode('|', strtolower($cfg_upload_soft_type)))) {
		$upload_url = 'soft';
		$upload_dir = $cfg_soft_dir;
	} else if(in_array($tempfile_ext, explode('|', strtolower($cfg_upload_media_type)))) {
		$upload_url = 'media';
		$upload_dir = $cfg_media_dir;
	} else {
		return '您上传的文件类型为：['.$tempfile_ext.']，该文件类型不允许上传！';
	}

	$upload_dir .= "/".$upload_url;

	//check if exceeds maximum size
	if($tempfile_size > $cfg_max_file_size) {
		return '您上传的文件超过系统设定最大文件上传限制';
	}

	//make directory
	if(!file_exists($upload_dir))
	{
		mkdir($upload_dir);
	}

	//check if the directory is writable
	if (@!is_writable($upload_dir)) {
		return '上传目录没有可写权限！';
	}

	$ymd = date('Ymd');
	$upload_url .= '/'.$ymd;
	$upload_dir .= '/'.$ymd;

	//make sub-directory
	if (!file_exists($upload_dir)) {
		mkdir($upload_dir);
		$fp = fopen($upload_dir.'/index.htm', 'w');
		fclose($fp);
	}

	$filename = time().rand(100,999).'.'.$tempfile_ext;


	//save_url is the path to be returned to 
	//save_dir is the destination for the uploaded file 
	$save_url = '/tjctime/public/uploads/'.$upload_url.'/'.$filename;//!!!!! crucial path !!!!!
	$save_dir = $upload_dir.'/'.$filename;


	if (file_exists($save_dir)) {
		return '同名文件已经存在了！';
	}

	//uploading...
	if (@move_uploaded_file($tempfile_tn, $save_dir)) {
		//upload successfully and return array to /public/editor/php/upload_json.php
		return array($filename, $tempfile_size, $save_url, $save_dir);
	} else {
		return '发生未知错误，上传失败！';
	}
}
?>