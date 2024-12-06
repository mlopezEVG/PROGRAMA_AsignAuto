<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>/*Estilos generales*/
*{
    margin: 0;
    padding: 0;
    font-size: 1.2vw;
}

/*  HEADER  */
header{
    width: 100%;
    height: 15vh;
    max-height: 150px;
    border-bottom: 0.1vw solid #006293;
}

main{
    text-align: center;
    width: 100%;
    min-height: 65%;
    /* height: fit-content; */
}

footer{
    width: 100%;
    height: 20vh;
    color: white;
    clear: both;
    background-color: #006293;
}

/* ----------------------- HEADER ----------------------- */

header div{
    float: left;
    width: 12%;
    height: 80%;
    margin: 0.5% 3.5%;
}

header img{
    display: block;
    height: auto;
    max-width: 100%;
}

/* Estilos para el nav */
nav{
    width: 80%;
    height: 100%;
    float: right;
    background-color: #006293;
    color: white;
}

nav > a, #gestion {
    color: #fff;
    text-decoration: none;
    float: left;
    margin: 5.8vh 12%;
}

/* Submenú oculto por defecto */
#submenu{
    height: auto;
    width: auto;
    display: none;
    position: absolute;
        top: 4.8vh;
        left: 74%;
}

#submenu a{
    color: #fff;
    text-decoration: none;
    padding-right:  1vw;
}

#submenu a:nth-child(2){
    border-left: 1px solid #fff;
    padding-left: 1vw;
}

#gestion:hover{
    display: none;
}

#gestion:hover + #submenu{
    display: block;
}
/*-------------------------MAIN------------------------*/
#libroasignado{
    font-weight: bold;
    font-size: 2vw;
    margin:  5% 0;
}

table { 
    width: 60%; 
    border-collapse: collapse; 
    margin: 0 20% 5% 20% ;
} 

th, td { 
    border: 3px solid black; 
    padding: 1.5vh; 
    text-align: center; 
} 

th { 
    background-color: #006293; 
    color: white; 
} 

tr:nth-child(even) { 
    background-color: #a2cfe5; 
} 

tr:nth-child(odd) {
    background-color: #599ABA; 
    color: black; 
}

main>button{}
/* FOOTER */
footer{
    width: 100%;
    height: 20vh;
    color: white;
    clear: both;
    background-color: #006293;
    margin-top: auto;
    
}

footer div{
    float: left;
    width: 31%;
    height: 15vh;
    margin-top: 1.2%;
}

.lineaFooter{
    margin-right: 3.2%;
    border-right: 0.1vw solid #417b9876;
}

footer h3{
    font-size: 1.4vw;
    margin: 1vh;
}

footer div:nth-child(1) p{
    margin: 1vh 3vw;
}

footer div:nth-child(2) ul{
    list-style-type: none;
}

footer li{
    float: left;
    width: 45%;
    text-align: center;
    margin: 0.5vh 0;
}

footer div:nth-child(3) a{
    display: block;
    margin: 3.4vh 5vw;
    text-decoration: none;
    color: white;
}

/* Media Queries */
@media (width <= 1220px) {
    /*----------------HEADER---------------*/
    header div{
        width: 18%;
        margin: 0.5% 1%;
    }

    nav > a, nav > p, #submenu > a{
        font-size: 1.5em;
    }

    nav > a {
        margin-right: 5vw;
    }

    #submenu{
        top: 5.5vh;
        left: 72%;
    }
    /*----------------MAIN---------------*/

    #libroasignado{
        font-size: 3em;
        margin:  9% 0;
    }

    table { 
        width: 80%; 
        margin: 0 10% 38% 10% ;
    } 

    th, td { 
        font-size: 2em; 
    } 

    /*----------------FOOTER---------------*/
    footer div, footer h3, footer p, footer a {
        font-size: 1.4em;
    }

    footer ul li{
        font-size: 1.8em;
    }
}

@media (max-width: 550px) {
    /* Aumenta el tamaño de la fuente de los elementos dentro de nav y submenús */
    header img{
        margin-top: 5vh;
    }
    
    nav > a, nav > p, #submenu > a {
        font-size: 2.5em; /* Aumenta el tamaño de la fuente a 2.5em */
    }

    nav > a, #gestion {
        margin: 5.8vh 6.7%;
    }

    #libroasignado{
        font-size: 3em;
        margin:  9% 0;
    }

    table { 
        width: 80%; 
        margin: 0 10% 38.5% 10% ;
    } 

    th, td { 
        font-size: 2.5em; 
    } 
    /* Estilo para los elementos dentro del footer */
    footer div, footer h3, footer p, footer a {
            font-size: 1.5em; /* Aumenta el tamaño de la fuente de los elementos */
    }
    
    /* Estilo para los elementos de lista dentro del footer */
    footer ul li {
        font-size: 1.9em; /* Aumenta el tamaño de la fuente de los elementos de lista */
    }

    .lineaFooter{
        margin: 3vh 3.2% 0 0%;
    }
}
</style>
</head>
<body>
    <header>
        <div>
            <img src="img\logotipo.png" alt="Logo de la escuela">
        </div>
        <nav>
            <a href="">HOME</a>
            <a href="">RESERVAS</a>
            <p id="gestion">GESTIÓN LIBROS</p>
            <div id="submenu">
                <a href="#lib">LIBROS</a>
                <a href="#stc">STOCK</a>
            </div>
        </nav>
    </header>
    <main>
        <p id="libroasignado">El libro <?php echo $titulo; ?> se ha asignado correctamente</p>
        <table> 
            <thead> <!--Cabecera de la tabla-->
                <tr> 
                    <th>NOMBRE del ALUMNO</th> 
                    <th>FECHA de RESERVA</th> 
                    <th>NOTIFICADO</th> 
                </tr> 
            </thead> 
            <tbody> <!--Cuerpo de la tabla || Aquí se crearán filas y mostrarán los alumnos según el número de libros asignados a los alumnos-->
                <?php //Recorremos el array para enviar al servidor los datos de todas las filas en formato tabla.
                    foreach ($asignados as $fila => $value){
                        echo "<tr>";
                        echo "<td>".$value['nombre']." ".$value['apellidos']."</td>";
                        echo "<td>".$value['fechaReserva']."</td>";
                        echo "<td> Sí </td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </main>
    <footer><!--Footer-->
        <div class="lineaFooter">
            <h3>Contactar</h3>
            <p>C/ Corte de Peleas, 79 06009 Badajoz</p>
            <p>+34 924 25 17 61</p>
        </div>
        <div class="lineaFooter">
            <h3>Colaboradores</h3>
            <ul>
                <li>Álvaro Gómez</li>
                <li>Celia Moruno</li>
                <li>Joaquín Telo</li>
                <li>Miriam López</li>
            </ul>        
        </div>
        <div>
            <a href="https://fundacionloyola.com/vguadalupe/politica-de-cookies/">Políticas Cookies</a>
            <a href="https://fundacionloyola.com/vguadalupe/politica-de-privacidad/">Políticas Privacidad</a>
        </div>
    </footer>
</body>
</html>