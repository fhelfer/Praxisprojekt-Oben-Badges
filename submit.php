<?php

function addTextToPngFile($pngSrc,$pngTarget,$key,$text) {
    $chunk = phpTextChunk($key,$text);
    $png = file_get_contents($pngSrc);
    $png2 = addPngChunk($chunk,$png);
    file_put_contents($pngTarget,$png2);
}

// creates a iTXt chunk with given key and text (iso8859-1)
function phpTextChunk($key,$text) {
    $chunktype = "iTXt";
    $chunkdata = $key . "\0" . $text;
    $crc = pack("N", crc32($chunktype . $chunkdata));
    $len = pack("N",strlen($chunkdata));
    return $len .  $chunktype  . $chunkdata . $crc;
}

// inserts chunk before IEND chunk (last 12 bytes)
function addPngChunk($chunk,$png) {
    $len = strlen($png);
    return substr($png,0,$len-12) . $chunk . substr($png,$len-12,12);
}

if(isset($_FILES['test'])) {
//    $fileOpen = fopen($_FILES['test']['tmp_name'], "rb");
//    $inhalt = fread($fileOpen, filesize($_FILES['test']['tmp_name']));
//    fclose($fileOpen);

    addTextToPngFile(
        $_FILES['test']['tmp_name'],
        './assets/example.png',
        'openbadges',
        '{ 
        "@context": "https://w3id.org/openbadges/v2", 
        "type": "Assertion", 
        "id": "http://helferfa.bplaced.net/Uni/Praxisprojekt", 
        "badge": "http://helferfa.bplaced.net/Uni/Praxisprojekt", 
        "image": "https://api.eu.badgr.io/public/assertions/gdPr6R62S1Cy9w8HusCI6Q/image", 
        "verification": { "type": "HostedBadge" }, 
        "issuedOn": "2020-09-23T22:00:00+00:00", 
        "recipient": { 
            "hashed": true, 
            "type": "email", 
            "identity": "sha256$953813097ef0f67bda008106a023270d8720b8c764a5db9c8789e158dec28429", 
            "salt": "2a5a41a47e804637832ade92cee6844c" 
        } 
        }');
    $inhalt = file_get_contents('./assets/example.png');
    echo $inhalt;
} else {
    echo "No";
}