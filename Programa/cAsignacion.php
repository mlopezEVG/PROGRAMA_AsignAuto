<?php
//----------------CONTROLADOR--------------------
class Casignacion{
    public $obj_masig; //Como vamos a hacer referencia continuamente al objeto instanciado del modelo, creamos un atributo publico para el objeto

//--------CONSTRUCTOR--------
    function __construct(){
        require_once 'Masignacion.php'; //Requerimos del archivo del modelo para instanciar su clase
        $this->obj_masig = new Masignacion(); //Le damos valor al atributo instanciando el objeto.
    }

//------Función para hacer el proceso de asignación de los libros a las reservas.-----
    public function procesar_asignaciones($isbn) {
        
        $stock = $this->obj_masig->select_stock($isbn)['stock']; // Obtiene el stock del libro.
        if ($stock <= 0) { //SI NO HAY STOCK...
            return "Stock 0"; // retorna "Stock 0"
        }
        
        $reservas = $this->obj_masig->select_reserva($isbn); // Obtiene las reservas no asignadas y pagadas
        $asignados = []; // Array para almacenar las asignaciones realizadas.
        
    //------- Si la función retorna false, (no hay registros/reservas). Si no es falso y hay reservas en $reservas, realiza ASIGNACIONES.
        if ($reservas !== false && count($reservas) > 0){
            $asignados = []; //Instanciamos un array vacío

            foreach ($reservas as $filas){ //Mientras haya filas...
                if ($stock <= 0) break;

                $idReservas = $filas['idReserva']; //Guardamos el idReserva para pasarla por parámetro para actualizar los datos llamando a los métodos
                $this-> obj_masig->asignado($idReservas, $isbn); //Actualiza el atributo asignado = 1.
                $stock--; //Cuando se realiza una asignación disminuye el stock
                $this-> obj_masig->actualizarstock ($stock, $isbn); //Actualizamos el stock.

                $asignados[]=[  //Damo valores al array
                    'nombre' => $filas['nombre'],
                    'apellidos' => $filas['apellidos'],
                    'fechaReserva' => $filas['fechaReserva']
                ];
            }

            // Obtiene el título del libro 
            $titulo = $this->obj_masig->select_titulo($isbn)['titulo']; 
            return ['titulo' => $titulo, 'asignados' => $asignados];// retorna un array con el titulo y los datos de los registros

        }else{
            // Maneja el caso cuando no hay reservas o hay un problema con la consulta.
            return "false";
        }













        // Procesa cada reserva mientras haya stock
        // while ($stock > 0 && $fila_reserva = $reservas->fetch_assoc()) {

        //     $idReserva = $fila_reserva['idReserva'];

        //     $this->obj_masig->asignado($idReserva, $isbn); // Marca la reserva como asignada
        //     $stock--; // Reduce el stock
        //     $this->obj_masig->actualizarstock($stock, $isbn); //Actualiza el stock después de disminuirlo.

        //     // Agrega al array SOLO a los que se les han asignados libros
        //     $asignados[] = [
        //         'nombre' => $fila_reserva['nombre'],
        //         'apellidos' => $fila_reserva['apellidos'],
        //         'fechaReserva' => $fila_reserva['fechaReserva']
        //     ];
        // }

        // Obtiene el título del libro
        $titulo = $this->obj_masig->select_titulo($isbn);

        return ['titulo' => $titulo, 'asignados' => $asignados];
    }
}
?>