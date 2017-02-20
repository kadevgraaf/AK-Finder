<?php
/*
Author - Klaas Andries de Graaf
Use of sparqllib.php under LGPL license
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

?>
<!DOCTYPE html>
<html>
<head>
<title>AK-Finder - Design interface</title>
<link href="layout.css" rel="stylesheet" type="text/css" media="screen" charset="utf-8" />
<script src="jquery-3.1.1.min.js"></script>
<script type="text/javascript">
    function predefined(question) {
    	//=============================Question 1===================
		var Q1 = "PREFIX AKO: <http://www.archimind.nl/archimindLOD/index.php/view/r/sadocontology1.owl:> \n" +
"PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#> \n" +
"PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#> \n" +
"SELECT ?components ?datastores ?p ?impl_units  \n" +
"WHERE { \n" +
"{?impl_unit_class rdfs:subClassOf AKO:Architecture . \n" +
"?impl_units rdf:type ?impl_unit_class . \n" +
"?components rdf:type AKO:Component . \n" +
"?impl_units ?p ?components} UNION \n" +
"{?impl_unit_class rdfs:subClassOf AKO:Architecture . \n" +
"?impl_units rdf:type ?impl_unit_class .  \n" +
"?datastores rdf:type AKO:Data_store .  \n" +
"?impl_units ?p ?datastores } \n" +
"} \n" +
"LIMIT 2000";
		if (question == 1){$('#query').val(Q1);}
		//=============================Question 2===================
		var Q2 = "PREFIX AKO: <http://www.archimind.nl/archimindLOD/index.php/view/r/sadocontology1.owl:> \n" +
"PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#> \n" +
"PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#> \n" +
"SELECT *  \n" +
"WHERE { \n" +
"{AKO:"+$('#Q2parameter').val()+" AKO:results_in ?impl_units} UNION \n" +
"{AKO:"+$('#Q2parameter').val()+" AKO:realized_by ?impl_units} UNION \n" +
"{AKO:"+$('#Q2parameter').val()+" AKO:depends_on ?decisions}  UNION \n" +
"{AKO:"+$('#Q2parameter').val()+" AKO:addressed_by ?decisions}} \n" +
"LIMIT 2000";
		if (question == 2){$('#query').val(Q2);}
		//=============================Question 3===================
		var Q3 = "PREFIX AKO: <http://www.archimind.nl/archimindLOD/index.php/view/r/sadocontology1.owl:> \n" +
"PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#> \n" +
"PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#> \n" +
"SELECT DISTINCT ?uri \n" +
"WHERE { ?uri rdf:type AKO:Pattern} \n" +
"LIMIT 2000";
		if (question == 3){$('#query').val(Q3);}
		//=============================Question 4===================
		var Q4 = "PREFIX AKO: <http://www.archimind.nl/archimindLOD/index.php/view/r/sadocontology1.owl:> \n" +
"PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#> \n" +
"PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#> \n" +
"SELECT ?FuncReq \n" +
"WHERE {{?FuncReq rdf:type AKO:Functional_requirement . \n" +
"?FuncReq ?p AKO:"+$('#Q4parameter').val()+"} UNION  \n" +
"{?FuncReq rdf:type AKO:Functional_requirement . \n" +
"AKO:"+$('#Q4parameter').val()+" ?p ?FuncReq }} \n" +
"LIMIT 2000";
		if (question == 4){$('#query').val(Q4);}
		//=============================Question 5===================
		var Q5 = "PREFIX AKO: <http://www.archimind.nl/archimindLOD/index.php/view/r/sadocontology1.owl:> \n" +
"PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#> \n" +
"PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#> \n" +
"SELECT DISTINCT ?wikipage \n" +
"WHERE { \n" +
"?concern rdf:type AKO:Concern . \n" +
"?concern AKO:knowledge_is_located_in ?wikipage \n" +
"} \n" +
"LIMIT 2000";
		if (question == 5){$('#query').val(Q5);}
		//=============================requirements realized by architecture===================
		var D1 = "PREFIX AKO: <http://www.archimind.nl/archimindLOD/index.php/view/r/sadocontology1.owl:> \n" +
"PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#> \n" +
"PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#> \n" +
"SELECT ?Req ?AKelement \n" +
"WHERE {{?Req rdf:type AKO:Functional_Requirement}  \n" +
"UNION {?Req rdf:type AKO:Non_functional_requirement }  \n" +
"OPTIONAL {?Req AKO:realized_by ?AKelement} .  \n" +
"FILTER(!bound(?AKelement))} \n" ;
		if (question == 6){$('#query').val(D1);}
		//=============================decisions not realized===================
		var D2 = "PREFIX AKO: <http://www.archimind.nl/archimindLOD/index.php/view/r/sadocontology1.owl:> \n" +
"PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#> \n" +
"PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#> \n" +
"SELECT ?Req ?decision \n" +
"WHERE {{?Req rdf:type AKO:Functional_Requirement}  \n" +
"UNION {?Req rdf:type AKO:Non_functional_requirement }  \n" +
"OPTIONAL{?Req AKO:addressed_by ?decision}. \n" +
"FILTER(!bound(?decision))} \n" ;
		if (question == 7){$('#query').val(D2);}
		//=============================Question 3 - patterns with context - LOD===================
		var D3 = "PREFIX AKO: <http://www.archimind.nl/archimindLOD/index.php/view/r/sadocontology1.owl:> \n" +
"PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#> \n" +
"PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#> \n" +
"SELECT * \n" +
"WHERE { ?uri rdf:type AKO:Pattern .  \n" +
"?uri AKO:description ?description .  \n" +
"?uri AKO:knowledge_is_located_in ?wikipage .  \n" +
"?uri rdf:seeAlso ?DBpedia}  \n" ;
		if (question == 8){$('#query').val(D3);}		
		//=============================Other queries================
		var X1 = "PREFIX AKO: <http://www.archimind.nl/archimindLOD/index.php/view/r/sadocontology1.owl:> \n" +
"PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#> \n" +
"PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#> \n" +
"SELECT *  \n" +
"LIMIT 2000";
		if (question == 9){$('#query').val(X1);}
	
		//=============================execute================
    	//alert('To execute: press "Submit Query"-button in top-right of screen');
    	
    	var query = ''; query = $('#query').val();
    	var casus = ''; casus = $('#casus').val();
    	send_query(query, casus);
    	//$('#submit').click();
 		
	}
    	function send_query(query, casus)
    	{
	    	if (query = 'custom')
	    	{
	    		query = $("#query").val();
    		}
			//$("#wijzigen_form").hide("slow");
			$("#resulttable").hide("slow");  
					$.ajax({
						method: "post",url: "query.php",data: 
						"query="+query+"&case="+casus,
						beforeSend: function(){},
						complete: function(){}, 
							success: function(html){
									$("#resulttable").html(html);
									$("#resulttable").show("slow"); 
						}
					}); //close $.ajax(		
						//+"&voornaam="+voornaam+"&naam="+naam+"&adres="+adres+"&geslacht="+geslacht+"&wijknr="+wijknr+"&activiteit="+activiteit+"&beroep="+beroep+"&telefoonnummer="+telefoonnummer+"&toelichting="+toelichting,
		}	
	
</script>
</head>
<body>
<center><h2>AK-Finder - Retrieve Linked Architectural Data Example</h2></center>
<div id='menu' style="background-color: lightgreen;  font-size: 150%;">
<center>
<table style="width:100%; text-align: center;">
	<th>
		<td> <a href="index.php">Index</a> </td>
		<td> <a href="review.php">Review interface</a> </td>
		<td> <b>Design interface</b> </td>
		<td> <a href="dev.php">Development interface</a> </td>
	</th>	
</table>
<center>
</div>
<div id='editordiv' style="background-color: lightblue;">
	<h2>Design interface</h2>
	<br />
		<b>Predefined SPARQL queries: </b> <i>(to adapt queries: change query in <a href="" onclick="$('#sendquery').focus(); return false;">SPARQL Query editor textbox</a> and press "Send Query"-button)</i>
	<ul>
		<li>SPARQL query for identifying requirements are not realized by at least one element in the architecture.<input type="button" class="button"  value="Query" onclick="predefined(6);"></li>
		<li>SPARQL query for identifying which requirements are not yet addressed by a decision.<input type="button" class="button"  value="Query" onclick="predefined(7);"></li>
	</ul>
	<ul>
		<li>
		<b>Retrieve Architectural Knowledge of type/class</b>
			 <select>
			  <option value="Class1">Class1</option>
			  <option value="Class2">Class2</option>
			  <option value="Class3">Class3</option>
			  <option value="Class4">Class4</option>
			</select> 
		</li>
	</ul>
	
		<br \>
	<b>Retrieve Architectural Knowledge about instances</b>
	?subject ?predicate ?object
	
	
	<div id="resulttable">
	</div>
	<b><a id='refresh' href='http://softcode.nl/querytool/index.php'></a></b>
	<center>
	<div id="editor">
		<b>SPARQL Query Editor</b>
		<textarea rows="15" cols="100" name="query" id="query"><?php echo $_POST['query'];
		if ($_POST['query'] == '')
		{?>PREFIX AKO: <http://www.archimind.nl/archimindLOD/index.php/view/r/sadocontology1.owl:> 
PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#> 
PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#> 
SELECT *
WHERE { ?uri rdf:type AKO:Pattern . 
?uri AKO:description ?description . 
?uri AKO:knowledge_is_located_in ?wikipage . 
?uri rdf:seeAlso ?DBpedia}
<?php 
			}
		?></textarea>
		<br/>
		<input type="hidden" type="text" id="casus" value="" name="casus">
		<input class="button-groot" type="button" id="sendquery" name="sendquery" value="sendquery" onclick="send_query('', '');">
		</center>
	</div>
</div>

</body>

</html>