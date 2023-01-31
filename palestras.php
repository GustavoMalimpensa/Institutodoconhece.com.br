<?php include_once 'header.php'; ?>

<section>

  <div class="container">

    <ol class="breadcrumb">
      <li><a href="index.php">Home</a></li>
      <li class="active">Palestras</li>
    </ol>

  </div>

</section>

<section>
      <div class="container">
        <div class="row">
          <?php 

            if (isset($_GET["idCategoria"])) {
              $idCategoria = $_GET["idCategoria"];
              $q = "SELECT * FROM palestras WHERE categoria = $idCategoria ORDER BY data DESC";
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
              
                  <div class="imagematuacao" style="background:url(admin/files/'.$imagem.') 50% 50% no-repeat;"></div>
                  <div class="tituloatuacao form-group">
                    '.$titulo.'
                  </div>
                  <div class="textoatuacao form-group">
                    '.$texto.'
                  </div>

              </div>
                ';
                if ($i == 4) {
                  echo '</div>';
                  echo '<div class="row">';
                }
                $i++;
              }

            }else{
              $q = "SELECT * FROM palestrascategorias ORDER BY id = 8 DESC, id = 9 DESC";
              $q = mysql_query($q);
              while ($r = mysql_fetch_array($q)) {
                  
                $id = $r["id"];
                $imagem = $r["imagem"];
                $titulo = $r["titulo"];

                echo
                '
                  <div class="col-xs-12 col-md-4 form-group">
                    <div class="imagemdefault" style="background:url(admin/files/'.$imagem.') 50% 50% no-repeat;">
                    </div>
                    <div class="text-left form-group">
                      <h3>'.$titulo.'</h3>
                    </div>

                ';
                $qp = "SELECT * FROM palestras WHERE categoria = $id ORDER BY titulo ASC";
                $qp = mysql_query($qp);
                while ($rp = mysql_fetch_array($qp)) {
                  $titulop = $rp["titulo"];
                  $idp = $rp["id"];
                  echo 
                  '
                  <div class="text-left form-group">
                    <h4>'.$titulop.'</h4>
                  </div>
                  ';
                }
                echo
                '
                  </div>
                ';


              }
            }

          ?>
        </div>
      </div>
</section>

<?php include_once 'footer.php'; ?>