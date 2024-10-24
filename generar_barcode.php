<?php
require 'vendor/autoload.php'; 

use Picqer\Barcode\BarcodeGeneratorHTML;

function generarCodigoBarra($nie) {
    $generator = new BarcodeGeneratorHTML();
    return $generator->getBarcode($nie, $generator::TYPE_CODE_128);
}
