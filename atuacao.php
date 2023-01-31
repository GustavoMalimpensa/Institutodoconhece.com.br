<?php include_once 'header.php'; ?>

<?php 
  
  $id = $_GET["id"];
  $q = "SELECT * FROM atuacao WHERE id = $id";
  $q = mysql_query($q);
  $r = mysql_fetch_assoc($q);
  $titulo = $r["titulo"];
  $imagem = $r["imagem"];
  $texto = $r["texto"];

?>

<section>

  <div class="container">

    <ol class="breadcrumb">
      <li><a href="index.php">Home</a></li>
      <li class="active">Área Atuação - <?php echo $titulo; ?></li>
    </ol>

  </div>

</section>
  
  <div class="imagematuacaopagina text-center">
    <img src="admin/files/<?php echo $imagem; ?>">
  </div>

  <div class="text-center">
    <h1><?php echo $titulo; ?></h1>
  </div>

    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-md-12 mx-auto">
          <div class="post-preview">
            <?php echo $texto; ?>
          </div>
        </div>
      </div>
    </div>
<?php include_once 'footer.php'; ?>