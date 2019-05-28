<?php
if(isset($_GET['lang']))
{
    setcookie('lang', $_GET['lang']);
}
if(isset($_POST['input-usuario']))
{
    setcookie('usuario', $_POST['input-usuario']);
}

require_once 'cabecera.php';
use app\clases\Traductor;

?>
<div>
      <?=Traductor::t($_GET['lang']??$_COOKIE['lang']??'es', 'Redirigiendo')."..."?>    
</div>
<script>
        window.location.href="<?= $_SERVER['HTTP_REFERER']?>";
</script>

<?php
require_once 'footer.php';