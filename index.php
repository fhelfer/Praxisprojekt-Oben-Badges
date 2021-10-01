<!DOCTYPE html>
<html lang="en" data-color-mode="auto" data-light-theme="light" data-dark-theme="dark">
<head>
    <title>Badge Issue</title>
</head>
<body>
<h1>Hello World!</h1>
<form action="submit.php" method="post" enctype="multipart/form-data">
    <input type="file" name="test"><br>
    <input type="submit" value="Submit">
</form>
</body>
<?php
$ch = curl_init("https://api.eu.badgr.io/public/badges/jyp0S8PPQF-tr8l4rDB7FA");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, 0);
$data = curl_exec($ch);
curl_close($ch);
echo $data;

$ch = curl_init("https://api.eu.badgr.io/public/badges/jyp0S8PPQF-tr8l4rDB7FA");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, 0);
$data = curl_exec($ch);
curl_close($ch);
echo $data;

$ch = curl_init("https://api.eu.badgr.io/public/badges/jyp0S8PPQF-tr8l4rDB7FA/image");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, 0);
$data = curl_exec($ch);
curl_close($ch);
echo $data;


$ch = curl_init("https://api.eu.badgr.io/public/assertions/zaogYzLMTEOEhVjkinUzgw?identity__email=fhelfer%40databay.de");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, 0);
$data = curl_exec($ch);
curl_close($ch);
echo $data;

$ch = curl_init("localhost:5000/results");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'data={
		"@context": "https://w3id.org/openbadges/v2",
		"type": "Assertion",
		"id": "http://helferfa.bplaced.net/Uni/Praxisprojekt",
		"badge": "http://helferfa.bplaced.net/Uni/Praxisprojekt",
		"image": "https://api.eu.badgr.io/public/assertions/gdPr6R62S1Cy9w8HusCI6Q/image",
		"verification": { "type": "HostedBadge" },
		"issuedOn": "2020-09-23T22:00:00+00:00",
		"issuer": "http://helferfa.bplaced.net/Uni/Praxisprojekt",
		"name": "Badge 1",
		"description": "Beschreibung",
		"criteria": "http://helferfa.bplaced.net/Uni/Praxisprojekt",
		"recipient":
		{
			"hashed": false,
			"type": "email",
			"identity": "sha256$d6ba8a422d6bdd254f6ce6edc87cc116bb978aa02f791487c59498092cef1067",
			"salt": "f7929d13600c402a946a77cd4112bca7"
		}
}"');
$data = curl_exec($ch);
curl_close($ch);
echo $data;
?>
