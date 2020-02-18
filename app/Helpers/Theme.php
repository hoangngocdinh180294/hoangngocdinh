<?php
namespace App\Helpers;
use Illuminate\Support\Str;
class Theme
{
    static public function view($view, $data=[]) {
        $viewPath = self::viewPath($view);
        return view($viewPath, $data);
    }

    static public function viewPath($view) {
        return 'themes.' . env('THEME', 'mspace') . '.' . $view;
    }

    static public function assetsPath($path) {
        return asset('themes/' . env('THEME', 'mspace') . '/' . $path);
    }
    static public function truncateWords($text, $width = 41, $truncateString = ' ...') {
        // if (sfConfig::get('sf_escaping_method') == 'ESC_SPECIALCHARS') {
            $text = htmlspecialchars_decode($text, ENT_QUOTES);
        // }
    
        // if (is_array($text)) {
        //     throw new dmException('Can not truncate an array: ' . implode(', ', $text));
        // }
    
        $text = (string)$text;
    
        if (mb_strlen($text, "UTF-8") > $width) {
            $text = $text . " ";
            $text = mb_substr($text, 0, $width, "UTF-8");
            $p = mb_strrpos($text, " ", "UTF-8");
            $text = mb_substr($text, 0, $p, "UTF-8");
            $text = $text . $truncateString;
        }
        return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
    }
}
