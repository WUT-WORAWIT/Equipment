<?php
include('qrlib.php');

   // how to save PNG codes to server

   $tempDir = EXAMPLE_TMP_SERVERPATH;

   $codeContents = 'This Goes From File';

   // we need to generate filename somehow,
   // with md5 or with database ID used to obtains $codeContents...
   $fileName = md5($codeContents).'.png';

   $pngAbsoluteFilePath = 'img/'.$fileName;
   $urlRelativeFilePath = 'img/'.$fileName;

   // generating
   if (!file_exists($pngAbsoluteFilePath)) {
       QRcode::png($codeContents, $pngAbsoluteFilePath);
       echo 'File generated!';
       echo '<hr />';
   } else {
       echo 'File already generated! We can use this cached file to speed up site on common codes!';
       echo '<hr />';
   }

   echo 'Server PNG File: '.$pngAbsoluteFilePath;
   echo '<hr />';

   // displaying
   echo '<img src="'.$urlRelativeFilePath.'" />';
?>
