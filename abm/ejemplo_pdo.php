<?php
echo "<pre>";
// en este ejemplo separamos la configuración en constantes para que sea más claro al momento
// de elegir
const SQLITE = 1;
const MYSQL = 2;


// elegimos el modo, debido a que pueden haber diferencias en las instrucciones de creación
// de tabla,por ejemplo noten la diferencia en AUTOINCREMENT y AUTO_INCREMENT
// además de que varía la cadena dsn de PDO
$modo = MYSQL;

if($modo === SQLITE){
    $db = new PDO('sqlite:curzadb-pdo.sqlite');
    $db->query('CREATE TABLE IF NOT EXISTS `visits` (
        `id` INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
        `user_id` INTEGER,
        `url` VARCHAR,
        `time` DATETIME
    )');
    
}elseif($modo=== MYSQL){
    $db = new PDO("mysql:dbname=curza;host=127.0.0.1", 'marianosebastian', '');
    $db->query('CREATE TABLE IF NOT EXISTS `visits` (
        `id` INTEGER AUTO_INCREMENT PRIMARY KEY, 
        `user_id` VARCHAR(30),
        `url` VARCHAR(30),
        `time` DATETIME
    )');

}else {
    throw new Exception('BD no soportada');
}

// este modo, implica que ante cualquier error se dispare una excepción, es muy útil
// para tener el aviso de error inmediatamente. En mysqli hay que verificar cada operación
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


// PDO tiene una sintaxis casi idéntica a sqlite, en este caso vemos que para invocar
// transacciones no hay casi cambios
$db->exec('BEGIN');
$resultadoEjecucion = $db->query('INSERT INTO `visits` (`user_id`, `url`, `time`)
    VALUES (42, "/test", "2017-01-14 10:11:23")');
// de las operaciones realizadas (sobre todo insert,delete,update) podemos obtener
// el ultimo id generado en (en los inserts) y la cantidad de filas afectadas para las tres operaciones
// no se recomienda usar este enfoque para los SELECT
echo 'último id:'.$db->lastInsertId()."\n\r";
echo 'filas afectadas:'.$resultadoEjecucion->rowCount()."\n\r";

$resultadoEjecucion2 = $db->query('INSERT INTO `visits` (`user_id`, `url`, `time`)
    VALUES (42, "/test2", "2017-01-14 10:11:44")');
echo 'último id:'.$db->lastInsertId()."\n\r";
echo 'filas afectadas:'.$resultadoEjecucion2->rowCount()."\n\r";
$db->exec('COMMIT');


// PDO soporta el binding de parámetros nombrados, es interesante usar pdo con mysql,
// porque mysqli nativamente no los soporta

$statement = $db->prepare('INSERT INTO `visits` (`user_id`, `url`, `time`)
    VALUES (:uid, :url, :time)');
$statement->bindValue(':uid', 1337);
$statement->bindValue(':url', '/test');
$statement->bindValue(':time', date('Y-m-d H:i:s'));
$statement->execute(); // you can reuse the statement with different values

echo 'último id:'.$db->lastInsertId()."\n\r";
echo 'filas afectadas:'.$statement->rowCount()."\n\r";

// PDO También soporta el binding de valores directos y el uso de posiciones
$statement = $db->prepare('SELECT * FROM `visits` WHERE `user_id` = ? AND `time` >= ?');
$statement->bindValue(1, 42);
$statement->bindValue(2, '2017-01-14');
$statement->execute();  

// a diferencia de sqlite, en pdo el statement es el que se encarga de hacer el fetch posterior
// a la ejecución, también podemos definir el modo de fetchin. en este caso, asociativo
echo("Get the 1st row as an associative array:\n");
print_r($statement->fetch(PDO::FETCH_ASSOC));
echo("\n");

// también podemos elegir el modo indexado
echo("Get the next row as a numeric array:\n");
print_r($statement->fetch(PDO::FETCH_NUM));
echo("\n");


// al igual que con las demás funciones, PDO tiene una forma de asegurar las cadenas
// esta forma agrega las comillas con lo cual no hace falta agregarlas en la consulta
$cadenaSegura = $db->quote('/test');
$query = 'SELECT * FROM `visits` WHERE `url` = ' .
    $cadenaSegura .
    ' ORDER BY `id` DESC LIMIT 1';

// en este caso podemos usar fetchObject o podríamos usar con pdo fetchColumn
$lastVisit = $db->query($query)->fetchObject()->time;

echo("Last visit of '/test':\n");
print_r($lastVisit);
echo("\n");


// Fetchcolumn es una forma más práctica para devolver solamente una columna del resultado
// en general es lo que queremos cuando ejecutams un sum o count en la bd
$userCount = $db->query('SELECT COUNT(DISTINCT `user_id`) FROM `visits`');

echo("User count: {$userCount->fetchColumn()}\n");
echo("\n");

echo "</pre>";