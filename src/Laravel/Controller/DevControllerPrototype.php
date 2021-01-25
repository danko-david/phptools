<?php

namespace PhpTools\Laravel\Controller;

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Request;

class DevControllerPrototype
{
    public function sandbox(Request $request)
	{
		if(isset($_GET['method']))
		{
			$method = $_GET['method'];
			if('sandbox' == $method)
			{
				die('sandbox');
			}

			(new \ReflectionMethod(get_class($this), $method))->invoke($this, $request);
			die();
		}

		echo "Choose a method:<br>\n";

		$class = new \ReflectionClass(get_class($this));

		foreach($class->getMethods(\ReflectionMethod::IS_PUBLIC) as $m)
		{
		    if(!($m->getModifiers() & \ReflectionMethod::IS_STATIC))
		    {
    			$method = $m->name;
    			echo '<a href="?method='.$method.'">'.$method.'</a><br/>';
		    }
		}

		die();
	}

    public static function registerRoutes(Router $router, string $path, string $class)
    {
        $router->any($path.'/sandbox', $class.'@sandbox');
    }
}
