<?php include_once 'header.php'; ?>

<?php 
  
  $id = $_GET["id"];
  $q = "SELECT * FROM artigos WHERE id = $id";
  $q = mysql_query($q);
  $r = mysql_fetch_assoc($q);
  $titulo = $r["titulo"];
  $texto = $r["texto"];
  $imagem = $r["imagem"];

?>

<section>

  <div class="container">

    <ol class="breadcrumb">
      <li><a href="index.php">Home</a></li>
      <li><a href="artigos.php">Artigos</a></li>
      <li class="active">Artigo - <?php echo $titulo; ?></li>
    </ol>

  </div>

</section>

    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-md-12">
            <div class="text-center">
              <h1><?php echo $titulo; ?></h1>
            </div>
          <div class="text-center form-group">
            <img src="admin/files/<?php echo $imagem; ?>">
          </div>
          <div class="post-preview">
            <?php echo $texto; ?>
          </div>
        </div>
      </div>
    </div>
<?php include_once 'footer.php'; ?>