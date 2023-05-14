<?php
use modele\metier\Tags;
require_once '../../includes/autoload.inc.php';

$tags = new Tags(1, "Orientale");
?>
<h2>Test unitaire de la classe Critique</h2>
<?php
var_dump($tags);

