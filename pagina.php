<?php include_once 'header.php'; ?>

<?php 
  
  $id = $_GET["id"];
  $q = "SELECT * FROM paginas WHERE id = $id";
  $q = mysql_query($q);
  $r = mysql_fetch_assoc($q);
  $titulo = $r["titulo"];
  $texto = $r["texto"];

?>
   <header class="masthead">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1><?php echo $titulo; ?></h1>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 mx-auto">
          <div class="post-preview">
            <?php echo $texto; ?>
          </div>
        </div>
      </div>
    </div>
<?php include_once 'footer.php'; ?>