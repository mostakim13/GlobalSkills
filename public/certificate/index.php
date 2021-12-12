<?php
header('content-type:image/jpeg');
$font="Monotype Corsiva.TTF";
$image=imagecreatefromjpeg("certificate.jpg");
$color=imagecolorallocate($image,19,21,22);
$name="Salman Sifat";
imagettftext($image,25,0,400,325,$color,$font,$name);
$date="24/10/2021";
imagettftext($image,15,0,130,490,$color,$font,$date);
$course_title="Project Management Professional (PMP) 7th Edition  .";
imagettftext($image,15,0,300,354,$color,$font,$course_title);

imagejpeg($image);

imagedestroy($image);
 ?>
