<?php
echo "<pre>";

// Abrir la base, mysql NO crea la base si no existe
$db = new mysqli('127.0.0.1', 'marianosebastian', '', 'curza');
//verificamos que haya sido una conexión exitosa
if($db->connect_error)
{
    die("$db->connect_errno: $db->connect_error");
}

// creamos la tabla si no existe
$db->query('CREATE TABLE IF NOT EXISTS `visits` (
`id` INTEGER AUTO_INCREMENT PRIMARY KEY, 
`user_id` VARCHAR(30),
`url` VARCHAR(30),
`time` DATETIME
)');

// mysql también soport transacciones, aunque esto a diferencia de sqlite es conveniente
// solamente cuando hay múltiples operaciones
$db->query('BEGIN');
$db->query('INSERT INTO `visits` (`user_id`, `url`, `time`)
    VALUES (42, "/test", "2017-01-14 10:11:23")');
// de las operaciones realizadas (sobre todo insert,delete,update) podemos obtener
// el ultimo id generado en (en los inserts) y la cantidad de filas afectadas para las tres operaciones
// no se recomienda usar este enfoque para los SELECT
echo 'número de filas:'.$db->affected_rows."\n\r";
echo 'último id:'.$db->insert_id."\n\r";
$db->query('INSERT INTO `visits` (`user_id`, `url`, `time`)
    VALUES (42, "/test2", "2017-01-14 10:11:44")');
echo 'número de filas:'.$db->affected_rows."\n\r";
echo 'último id:'.$db->insert_id."\n\r";
$db->query('COMMIT');



// mysql soporta el binding de parámetros, pero NO NOMBRADOS, es decir solamente
// soporta binding por posición
$statement = $db->prepare('INSERT INTO `visits` (`user_id`, `url`, `time`)
    VALUES (?, ?, ?)');
$uid = 1337;
$url = '/test';
$fechahora = date('Y-m-d H:i:s');
// el binding, debe hacerse usando variables, y el primer parámetro se utiliza para especificar
// el tipo, por ejemplo la i es por integer y la s por string
$statement->bind_param('iss', $uid, $url, $fechahora);
$statement->execute();

echo 'número de filas:'.$db->affected_rows."\n\r";
echo 'último id:'.$db->insert_id."\n\r";


// También podemos usar el binding para la selección
$statement = $db->prepare('SELECT * FROM `visits` WHERE `user_id` = ? AND `time` >= ?');
$uid = 42;
$url = '2017-01-14';
$statement->bind_param('is', $uid, $url);
$statement->execute();
// en mysqli necesitmos esta sentencia para recorrer un conjunto con sentencias preparadas
$result = $statement->get_result();

// también podemos devolver la fila como arreglo asociativo
echo("Get the 1st row as an associative array:\n");
print_r($result->fetch_assoc());
echo("\n");

// o como array indexado
echo("Get the next row as a numeric array:\n");
print_r($result->fetch_row());
echo("\n");

// mysqli nos proporciona una función similar a la de sqlite para "escapar" el contenido
// de las varialbes antes de insertarlo, si es que no usamos binding
$valorEscapado = $db->escape_string('/test');

$query = 'SELECT * FROM `visits` WHERE `url` = \'' .
    $valorEscapado .
    '\' ORDER BY `id` DESC LIMIT 1';

$lastVisitResult = $db->query($query);
// mysqli puede convertir una fila en un objeto (en vez de array), por default
// la clase que usa es stdClass, y los atributos del objetos son los nombres
// de las columnas
$lastVisitArray = $lastVisitResult->fetch_object()->time;

echo("Last visit of '/test':\n");
print_r($lastVisitArray);
echo("\n");


// para seleccionar solamente un fila, tenemos varias estrategias con mysqli, aunque
// ninguna tan directa como con sqlite. En el siguiente caso, seleccionamos la fila 
// de manera indexada y accedemos al primer registro

$userCountResult = $db->query('SELECT COUNT(DISTINCT `user_id`) FROM `visits`');
$userCount = $userCountResult->fetch_row()[0];

echo("User count: $userCount\n");
echo("\n");


// Al igual que con sqlite, cerramos la conexión. También se cierra sola al finalizar el script

$db->close();
 echo "</pre>";