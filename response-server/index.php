<?php
echo '
{
    "@context":"https://w3id.org/openbadges/v2",
    "type":"Assertion",
    "id":"http://helferfa.bplaced.net/Uni/Praxisprojekt/index.php",
    "badge":"http://helferfa.bplaced.net/Uni/Praxisprojekt/badge.php",
    "image":"http://helferfa.bplaced.net/Uni/Praxisprojekt/badge_img.php",
    "verification":{"type":"HostedBadge"},
    "narrative":"You won!",
    "issuedOn":"2021-09-12T22:00:00+00:00",
    "recipient":{
        "hashed":true,
        "type":"email",
        "identity":"sha256$d6ba8a422d6bdd254f6ce6edc87cc116bb978aa02f791487c59498092cef1067",
        "salt":"f7929d13600c402a946a77cd4112bca7"
        },
    "extensions:recipientProfile":{
        "@context":"https://openbadgespec.org/extensions/recipientProfile/context.json",
        "type":["Extension","extensions:RecipientProfile"],
        "name":"Fabian"
        }
    }';
?>