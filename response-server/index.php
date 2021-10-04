<?php
echo '
{
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
			"hashed": true, 
			"type": "email", 
			"identity": "sha256$d6ba8a422d6bdd254f6ce6edc87cc116bb978aa02f791487c59498092cef1067", 
			"salt": "f7929d13600c402a946a77cd4112bca7"
		} 
}';
?>