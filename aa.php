<?php

$page_title = 'Teacherx';
?>

<?php include ('./inc/header.inc.php');  ?>   

   
   <?php

   $string = 'this is what i belived in https://www.youtube.com/watch?v=xuaLkwaTMEc';

//    function convertYoutube($string) {
//     return preg_replace(
//         "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
//         "<iframe src=\"//www.youtube.com/embed/$2\" allowfullscreen></iframe>",
//         $string
//     );
// }


// //echo convertYoutube($string);

// echo preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i","<iframe width=\"420\" height=\"315\" src=\"//www.youtube.com/embed/$1\" frameborder=\"0\" allowfullscreen></iframe>",$string);


// preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i","<iframe width=\"420\" height=\"315\" src=\"//www.youtube.com/embed/$1\" frameborder=\"0\" allowfullscreen></iframe>",$post_details['description']);




$width = '100%';
$height = '450px';
function getYoutubeEmbedUrl($string)
{
     $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
     $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';

    if (preg_match($longUrlRegex, $string, $matches)) {
        $youtube_id = $matches[count($matches) - 1];
    }

    if (preg_match($shortUrlRegex, $string, $matches)) {
        $youtube_id = $matches[count($matches) - 1];
    }
    return 'https://www.youtube.com/embed/' . $youtube_id ;
}

$youtube_string = getYoutubeEmbedUrl($string);




//$url = 'https://www.youtube.com/watch?v=u9-kU7gfuFA';
//preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $string, $matches);
//$id = $matches[1];
//$width = '800px';
//$height = '450px';

 ?>

<iframe id="ytplayer" type="text/html" width="<?php echo $width ?>" height="<?php echo $height ?>"
src="<?php echo $youtube_string ?>?rel=0&showinfo=0&color=white&iv_load_policy=3"
frameborder="0" allowfullscreen></iframe> 
  


   <?php include ('./inc/footer.inc.php');  ?> 