<?
	try
	{
		if (!isset($encoding) || $encoding == 'standard')
			echo $result;
		else if ($encoding == 'JSON' || $encoding == 'json')
			echo json_encode($result);	
	}
	catch(Exception $e)
	{
		echo '{"success":"false","message":"' . $e->getMessage() . '"}';
	}
?>