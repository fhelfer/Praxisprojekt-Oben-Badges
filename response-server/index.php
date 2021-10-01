<?php
echo '
{
		"@context": "https://w3id.org/openbadges/v2", 
		"type": "Assertion", 
		"id": "http://localhost.php7-2/badges-prototype/response-server/", 
		"badge": "http://localhost.php7-2/badges-prototype/response-server/", 
		"image": "https://api.eu.badgr.io/public/assertions/gdPr6R62S1Cy9w8HusCI6Q/image", 
		"verification": { "type": "HostedBadge" }, 
		"issuedOn": "2020-09-23T22:00:00+00:00", 
		"issuer": "http://localhost.php7-2/badges-prototype/response-server/",
		"name": "Badge 1",
		"description": "Beschreibung",
		"criteria": "http://localhost.php7-2/badges-prototype/response-server/",
		"recipient": 
		{ 
		    "name": "Fabian",
			"hashed": true, 
			"type": "email", 
			"identity": "sha256$953813097ef0f67bda008106a023270d8720b8c764a5db9c8789e158dec28429", 
			"salt": "2a5a41a47e804637832ade92cee6844c" 
		} 
}';
?>