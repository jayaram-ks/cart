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
if (! function_exists('words')) {
    /**
     * Limit the number of words in a string.
     *
     * @param  string  $value
     * @param  int     $words
     * @param  string  $end
     * @return string
     */
    function words($value, $words = 100, $end = '...')
    {
        return \Illuminate\Support\Str::words($value, $words, $end);
    }
}

?>
