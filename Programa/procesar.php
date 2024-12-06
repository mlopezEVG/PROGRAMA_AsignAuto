<?php
require 'cAsignacion.php';

$isbn = $_GET['isbn']; //Recogemos el isbn del botón con el que haremos todos los procesos.
$obj_casign = new Casignacion(); // Instanciamos el controlador de asignación.

// Llamamos al método del controlador que procesa las asignaciones
$resultado = $obj_casign->procesar_asignaciones($isbn);


if ($resultado === "false"){ //-------El método del controlador retorna "false" Cuando en la consulta no se encuentran registros.
    echo "No hay reservas para este libro!!".'<br/>'."Valor de la variable: "; //Controlamos ese error enviando un mensaje
    print_r($resultado).'<br/>';

}elseif($resultado === "Stock 0"){ //---------El método del controlador retorna "Stock 0". Cuando no haya stock de ese libro
    echo "No hay stock disponible!!".'<br/>'."Valor de la variable: ";//Controlamos ese error enviando un mensaje
    print_r($resultado).'<br/>';

}else{ //-----El método del controlador retorna un array con el titulo y un array con los datos de la reserva
    // Guarda los datos en variables para la vista 
        $titulo = $resultado['titulo']; 
        $asignados = $resultado['asignados']; 
      // Incluye la vista para mostrar los datos 
        include '..\listadoasignacion.php';
}

?>