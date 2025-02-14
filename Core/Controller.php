<?php 


Trait Controller
{

<<<<<<< HEAD
	// public function view($name,$data=[])
	// {
	// 	if(!empty($data)){
	// 		extract($data);
	// 	}
	// 	$filename = "../app/views/".$name.".view.php";
	// 	if(file_exists($filename))
	// 	{
	// 		require $filename;
	// 	}else{

	// 		$filename = "../app/views/404.view.php";
	// 		require $filename;
	// 	}
	// }
=======
    public function view($name)
    {
        $filename = "../app/view/".$name.".view.php";
        if(file_exists($filename))
        {
            require $filename;
        }else{

            $filename = "../app/view/404.view.php";
            require $filename;
        }
    }
>>>>>>> 92a25483c26eca48e0f3bb9052a9b2c5f7daef76
}