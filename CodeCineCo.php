<?php

class ListaEnlazada {
    private $peliculas = [];

    public function insertar($pelicula) {
        $this->peliculas[] = $pelicula;
    }

    public function imprimir() {
        echo "\n--- Cartelera de CineCo ---\n";
        foreach ($this->peliculas as $indice => $pelicula) {
            echo ($indice + 1) . ". $pelicula\n";
        }
        echo "---------------------------\n";
    }

    public function obtenerPelicula($posicion) {
        if ($posicion >= 1 && $posicion <= count($this->peliculas)) {
            return $this->peliculas[$posicion - 1];
        }
        return null;
    }
}

// Inicializar cartelera
$cartelera = new ListaEnlazada();
$peliculas = [
    "Escuela de rock", "Mufasa", "Intensamente", "Tinkerbell",
    "Entrenando a Papá", "Alvin y las Ardillas",
    "Lilo & Stitch", "Blancanieves", "Mulan"
];
foreach ($peliculas as $pelicula) {
    $cartelera->insertar($pelicula);
}

$colaClientes = [
    "Juan", "Maria", "Carlos", "Ana" // Simulamos una lista de clientes
];

$respuestasClientes = ['s', 's', 'n', 's']; // Simulamos las respuestas: 's' para agregar cliente, 'n' para salir

$seleccionesClientes = [1, 2, 3, 5]; // Simulamos que los clientes eligen diferentes películas por su número

echo "\nBienvenido a la taquilla de CineCo.\n";

// Fase de registro de clientes
$indiceCliente = 0;
while ($indiceCliente < count($respuestasClientes)) {
    $respuesta = $respuestasClientes[$indiceCliente];

    if ($respuesta === 's') {
        $nombreCliente = $colaClientes[$indiceCliente];
        echo "$nombreCliente ha sido añadido a la cola.\n";
        echo "Clientes en cola: " . (count($colaClientes) - $indiceCliente) . "\n";
    }
    $indiceCliente++;

    if ($respuesta === 'n') {
        break;
    }
}

echo "\n--- Iniciando atención a los clientes ---\n";

// Fase de atención a clientes
$indiceCliente = 0;
while ($indiceCliente < count($colaClientes)) {
    $clienteActual = $colaClientes[$indiceCliente];
    echo "\n----------------------------\n";
    echo "Atendiendo a $clienteActual...\n";

    // Mostrar cartelera
    $cartelera->imprimir();

    // Simulamos la elección de la película
    $seleccion = $seleccionesClientes[$indiceCliente];
    if ($seleccion >= 1 && $seleccion <= count($peliculas)) {
        $pelicula = $cartelera->obtenerPelicula($seleccion);
        echo "$clienteActual ha elegido la película: $pelicula\n";
    } else {
        echo "Selección inválida. El número debe estar entre 1 y 9.\n";
    }

    $indiceCliente++;
}

echo "\nNo quedan más clientes en la cola.\n";
echo "Gracias por usar CineCo. ¡Hasta pronto!\n";
?>