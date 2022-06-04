<?php
function autoLoader($className) //addtocart
{
	$directories=array('../classes/','../lib/','classes/','lib/');
	
	$fileFormates=array('%s.php','Db.Config.php','%s.class.php');
	
	
	foreach($directories as $directory)
	{
		foreach($fileFormates as $fileFormate)
		{
			$path=$directory.sprintf($fileFormate,$className);//sprintf use for add string in runtime
			if(file_exists($path))
			{
				include_once $path;
				return;
				}
			}
		}
	}

spl_autoload_register('autoLoader');


?>