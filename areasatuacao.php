<?php include_once 'header.php'; ?>

<section>

  <div class="container">

    <ol class="breadcrumb">
      <li><a href="index.php">Home</a></li>
      <li class="active">Áreas Atuação</li>
    </ol>

  </div>

</section>

	<section class="areaatuacao">

		<div class="container">
			<div class="text-center">
				<h1>ÁREAS DE ATUAÇÃO</h1>
			</div>
		</div>

		<div class="container">

			<div class="row">

				<?php 
				    $q = "SELECT * FROM atuacao ORDER BY data DESC";
				    $q = mysql_query($q);
				    while ($r = mysql_fetch_array($q)) {
					    $id = $r["id"];
					    $titulo = $r["titulo"];
					    $texto = $r["texto"];
					    $texto = substr($texto, 0, 200);
					    $imagem = $r["imagem"];
				?>

						<div class="col-xs-12 col-md-4 form-group atuacao1">
							<a href="atuacao.php?id=<?php echo $id; ?>">
								<div class="imagematuacao" style="background:url(admin/files/<?php echo $imagem; ?>) 50% 50% no-repeat;"></div>
								<div class="tituloatuacao form-group">
									<?php echo $titulo; ?>
								</div>
								<div class="textoatuacao form-group">
									<?php echo $texto; ?>
								</div>
								<div class="col-xs-12 text-right form-group">
									<a style="color:#fff;" href="atuacao.php?id=<?php echo $id; ?>" class="btn btn-primary">Leia Mais</a>
								</div>
							</a>
						</div>

				<?php 

					}

				?>
			</div>

		</div>

	</section>

<?php include_once 'footer.php'; ?>