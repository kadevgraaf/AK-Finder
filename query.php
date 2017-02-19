<?php
/*
Code snippets adapted from http://graphite.ecs.soton.ac.uk/sparqllib/

Use of sparqllib.php

Simple library to query SPARQL from PHP.

©2010-12 Christopher Gutteridge, University of Southampton.

Under LGPL license
*/
/*
Note Author (Klaas Andries de Graaf):
Querys and data is often hardcoded (not dynamic from e.g. CASE tool database) with examples 
to allow for easy understanding of code. 
Making this fully dynamic + linking it to database/code repository is easy, but introduces more complex code to read for reviewers.
*/
require_once('sparqllib.php');
//$db = sparql_connect('http://dbpedia.org/sparql');
$db = sparql_connect('http://www.archimind.nl/archimindLOD/index.php/sparql');
//$query = "SELECT ?film
//WHERE { ?film <http://purl.org/dc/terms/subject> <http://dbpedia.org/resource/Category:French_films> }";

//echo $_POST['query'];
//echo strlen(trim($_POST['query']));
//echo $_POST['query'];
//if ($_POST['query'] !== ""){$query = $_POST['query'];}
if (strlen(trim($_POST['query']))){$query = $_POST['query'];}
else{	
$query = "PREFIX AKO: <http://www.archimind.nl/archimindLOD/index.php/view/r/sadocontology1.owl:> 
PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#> 
PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#> 
SELECT *
WHERE { ?uri rdf:type AKO:Pattern . 
?uri AKO:description ?description . 
?uri AKO:knowledge_is_located_in ?wikipage . 
?uri rdf:seeAlso ?DBpedia}";
}

$result = sparql_query($query);
$fields = sparql_field_array($result);


//echo $_GET['query'];

if ($_POST['case'] == 'reqs1'){
	echo " <br \>- [Related requirements in ArchiMind: ";
		if (sparql_num_rows( $result ) > 0)
		{
			while($row = sparql_fetch_array($result))
			{
			  foreach($fields as $field)
			  {
				  if(strpos($row[$field], "ttp:") !== false)
				  {echo "<a href='".$row[$field] . "' target='_blank'>";}
				  else
				  {echo $row[$field] . "</a>, ";}
			    //print"$row[$field] <br\>";
			  }
			}
		}
		else
		{
			echo '<b>ARCHITECTURAL RULE VIOLATION - NO RELATED REQUIREMENTS <a href="http://www.archimind.nl/archimindLOD/index.php/view/r/sadocontology1.owl%3ABusiness_rules_engine" target="_blank">Change</a></b>';
		}

		echo '] <br \>- <a href="#" onclick="predefined(11);">[find related decisions in ArchiMind]</a>';
}
else if ($_POST['case'] == 'decs1'){
	echo ' <br \>- <a href="#" onclick="predefined(10);">[find related requirements in ArchiMind]</a> <br \>- [Related decisions in ArchiMind: ';
		if (sparql_num_rows( $result ) > 0)
		{
			while($row = sparql_fetch_array($result))
			{
			  foreach($fields as $field)
			  {
				  if(strpos($row[$field], "ttp:") !== false)
				  {echo "<a href='".$row[$field] . "' target='_blank'>";}
				  else
				  {echo $row[$field] . "</a>, ";}
			    //print"$row[$field] <br\>";
			  }
			}
		}
		else
		{
			echo '<b>ARCHITECTURAL RULE VIOLATION - NO RELATED DECISIONS <a href="http://www.archimind.nl/archimindLOD/index.php/view/r/sadocontology1.owl%3ABusiness_rules_engine" target="_blank">Change</a></b>';
		}
		echo '] ';
}
//else{
	//echo ' <br \>- <a href="#" onclick="predefined(10);">[find related requirements in ArchiMind]</a> <br \>- <a href="#" onclick="predefined(11);">[find related decisions in ArchiMind]</a>';
//}
if ($_POST['case'] == 'reqs2'){
	echo " <br \>- [Related requirements in ArchiMind: ";
		if (sparql_num_rows( $result ) > 0)
		{
			while($row = sparql_fetch_array($result))
			{
			  foreach($fields as $field)
			  {
				  if(strpos($row[$field], "ttp:") !== false)
				  {echo "<a href='".$row[$field] . "' target='_blank'>";}
				  else
				  {echo $row[$field] . "</a>, ";}
			    //print"$row[$field] <br\>";
			  }
			}
		}
		else
		{
			echo '<b>ARCHITECTURAL RULE VIOLATION - NO RELATED REQUIREMENTS <a href="http://www.archimind.nl/archimindLOD/index.php/view/r/sadocontology1.owl%3ATransformer" target="_blank">Change</a>]</b>';
		}

		echo '] <br \> - <a href="#" onclick="predefined(13);">[find related decisions in ArchiMind]</a>';
}
else if ($_POST['case'] == 'decs2'){
	echo ' <br \>- <a href="#" onclick="predefined(12);">[find related requirements in ArchiMind]</a> <br \>- [Related decisions in ArchiMind: ';
		if (sparql_num_rows( $result ) > 0)
		{
			while($row = sparql_fetch_array($result))
			{
			  foreach($fields as $field)
			  {
				  if(strpos($row[$field], "ttp:") !== false)
				  {echo "<a href='".$row[$field] . "' target='_blank'>";}
				  else
				  {echo $row[$field] . "</a>, ";}
			    //print"$row[$field] <br\>";
			  }
			}
		}
		else
		{
			echo '<b>ARCHITECTURAL RULE VIOLATION - NO RELATED DECISIONS <a href="http://www.archimind.nl/archimindLOD/index.php/view/r/sadocontology1.owl%3ATransformer" target="_blank">Change</a></b>';
		}
		echo ']';
}
if ($_POST['case'] == 'selectQ2' || $_POST['case'] == 'selectQ4')
{
	if ($_POST['case'] == 'selectQ2'){echo "<select id='Q2parameter'>";}
	else{echo "<select id='Q4parameter'>";}
	
	while( $row = sparql_fetch_array( $result ) )
	{
		print "<option ";
		foreach( $fields as $field )
		{
			if(strpos($row[$field], "ttp:") !== false)
		  	{
			  	print "value='" . substr($row[$field], (strpos($row[$field], ".owl:")+ 5)) . "' ";
				if ($_POST['case'] == 'selectQ2'  && strpos($row[$field], "Security") !== false){echo "selected ";}
				else if ($_POST['case'] == 'selectQ4' && strpos($row[$field], "Compatability") !== false){echo "selected ";}
				echo ">";		  	
			}
		  	//<a href='".$row[$field] . "' target='_blank'>" . $row[$field] . "</a></td>";
		  else
		  	{print "$row[$field]";}
	  	}
		print "</option>";
	}
	echo "</select>";
}
else{
	//	echo ' <br \>- <a href="#" onclick="predefined(12);">[find related requirements in ArchiMind]</a> <br \>- <a href="#" onclick="predefined(13);">[find related decisions in ArchiMind]</a>';
	//
	
	//if($_POST['case'] == 'decs1' || $_POST['case'] == 'reqs1' || $_POST['case'] == 'decs2' || $_POST['case'] == 'reqs2')
	//{
	$result = sparql_query($query);
	$fields = sparql_field_array($result);
	//}
?>
	<b>Results (<?php echo sparql_num_rows( $result ); ?>): <input class="button" type="button" id="editor" name="editor" value="View and Adapt SPARQL Query" onclick="$('#sendquery').focus()"></b>
<?php	
	//print "<p>Number of results: ".sparql_num_rows( $result )." results.</p>";
	print "<table class='CSSTableGenerator' border='1'>";
	print "<tr>";
	foreach( $fields as $field )
	{
		print "<th>$field</th>";
	}
	print "</tr>";
	while( $row = sparql_fetch_array( $result ) )
	{
		print "<tr>";
		foreach( $fields as $field )
		{
		  if(strpos($row[$field], "ttp:") !== false)
		  	{print "<td><a href='".$row[$field] . "' target='_blank'>" . $row[$field] . "</a></td>";}
		  else
		  	{print "<td>$row[$field]</td>";}
		}
		print "</tr>";
	}
	print "</table>";
	/*
	while($row = sparql_fetch_array($result))
	{
	  foreach($fields as $field)
	  {
		  if(strpos($row[$field], "ttp:") !== false)
		  {echo "<a href='".$row[$field] . "' target='_blank'>" . $row[$field] . "</a><br/>";}
		  else
		  {echo $row[$field] . "<br/>";}
	    //print"$row[$field] <br\>";
	  }
	}
	*/
}
?>