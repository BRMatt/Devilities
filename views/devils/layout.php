<html>
	<head>
		<title><?php if( ! empty($title)): ?><?php echo $title; ?> | <?php endif; ?>Devilities</title>
		<?php echo Html::style('devils/media/index/reset.css', NULL, TRUE); ?>
		<?php echo Html::style('devils/media/index/forms.css', NULL, TRUE); ?>
		<style>
			body {font-family: Arial; Verdanna}
			
			#wrapper {width: 990px; padding: 10px; margin: 0 auto;}
				#header {position: relative; margin-bottom: 15px;}
					#header .tagline {font-style:italic;}
					#header #devils {position: absolute; right: 10px; bottom:10px;}
					#header #devils li {float: left; margin: 5px 10px;}
					
				#main {width: 75%; float: left;}
				#sidebar {width: 23%; float: right;}
				
			h1 {font-family: Georgia; margin: 0; font-size: 160%;}
			
			
			/*Form stuff*/
			.formable fieldset {margin-bottom: 10px;}
			.formable label {display: block; float: left; width:35%; margin-right: 2%;}
			
			.formable .inlineLabels .ctrlHolder label .fieldHint {display: block; font-weight: normal; font-size: 80%;}
			.formable .inlineLabels .ctrlHolder textarea {display: block; width:40%;}
			
			#route-results {list-style: none;}
				#route-results .route {margin-bottom: 10px;}
					#route-results strong {display: block; background-color: #CCC; border: 1px solid #999999; padding:3px; -moz-border-radius-topleft: 2px; -moz-border-radius-topright:2px;}
					#route-results .tests .test {display: block; clear: both; overflow: auto;}
					#route-results .tests .test-failed {background-color: #EF1D1D;}
					#route-results .tests .test-passed {background-color: #1CDF1B;}
					#route-results .tests .test .inner {margin: 5px;}
					#route-results .tests .test .uri {display: block; width: 35%; float: left;}
					#route-results .tests .test .params {width: 45%; float: left;}
					#route-results .tests .test .params dt {display: inline; width:49%; float: left;}
					#route-results .tests .test .params dd {display: inline; width:49%; float: right;}
		</style>
	</head>
	
	<body>
		<div id="wrapper">
			<div id="header">
				<h1><?php echo ! empty($title) ? $title : 'Devilities'; ?></h1>
				<span class="tagline">Utilities for developers</span>
				<ul id="devils">
					<?php foreach($devils as $devil): ?>
					<li>
						<?php echo $devil; ?>
					</li>
					<?php endforeach; ?>
				</ul>
			</div>
			
			<div id="main">
				<?php echo empty($body) ? '' : $body; ?>
			</div>
			<div id="sidebar">
				Some useful kohana info will go here
			</div>
		</div>
	</body>
</html>