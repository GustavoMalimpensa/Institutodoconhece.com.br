<?php 
	
	include_once 'header.php'; 

    $q = "SELECT * FROM somos";
    $q = mysql_query($q);
    $r = mysql_fetch_assoc($q);
    $texto = $r["texto"];
    $missao = $r["missao"];
    $visao = $r["visao"];
    $valores = $r["valores"];

?>
<style type="text/css">

@media (min-width: 980px){
.owl-dots span{ display: none !important; }
.owl-theme .owl-next, #big.owl-theme .owl-prev {
 position: absolute; text-align:center; top: 50%; 
}
#big.owl-theme .owl-prev { left: 0px;  }
#big.owl-theme .owl-next { right: 0px;  }

.slide-cont {width: 600px; display: block; margin: 0 auto;}
.owl-carouse div {width: 100%;}

/*SEE END OF THUMBNAIL FUCNTION TO TINKER SIZE OF THUMBS*/
.owl-carousel .owl-controls .owl-dot {float: left; background-size: cover; margin-top: 10px;}

.owl-carousel .owl-dot {float: left; background-size: cover;}
button.owl-dot:last-child {
	margin: 0 0px 0 0px;
}
button.owl-dot {
    background-size: cover !important;
    margin: 0 20px 0 0px;
    border: 1px solid;
    width: 135px !important;
    margin-bottom: 10px;
}
}


</style>
<script type="text/javascript">
	
	$(document).ready(function(){

	  $("#boxquemsomosmobile").owlCarousel({
	  
	    items: 1

	  });

	  $("#big").owlCarousel({
	    
	    items: 1,
	    nav: true,
	    navText: [
	      '<i class="fa fa-arrow-left" aria-hidden="true"></i>',
	      '<i class="fa fa-arrow-right" aria-hidden="true"></i>'
	    ]
	    
	    
	  });
	}); 


	// the following to the end is whats needed for the thumbnails.
	jQuery( document ).ready(function() {
	 
  
        // 1) ASSIGN EACH 'DOT' A NUMBER
			dotcount = 1;
	 
			jQuery('.owl-dot').each(function() {
			  jQuery( this ).addClass( 'dotnumber' + dotcount);
			  jQuery( this ).attr('data-info', dotcount);
			  dotcount=dotcount+1;
			});
			
			 // 2) ASSIGN EACH 'SLIDE' A NUMBER
			slidecount = 1;
	 
			jQuery('.owl-item').not('.cloned').each(function() {
			  jQuery( this ).addClass( 'slidenumber' + slidecount);
			  slidecount=slidecount+1;
			});
			
			// SYNC THE SLIDE NUMBER IMG TO ITS DOT COUNTERPART (E.G SLIDE 1 IMG TO DOT 1 BACKGROUND-IMAGE)
			jQuery('.owl-dot').each(function() {
			
          grab = jQuery(this).data('info');

          slidegrab = jQuery('.slidenumber'+ grab +' .imgquemsomos').attr('src');
          // console.log(slidegrab);
          jQuery(this).css("background-image", "url("+slidegrab+")");  
          jQuery(this).css("background-size", "cover !important");  

      });
		
		// THIS FINAL BIT CAN BE REMOVED AND OVERRIDEN WITH YOUR OWN CSS OR FUNCTION, I JUST HAVE IT
    // TO MAKE IT ALL NEAT 
		amount = jQuery('.owl-dot').length;
		gotowidth = 100/amount;
		
		jQuery('.owl-dot').css("width", gotowidth+"%");
		newwidth = jQuery('.owl-dot').width();
		jQuery('.owl-dot').css("height", newwidth+"px");
		
			
	
});

</script>
	<section>

		<div class="container">
			
			<div class="row">
				
				<div class="col-xs-12 col-md-6">
					<div class="row">
						<div class="col-xs-12 text-justify form-group">
							<h2>Nossa História</h2>
							<div>
								<?php echo $texto; ?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-md-6">
					
					<div class="slide-cont boxquemsomosdesktop">
						<div id="big" class="owl-carousel owl-theme">
							<?php 

	                            $q = "SELECT * FROM somosimagens ORDER BY id DESC";
	                            $q = mysql_query($q);
	                            while ($r = mysql_fetch_array($q)) {
	                                $id = $r["id"];
	                                $imagem = $r["imagem"];
	                                echo '<div>';
	                                	echo '<div class="item imgquemsomos" src="admin/files/'.$imagem.'" style="background:url(admin/files/'.$imagem.') 0% 50% no-repeat;background-size:contain !important;width:90%;height:500px;margin:0 auto;"></div>';
	                                // echo '<img style="width:100px;" src="admin/files/'.$imagem.'">';
	                                echo '</div>';
	                            }

							?>

						</div>
					</div>

					<div class="boxquemsomosmobile">
						<div id="boxquemsomosmobile" class="owl-carousel owl-theme">
							<?php 

	                            $q = "SELECT * FROM somosimagens ORDER BY id DESC";
	                            $q = mysql_query($q);
	                            while ($r = mysql_fetch_array($q)) {
	                                $id = $r["id"];
	                                $imagem = $r["imagem"];
	                                	echo '<div class="item" src="admin/files/'.$imagem.'" style="background:url(admin/files/'.$imagem.') 0% 50% no-repeat;background-size:cover !important;width:100%;height:250px;margin:0 auto;"></div>';
	                                // echo '<img style="width:100px;" src="admin/files/'.$imagem.'">';
	                            }

							?>

						</div>
					</div>

				</div>

			</div>
			<div class="row">
				<div class="col-xs-12 col-md-4 text-justify form-group">
					<h2>Missão</h2>
					<div>
						<?php echo $missao; ?>
					</div>
				</div>
				<div class="col-xs-12 col-md-4 text-justify form-group">
					<h2>Valores</h2>
					<div>
						<?php echo $valores; ?>
					</div>
				</div>
				<div class="col-xs-12 col-md-4 text-justify form-group">
					<h2>Visão</h2>
					<div>
						<?php echo $visao; ?>
					</div>
				</div>

			</div>

		</div>

	</section>

<?php include_once 'footer.php'; ?>