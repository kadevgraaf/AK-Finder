# RouLADE - Retrieve Linked Architectural Data Example #

## Intro ##

The RouLADE (Retrieve Linked Architectural Data Example) tool sends queries to a SPARQL query endpoint of a semantic wiki (ArchiMind currently, see below and https://github.com/kadevgraaf/ArchiMind ). 
The SPARQL queries retrieve architectural knowledge to support design and development activities and answer questions from an approach for architecture documentation review by the SEI.
The RouLADE exemplifies retrieval of architectural knowledge as Linked Open Data, and can be freely adapted/reused under the GPL license.

Archimind is a semantic wiki for Software Architecture (SA) documentation management and retrieval and was adapted from [OntoWiki] (http://aksw.org/Projects/OntoWiki.html) version 0.9.5. A concise overview of (part of the) adaptations and their rationale is given in paper [Klaas Andries de Graaf - "Annotating Software Documentation in Semantic Wikis](http://kadegraaf.nl/Annotating%20Software%20Documentation%20in%20Semantic%20Wikis%20-%20Klaas%20Andries%20de%20Graaf.pdf). See below for more references.
[https://github.com/AKSW/OntoWiki/wiki] provides detailed installation instructions for OntoWiki. These instructions also apply to the installation of ArchiMind.
[OntoWiki 1.0.0](https://github.com/AKSW/OntoWiki/releases) has been release recently - this release provides a SQARQL Query endpoint and is probably better for user experience, however, the ArchiMind adaptations for Software Architecture (SA) documentation management and retrieval are not yet implemented in this version (only 0.9.5 currently).

## Requirements ##

PHP

## License ##

RouLADE is licensed under the [GNU General Public License Version 2, June 1991](http://www.gnu.org/licenses/gpl-2.0.txt).

Code snippets adapted from http://graphite.ecs.soton.ac.uk/sparqllib/

Use of sparqllib.php
©2010-12 Christopher Gutteridge, University of Southampton.
Under LGPL license

## references ##

OntoWiki:

• http://aksw.org/Projects/OntoWiki.html

• http://ontowiki.net/

• https://github.com/AKSW/OntoWiki

• https://github.com/AKSW/OntoWiki/releases

ArchiMind:

• https://github.com/kadevgraaf/ - http://kadegraaf.nl/

• [Klaas Andries de Graaf - "Annotating Software Documentation in Semantic Wikis" - In Proceedings of the fourth workshop on Exploiting semantic annotations in information retrieval (ESAIR '11), pages 5-6., ACM, 2011. ](http://kadegraaf.nl/Annotating%20Software%20Documentation%20in%20Semantic%20Wikis%20-%20Klaas%20Andries%20de%20Graaf.pdf)

• [My PhD Thesis - "Ontology-based Software Architecture Documentation"](http://kadegraaf.nl/Klaas%20Andries%20de%20Graaf%20-%20PhD%20Thesis%20-%20Ontology-based%20Software%20Architecture%20Documentation.pdf)

• [Klaas Andries de Graaf, Peng Liang, Antony Tang, Hans van Vliet - "How Organisation of Architecture Documentation Affects Architectural Knowledge Retrieval" - Science of Computer Programming, Volume 121, Pages 75-99 Elsevier, June 2016. ](http://kadegraaf.nl/How%20Organisation%20of%20Architecture%20Documentation%20Affects%20Architectural%20Knowledge%20Retrieval%20-%20Klaas%20Andries%20de%20Graaf,%20Peng%20Liang,%20Antony%20Tang,%20Hans%20van%20Vliet.pdf)

• [Klaas Andries de Graaf, Peng Liang, Antony Tang, Hans van Vliet - "Supporting Architecture Documentation: A Comparison of Two Ontologies for Knowledge Retrieval" - In International Conference on Evaluation and Assessment in Software Engineering (EASE), pages 3:1--3:10, ACM, 2015. ](http://kadegraaf.nl/Supporting%20Architecture%20Documentation%20-%20A%20Comparison%20of%20Two%20Ontologies%20for%20Knowledge%20Retrieval%20-%20Klaas%20Andries%20de%20Graaf,%20Peng%20Liang,%20Antony%20Tang,%20Hans%20van%20Vliet.pdf)

• [Klaas Andries de Graaf, Peng Liang, Antony Tang, Hans van Vliet - "The Impact of Prior Knowledge on Searching in Software Documentation" - In Proceedings of the 2014 ACM symposium on Document engineering (DocEng), pages 189-198, ACM, 2014. ](http://kadegraaf.nl/The%20impact%20of%20prior%20knowledge%20on%20searching%20in%20software%20documentation%20-%20Klaas%20Andries%20de%20Graaf,%20Peng%20Liang,%20Antony%20Tang,%20Hans%20van%20Vliet.pdf)

• [Klaas Andries de Graaf, Peng Liang, Antony Tang, Willem van Hage, Hans van Vliet - "An Exploratory Study on Ontology Engineering for Software Architecture Documentation" - Computers in Industry, Vol. 65, nr. 7, pages 1053-1064, Elsevier, 2014. ](http://kadegraaf.nl/An%20exploratory%20study%20on%20ontology%20engineering%20for%20software%20architecture%20documentation%20-%20Klaas%20Andries%20de%20Graaf,%20Peng%20Liang,%20Antony%20Tang,%20Hans%20van%20Vliet.pdf)

• [Klaas Andries de Graaf, Antony Tang, Peng Liang, Hans van Vliet - "Ontology-based Software Architecture Documentation" - In Proceedings of the Joint 10th Working IEEE/IFIP Conference on Software Architecture & 6th European Conference on Software Architecture (WICSA/ECSA), pages 121-130, IEEE Computer Society, 2012. ](http://kadegraaf.nl/Ontology-based%20Software%20Architecture%20Documentation%20-%20Klaas%20Andries%20de%20Graaf,%20Antony%20Tang,%20Peng%20Liang,%20Hans%20van%20Vliet.pdf.pdf)
