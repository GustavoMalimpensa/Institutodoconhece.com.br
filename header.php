<?php
if (!isset($_SESSION["instituto"])) {
    session_start();
}
include_once 'admin/banco.php';
include_once 'admin/engine/funcoes.php';
?>
<html>
<head>
	<meta charset="UTF-8">
	<title>Instituto do Conhecer</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/jqueryUI.css">
    <link rel="stylesheet" type="text/css" href="OwlCarousel/dist/assets/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="OwlCarousel/dist/assets/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/responsive.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type='text/javascript' src='OwlCarousel/dist/owl.carousel.js'></script>
    <script src="admin/js/mask.js"></script>
    <script src="js/jqueryUI.js"></script>
    <script type="text/javascript">

		 $(document).scroll(function() {

		       if($(window).scrollTop() > 100){

		        $(".imgnavimg").css("width","95px");
		        $(".anavaux").css("margin","0px");

		       }else if($(window).scrollTop() < 100){

		        $(".imgnavimg").css("width","180px");
		        $(".anavaux").css("margin","40px 0 0 0px");
		        

		       }

		});
    	$(document).ready(function() {


    		// setTimeout(function() { $(".alert").remove(); }, 5000);

			$(window).resize(function(res) {

				if ($(window).width() > 980) {

		    		$(".linkorgaospublicos").click(function(event) {
		    			window.location.href = "orgaospublicos.php";
		    		});

		    		$(".linktreinamentos").click(function(event) {
		    			window.location.href = "treinamentos.php";
		    		});

		    		$(".linkpalestras").click(function(event) {
		    			window.location.href = "palestras.php";
		    		});

				}else{

		    		$(".linkorgaospublicos").click(function(event) {
		    		});

		    		$(".linktreinamentos").click(function(event) {
		    		});

		    		$(".linkpalestras").click(function(event) {
		    		});

				}

			});


			if ($(window).width() > 980) {

	    		$(".linkorgaospublicos").click(function(event) {
	    			window.location.href = "orgaospublicos.php";
	    		});

	    		$(".linktreinamentos").click(function(event) {
	    			window.location.href = "treinamentos.php";
	    		});

	    		$(".linkpalestras").click(function(event) {
	    			window.location.href = "palestras.php";
	    		});

			}



    		

		    $( ".searchtopo" ).autocomplete({
		      source: function(request, response){
		      	$.ajax({
		      		url: 'admin/engine/form.php',
		      		type: 'POST',
		      		dataType: 'json',
		      		data: {id: "searchtopo", term: request.term},
		      		success: function(data){
						response( data );
		      			
		      		},
		      		error: function(err){
		      			console.log("error", err);
		      		}
		      	});
		      	
		      },
			  select: function (event, ui) {
			  	$( ".searchtopo" ).val("");
			  	window.location.href = ui.item.value;
			   // Set selection
			   // $('#autocomplete').val(ui.item.label); // display the selected text
			   // $('#selectuser_id').val(ui.item.value); // save selected id to input
			   return false;
			  }
		    });
    	});

    </script>
</head>
<body>
	<section class="topo">
		<div class="barratopo">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xs-12 col-md-2">
						<input type="text" class="searchtopo" placeholder="Procurar ...">
					</div>
					<div class="col-xs-12 col-md-8 topoinfo">
						<div class="row">
							
							<div class="col-xs-12 col-md-6 text-right">
								<a href="mailto:contato@institutodoconhecer.com.br">
									contato@institutodoconhecer.com.br
								</a>
							</div>
							<div class="col-xs-12 col-md-3 text-right">
								<span>(19) 2112-7760</span>
							</div>
							<div class="col-xs-12 col-md-3 text-right">
								<span>(19) 99446-1403</span>
							</div>

						</div>

					</div>
					<div class="col-xs-12 col-md-2 toposocial">
						<nav>
							<?php 

								$q = "SELECT * FROM redes ORDER BY id DESC";
								$q = mysql_query($q);
								while ($r = mysql_fetch_assoc($q)) {
									$url = $r["url"];
									$rede = $r["rede"];
									echo '<a href="'.$url.'" target="_blank"><i class="'.$rede.'"></i></a>';
								}

							?>
						</nav>
					</div>
				</div>
			</div>
		</div>
		<div class="logo text-center">
		</div>
		<nav class="navbar navbar-default">
		  <div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		      	<li><a href="index.php" class="imgnav"><img class="imgnavimg" src="images/logo.jpeg"></a></li>
		      	<li><a class="anav anavaux" href="index.php">Home</a></li>
		      	<li><a class="anav anavaux" href="quemsomos.php">Quem Somos</a></li>
				<li class="dropdown">
	          		<a href="#" class="dropdown-toggle linktreinamentos anav anavaux" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
	          		Treinamentos <span class="caret"></span></a>
		          	<ul class="dropdown-menu">

						<li class="dropdown">
			          		<a href="#" style="margin:0;" class="dropdown-toggle anav" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			          		Técnicos<span class="caret"></span></a>
				          	<ul class="dropdown-menu">
				          		<?php 

						        	$q = "SELECT * FROM treinamentos WHERE categoria = 13 ORDER BY titulo ASC";
						          	$q = mysql_query($q);
						          	while ($r = mysql_fetch_array($q)){
						          		$idtreinamento = $r["id"];
						          		$titulotreinamento = $r["titulo"];
						          		echo '<li><a href="treinamento.php?id='.$idtreinamento.'">'.$titulotreinamento.'</a></li>';
						          	}
				          		?>
					          </ul>
				        </li>
						<li class="dropdown">
			          		<a href="#" style="margin:0;" class="dropdown-toggle anav" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			          		Comportamentais<span class="caret"></span></a>
				          	<ul class="dropdown-menu">
				          		<?php 

						        	$q = "SELECT * FROM treinamentos WHERE categoria = 10 ORDER BY titulo ASC";
						          	$q = mysql_query($q);
						          	while ($r = mysql_fetch_array($q)){
						          		$idtreinamento = $r["id"];
						          		$titulotreinamento = $r["titulo"];
						          		echo '<li><a href="treinamento.php?id='.$idtreinamento.'">'.$titulotreinamento.'</a></li>';
						          	}
				          		?>
					          </ul>
				        </li>
						<li class="dropdown">
			          		<a href="#" style="margin:0;" class="dropdown-toggle anav" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			          		Liderança &amp; Carreira<span class="caret"></span></a>
				          	<ul class="dropdown-menu">
				          		<?php 

						        	$q = "SELECT * FROM treinamentos WHERE categoria = 11 ORDER BY titulo ASC";
						          	$q = mysql_query($q);
						          	while ($r = mysql_fetch_array($q)){
						          		$idtreinamento = $r["id"];
						          		$titulotreinamento = $r["titulo"];
						          		echo '<li><a href="treinamento.php?id='.$idtreinamento.'">'.$titulotreinamento.'</a></li>';
						          	}
				          		?>
					          </ul>
				        </li>

						<li class="dropdown">
			          		<a href="#" style="margin:0;" class="dropdown-toggle anav" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			          		Segurança do Trabalho<span class="caret"></span></a>
				          	<ul class="dropdown-menu">
				          		<?php 

						        	$q = "SELECT * FROM treinamentos WHERE categoria = 14 ORDER BY titulo ASC";
						          	$q = mysql_query($q);
						          	$str1 = "";
						          	$str2 = "";
						          	while ($r = mysql_fetch_array($q)){
						          		$idtreinamento = $r["id"];
						          		$titulotreinamento = $r["titulo"];

						          		if ($titulotreinamento == "Assessment") {
						          			$str2 .=  '<li><a href="treinamento.php?id='.$idtreinamento.'">'.$titulotreinamento.'</a></li>';
						          		}else{
						          			$str1 .=  '<li><a href="treinamento.php?id='.$idtreinamento.'">'.$titulotreinamento.'</a></li>';
						          		}


						          		
						          	}
						          	echo $str1;
						          	echo $str2;
				          		?>
					          </ul>
				        </li>

			          </ul>
		        </li>
				<li class="dropdown">
	          		<a href="#" class="dropdown-toggle anav anavaux linkorgaospublicos" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
	          		Orgãos Públicos <span class="caret"></span></a>
		          	<ul class="dropdown-menu">
						<li class="dropdown">
			          		<a href="#" style="margin:0;" class="dropdown-toggle anav" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			          		Cursos & Oficinas<span class="caret"></span></a>
				          	<ul class="dropdown-menu" style="margin: -32px 0 0 158px;">
				          		<?php 

						        	$q = "SELECT * FROM oficinascategorias ORDER BY titulo ASC";
						          	$q = mysql_query($q);
						          	while ($r = mysql_fetch_array($q)){
						          		$idCategoria = $r["id"];
						          		$titulo = $r["titulo"];
						          		echo '<li><a href="oficinas.php?idCategoria='.$idCategoria.'">'.$titulo.'</a></li>';
						          	}
				          		?>
					          </ul>
				        </li>
						<li><a href="palestras.php">Palestras</a></li>
						<li><a href="treinamentosorgaospublicos.php">Treinamentos</a></li>
			        </ul>
		        </li>
		        <li><a class="anav anavaux" href="galerias.php">Galerias</a></li>
		        <li><a class="anav anavaux" href="artigos.php">Artigos</a></li>
		        <li><a class="anav anavaux" href="faleconosco.php">Fale Conosco</a></li>
		        <li><a class="anav anavaux" href="areaaluno.php">Área do Aluno</a></li>
		        <?php  
		        /*
		          $q = "SELECT * FROM paginas WHERE idPai = 0 ORDER BY titulo ASC";
		          $q = mysql_query($q);
		          while ($r = mysql_fetch_array($q)) {
		              $id = $r["id"];
		              $idPai = $r["idPai"];
		              $titulo = $r["titulo"];
		              $link = $r["link"];
		              $titulo = strtoupper($titulo);
			          $qp = "SELECT * FROM paginas WHERE idPai = $id";
			          $qp = mysql_query($qp);
			          $np = mysql_num_rows($qp);
			          if ($np > 0) {

						echo '
							<li class="dropdown">
				          		<a href="#" class="dropdown-toggle anav" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
				          		'.$titulo.'
				          		<span class="caret"></span></a>
				          	<ul class="dropdown-menu">
				          ';
				          	$qp = "SELECT * FROM paginas WHERE idPai = $id";
				          	$qp = mysql_query($qp);
				          while ($rp = mysql_fetch_array($qp)) {
				          	$idfilho = $rp["id"];
				          	$titulofilho = $rp["titulo"];
				          	$linkfilho = $rp["link"];
				          	if ($linkfilho == "") {
				          		echo '<li><a href="pagina.php?id='.$idfilho.'">'.$titulofilho.'</a></li>';
				          	}else{
				          		echo '<li><a href="'.$linkfilho.'" target="_self">'.$titulofilho.'</a></li>';
				          	}

				          }
				          echo'
					          </ul>
					        </li>';
			          }else{
			          	if ($link == "") {
			          		echo '<li><a class="anav" href="pagina.php?id='.$id.'">'.$titulo.'</a></li>';
			          	}else{
			          		echo '<li><a class="anav" href="'.$link.'" target="_self">'.$titulo.'</a></li>';
			          	}
			          }


		          }*/
		        ?>
		        
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
	</section>
	<div class="container">
	</div>
    <section class="sectiondefault"></section>

