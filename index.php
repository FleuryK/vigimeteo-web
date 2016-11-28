<?php
$file_xml = simplexml_load_file("../carte_vigilance_meteo.xml");

$dept_cotes = array('cote_06', 'cote_11', 'cote_13', 'cote_14', 'cote_17', 'cote_22', 'cote_29', 'cote_2A', 'cote_2B', 'cote_30', 'cote_33', 'cote_34',
'cote_35', 'cote_40', 'cote_44', 'cote_50', 'cote_56', 'cote_59', 'cote_62', 'cote_64', 'cote_66', 'cote_76', 'cote_80', 'cote_83', 'cote_85');

$dept = array('dep_01', 'dep_02', 'dep_03', 'dep_04', 'dep_05', 'dep_06', 'dep_07', 'dep_08', 'dep_09', 'dep_10',
'dep_11', 'dep_12', 'dep_13', 'dep_14', 'dep_15', 'dep_16', 'dep_17', 'dep_18', 'dep_19',
'dep_21', 'dep_22', 'dep_23', 'dep_24', 'dep_25', 'dep_26', 'dep_27', 'dep_28', 'dep_29', 'dep_2A', 'dep_2B', 'dep_30',
'dep_31', 'dep_32', 'dep_33', 'dep_34', 'dep_35', 'dep_36', 'dep_37', 'dep_38', 'dep_39', 'dep_40',
'dep_41', 'dep_42', 'dep_43', 'dep_44', 'dep_45', 'dep_46', 'dep_47', 'dep_48', 'dep_49', 'dep_50',
'dep_51', 'dep_52', 'dep_53', 'dep_54', 'dep_55', 'dep_56', 'dep_57', 'dep_58', 'dep_59', 'dep_60',
'dep_61', 'dep_62', 'dep_63', 'dep_64', 'dep_65', 'dep_66', 'dep_67', 'dep_68', 'dep_69', 'dep_70',
'dep_71', 'dep_72', 'dep_73', 'dep_74', 'dep_75', 'dep_76', 'dep_77', 'dep_78', 'dep_79', 'dep_80',
'dep_81', 'dep_82', 'dep_83', 'dep_84', 'dep_85', 'dep_86', 'dep_87', 'dep_88', 'dep_89', 'dep_90',
'dep_91', 'dep_95', 'dep_99');
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Vigilance Météo Côtière &amp; Département</title>

		<!-- Bootstrap core CSS -->
		<!-- <link href="//getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet"> -->
		<link href="//bootswatch.com/superhero/bootstrap.min.css" rel="stylesheet">

		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<link href="//getbootstrap.com/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
	</head>

	<body>
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Basculer la navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="./">Vigilance Météo</a>
				</div>
				<div id="navbar" class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li class="active"><a href="./">Accueil</a></li>
					</ul>
				</div>
			</div>
		</nav>

		<div style="margin-top: 70px;"></div>

		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-12">
							<?php
								echo "<h1 style=\"text-align: center;\">Dernière mise à jour de la vigilance le ".date("d/m/Y \à H:i", strtotime($file_xml->bulletin_metropole->mise_a_jour))."</h1>";
							?>
						</div>
					</div>

					<div style="margin-bottom: 50px;"></div>

					<div class="row">
						<?php
							foreach ($dept_cotes as $vigilance_departement_cotier) {
								echo '
								<div class="col-md-3">
									<div class="panel panel-default" style="text-align: center;">
										<div class="panel-heading">Vigilance météo pour le département côtier '.$vigilance_departement_cotier.'</div>
										<div class="panel-body">';
											if ($file_xml->$vigilance_departement_cotier->alerte == "Jaune") {
												echo '<span class="label label-warning">'.$file_xml->$vigilance_departement_cotier->alerte.'</span>';
											}
											elseif ($file_xml->$vigilance_departement_cotier->alerte == "Orange") {
												echo '<span class="label label-primary">'.$file_xml->$vigilance_departement_cotier->alerte.'</span>';
											}
											elseif ($file_xml->$vigilance_departement_cotier->alerte == "Rouge") {
												echo '<span class="label label-danger">'.$file_xml->$vigilance_departement_cotier->alerte.'</span>';
											}
											else {
												echo '<span class="label label-success">'.$file_xml->$vigilance_departement_cotier->alerte.'</span>';
											}
								echo '	</div>
									</div>
								</div>';
							}
						?>
					</div>

					<div class="row">
						<?php
							foreach ($dept as $vigilance_departement) {
								echo '
								<div class="col-md-3">
									<div class="panel panel-default" style="text-align: center;">
										<div class="panel-heading">Vigilance météo pour le département '.$vigilance_departement.'</div>
										<div class="panel-body">';
											if ($file_xml->$vigilance_departement->alerte == "Jaune") {
												echo '<span class="label label-warning">'.$file_xml->$vigilance_departement->alerte.'</span>';
											}
											elseif ($file_xml->$vigilance_departement->alerte == "Orange") {
												echo '<span class="label label-primary">'.$file_xml->$vigilance_departement->alerte.'</span>';
											}
											elseif ($file_xml->$vigilance_departement->alerte == "Rouge") {
												echo '<span class="label label-danger">'.$file_xml->$vigilance_departement->alerte.'</span>';
											}
											else {
												echo '<span class="label label-success">'.$file_xml->$vigilance_departement->alerte.'</span>';
											}
								echo '
										</div>
									</div>
								</div>';
							}
						?>
					</div>
				</div>
			</div>
		</div>

		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="//getbootstrap.com/assets/js/vendor/jquery.min.js"><\/script>')</script>
		<script src="//getbootstrap.com/dist/js/bootstrap.min.js"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<script src="//getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>
	</body>
</html>