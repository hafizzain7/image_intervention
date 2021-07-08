


<?php
/**
 * 
 * Generate Thumbnail using Imagick class
 *  
 * @param string $img
 * @param string $width
 * @param string $height
 * @param int $quality
 * @return boolean on true
 * @throws Exception
 * @throws ImagickException
 */
function generateThumbnail($img, $width, $height, $quality = 90)
{
    if (is_file($img)) {
        $imagick = new Imagick(realpath($img));
        $imagick->setImageFormat('jpeg');
        $imagick->setImageCompression(Imagick::COMPRESSION_JPEG);
        $imagick->setImageCompressionQuality($quality);
        $imagick->thumbnailImage($width, $height, false, false);
       
      
        $filename_no_ext = explode('.', $img);
    
        if (file_put_contents($filename_no_ext[0] . '_thumb' . '.jpg', $imagick) === false) {
            throw new Exception("Could not put contents.");
        }
        return true;
    }
    else {
        throw new Exception("No valid image provided with {$img}.");
    }
}

// example usage
try {
    generateThumbnail('JB.jpg', 100, 50, 65);
}
catch (ImagickException $e) {
    echo $e->getMessage();
}
catch (Exception $e) {
    echo $e->getMessage();
}




