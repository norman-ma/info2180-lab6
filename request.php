<?php
// accept a term (keyword)
// respond with a value
$query = $_GET['q'];
$all= $_GET['all'];

    
$xmldata = '<?xml version="1.0" encoding="UTF-8"?>
<entries>
    <definition name="definition" author="Tiffany">
    A statement of the exact meaning of a word, especially in a dictionary.
    </definition>
    
    <definition name="bar" author="Michael">
    A place that sells alcholic beverages
    </definition>
    
    <definition name="ajax" author="LeJeanna">
    Technique which involves the use of javascript and xml (or JSON)
    </definition>
    
    <definition name="html" author="Jon">
    The standard markup language for creating web pages and web applications.
    </definition>
    
    <definition name="css" author="Anthony">
    A style sheet language used for describing the presentation of a document written in a markup language.
    </definition>
    
    <definition name="javascript" author="Norman">
    A lightweight, interpreted programming language with first-class functions that adds interactivity to your website.
    </definition>
    
    <definition name="php" author="Fife">
    A server-side scripting language, and a powerful tool for making dynamic and interactive websites
    </definition>
</entries>';

header('Content-Type: text/xml');
$xmlOutput = new SimpleXMLElement($xmldata);

if($all=='true'){
    print $xmlOutput->asXML();
}else{
    foreach($xmlOutput->definition as $def){
        if((string)$def['name'] == $query){
            $x = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><entries>'.$def->asXML().'</entries>');
            print $x->asXML();
            break;
        }
    }
}