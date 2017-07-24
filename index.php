<?php
	$file = explode('=',$_SERVER['QUERY_STRING'])[1];

	switch($_SERVER['REQUEST_METHOD']) 
	{
		case 'HEAD':
			if (file_exists($file))
			{
				// 'head' responce has no body, so size of file can be placed in http header
				header('Content-Length: '.filesize($file));
			}
		break;		
		case 'GET':
			if (file_exists($file))
			{
				$handle = fopen($file, 'r');
				fpassthru($handle);
				fclose($handle);
			}
		break;
		case 'POST':
			if (file_exists($file))
			{
				$requestBody = file_get_contents('php://input');
				$handle = fopen($file, 'w');
				flock($handle, LOCK_EX);
				fwrite($handle, $requestBody);
				flock($handle, LOCK_UN);
				fclose($handle);
			}
		break;
		case 'DELETE':
			if (file_exists($file))
			{
				unlink($file);
			}
		break;
		case 'PATCH':
			if (file_exists($file))
			{
				$requestBody = file_get_contents('php://input');
				$handle = fopen($file, 'a');
				flock($handle, LOCK_EX);
				fwrite ($handle, $requestBody);
				flock($handle, LOCK_UN);
				fclose($handle);
			}
		break;
	}
?>