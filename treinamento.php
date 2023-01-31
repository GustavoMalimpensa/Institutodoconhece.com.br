<?php include_once 'header.php'; ?>

<?php 
  
  $id = $_GET["id"];
  $q = "SELECT * FROM treinamentos WHERE id = $id";
  $q = mysql_query($q);
  $r = mysql_fetch_assoc($q);
  $titulo = $r["titulo"];
  $categoria = $r["categoria"];
  $texto = $r["texto"];
  $imagem = $r["imagem"];
  if ($imagem == "") {
    $imagem = "semimagem.jpeg";
  }
?>

<section>

  <div class="container">

    <ol class="breadcrumb">
      <li><a href="index.php">Home</a></li>
      <li class="active"><?php echo $titulo; ?></li>
    </ol>

  </div>

</section>

    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-md-12">
            <div>
              <h1>
                <?php 
                  $qcategoria = "SELECT * FROM categorias WHERE id = $categoria";
                  $qcategoria = mysql_query($qcategoria);
                  $rcategoria = mysql_fetch_assoc($qcategoria);
                  $titulocategoria = $rcategoria["titulo"];
                  echo $titulocategoria;
                ?>
              </h1>
            </div>
            <hr>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 col-md-8">
          <div>
            <h3><?php echo $titulo; ?></h3>
          </div>
          <div class="text-justify">
            <?php echo $texto; ?>
          </div>
        </div>
        <div class="col-xs-12 col-md-4">
          <div class="text-center form-group">
            <img src="admin/files/<?php echo $imagem; ?>">
          </div>
        </div>
      </div>
    </div>
<?php include_once 'footer.php'; ?>