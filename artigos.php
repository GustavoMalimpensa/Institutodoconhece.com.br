<?php include_once 'header.php'; ?>

<section>

  <div class="container">

    <ol class="breadcrumb">
      <li><a href="index.php">Home</a></li>
      <li class="active">Artigos</li>
    </ol>

  </div>

</section>

<section>
      <div class="container">
        <div class="row">
          <?php 

            $q = "SELECT * FROM artigos ORDER BY data DESC";
            // echo $q;
            $q = mysql_query($q);
            $i = 1;
            while ($r = mysql_fetch_array($q)) {
              $id = $r["id"];
              $titulo = $r["titulo"];
              $imagem = $r["imagem"];
              if ($imagem == "") {
                $imagem = "semimagem.jpeg";
              }              
              if ($i == 1) {
                echo '<div class="row">';
              }
              echo 
              '
                <div class="col-xs-12 col-md-3 form-group atuacao">
                  <a href="artigo.php?id='.$id.'">
                    <div class="imagematuacao" style="background:url(admin/files/'.$imagem.') 50% 50% no-repeat;"></div>
                    <div class="tituloatuacao titulodefault form-group">
                      '.$titulo.'
                    </div>
                    <div class="col-xs-12 text-right form-group">
                      <a style="color:#fff;" href="artigo.php?id='.$id.'" class="btn btn-primary">Leia Mais</a>
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