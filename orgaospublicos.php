<?php include_once 'header.php'; ?>


	<section>
			
		<div class="container">
			
			<h1>Orgãos Públicos</h1>

		</div>

	</section>

	<section>
		
		<div class="container">
			
			<div class="row">
				
				<div class="col-xs-12 col-md-12">
					
				    <?php 

				        $q = "SELECT * FROM orgaospublicos";
				        $q = mysql_query($q);
				        $r = mysql_fetch_assoc($q);
				        echo $texto = $r["texto"];

				    ?>

				</div>

			</div>

		</div>

	</section>


<?php include_once 'footer.php'; ?>