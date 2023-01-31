<?php include_once 'header.php'; ?>

<section>

  <div class="container">

    <ol class="breadcrumb">
      <li><a href="index.php">Home</a></li>
      <li class="active">Cursos</li>
    </ol>

  </div>

</section>

<section>
      <div class="container">
        <div class="row">
          <?php 

            if (isset($_GET["idCategoria"])) {
              $idCategoria = $_GET["idCategoria"];
              $q = "SELECT * FROM cursos WHERE categoria = $idCategoria ORDER BY data DESC";
            }else{
              $q = "SELECT * FROM cursos ORDER BY data DESC";
            }
            
            
            $q = mysql_query($q);
            $i = 1;
            while ($r = mysql_fetch_array($q)) {
              $id = $r["id"];
              $titulo = $r["titulo"];
              if ($titulo != "") {
                if (strlen($titulo) > 20) {
                  $titulo = substr($titulo, 0, 20)." ...";
                }
              }
              $imagem = $r["imagem"];
              if ($imagem == "") {
                $imagem = "semimagem.jpeg";
              }
              $texto = $r["texto"];
              $texto = strip_tags($texto);
              if ($texto != "") {
                $texto = substr($texto, 0, 90)." ...";
              }
              if ($i == 1) {
                echo '<div class="row">';
              }
              echo 
              '
            <div class="col-xs-12 col-md-3 form-group atuacao">
              <a href="curso.php?id='.$id.'">
                <div class="imagematuacao" style="background:url(admin/files/'.$imagem.') 50% 50% no-repeat;"></div>
                <div class="tituloatuacao form-group">
                  '.$titulo.'
                </div>
                <div class="textoatuacao form-group">
                  '.$texto.'
                </div>
                <div class="col-xs-12 text-right form-group">
                  <a style="color:#fff;" href="curso.php?id='.$id.'" class="btn btn-primary">Leia Mais</a>
                </div>
              </a>
            </div>
              ';
              if ($i == 4) {
                echo '</div>';
                echo '<div class="row">';
              }
              $i++;
            }


          ?>


        </div>
      </div>
</section>

<?php include_once 'footer.php'; ?>