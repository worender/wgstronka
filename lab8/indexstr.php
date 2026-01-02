<?php
$url = "https://sprzetowo.pl/laptopy/1/default/1/f_producer_157/1";

$options = [
    "http" => [
        "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36\r\n"
    ]
];

$context = stream_context_create($options);
$html = file_get_contents($url, false, $context);

if ($html === FALSE) {
    die("Nie udało się pobrać strony.");
}

libxml_use_internal_errors(true);
$dom = new DOMDocument();
$dom->loadHTML($html);

// 1. Tworzymy obiekt XPath do przeszukiwania dokumentu
$xpath = new DOMXPath($dom);

// 2. Szukamy wszystkich elementów (np. div), które mają klasę 'product-list'
// Składnia XPath dla klasy jest specyficzna:

$productLinks = $xpath->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' product-tile ')]");


// 3. Sprawdzamy, czy cokolwiek znaleźliśmy
if ($productLinks->length > 0) {
    // Bierzemy pierwszy znaleziony kontener (listę produktów)
    $content = $productLinks->item(1);

    $price = $xpath->query(".//div[contains(@class, 'price')]", $content);
    echo $price;

    // 4. Szukamy linków <a> tylko wewnątrz tego kontenera
    $links = $content->getElementsByTagName('a');

    foreach ($links as $link) {
        $href = $link->getAttribute('href');
        $text = trim($link->nodeValue);

        // Filtrujemy tylko linki do produktów (zawierają /laptopy/ w URL)
        // Ignorujemy linki do filtrów, klas, zwrotów itp.
        if (!empty($text) && !empty($href) && 
            (strpos($href, '/laptopy/apple-') !== false || strpos($href, '/laptopy/') !== false) &&
            strpos($href, '/i/Opis-') === false && 
            strpos($href, '/Zwroty-') === false &&
            strpos($href, '/default/') === false) {
            
            // Naprawa linków relatywnych na absolutne
            if (!str_starts_with($href, 'http')) {
                $href = "https://sprzetowo.pl" . $href;
            }
            echo "Produkt: <b>$text</b> -> Link:<a href='$href'>Link do aukcji</a> <br>";
        }
    }
} else {
    echo "Nie znaleziono sekcji 'product-list'.";
}

libxml_clear_errors();
?>