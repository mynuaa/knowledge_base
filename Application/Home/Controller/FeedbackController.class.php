<?php
namespace Home\Controller;
use Think\Controller;
class FeedbackController extends Controller {
		public function index(){
			$this->display();
		}
		public function post_feedback(){



		}
		public function fb_img($value='')
		{			
			$targetDir = ROOT_PATH.'/Public/upload_tmp';
			$uploadDir = ROOT_PATH.'/Public/upload_fb_img';

//			$cleanupTargetDir = true; 


			if (!file_exists($targetDir)) {
			    @mkdir($targetDir);
			}

			if (!file_exists($uploadDir)) {
			    @mkdir($uploadDir);
			}

			if (isset($_REQUEST["name"])) {
			    $fileName = $_REQUEST["name"];
			} elseif (!empty($_FILES)) {
			    $fileName = $_FILES["wangEditorH5File"]["name"];
			} else {
			    $fileName = uniqid("file_");
			}
			$fileName = iconv('UTF-8', 'GB2312', $fileName);
			$filePath = $targetDir . DIRECTORY_SEPARATOR . $fileName;
			$uploadPath = $uploadDir . DIRECTORY_SEPARATOR . $fileName;


			$imgUrl=$uploadDir."/".$fileName;

			$chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
			$chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 1;


			if ($cleanupTargetDir) {
			    if (!is_dir($targetDir) || !$dir = opendir($targetDir)) {
			        die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');
			    }

			    while (($file = readdir($dir)) !== false) {
			        $tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;

			        if ($tmpfilePath == "{$filePath}_{$chunk}.part" || $tmpfilePath == "{$filePath}_{$chunk}.parttmp") {
			            continue;
			        }

			        if (preg_match('/\.(part|parttmp)$/', $file) && (@filemtime($tmpfilePath) < time() - $maxFileAge)) {
			            @unlink($tmpfilePath);
			        }
			    }
			    closedir($dir);
			}



			if (!$out = @fopen("{$filePath}_{$chunk}.parttmp", "wb")) {
			    die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
			}

			if (!empty($_FILES)) {
			    if ($_FILES["wangEditorH5File"]["error"] || !is_uploaded_file($_FILES["wangEditorH5File"]["tmp_name"])) {
			        die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
			    }

			    if (!$in = @fopen($_FILES["wangEditorH5File"]["tmp_name"], "rb")) {
			        die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
			    }
			} else {
			    if (!$in = @fopen("php://input", "rb")) {
			        die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
			    }
			}

			while ($buff = fread($in, 4096)) {
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

			            while ($buff = fread($in, 4096)) {
			                fwrite($out, $buff);
			            }

			            @fclose($in);
			            @unlink("{$filePath}_{$index}.part");
			        }

			        flock($out, LOCK_UN);
			    }
			    @fclose($out);
				echo '../../../Public/upload_fb_img/' . $fileName;
			}
		}
	
		function fb_save(){
	//		var_dump(I('post.'));
		//	$p=I('get.title');
		//	var_dump(I('post.'));
		//	echo "string".'p';
		$info['uid'] = 1;
        $info['content'] = I('post.content');
        $info['title'] = I('post.title');
        $tags_value = I('post.tags');
        $info['date'] = date('Y-m-d h:m:s');
        $tags_value = explode(',',$tags_value);
        $tags = M('tags') -> select();
        $tags_info = array();
        $i = 0;
        $tags_id = '';
        foreach ($tags as $value) {
            $tags_info[$value['tags_name']] = $value['tags_id'];
        }
        foreach ($tags_value as $value) {
            if($value != '') {
                $tags_id = $tags_id . (string)$tags_info[$value] . ',';
            }
        }
        $info['tags_id'] = $tags_id;
        $info['author_name'] = 'wiwry';
        M('feedback') -> add($info);
        $this->ajaxReturn($tags_id);


		//			$this->ajaxReturn('ppppp');

		}


}