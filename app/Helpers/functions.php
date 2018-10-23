<?php

if (!function_exists('adminUrl')) {
    function adminUrl() {
        return config('creativetime.adminUrl');
    }
}

if (!function_exists('my_pass')) {
    function my_pass($pass = 0) {
        return $pass."unknownwords";
    }
}

if (!function_exists('filedownload')) {
    function filedownload($file_url) {
        //fake download process
        //get file content directly from $file_url (ex., an image file)
        $file_content = file_get_contents($file_url);
        
        //generate destination path on server
        $url = "public/uploads/download";
        if (!file_exists($url)) {
            mkdir($url);
        }
        $date = date("Ymd");
        $url .= "/".$date;
        if (!file_exists($url)) {
            mkdir($url);
        }
        $dst = $url."/".time().rand(100,999).strrchr($file_url, '.');
        
        //save file content as a new file and return destination path
        file_put_contents($dst, $file_content);
        return $dst;
    }
}

if (!function_exists('fileupload')) {
    function fileupload($file = null) {
        if (!$file['tmp_name']) {
            return "";  //empty uploadfile
        }
        
//         if ($file["size"] > 500 * 1024 * 1024) {
//             return "";  //exceed max size
//         }
        
        if ($file["error"] > 0) {
            return "";  //file error
        }
        
        $url = "public/uploads/".explode("/", $file["type"])[0];
        if (!file_exists($url)) {
            mkdir($url);
        }
        $date = date("Ymd");
        $url .= "/".$date;
        if (!file_exists($url)) {
            mkdir($url);
        }
        
        $dst = $url."/".time().rand(100,999).substr($file['name'],strrpos($file['name'],'.'));
        move_uploaded_file($file["tmp_name"], $dst);
        return $dst;
    }
}

if (!function_exists('multiimgupload')) {
    function multiimgupload() {
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            exit; // finish preflight CORS requests here
        }


        if ( !empty($_REQUEST[ 'debug' ]) ) {
            $random = rand(0, intval($_REQUEST[ 'debug' ]) );
            if ( $random === 0 ) {
                header("HTTP/1.0 500 Internal Server Error");
                exit;
            }
        }


        @set_time_limit(5 * 60);    // 5 minutes execution time
        $cleanupTargetDir = true;   // Remove old files
        $maxFileAge = 5 * 3600;     // Temp file age in seconds


        // Settings
        // $targetDir = ini_get("upload_tmp_dir") . DIRECTORY_SEPARATOR . "plupload";
        $targetDir = 'public/uploads/image'; //上传临时地址,可能要更改
        $uploadDir = 'public/uploads/image'; //上传地址

        // Create target dir
        if (!file_exists($targetDir)) {
            @mkdir($targetDir);
        }

        // Create target dir
        if (!file_exists($uploadDir)) {
            @mkdir($uploadDir);
        }

        $targetDir = 'public/uploads/image/'.date('Ymd');
        $uploadDir = 'public/uploads/image/'.date('Ymd');

        // Create sub-directory
        if (!file_exists($targetDir)) {
            @mkdir($targetDir);
        }

        // Create sub-directory
        if (!file_exists($uploadDir)) {
            @mkdir($uploadDir);
        }



        // Get a file name
        $fileName = @$_FILES["file"]["name"];
        $fileInfo=pathinfo($fileName);
        $extension=$fileInfo['extension'];
        $fileName=time().rand(100,999).'.'.$extension;


        $md5File = @file('md5list.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $md5File = $md5File ? $md5File : array();

        if (isset($_REQUEST["md5"]) && array_search($_REQUEST["md5"], $md5File ) !== FALSE ) {
            die('{"jsonrpc" : "2.0", "result" : null, "id" : "id", "exist": 1}');
        }

        $filePath = $targetDir . DIRECTORY_SEPARATOR . $fileName;
        $uploadPath = $uploadDir . DIRECTORY_SEPARATOR . $fileName;
        
        // Prepare the final fileName to be written into database
        // Return at the last line
        $fileName = $targetDir.'/'.$fileName;

        // Chunking might be enabled
        $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
        $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 1;


        // Remove old temp files
        if ($cleanupTargetDir) {
            if (!is_dir($targetDir) || !$dir = opendir($targetDir)) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');
            }

            while (($file = readdir($dir)) !== false) {
                $tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;

                // If temp file is current file proceed to the next
                if ($tmpfilePath == "{$filePath}_{$chunk}.part" || $tmpfilePath == "{$filePath}_{$chunk}.parttmp") {
                    continue;
                }

                // Remove temp file if it is older than the max age and is not the current file
                if (preg_match('/\.(part|parttmp)$/', $file) && (@filemtime($tmpfilePath) < time() - $maxFileAge)) {
                    @unlink($tmpfilePath);
                }
            }
            closedir($dir);
        }


        // Open temp file
        if (!$out = @fopen("{$filePath}_{$chunk}.parttmp", "wb")) {
            die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
        }

        if (!empty($_FILES)) {
            if ($_FILES["file"]["error"] || !is_uploaded_file($_FILES["file"]["tmp_name"])) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
            }

            // Read binary input stream and append it to temp file
            if (!$in = @fopen($_FILES["file"]["tmp_name"], "rb")) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
            }
        } else {
            if (!$in = @fopen("php://input", "rb")) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
            }
        }

        while (($buff = fread($in, 4096)) != false) {
            fwrite($out, $buff);
        }

        @fclose($out);
        @fclose($in);

        rename("{$filePath}_{$chunk}.parttmp", "{$filePath}_{$chunk}.part");

        $index = 0;
        $done = true;
        for( $index = 0; $index < $chunks; $index++ ) {
            if ( !file_exists("{$filePath}_{$index}.part") ) {
                $done = false;
                break;
            }
        }
        if ( $done ) {
            if (!$out = @fopen($uploadPath, "wb")) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
            }

            if ( flock($out, LOCK_EX) ) {
                for( $index = 0; $index < $chunks; $index++ ) {
                    if (!$in = @fopen("{$filePath}_{$index}.part", "rb")) {
                        break;
                    }

                    while (($buff = fread($in, 4096)) != false) {
                        fwrite($out, $buff);
                    }

                    @fclose($in);
                    @unlink("{$filePath}_{$index}.part");
                }

                flock($out, LOCK_UN);
            }
            @fclose($out);
        }

        // Return Success JSON-RPC response
        // die('{"jsonrpc" : "2.0", "result" : null, "id" : "id");
        //向模板输出文件名
        // echo $fileName;
        $data=array('pic'=>$fileName);
        // return response()->json($data); //不用框架就用echo json_encode()
        echo json_encode($data);
    }
}

if (!function_exists('excelimport')) {
    function excelimport($url) {
        require_once 'public/plugin/phpexcel/Classes/PHPExcel.php';
        require_once 'public/plugin/phpexcel/Classes/PHPExcel/IOFactory.php';
        require_once 'public/plugin/phpexcel/Classes/PHPExcel/Reader/Excel5.php';
        
        $objReader = PHPExcel_IOFactory::createReader('excel2007');//use excel2007 for 2007 format
        $objPHPExcel = $objReader->load($url); //$filename可以是上传的文件，或者是指定的文件
        
        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow(); // 取得总行数
        $highestColumn = $sheet->getHighestColumn(); // 取得总列数
        
//         echo "总行数".$highestRow."<br/>";
//         echo "总列数".$highestColumn."<br/>";
        
        $request_arr = array();
        $key = array();
        
        //row1 is for title
        for ($j = 'A'; $j <= $highestColumn; $j++) {
            $i = 3;
            $key[$j] = $objPHPExcel->getActiveSheet()->getCell($j.$i)->getValue();
        }
        
        //content starts from A3
        for ($i = 4; $i <= $highestRow; $i++) {
            for ($j = 'A'; $j <= $highestColumn; $j++) {
                $objVal = $objPHPExcel->getActiveSheet()->getCell($j.$i)->getValue();
                $request_arr[$i][$key[$j]] = ($objVal === null) ? '' : $objVal;
            }
        }
        
        //var_dump($request_arr);die;
        return $request_arr;
    }
}


if (!function_exists('excelexport')) {
    function excelexport($json_data) {
        require_once 'public/plugin/phpexcel/Classes/PHPExcel.php';
        require_once 'public/plugin/phpexcel/Classes/PHPExcel/IOFactory.php';
        require_once 'public/plugin/phpexcel/Classes/PHPExcel/Reader/Excel5.php';
        error_reporting(E_ALL);
        date_default_timezone_set('PRC');
        
        $name = 'Excel';
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()
                    ->setCreator("laravel")
                    ->setLastModifiedBy("christianzhao")
                    ->setTitle("excelexport")
                    ->setDescription("backup")
                    ->setKeywords("excel")
                    ->setCategory("result file");
        
        //data manipulation
        //$json_data is in json format; it is json encoded to filter everything except data attributes
        $data = json_decode($json_data);
        
        //export title
        $i = 3;
        if (count($data)) {
            $j = 'A';
            
            foreach ($data[0] as $key => $value) {
                //unset primary key if existed
                //primary key is not needed when import
                if ($key == 'id') {
                    continue;
                }
                
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue($j.$i, $key);
                $j++;
            }
        }
        
        //export detailed data
        $i++;
        foreach ($data as $row) {
            //unset primary key if existed
            //primary key is not needed when import
            if (isset($row->id)) {
                unset($row->id);
            }
            
            $j = 'A';
            foreach ($row as $column) {
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue($j.$i, $column);
                $j++;
            }
            $i++;
        }
        
        $objPHPExcel->getActiveSheet()->setTitle('User');
        $objPHPExcel->setActiveSheetIndex(0);
        
        header('Content-Type: application/vnd.ms-excel; charset=utf-8');
        header('Content-Disposition: attachment;filename="'.$name.'.xlsx"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'excel2007');
        $objWriter->save('php://output');
        exit;
    }
}

if (!function_exists('sendemail')) {
    function sendemail($smtpemailto, $mailsubject, $mailbody) {
        require_once 'public/plugin/phpemail/smtp.php';
        date_default_timezone_set("PRC");
        //using 163 mailbox as server
        $smtpserver = "smtp.163.com";
        //163 mailbox server port
        $smtpserverport = 25;
        //163 mailbox server email address
        $smtpusermail = "xxxuseremail@163.com";
        //username(without '@163.com') as smtp server username
        $smtpuser = "xxxuseremail";
        //password as smtp server password
        $smtppass = "password";
        //email format(HTML/TXT)
        $mailtype = "HTML";
        //这里面的一个true是表示使用身份验证,否则不使用身份验证
        $smtp = new smtp($smtpserver, $smtpserverport, true, $smtpuser, $smtppass);
        //show debug info
        //$smtp->debug = true;
        //send...
        $smtp->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype);
    }
}

/*
 * return part of a string mixed with both english and chinese characters
 * herein the length of 1 chinese character is considered as 1, the same as english characters
 */
if (!function_exists('mix_en_ch_substr')) {
    function mix_en_ch_substr ($str, $start, $length, $charset = "utf-8", $suffix = true) {
        if (function_exists("mb_substr")) {
            return mb_substr($str, $start, $length, $charset);
        } else if (function_exists('iconv_substr')) {
            return iconv_substr($str, $start, $length, $charset);
        }
        $re['utf-8']  = "/[/x01-/x7f]|[/xc2-/xdf][/x80-/xbf]|[/xe0-/xef][/x80-/xbf]{2}|[/xf0-/xff][/x80-/xbf]{3}/";
        $re['gb2312'] = "/[/x01-/x7f]|[/xb0-/xf7][/xa0-/xfe]/";
        $re['gbk']    = "/[/x01-/x7f]|[/x81-/xfe][/x40-/xfe]/";
        $re['big5']   = "/[/x01-/x7f]|[/x81-/xfe]([/x40-/x7e]|/xa1-/xfe])/";
        preg_match_all($re[$charset], $str, $match);
        $slice = join("",array_slice($match[0], $start, $length));
        if ($suffix) {
            return $slice."..";
        } else {
            return $slice;
        }
    }
}

/*
 * calculate the timestamp of next day 00:00:00
 */
if (!function_exists('nextday_timestamp')) {
    function nextday_timestamp() {
        return ((int)(time() / (24 * 3600)) + 1) * 24 * 3600 - 8 * 3600;
    }
}



/*
 * 发起一个post请求到指定接口
 *
 * @param string $api 请求的接口
 * @param array $params post参数
 * @param int $timeout 超时时间
 * @return string 请求结果
 */
if (!function_exists('smsverify')) {
    function smsverify($api, array $params = array(), $timeout = 30) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $api);
        // 以返回的形式接收信息
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // 设置为POST方式
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        // 不验证https证书
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/x-www-form-urlencoded;charset=UTF-8',
            'Accept: application/json',
        ) );
        // 发送数据
        $response = curl_exec($ch);
        // 不要忘记释放资源
        curl_close($ch);
        return $response;
    }
}

/*
 * 获取客户端ip
 */
if (!function_exists('get_client_ip')) {
    function get_client_ip() {
        if (getenv('HTTP_CLIENT_IP')) {
            $ip = getenv('HTTP_CLIENT_IP');
        } else if (getenv('HTTP_X_FORWARDED_FOR')) {
            $ip = getenv('HTTP_X_FORWARDED_FOR');
        } else if (getenv('HTTP_X_FORWARDED')) {
            $ip = getenv('HTTP_X_FORWARDED');
        } else if (getenv('HTTP_FORWARDED_FOR')) {
            $ip = getenv('HTTP_FORWARDED_FOR');
        } else if (getenv('HTTP_FORWARDED')) {
            $ip = getenv('HTTP_FORWARDED');
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        
        return $ip;
    }
}

/*
 * 
 */
if (!function_exists('ismobile')) {
    function ismobile() {
        // 如果有HTTP_X_WAP_PROFILE则一定是移动设备
        if (isset ($_SERVER['HTTP_X_WAP_PROFILE'])) {
            return true;
        }
        // 如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
        if (isset ($_SERVER['HTTP_VIA'])) {
            // 找不到为flase,否则为true
            return stristr($_SERVER['HTTP_VIA'], "wap") ? true : false;
        }
        // 脑残法，判断手机发送的客户端标志,兼容性有待提高
        if (isset ($_SERVER['HTTP_USER_AGENT'])) {
            $clientkeywords = array ('nokia', 'sony', 'ericsson', 'mot', 'samsung',
                'htc', 'sgh', 'lg', 'sharp', 'sie-', 'philips', 'panasonic', 'alcatel',
                'lenovo', 'iphone', 'ipod', 'blackberry', 'meizu', 'android', 'netfront',
                'symbian', 'ucweb', 'windowsce', 'palm', 'operamini', 'operamobi', 'openwave',
                'nexusone', 'cldc', 'midp', 'wap', 'mobile'
            );
            // 从HTTP_USER_AGENT中查找手机浏览器的关键字
            if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {
                return true;
            }
        }
        // 协议法，因为有可能不准确，放到最后判断
        if (isset ($_SERVER['HTTP_ACCEPT'])) {
            // 如果只支持wml并且不支持html那一定是移动设备
            // 如果支持wml和html但是wml在html之前则是移动设备
            if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false)
                && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false
                    || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) {
                        return true;
                    }
        }

        return false;
    }
}

?>