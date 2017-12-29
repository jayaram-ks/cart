<?php
function pr($arry){
    echo "<pre style='font-size:11px;line-height:12px;letter-spacing:.5px;font-family: Arial,Helvetica Neue,Helvetica,sans-serif;background-color:#ccc; '>";
    print_r($arry);
    echo "</pre>";
}
function prx($arry)
{
    echo "<pre style='font-size:12px;'>";
    print_r($arry);
    echo "</pre>";
    exit;
}
?>
