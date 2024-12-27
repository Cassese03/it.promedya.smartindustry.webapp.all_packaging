<?php $left = array(); $top = array();$width = array();$height = array();$font_sizes = array(); $text_aligns = array();$valore = array(); ?>

<?php
$campi = json_decode($report->json);

foreach($campi->objects as $textbox){

    $var = $textbox->text;
    $var = \App\Http\Controllers\StampaController::compile_string($var,$query);
    array_push($left,$textbox->left);
    array_push($top,$textbox->top);
    array_push($width,$textbox->width * $textbox->scaleX);
    array_push($height,$textbox->height * $textbox->scaleY);
    array_push($font_sizes,$textbox->fontSize);
    array_push($text_aligns,$textbox->textAlign);

    array_push($valore,$var);
}
?>




<?php $len = sizeof($left); ?>

<?php for($j = 0;$j<$len;$j++){ ?>
<div style="position:absolute;top:<?php echo $top[$j]; ?>px;left:<?php echo $left[$j] ?>px;width:<?php echo $width[$j] ?>px;height:<?php echo $height[$j] ?>px;font-size:<?php echo $font_sizes[$j] ?>px;text-align:<?php echo $text_aligns[$j] ?>;font-weight: bold;"><?php echo $valore[$j] ?></div>
<?php } ?>
