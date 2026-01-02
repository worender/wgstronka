<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Laptopy</title>
</head>
<body>
    <div id="przyciski">
    <button class="producer-button" onClick="filterByProducer('Apple')">Apple</button>
    <button class="producer-button" onClick="filterByProducer('Dell')">Dell</button>
    <button class="producer-button" onClick="filterByProducer('HP')">HP</button>
    <button class="producer-button" onClick="filterByProducer('Acer')">Acer</button>
    </div>
    
<script>
function filterByProducer(producer) {
    document.cookie = "producer=" + producer + ";";
    location.reload();
}
</script>
    
<?php
$urlApple = "https://sprzetowo.pl/laptopy/1/default/1/f_producer_157/1";
$urlDell = "https://sprzetowo.pl/laptopy/1/default/1/f_producer_23/1";
$urlHP = "https://sprzetowo.pl/laptopy/1/default/1/f_producer_24/1";
$urlAcer = "https://sprzetowo.pl/laptopy/1/default/1/f_producer_33/1";

if(isset($_COOKIE['producer'])){
    $producer = $_COOKIE['producer'];
    switch($producer){
        case 'Apple':
            $url = $urlApple;
            break;
        case 'Dell':
            $url = $urlDell;
            break;
        case 'HP':
            $url = $urlHP;
            break;
        case 'Acer':
            $url = $urlAcer;
            break;
        default:
            $url = $urlApple; // Domyślny URL
    }
} else {
    $url = $urlApple; // Domyślny URL
}

$options = [
    "http" => [
        "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36\r\n"
    ]
];

$context = stream_context_create($options);
$html = file_get_contents($url, false, $context);

if ($html === FALSE) {
    echo("Nie udało się pobrać strony.");
}
libxml_use_internal_errors(true);
$dom = new DOMDocument();
$dom->loadHTML($html);

$productTile = $dom->getElementsByTagName('product-tile');

echo "<div id='produkty'>";
if($productTile->length > 0){
    foreach($productTile as $tile){
        $produkt = $tile->getAttribute('name');
        $produkt = trim($produkt);

        $cena = $tile->getAttribute('price');
        $cena = trim($cena);

        $link = $tile->getElementsByTagName('a')->item(0)->getAttribute('href');
        $link = trim($link);
        $link = "https://sprzetowo.pl" . $link;

        echo "<div class='product'>
                <p class='product-name'>$produkt</p>
                <p class='product-price'>Cena: $cena</p>
                <a class='product-link' href='$link'>Link do aukcji</a>
             </div>";
    }
    
}else{
    echo "Nie znaleziono elementów product-tile.";
}
echo "</div>";
?>
</body>
</html>