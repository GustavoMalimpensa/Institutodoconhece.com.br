<?php include_once 'header.php'; ?>

	<script type="text/javascript">
		$(document).ready(function() {
			$('.slideshow').owlCarousel({
				loop:true,
				autoplay:true,
				autoplayTimeout:5000,
				items: 1,
			});
			$('.sliderareaatuacao').owlCarousel({
				items: 4,
			    responsiveClass:true,
			    responsive:{
			        1024:{
			            items:4
			        },
			        0:{
			            items:1
			        }
			    }
			});
			$('.sliderdepoimentos').owlCarousel({
				items: 1
			});
			$('.sliderclientes').owlCarousel({
				items: 4
			});
			$('.sliderprofessores').owlCarousel({
				items: 4,
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
			
	      <div class="row">
	        <div class="col-xs-12 col-md-12 form-group">
	          <?php echo mostraMensagem(); ?>
	        </div>
	      </div>

		</div>
	</section>

	<section class="sectionslideshow">
		<div class="slideshow owl-carousel owl-theme">
	        <?php  
	          $q = "SELECT * FROM slideshow ORDER BY id DESC";
	          $q = mysql_query($q);
	          while ($r = mysql_fetch_array($q)) {
	              $id = $r["id"];
	              $imagem = $r["imagem"];
	              $link = $r["link"];
	              echo 
	              '
	              <a href="'.$link.'">
		              <div class="item imgbanner" 
		              style="background:url(admin/files/'.$imagem.') 50% 50% no-repeat;">
		              </div>
	              </a>
	              ';
	          }
	        ?>
		</div>
	</section>

	<section class="areaatuacao">

		<div class="container">
			<div class="text-center">
				<h1>ÁREAS DE ATUAÇÃO</h1>
			</div>
		</div>

		<div class="container">

			<div class="row sliderdefault sliderareaatuacao owl-carousel owl-theme">

				<?php 
				    $q = "SELECT *, c.titulo as tituloCategoria, c.imagem as imagem,  t.id as id, c.titulo as titulo, t.texto as texto FROM categorias c INNER JOIN treinamentos t ON c.id = t.categoria GROUP BY t.categoria ORDER BY t.id DESC";
				    $q = mysql_query($q);
				    while ($r = mysql_fetch_array($q)) {
					    $id = $r["id"];
					    $titulo = $r["titulo"];
					    $texto = $r["texto"];
					    $texto = strip_tags($texto);
					    $texto = substr($texto, 0, 200);
					    $imagem = $r["imagem"];
					    if ($imagem == "") {
					    	$imagem = "semimagem.jpeg";
					    }
				?>

						<div class="col-xs-12 col-md-12 form-group atuacao">

								<div class="imagematuacao" style="background:url(admin/files/<?php echo $imagem; ?>) 50% 50% no-repeat;"></div>
								<div class="tituloatuacao form-group">
									<?php echo $titulo; ?>
								</div>
								<div class="textoatuacao form-group">
									<?php echo $texto; ?>
								</div>

						</div>

				<?php 

					}

				?>
			</div>

		</div>

	</section>

	<section class="clientes">
		<hr>
		<div class="text-center">
			<h1>Clientes</h1>
		</div>
		<div class="container">
			<div class="row sliderdefault sliderclientes owl-carousel owl-theme">
			<?php 
			    $q = "SELECT * FROM clientes ORDER BY data DESC";
			    $q = mysql_query($q);
			    while ($r = mysql_fetch_array($q)) {
				    $titulo = $r["titulo"];
				    $imagem = $r["imagem"];
				    if ($imagem == "") {
				    	$imagem = "semimagem.jpeg";
				    }
			?>
			
				<div class="col-xs-12 col-md-12 form-group">
					<div class="form-group">
						<img src="admin/files/<?php echo $imagem; ?>" alt="<?php echo $titulo; ?>" title="<?php echo $titulo; ?>">
					</div>
					<div class="text-center">
						<span><?php echo $titulo; ?></span>
					</div>
				</div>
			
				<?php

				    }

				?>
			</div>
		</div>
	</section>

<?php include_once 'footer.php'; ?>