<?php
/*
Author - Klaas Andries de Graaf
Use of sparqllib.php under LGPL license
*/

?>
<!DOCTYPE html>
<html>
<head>
<title>AK-Finder - Review interface</title>
<link href="layout.css" rel="stylesheet" type="text/css" media="screen" charset="utf-8" />
<script src="jquery-3.1.1.min.js"></script>
<script type="text/javascript">
    function predefined(question) {
    	//=============================Question 1===================
		var Q1 = "PREFIX AKO: <http://www.archimind.nl/archimindLOD/index.php/view/r/sadocontology1.owl:> \n" +
				"PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#> \n" +
				"PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#> \n" +
				"SELECT ?components ?datastores ?relationship ?implementation_units  \n" +
				"WHERE { \n" +
				"{?impl_unit_class rdfs:subClassOf AKO:Architecture . \n" +
				"?implementation_units rdf:type ?impl_unit_class . \n" +
				"?components rdf:type AKO:Component . \n" +
				"?implementation_units ?relationship ?components} UNION \n" +
				"{?impl_unit_class rdfs:subClassOf AKO:Architecture . \n" +
				"?implementation_units rdf:type ?impl_unit_class .  \n" +
				"?datastores rdf:type AKO:Data_store .  \n" +
				"?implementation_units ?relationship ?datastores } \n" +
				"} \n" +
				"LIMIT 2000";
		if (question == 1){$('#query').val(Q1);}
		//=============================Question 2===================
		var Q2 = "PREFIX AKO: <http://www.archimind.nl/archimindLOD/index.php/view/r/sadocontology1.owl:> \n" +
				"PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#> \n" +
				"PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#> \n" +
				"SELECT *  \n" +
				"WHERE { \n" +
				"{AKO:"+$('#Q2parameter').val()+" AKO:results_in ?implementation_units} UNION \n" +
				"{AKO:"+$('#Q2parameter').val()+" AKO:realized_by ?implementation_units} UNION \n" +
				"{AKO:"+$('#Q2parameter').val()+" AKO:depends_on ?decisions}  UNION \n" +
				"{AKO:"+$('#Q2parameter').val()+" AKO:addressed_by ?decisions}} \n" +
				"LIMIT 2000";
		if (question == 2){$('#query').val(Q2);}
		//=============================Question 3===================
		var Q3 = "PREFIX AKO: <http://www.archimind.nl/archimindLOD/index.php/view/r/sadocontology1.owl:> \n" +
				"PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#> \n" +
				"PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#> \n" +
				"SELECT DISTINCT ?name ?uri \n" +
				"WHERE { ?uri rdf:type AKO:Pattern.  \n" +
				"?uri rdfs:label ?name} \n" +
				"LIMIT 2000";
		if (question == 3){$('#query').val(Q3);}
		//=============================Question 4===================
		var Q4 = "PREFIX AKO: <http://www.archimind.nl/archimindLOD/index.php/view/r/sadocontology1.owl:> \n" +
				"PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#> \n" +
				"PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#> \n" +
				"SELECT ?Functional_Requirement_URI \n" +
				"WHERE {{?Functional_Requirement_URI rdf:type AKO:Functional_requirement . \n" +
				"?Functional_Requirement_URI ?p AKO:"+$('#Q4parameter').val()+"} UNION  \n" +
				"{?Functional_Requirement_URI rdf:type AKO:Functional_requirement . \n" +
				"AKO:"+$('#Q4parameter').val()+" ?p ?Functional_Requirement_URI }} \n" +
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

		//=============================Question 3 - patterns with context - LOD===================
		var D3 = "PREFIX AKO: <http://www.archimind.nl/archimindLOD/index.php/view/r/sadocontology1.owl:> \n" +
				"PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#> \n" +
				"PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#> \n" +
				"SELECT * \n" +
				"WHERE { ?uri rdfs:label ?name .  \n" +
				"?uri rdf:type AKO:Pattern . \n" +
				"?uri AKO:description ?description .  \n" +
				"OPTIONAL{?uri AKO:knowledge_is_located_in ?wikipage} .  \n" +
				"OPTIONAL{?uri rdf:seeAlso ?DBpedia}}  \n" ;
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
	function selectquery()
	{
//=============================Select box for finding non-functional requirements===================
		var selectquery = "PREFIX AKO: <http://www.archimind.nl/archimindLOD/index.php/view/r/sadocontology1.owl:> \n" +
							"PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#> \n" +
							"PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#> \n" +
							"SELECT ?uri ?name \n" +
							"WHERE { ?uri rdfs:label ?name .  \n" +
							"?uri rdf:type AKO:Non_functional_requirement . }  \n" ;
		$('#query').val(selectquery);	
    	var casus = 'selectQ2';
    	send_query(query, casus);
    	var casus = 'selectQ4';
    	send_query(query, casus);    	
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
									if (casus == 'selectQ2'){$("#Q2parameterfield").html(html);}
									else if (casus == 'selectQ4'){$("#Q4parameterfield").html(html);}
									else
									{
										$("#resulttable").html(html);
										$("#resulttable").show("slow"); 
									}
						}
					}); //close $.ajax(		
						//+"&voornaam="+voornaam+"&naam="+naam+"&adres="+adres+"&geslacht="+geslacht+"&wijknr="+wijknr+"&activiteit="+activiteit+"&beroep="+beroep+"&telefoonnummer="+telefoonnummer+"&toelichting="+toelichting,
		}	
	
</script>
<script type="text/javascript">
	$(function() {
		selectquery();
	});
</script>
</head>
<body>
<center><h2>AK-Finder - Retrieve Linked Architectural Data Example</h2></center>
<div id='menu' style="background-color: lightgreen;  font-size: 150%;">
	<center>
	<table style="width:100%; text-align: center;">
		<th>
			<td> <a href="index.php">Index</a> </td>
			<td> <b>Review interface</b> </td>
			<td> <a href="design.php">Design interface</a> </td>
			<td> <a href="dev.php">Development interface</a> </td>
		</th>	
	</table>
	<center>
</div>
<div id='editordiv' style="background-color: lightblue;">
	<h2>Review interface</h2>
	<b>Predefined SPARQL queries: </b> <i>(to adapt queries: change query in <a href="" onclick="$('#sendquery').focus(); return false;">SPARQL Query editor textbox</a> and press "Send Query"-button)</i>
	<ul>
	<li>Question 1: List ten development dependencies between implementation units. <input type="button" class="button" value="Query" onclick="predefined(1);"></li>
	<li>Question 2: Which implementation units and decisions are explicitly related to requirement <span id="Q2parameterfield"></span>?<input type="button"  class="button" value="Query" onclick="predefined(2);"></li>
	<li>Question 3: Which architectural patterns are described in the architecture?<input type="button"  class="button" value="Query" onclick="predefined(3);"></li>
	<ul>	<li>Adapted SPARQL query for question 3 - Architectural patterns, with additional context, links to wikipages, and links to context information from Linked Open Data on DBpedia.org.<input type="button"  class="button" value="Query" onclick="predefined(8);"></li>		</ul>
	<li>Question 4: Which functional requirements are related to non-functional requirement <span id="Q4parameterfield"></span>? <input type="button"  class="button" value="Query" onclick="predefined(4);"></li>
	<li>Question 5: Find ten wikipages in which the concerns of the stakeholders are addressed (not just listed).<input type="button"  class="button" value="Query" onclick="predefined(5);"></li>
	<!-- set DBPedia as endpoint + button - see information from DBpedia
	PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#> 
	PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#> 
	PREFIX dbo: <http://dbpedia.org/ontology/>
	SELECT * 
	WHERE { ?DBpedia dbo:abstract ?Abstract
	?DBpedia rdfs:comment ?Comment}   
	 -->
	</ul>
	<div id="resulttable">
	</div>
	<b><a id='refresh' href='http://softcode.nl/querytool/index.php'></a></b>
	<center>
	<br />
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