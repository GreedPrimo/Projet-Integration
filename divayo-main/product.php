<?php

	include 'header.php';
	include 'connexionbdd.php';
	$sql = "SELECT * FROM article, marque WHERE article.codeMarque = marque.codeMarque AND codeArt =".$_GET["product"];
	$res = $db->query($sql);
	$row = $res->fetch_assoc();
							


?>
				<div class="jbanner"><div class="joverlay"></div></div>
				<!-- Main -->
					<div id="main" style="margin-top: 2%;">
						<div class="inner">
							<div class="row">
							<div class="5u"><span class="image main"><img style="width: 100%;" src=<?php echo "'" . (utf8_encode($row["imgArt1"])) . "'"; ?> alt="" /></span></div>
							<div class="7u">
								<h3><?php echo(utf8_encode($row["designArt"])); ?></h3>
									<div class="table-wrapper">
										<table class="alt">
											<tbody>
												<tr>
													<td>Marque</td>
													<td>Prix</td>
												</tr>
												<tr>
													<td><?php echo(utf8_encode($row["nomMarque"])); ?></td>
													<td><?php echo(utf8_encode($row["PUVArt"])); ?>€</td>
												</tr>
											</tbody>
										</table>
									</div>
								<p><?php echo(utf8_encode($row["descArt"])); ?></p>
								<button onclick="">Acheter</button>
								<span style="margin-left: 15px;">Quantité: </span><span id="qtt">0</span>
								<div>
									<button onclick="plus()">+</button><button onclick="minus()">-</button>
								</div>
							</div>
							</div>
						</div>
					</div>
					<hr />
					<h2 class="align-center">Produits similaires</h2>
					<div id="carousel" class="owl-carousel" style="width: 1200px;margin:0 auto; margin-bottom: 100px;">
          				<?php
          					$sql = "SELECT categorie.codeCategorie FROM article, categorie, appartenir WHERE appartenir.codeCategorie = categorie.codeCategorie AND appartenir.codeArt = article.codeArt AND article.codeArt=".$row["codeArt"];
							$res = $db->query($sql);
							$row = $res->fetch_assoc();
							$sql2 = "SELECT article.imgArt1, article.codeArt FROM article, categorie, appartenir WHERE appartenir.codeCategorie = categorie.codeCategorie AND appartenir.codeArt = article.codeArt AND categorie.codeCategorie=".$row["codeCategorie"];
							$res2 = $db->query($sql2);
							while ($row2 = $res2->fetch_assoc()) {
				    	?> 
					    	<a href=<?php echo "'" . "product.php?product=". $row2["codeArt"] . "'"; ?>><div class="item"><img class="jimg-100" src=<?php echo "'" . (utf8_encode($row2["imgArt1"])) . "'"; ?> alt="Owl Image"></div></a>
					   	<?php
					    	}
					    ?>
					</div>


<?php
	

	include 'footer.php';

?>

<script src="assets/js/jquery-1.9.1.min.js"></script>
<script src="owl-carousel/owl.carousel.min.js"></script>

<!-- Frontpage Demo -->
<script>

$(document).ready(function($) {
  $("#carousel").owlCarousel();
});


$("body").data("page", "frontpage");

</script>

<script type="text/javascript">
	function plus() {
		document.getElementById("qtt").innerHTML = parseInt(document.getElementById("qtt").innerHTML) + 1;
	}
	function minus() {
		if (parseInt(document.getElementById("qtt").innerHTML) > 0)
		document.getElementById("qtt").innerHTML = parseInt(document.getElementById("qtt").innerHTML) - 1;
	}
</script>

<style type="text/css">
#carousel .item{
	margin: 3px;
}
#carousel .item img {
	display: block;
	width: 100%;
	height: auto;
}	
</style>

