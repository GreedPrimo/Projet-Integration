<?php

	include 'header.php';
	include 'connexionbdd.php';



?>
				<div class="jbanner"><div class="joverlay"></div></div>
				<!-- Main -->
					<div id="main">
						<div class="inner">
							<header>
								<h1 class="jtag">Des habilles pour tous.</h1>
							</header>
							
							<section class="tiles">
								<?php
									$sql = "SELECT * FROM article";
									$res = $db->query($sql);
									while ($row = $res->fetch_assoc()) {
								?>
								<article class=<?php echo "'style" . rand(1,6) . "'"; ?>>
									<span class="image jimg-350">
										<img src=<?php echo "'" . (utf8_encode($row["imgArt1"])) . "'"; ?> alt="" />
									</span>

									ypyp
									<a href=<?php echo "'" . "product.php?product=". $row["codeArt"] . "'"; ?>>
										<h2><?php echo(utf8_encode($row["designArt"])); ?></h2>
										<div class="content">
											<p><?php echo(utf8_encode($row["shortDescArt"])); ?></p>
										</div>
									</a>
								</article>
								<?php
									}
								?>
							</section>
						</div>
					</div>

<?php

	include 'footer.php';

?>