<?php include_once 'header.php'; ?>

  <script type="text/javascript">
    $(document).ready(function() {
      $('.slideshowgalerias').owlCarousel({
        loop:true,
        autoplay:false,
        dots: false,
        nav: true,
        navText: [
          '<i class="fa fa-arrow-left" style="font-size:30px;" aria-hidden="true"></i>',
          '<i class="fa fa-arrow-right" style="font-size:30px;" aria-hidden="true"></i>'
        ],
        items: 5,
        responsiveClass:true,
        responsive:{
            1024:{
                items:5
            },
            0:{
                items:1
            }
        }
      });
      $('.slideshowvideos').owlCarousel({
        loop:false,
        autoplay:false,
        dots: false,
        nav: true,
        navText: [
          '<i class="fa fa-arrow-left" style="font-size:30px;" aria-hidden="true"></i>',
          '<i class="fa fa-arrow-right" style="font-size:30px;" aria-hidden="true"></i>'
        ],
        items: 5,
        margin:50,
        responsiveClass:true,
        responsive:{
            1024:{
                items:5
            },
            0:{
                items:1
            }
        }
      });

      $('.slideshowdepoimentos').owlCarousel({
        loop:false,
        autoplay:false,
        dots: false,
        nav: true,
        navText: [
          '<i class="fa fa-arrow-left" style="font-size:30px;" aria-hidden="true"></i>',
          '<i class="fa fa-arrow-right" style="font-size:30px;" aria-hidden="true"></i>'
        ],
        items: 3,
        margin:50,
        responsiveClass:true,
        responsive:{
            1024:{
                items:3
            },
            0:{
                items:1
            }
        }
      });
    });
  </script>

  <section>

    <div class="container">

      <ol class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li class="active">Galerias</li>
      </ol>

    </div>

  </section>

  <section>
    <div class="container">
      <div class="row">
        <div class="col-xs-12 form-group">
          <h1>Galerias</h1>
        </div>
        <div class="col-xs-12">
          <div class="slideshowgalerias owl-carousel owl-theme">
            <?php 
              
              $q = "SELECT * FROM galerias ORDER BY id DESC";
              $q = mysql_query($q);
              while ($r = mysql_fetch_array($q)) {
                
                $id = $r["id"];
                $titulo = $r["titulo"];

                $q1 = "SELECT * FROM imagens WHERE idgaleria = $id";
                $q1 = mysql_query($q1);
                $r1 = mysql_fetch_assoc($q1);
                $imagem = $r1["imagem"];
                if ($imagem == "") {
                  $imagem = "semimagem.jpeg";
                }

                echo 
                '
                  <div class="item form-group boxgaleria">
                    <a href="galeria.php?idgaleria='.$id.'">
                      <div class="imagemgaleria" style="background:url(admin/files/'.$imagem.') 50% 50% no-repeat;"></div>
                      <div class="tituloatuacao form-group">
                        '.$titulo.'
                      </div>
                      <div class="text-center form-group">
                        <a style="color:#fff;" href="galeria.php?idgaleria='.$id.'" class="btn btn-primary">Ver Fotos</a>
                      </div>
                    </a>
                  </div>
                ';
              }


            ?>


          </div>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="container">
      <div class="row">
        <div class="col-xs-12 form-group">
          <h1>Vídeos</h1>
        </div>
        <div class="col-xs-12">
          <div class="slideshowvideos owl-carousel owl-theme">
            <?php 
              
              $q = "SELECT * FROM videos ORDER BY id DESC";
              $q = mysql_query($q);
              while ($r = mysql_fetch_array($q)) {
                
                $id = $r["id"];
                $titulo = $r["titulo"];
                $arquivo = $r["arquivo"];
                if (preg_match("/youtube/", $titulo)) {
                    $titulo = str_replace("https://www.youtube.com/watch?v=", "", $titulo);
                    $videoframe = '<iframe width="100%" height="215" src="https://www.youtube.com/embed/'.$titulo.'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                } else {
                    $videoframe = '<video width="100%" height="215" controls>
                                      <source src="admin/files/'.$arquivo.'" type="video/mp4">
                                      Your browser does not support the video tag.
                                    </video>';
                }

                echo 
                '
                  <div class="item form-group">
                    '.$videoframe.'
                  </div>
                ';
              }


            ?>


          </div>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="container">
      <div class="row">
        <div class="col-xs-12 form-group">
          <h1>Depoimentos</h1>
        </div>
        <div class="col-xs-12">
          <div class="slideshowdepoimentos owl-carousel owl-theme">
            <?php 
              
              $q = "SELECT * FROM depoimentos ORDER BY data DESC";
              $q = mysql_query($q);
              while ($r = mysql_fetch_array($q)) {
                
                $id = $r["id"];
                $nome = $r["nome"];
                $texto = $r["texto"];
                $data = $r["data"];
                $data = FormataData_Brasil($data, "tsp");

                echo 
                '
                  <div class="item form-group">
                    <div class="text-justify">
                      '.$texto.'
                    </div>
                    <div class="text-right">
                      <br/>
                      '.$nome.' - <small>'.$data.'</small>
                    </div>
                  </div>
                ';
              }


            ?>


          </div>
        </div>
      </div>
    </div>
  </section>

<?php include_once 'footer.php'; ?>