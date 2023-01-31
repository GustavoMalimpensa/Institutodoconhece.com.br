<footer>
		
		<div class="container">
			
			<div class="row">
				
				<div class="col-xs-12 col-md-4 form-group boxfooter">
					<form action="admin/engine/form.php" method="POST">
						<input type="hidden" name="id" value="newsletter">
						<label>Receba novidades</label>
						<input type="email" name="email" placeholder="Cadastre seu e-mail" class="form-control">
						<br>
						<button type="submit" class="btn btn-primary">
							Enviar
						</button>
					</form>
				</div>
				<div class="col-xs-12 col-md-4 text-center form-group boxfooter">
					<label>Onde nos encontrar</label>
					<p>Av. 16, Edíficio Blue Office, 353</p>
					<p>Centro, Rio Claro - SP</p>
					<p>(19) 2112-7760</p>
					<p><a href="mailto:contato@institutodoconhecer.com.br">contato@institutodoconhecer.com.br</a></p>
				</div>
				<div class="col-xs-12 col-md-4 form-group boxfooter">
					<div class="text-center">
						<label>Últimos Artigos</label>	
					</div>
					<div class="row">
						
						<div class="col-xs-12 form-group">
							<ul>
							<?php 

							 $q = "SELECT * FROM artigos ORDER BY data DESC LIMIT 0,4";
							 $q = mysql_query($q);
							 while ($r = mysql_fetch_array($q)) {
							 	$id = $r["id"];
							 	$titulo = $r["titulo"];
							 	$titulo = substr($titulo, 0, 35)."...";
							 	echo 
							 	'
							 	
							 		<li>
							 			<a href="artigo.php?id='.$id.'">- '.$titulo.'</a>
							 		</li>
							 	
							 	';
							 }
							 
							?>
							</ul>
						</div>

					</div>
				</div>

			</div>


		</div>

	</footer>
	<section class="text-right desenvolvido">
		<div class="container">
			Desenvolvido por: <a href="https://ffdevweb.com.br/">FFDEVWEB</a>
		</div>
	</section>
</body>
</html>