<?php
// (A) OPEN IMAGE
$img = imagecreatefromjpeg('/customers/e/a/7/youtimizerthree.com/httpd.www/image-pdf/BG_Certificate_ver1.jpg');

// (B) WRITE TEXT
$white = imagecolorallocate($img, 0, 0, 0);
$txt = "M. Tehseen Javed";
$font = "arial.ttf"; 

// THE IMAGE SIZE
$width = imagesx($img);
$height = imagesy($img);

  $image_p = imagecreatetruecolor($width, $height);
  imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width, $height);
  
$stamp = imagecreatefrompng('/customers/e/a/7/youtimizerthree.com/httpd.www/image-pdf/r-logo.png');

// Set the margins for the stamp and get the height/width of the stamp image
$sx = imagesx($stamp) ;
$sy = imagesy($stamp) ;

$centerX = CEIL(($width - $sx) / 2);
$center_Width_s = $centerX<0 ? 0 : $centerX;
$centerY = CEIL(($height - $sy) / 5);
$center_height_s = $centerY<0 ? 0 : $centerY;

// Copy the stamp image onto our photo using the margin offsets and the photo 
// width to calculate positioning of the stamp. 
imagecopy($img, $stamp, 
		  ($center_Width_s - 0), 
		  ($center_height_s - 0), 
		  0, 0, 
		  $sx, $sy
		  );
  
//====================================================================================  
// THE TEXT SIZE
$text_size = imagettfbbox(12, 0, $font, $txt);
$text_width = max([$text_size[2], $text_size[4]]) - min([$text_size[0], $text_size[6]]);
$text_height = max([$text_size[5], $text_size[7]]) - min([$text_size[1], $text_size[3]]);

// CENTERING THE TEXT BLOCK
$centerX = CEIL(($width - ($text_width*4)) / 2);
$centerX = $centerX<0 ? 0 : $centerX;
$centerY = CEIL(($height - ($text_height - 200)) / 2);
$centerY = $centerY<0 ? 0 : $centerY;
imagettftext($img, 50, 0, $centerX, $centerY, $white, $font, $txt);

//===============================================================

$txt = 'TOTAL DEPOSIT 10,000 FROM 01.11.2020';
$text_size = imagettfbbox(12, 0, $font, $txt);
$text_width = max([$text_size[2], $text_size[4]]) - min([$text_size[0], $text_size[6]]);
$text_height = max([$text_size[5], $text_size[7]]) - min([$text_size[1], $text_size[3]]);

$centerX = CEIL(($width - ($text_width + 400)) / 2);
$centerX = $centerX<0 ? 0 : $centerX;
$centerY = CEIL(($height - ($text_height - 350)) / 2);
$centerY = $centerY<0 ? 0 : $centerY;
imagettftext($img, 30, 0, $centerX, $centerY, $white, $font, $txt);

//===============================================================

$txt = '2020';
$text_size = imagettfbbox(12, 0, $font, $txt);
$text_width = max([$text_size[2], $text_size[4]]) - min([$text_size[0], $text_size[6]]);
$text_height = max([$text_size[5], $text_size[7]]) - min([$text_size[1], $text_size[3]]);

$centerX = CEIL(($width - ($text_width - 250)) / 2);
$centerX = $centerX<0 ? 0 : $centerX;
$centerY = CEIL(($height - ($text_height - 560)) / 2);
$centerY = $centerY<0 ? 0 : $centerY;
imagettftext($img, 25, 0, $centerX, $centerY, $white, $font, $txt);

// (C) OUTPUT IMAGE
header('Content-type: image/jpeg');
imagejpeg($img);
imagedestroy($img);