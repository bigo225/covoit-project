<?php
session_start();
session_destroy(); // ferme la session et donc deconnecte totalement
$titre="Déconnexion";
include("../includes/debut.php");?>
<html>
	<head>
 		<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
        <link rel="stylesheet" type="text/css" href="style.css" media="screen" />
        <link href='https://fonts.googleapis.com/css?family=Poiret+One|Righteous|Bangers|Kaushan+Script|Lobster+Two|Satisfy|Cinzel|Covered+By+Your+Grace|Courgette|Handlee|Kreon|Cardo|Cookie|Tangerine|Pinyon+Script|Lobster|Josephin+Slab|Open+Sans+Condensed:300|Poiret+One|Rubik|Shadows+Into+Light+Two|Playball|Jura|Great+Vibes|Bad+Script|Voltaire' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="../css/accueil/news.css">
        <link rel="stylesheet" type="text/css" href="../css/forum/forum.css">
        <title></title>
        <style type="text/css">
             

        </style>
		<title></title>
	</head>
<body>
<?php

//if ($id==0) erreur(ERR_IS_CO);

echo '<p class="deco">Vous êtes à présent déconnecté </p>
<p>Cliquez <a href="'.htmlspecialchars($_SERVER['HTTP_REFERER']).'">ici</a> 
pour revenir à la page précédente.<br />
Cliquez <a href="../index.php">ici</a> pour revenir à la page principale</p>';
?>
</div></body></html>

</div> 
</div>
</div>
</html>