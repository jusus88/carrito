
<?php 
	class controllersProductos
	{
		public $record;

		function __construct()
		{
			include "models/modelProductos.php";
			$this->record=new modelProductos();
		}
	}
 ?>