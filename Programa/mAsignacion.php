<?php
//----------------MODELO--------------------
class Masignacion {
    private $conexion; //Creamos un atributo "$conexion" para almacenar la conexión creada en el constructor.

    public function __construct() { //Creamos en el constructor la conexión con la BBDD.
        include_once 'configdb.php'; //Incluimos el archivo de configuración
        $this->conexion = new mysqli(SERVIDOR, USUARIO,PASSWORD, BBDD); //Establecemos la conexión en el constructor
    }


    //----------Primera función: Consulta el valor del stock del isbn en concreto -->
    public function select_stock ($isbn){
        $consulta_stock = "SELECT stock FROM libro WHERE isbn= '".$isbn."'";
        $resultado_stock = $this->conexion -> query($consulta_stock);//Realiza la consulta.
        $resultadoStock = $resultado_stock -> fetch_assoc();
        return $resultadoStock; //Devuelve el número de stock
    }

    //---------Segunda función: Consulta de reservas. ---->
    public function select_reserva($isbn){
        //Consultamos el titulo, nombre, apellidos y fecha de reserva de las reservas (aptas para ser asignadas) realizadas para un isbn en concreto.
        $consulta_reserva = "SELECT reserva.idReserva, nombre, apellidos, fechaReserva
           FROM reserva 
           INNER JOIN reserva_libro ON reserva_libro.idReserva = reserva.idReserva 
           INNER JOIN libro ON reserva_libro.isbn = libro.isbn
           WHERE estadoPago = 1 AND asignado = 0 AND libro.isbn = '" . $isbn . "'
           ORDER BY fechaReserva";

        $reservas = $this->conexion->query($consulta_reserva); //Realiza la consulta.
        
        //Si NO hay filas, retorna "false".
        if ($reservas === false){
            return false;
        }
        
        $reservasaptas = []; //Inicializamos array vacío para almacenar los datos del objeto en el array.

        //Mientras haya filas, las almacena en un array.
        while($fila = $reservas -> fetch_assoc()){
            $reservasaptas[] = $fila;
        }

        return $reservasaptas; //Devuelve TODAS las filas como array asociativo
    }

    //Cuando se realicen asignaciones esta función actualizará el stock de un libro en concreto.
    public function actualizarstock($stock, $isbn){
        $actualizar_stock = "UPDATE libro SET stock = $stock WHERE isbn = $isbn"; //Actualizamos el stock de la tabla libro.
        $this->conexion->query($actualizar_stock);//Realiza la consulta.
    }

    //Cuando se realicen asignaciones esta función actualizará el atributo "asignado" a "1" para una reserva en concreto.
    public function asignado($idReserva, $isbn){
        $asignado = "UPDATE reserva_libro SET asignado=1 WHERE idReserva = $idReserva AND isbn = '".$isbn."'";
        $this->conexion -> query($asignado);
    }

    //
    public function select_titulo ($isbn){
        $select_titulo = "SELECT titulo FROM libro WHERE isbn = '".$isbn."'";
        $titulo = $this->conexion -> query ($select_titulo);//Realiza la consulta.
        $titulolibro = $titulo -> fetch_assoc();
        return $titulolibro;
    }

}
?>