
<?php
    class connect
    {

        public $conexion;

        function __construct()
        {
            $this->conexion=new mysqli("localhost","root","12345678","ALMACEN");

            if ($this->conexion->connect_errno)
            {
                echo $this->conexion->connect_error;
            }
        }
    }
?>