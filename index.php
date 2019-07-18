<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="styles/main.css">

	<title>newspaper CF company</title>
</head>
<body>
	<div id="wrapper">
		<header id="header" class="">

			<section id="newspapercf" class="insideheader">
				<img src="img/logo-newspaper-cf.png">
			</section>
			<section id="logobanner" class="insideheader">
				<img src="img/banner-1.png">
			</section>
			
		</header><!-- /header -->

		<nav id="mainnav">
			<ul>
				<li><a href="#" title="">Home</a></li>
				<li><a href="#" title="">Tech</a></li>
				<li><a href="#" title="">Culture</a></li>
				<li><a href="#" title="">Video</a></li>
			</ul>
		</nav><!-- /nav -->

		<main id="main">
			<section id="todate">
				<time datetime="2019-05-18">
					<script>
						var date = new Date().toLocaleString();
						document.write(date);
					</script>
				</time>
			</section>
			<section id="mainsec-1">
				<div class="headline1" style="margin-bottom: 1rem;">
					<h1>BBC Top News</h1>					
				</div>
				<article class="eacharticle" style="flex-direction: column;">

					<?php
						require_once 'restful.php';

						$url = 'http://feeds.bbci.co.uk/news/technology/rss.xml';
						$response = curl_get($url);
						$xml = simplexml_load_string($response);

						foreach ($xml->channel->item as $item) {
							echo '<a href="'.$item->link.'" target="_blank">'.$item->title.'</a>
							';
						}
					?>
					
				</article><!-- /#eacharticle -->
				
			</section><!-- /#mainsec-1 -->

			<section id="mainsec-2">
				<div class="headline1" style="margin: 1rem 0;">
					<h1>CNN Top News</h1>					
				</div>
				<article id="hintswrapper" style="flex-direction: column;">

					<?php

						$url = 'http://rss.cnn.com/rss/edition_technology.rss';
						$response = curl_get($url);
						$xml = simplexml_load_string($response);

						foreach ($xml->channel->item as $item) {
							echo '<a href="'.$item->link.'" target="_blank">'.$item->title.'</a>
							';
						}
					?>

				</article>

			</section><!-- /mainsec-2 -->
			
		</main><!-- /main -->

		<footer>

			<section id="footer-sec1">
				<nav id="footernav">
					<ul>
						<li><a href="#" title="">Home</a></li>
						<li><a href="#" title="">Tech</a></li>
						<li><a href="#" title="">Culture</a></li>
						<li><a href="#" title="">Video</a></li>
					</ul>
				</nav>
			</section>
			<section id="footer-sec2">
				<img src="img/logo-newspaper-cf.png">
			</section>
			<section id="footer-sec3">
				<span>&copy; Andreas Harasztosi - CodeFactory 2019</span>
			</section>
			
		</footer><!-- /footer -->

	</div><!-- /wrapper -->

	<?php
		$joke = json_decode(file_get_contents('http://api.serri.codefactory.live/random/'));
		echo "<script>alert('".$joke->joke."');</script>";

	?>
</body>
</html>