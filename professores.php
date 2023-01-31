<?php include_once 'header.php'; ?>


	<section class="professores">
		<div class="text-center">
			<h1>PROFESSORES</h1>
		</div>
		<div class="container">

			<div class="row">
				<?php 
				    $q = "SELECT * FROM professores ORDER BY nome ASC";
				    $q = mysql_query($q);
				    while ($r = mysql_fetch_array($q)) {
					    $nome = $r["nome"];
					    $linkedin = $r["linkedin"];
					    $imagem = $r["imagem"];
				?>
				<div class="col-xs-12 col-md-4 form-group">
					<div class="professor">
						<div class="nomeprofessor text-center">
							<?php echo $nome; ?>
						</div>
						<div class="imagemprofessor" style="background:url(admin/files/<?php echo $imagem; ?>) 50% 0% no-repeat;"></div>
						<div class="faceprofessor text-center">
							<a href="<?php echo $linkedin; ?>" target="_blank">
								<i class="fa fa-linkedin"></i>
							</a>
						</div>
					</div>
				</div>
				<?php

				    }

				?>
			</div>
		</div>
	</section>

<?php include_once 'footer.php'; ?>