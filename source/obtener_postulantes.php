<?php

include("../includes/conectar.php");
$conexion = conectar();


if(isset($_GET['id_oferta'])) {
    
    $id_oferta = $_GET['id_oferta'];

    
    $query = "SELECT u.nombres, u.apellidos FROM postulaciones p INNER JOIN usuarios u ON p.id_usuario = u.id WHERE p.id_oferta = $id_oferta";
    $result = mysqli_query($conexion, $query);

    
    if(mysqli_num_rows($result) > 0) {
        
        $postulantes = "<h3>Postulantes:</h3><ul>";
        while($row = mysqli_fetch_assoc($result)) {
            $postulantes .= "<li>".$row['nombres']." ".$row['apellidos']."</li>";
        }
        $postulantes .= "</ul>";

        
        echo $postulantes;
    } else {
        echo "<p>No hay postulantes para esta oferta.</p>";
    }
} else {
    echo "<p>Error: ID de oferta no especificado.</p>";
}
?>
