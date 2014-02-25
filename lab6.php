<!DOCTYPE html>
<?xml version="1.0" encoding="iso-8859-1"?>
<html>
<head>
<title>Lab 6 Assignment</title>
</head>
<body>
<?PHP
$file = file_get_contents('./fortune500.txt');

$obj = json_decode($file);

$doc = new DOMDocument('1.0','iso-8859-1');
$doc->formatOutput = true;

//$xslt = $doc->createProcessingInstruction('xml-stylesheet','type="text/xsl" href="format.xsl"');
//$doc->appendChild($xslt);

$root = $doc->createElement("Fortune500");
$doc->appendChild($root);

foreach($obj->result as $item)
  {
    $company = $doc->createElement('Company', $item->Company);
    $company->appendChild($doc->createElement('name',$item->Company));
    $company->appendChild($doc->createElement('year',$item->Year));
    $company->appendChild($doc->createElement('rank',$item->Rank));
    $company->appendChild($doc->createElement('revenue',$item->Revenue));
    $company->appendChild($doc->createElement('profit',$item->Profit));
    $root->appendChild($company);
  }

$XSL = new DOMDocument();
$XSL->load('format.xsl');
$xslt = new XSLTProcessor();
$xslt->importStylesheet($XSL);

echo $xslt->transformToXML($doc);

?>
</body>
</html>