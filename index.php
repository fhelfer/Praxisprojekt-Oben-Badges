<!DOCTYPE html>
<html lang="en" data-color-mode="auto" data-light-theme="light" data-dark-theme="dark">
<head>
    <title>Badge Issue</title>

    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.7.4/dist/css/uikit.min.css" />
    <link rel="stylesheet" href="./style.css" />
    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.7.4/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.7.4/dist/js/uikit-icons.min.js"></script>
</head>
<body style="border-color: black !important;">
<div class="uk-card-default uk-card-hover uk-width-1-2@m">
    <div class="uk-card-header">
        <div class="uk-grid-small uk-flex-middle" uk-grid>
            <div class="uk-width-expand">
                <h3 class="uk-card-title uk-margin-remove-bottom">Create Your New Badge</h3>
            </div>
        </div>
    </div>
    <div class="uk-card-body">
    <form action="/" method="post" enctype="multipart/form-data" >
        <div class="uk-form-group">
            <label for="fileInput">Id</label>
            <input type="text" name="id" id="idInput" placeholder="Input Your Badge ID URL" class="uk-input" required>
        </div>
        <div class="uk-form-group">
            <label for="fileInput">Issuer</label>
            <input type="text" name="issuer" id="issuerInput" placeholder="Input Your Issuer URL" class="uk-input" required>
        </div>
        <div class="uk-form-group">
            <label for="fileInput">Name</label>
            <input type="text" name="name" id="nameInput" placeholder="Input Yout Badge Name" class="uk-input" required>
        </div>
        <div class="uk-form-group">
            <label for="fileInput">Criteria URL</label>
            <input type="text" name="criteria" id="criteriaInput" placeholder="Input Your Criteria URL" class="uk-input" required>
        </div>

        <div class="uk-form-group">
            <label for="fileInput">Badge Image</label>
            <input type="file" name="test" id="fileInput" required>
        </div>
            <input type="submit" class="uk-button-primary" value="Submit">
        </form>
    </div>
</div>

<div class="uk-card-default uk-card-hover uk-width-1-2@m">
    <div class="uk-card-header">
        <div class="uk-grid-small uk-flex-middle" uk-grid>
            <div class="uk-width-expand">
                <h3 class="uk-card-title uk-margin-remove-bottom">Create Your New Badge</h3>
            </div>
        </div>
    </div>
    <div class="uk-card-body">
</body>
<?php
$ch = curl_init("https://api.eu.badgr.io/public/badges/jyp0S8PPQF-tr8l4rDB7FA");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, 0);
$data = curl_exec($ch);
curl_close($ch);


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

    $file = './assets/example.png';
    if (file_exists($file)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.basename($file));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        ob_clean();
        flush();
        readfile($file);
        exit;
    }
} else {
    echo "No Post Request";
}

?>
