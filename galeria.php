<?php include_once 'header.php'; ?>

<section>

  <div class="container">

    <ol class="breadcrumb">
      <li><a href="index.php">Home</a></li>
      <li><a href="galerias.php">Galerias</a></li>
      <li class="active">Galeria</li>
    </ol>

  </div>

</section>

<section>
      <div class="container">
        <div class="row">
          <?php 
            $idgaleria = $_GET["idgaleria"];
            $q = "SELECT * FROM imagens WHERE idgaleria = $idgaleria ORDER BY id DESC";
            $q = mysql_query($q);
            while ($r = mysql_fetch_array($q)) {
              
              $id = $r["id"];
              $imagem = $r["imagem"];
            
              echo 
              '
            <div class="col-xs-12 col-md-3 form-group boxgaleria cursorpointer">
              <div class="imagemgaleria" style="background:url(admin/files/'.$imagem.') 50% 50% no-repeat;" data-toggle="modal" 
              data-target=".modal'.$id.'"></div>
              
              <div class="modal fade modal'.$id.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body text-center">
                      <img src="admin/files/'.$imagem.'">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              ';
            }


          ?>


        </div>
      </div>
</section>

<?php include_once 'footer.php'; ?>