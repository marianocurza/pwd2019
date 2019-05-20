<?php
echo "<pre>";

// Abrir la base o crearla si no existe
$db = new SQLite3('curzadb.sqlite', SQLITE3_OPEN_CREATE | SQLITE3_OPEN_READWRITE);


// Crear la tabla si no existe
$db->query('CREATE TABLE IF NOT EXISTS `visits` (
    `id` INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    `user_id` INTEGER,
    `url` VARCHAR,
    `time` DATETIME
)');


// Insertando datos de ejemplo. SQLITE soporta transacciones (y en sqlite es mejor usarlas por
// rendimiento

$db->exec('BEGIN');
$db->query('INSERT INTO `visits` (`user_id`, `url`, `time`)
    VALUES (42, "/test", "2017-01-14 10:11:23")');
// de las operaciones realizadas (sobre todo insert,delete,update) podemos obtener
// el ultimo id generado en (en los inserts) y la cantidad de filas afectadas para las tres operaciones
// no se recomienda usar este enfoque para los SELECT
echo 'último rowid/pk:'.$db->lastInsertRowID()."\n\r";
echo 'número de filas:'.$db->changes()."\n\r";

$db->query('INSERT INTO `visits` (`user_id`, `url`, `time`)
    VALUES (42, "/test2", "2017-01-14 10:11:44")');
echo 'último rowid/pk:'.$db->lastInsertRowID()."\n\r";
echo 'número de filas:'.$db->changes()."\n\r";
$db->exec('COMMIT');


// Estrategia para usar bindinng de parámetros, que aporta seguridad a la hora de insgresar
// información a la bd
// Se pueden usar parámetros con nombre

$statement = $db->prepare('INSERT INTO `visits` (`user_id`, `url`, `time`)
    VALUES (:uid, :url, :time)');
$statement->bindValue(':uid', 1337);
$statement->bindValue(':url', '/test');
$statement->bindValue(':time', date('Y-m-d H:i:s'));
$statement->execute(); // you can reuse the statement with different values
echo 'último rowid/pk:'.$db->lastInsertRowID()."\n\r";
echo 'número de filas:'.$db->changes()."\n\r";



// Selección de información usando parámetros. Esta vez usando posiciónes

$statement = $db->prepare('SELECT * FROM `visits` WHERE `user_id` = ? AND `time` >= ?');
$statement->bindValue(1, 42);
$statement->bindValue(2, '2017-01-14');
$result = $statement->execute();

// se puede establecer el formato de la obtención, en este caso asociativo
// Es decir, si en la consulta existe la columna nombre, en el arreglo va existir
// una clave nombre asociada
echo("Get the 1st row as an associative array:\n");
print_r($result->fetchArray(SQLITE3_ASSOC));
echo("\n");

// también se puede obtener un array indexado, es decir, si el id es la primer columna de la 
// consulta, el valor del id va a estar en la posición 0 del arreglo
echo("Get the next row as a numeric array:\n");
print_r($result->fetchArray(SQLITE3_NUM));
echo("\n");

// Si no hay más datos, fetchArray devuelve falso

// Se puede liberar la memoria

$result->finalize();


// Una atajo útil para buscar una sola fila como arreglo asociativa.
// El segundo parámetro significa que queremos todas las columnas seleccionadas.

// Cuidado, esta abreviatura no admite el binding de parámetros, pero se pueden
// escapar las cadenas en su lugar.
// ¡Siempre coloque los valores en comillas simples! Las comillas dobles se usan para la tabla
// y nombres de columna (similares a los backticks en MySQL).

$query = 'SELECT * FROM `visits` WHERE `url` = \'' .
    SQLite3::escapeString('/test') .
    '\' ORDER BY `id` DESC LIMIT 1';

$lastVisit = $db->querySingle($query, true);

echo("Last visit of '/test':\n");
print_r($lastVisit['time']);
echo("\n");


// Otra forma práctica de devolver un solo valor a partir de una consulta

$userCount = $db->querySingle('SELECT COUNT(DISTINCT `user_id`) FROM `visits`');

echo("User count: $userCount\n");
echo("\n");


// Cerramos la base, esto también se hace automáticamente al finalizar el script

$db->close();
echo "</pre>";