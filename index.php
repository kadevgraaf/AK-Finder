<?php
/*
Author - Klaas Andries de Graaf
Use of sparqllib.php under LGPL license
*/
?>
<!DOCTYPE html>
<html>
<head>
<title>AK-Finder - Index</title>
<link href="layout.css" rel="stylesheet" type="text/css" media="screen" charset="utf-8" />
</head>
<body>
<center><h2>AK-Finder - Architectural Knowledge Finder</h2></center>
<div id='menu' style="background-color: lightgreen; font-size: 150%;">
	<center>
	<table style="width:100%; text-align: center;">
		<th>
			<td> <b>Index</b> </td>
			<td> <a href="review.php">Review interface</a> </td>
			<td> <a href="design.php">Design interface</a> </td>
			<td> <a href="dev.php">Development interface</a> </td>
		</th>	
	</table>
	</center>
</div>
<br \>
<div id='content' style="background-color: lightblue; font-size: 150%;">
<center>
The <b>AK-Finder</b> (Architectural Knowledge Finder) tool sends queries to the SPARQL query endpoint of ArchiMind semantic wiki (see below). 
<br \>
<br \>
The <b>SPARQL queries</b> retrieve architectural knowledge to support design and development activities and answer questions from an approach for architecture documentation review by the SEI.
<br \>
<br \>
The AK-Finder tool exemplifies retrieval of architectural knowledge as Linked Open Data.
<br \>
<br \>
AK-Finder can be freely adapted/reused under the <b>GPL license</b> to integrate the code in modelling, CASE, and IDE tools used in the software project lifecycle.
<br \>
<br \>
See <a href="https://github.com/kadevgraaf/AK-Finder" target="_blank">https://github.com/kadevgraaf/AK-Finder</a> for the <b>source code</b> of AK-Finder on GitHub.
<br \>
<br \>
<b>ArchiMind semantic wiki</b> is accessible at <a href="http://www.archimind.nl/archimindLOD/" target="_blank">http://www.archimind.nl/archimindLOD/</a> and its source code can be found at <a href="https://github.com/kadevgraaf/ArchiMind" target="_blank">https://github.com/kadevgraaf/ArchiMind</a>.
<br \>
<br \>
This <b>SPARQL query endpoint</b> of ArchiMind is accessible at http://www.archimind.nl/archimindLOD/index.php/sparql
<br \>
<br \>
The <b>ontology</b> in ArchiMind semantic wiki, on which the SPARQL queries in AK-Finder are based, is depicted below:
<br \>
<br \>
<br \>
<img src="http://www.archimind.nl/archimindLOD/AKontologyLegend.png">

</center>
</div>

</body>

</html>