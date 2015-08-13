<?php 

function base_url($url = '',$atRoot=FALSE, $atCore=FALSE, $parse=FALSE){
    if (isset($_SERVER['HTTP_HOST'])) {
        $http = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http';
        $hostname = $_SERVER['HTTP_HOST'];
        $dir =  str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);

        $core = preg_split('@/@', str_replace($_SERVER['DOCUMENT_ROOT'], '', realpath(dirname(__FILE__))), NULL, PREG_SPLIT_NO_EMPTY);
        $core = $core[0];

        $tmplt = $atRoot ? ($atCore ? "%s://%s/%s/" : "%s://%s/") : ($atCore ? "%s://%s/%s/" : "%s://%s%s");
        $end = $atRoot ? ($atCore ? $core : $hostname) : ($atCore ? $core : $dir);
        $base_url = sprintf( $tmplt, $http, $hostname, $end );
    }
    else $base_url = 'http://localhost/';

    if ($parse) {
        $base_url = parse_url($base_url);
        if (isset($base_url['path'])) if ($base_url['path'] == '/') $base_url['path'] = '';
    }

    return $base_url.$url;
}

function resize_marker_with_image($file,$crop=FALSE) {
    list($newwidth, $newheight) = getimagesize($file);

    list($width, $height) = getimagesize('mark.png');

    $src = imagecreatefrompng('mark.png');
    $dst = imagecreatetruecolor($newwidth, $newheight);

	imagealphablending( $dst, false );
	imagesavealpha( $dst, true );
    
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
    imagepng($dst,'mark_thumb.png');

}

function create_image($image){

resize_marker_with_image($image);

 // Load the stamp and the photo to apply the watermark to
$im = imagecreatefromjpeg($image);
$stamp = imagecreatefrompng('mark_thumb.png');

// Set the margins for the stamp and get the height/width of the stamp image
$marge_right = 0;
$marge_bottom = 0;
$sx = imagesx($stamp);
$sy = imagesy($stamp);

// Copy the stamp image onto our photo using the margin offsets and the photo 
// width to calculate positioning of the stamp. 
imagecopy($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));

// Output and free memory
header('Content-type: image/png');
// Save the image to file and free memory
$new_image = $image.'.micorosft';
imagepng($im,$new_image);
chmod($new_image,0777);
imagedestroy($im);

return explode('/',$new_image)[1];
}

function get($name){
    return filter_input(INPUT_GET, $name, FILTER_SANITIZE_ENCODED);
}

