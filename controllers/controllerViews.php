


<?php 

	class controllersViews
	{
		function __construct()
		{
			include "views/base.php";
			$_SESSION["Productos"]="";
			$_SESSION["Precios"]="";
			$_SESSION["Cantidades"]="";
			$_SESSION["Total"]="";
		}

		function shop()
		{

			session_start();
			sup();
			include "controllers/controllersProductos.php";
			$tabla=new controllersProductos();

			$r=$tabla->record;
			$r->listar();
			inf();
		}

		function resume()
		{
			session_start();
			sup();
			extract($_POST);
			$_SESSION["Productos"] .= ",".$producto;
			$_SESSION["Precios"] .= ",".$precio;
			$_SESSION["Cantidades"] .= ",".$cantidad;
			$_SESSION["Total"] .= ",".$cantidad*$precio;
			
			echo "</div>";
			echo "Agregaste al Carrito: ";
			echo "<hr />";
			echo "Producto: ".$producto."<br />";
			echo "Precio: S/ ".$precio."<br />";
			echo "Cantidad: ".$cantidad."<br />";
			echo "Total: S/ ".$precio*$cantidad;
			echo "<hr />";
			echo "Resumen de su Carrito de Compras:";
			echo "<hr />";

			$Pro=explode(",", $_SESSION["Productos"]);
			$Cant=explode(",", $_SESSION["Cantidades"]);
			$Pre=explode(",", $_SESSION["Precios"]);
			$Totales=explode(",", $_SESSION["Total"]);

			echo "<table>";
			echo "<tr>";
			echo "<td>Cantidad</td>";
			echo "<td>Producto</td>";
			echo "<td>Precio</td>";
			echo "<td>Totales</td>";
			echo "</tr>";

			for ($i=0; $i <count($Pro) ; $i++) { 
				echo "<tr>";
				echo "<td>",$Cant[$i],"</td>";
				echo "<td>",$Pro[$i],"</td>";
				echo "<td>",$Pre[$i],"</td>";
				echo "<td>",$Totales[$i],"</td>";
				echo "</tr>";
			}
			echo "<tr>";
			echo "<td>Total de su Compra</td>";
			$monto=0;
			for ($i=0; $i <count($Totales) ; $i++) { 
				$monto+=$Totales[$i];
			}
			echo "<td>$monto</td>";
			echo "</table>";

			
			
			echo "<a href='index.php'>Comprar mas</a>";
			inf();
		}
	}

 ?>
