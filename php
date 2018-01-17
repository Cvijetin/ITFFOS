<?php
include("session.php");
include("template_zaglavlje.html");
include("pdo.php");


?>

<h3>Albumi <small>(<a href='albumi_formular.php'>dodaj novi</a>)</small></h3>
<?php
        $query = $db->query("SELECT * FROM albumi");
        $slike = $query->fetchALL();
        foreach ($slike as $pic) {

        ?>
<div class="row" style="margin-top:26px">

	<div class="medium-3 large-3 columns">
        <?php
        echo "<img src='slike/" . $pic["omot"] . "'>";
        ?>
    
    </div>
    <div class="medium-6 large-6 columns">
        <?php
        echo "<strong>" . $pic["naslov_albuma"] . "</strong><br>";
        ?>
        </br>
        <?php
        $query = $db->query("SELECT * FROM pjesme WHERE album = " . $pic["id_albuma"] . " ORDER BY broj_pjesme");
        $song = $query->fetchALL();
        foreach ($song as $ton){
            echo "<p>" . $ton["broj_pjesme"] . ". " . $ton["naslov"] . "(" . $ton["duljina_trajanja"] . ")" . "</p>";
        }
        ?>

   	</div>
    <div class="medium-3 large-3 columns">
    	<a href='albumi_formular.php?id=1'>uredi</a><br>
        <a href='albumi_brisanje.php?id=1'>pobriši</a>
    </div>
</div>
<?php
}
?>

<?php
include("template_podnozje.html");
?>
