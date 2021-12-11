<?php

if (strpos(url(), "localhost")) {
    /**
     * CSS
     */
    $minCSS = new MatthiasMullie\Minify\CSS();
    $minCSS->add(__DIR__ . "/../../../shared/styles/styles.css");

    //theme CSS
    $cssDir = scandir(__DIR__ . "/../../../themes/" . CONF_VIEW_THEME . "/assets/css");
    foreach ($cssDir as $css) {
        $cssFile = __DIR__ . "/../../../themes/" . CONF_VIEW_THEME . "/assets/css/{$css}";
        if (is_file($cssFile) && pathinfo($cssFile)['extension'] == "css") {
            $minCSS->add($cssFile);
        }
    }

    //Minify CSS
    $minCSS->minify(__DIR__ . "/../../../themes/" . CONF_VIEW_THEME . "/assets/minify/style.css");

    /**
     * JS
     */
    $minJS = new MatthiasMullie\Minify\JS();

    //theme JS
    $jsDir = scandir(__DIR__ . "/../../../themes/" . CONF_VIEW_THEME . "/assets/js");
    foreach ($jsDir as $js) {
        $jsFile = __DIR__ . "/../../../themes/" . CONF_VIEW_THEME . "/assets/js/{$js}";
        if (is_file($jsFile) && pathinfo($jsFile)['extension'] == "js") {
            $minJS->add($jsFile);
        }
    }

    //Minify JS
    $minJS->minify(__DIR__ . "/../../../themes/" . CONF_VIEW_THEME . "/assets/minify/scripts.js");

    /**
     * HOME JS
     */
    $homeJS = new MatthiasMullie\Minify\JS();
    $homeDir = scandir(__DIR__ . "/../../../themes/" . CONF_VIEW_THEME . "/assets/js/home");
    foreach ($homeDir as $js) {
        $jsHomeFile = __DIR__ . "/../../../themes/" . CONF_VIEW_THEME . "/assets/js/home/{$js}";
        if (is_file($jsHomeFile) && pathinfo($jsHomeFile)['extension'] == "js") {
            $homeJS->add($jsHomeFile);
        }
    }
    $homeJS->minify(__DIR__ . "/../../../themes/" . CONF_VIEW_THEME . "/assets/minify/home.js");
}
