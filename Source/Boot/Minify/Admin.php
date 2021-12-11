<?php

if (strpos(url(), "localhost")) {
    //Login CSS
    $loginCSS = new MatthiasMullie\Minify\CSS();
    $loginCSS->add(__DIR__ . "/../../../shared/styles/styles.css");
    $loginCSS->add(__DIR__ . "/../../../themes/" . CONF_VIEW_ADMIN . "/assets/css/login.css");
    $loginCSS->minify(__DIR__ . "/../../../themes/" . CONF_VIEW_ADMIN . "/assets/minify/login.css");

    // Login JS
    $loginJS = new MatthiasMullie\Minify\JS();
    $loginJS->add(__DIR__ . "/../../../shared/scripts/jquery.min.js");
    $loginJS->add(__DIR__ . "/../../../shared/scripts/jquery-ui.min.js");
    $loginJS->add(__DIR__ . "/../../../themes/" . CONF_VIEW_ADMIN . "/assets/js/login.js");
    $loginJS->minify(__DIR__ . "/../../../themes/" . CONF_VIEW_ADMIN . "/assets/minify/login.js");

    //Admin CSS
    $adminCSS = new MatthiasMullie\Minify\CSS();
    $adminCSS->add(__DIR__ . "/../../../shared/styles/styles.css");
    $adminCSS->add(__DIR__ . "/../../../themes/" . CONF_VIEW_ADMIN . "/assets/css/admin.css");
    $adminCSS->minify(__DIR__ . "/../../../themes/" . CONF_VIEW_ADMIN . "/assets/minify/admin.css");

    //Admin JS
    $adminJS = new MatthiasMullie\Minify\JS();
    $adminJS->add(__DIR__ . "/../../../shared/scripts/jquery.min.js");
    $adminJS->add(__DIR__ . "/../../../shared/scripts/jquery.form.js");
    $adminJS->add(__DIR__ . "/../../../shared/scripts/jquery-ui.min.js");
    $adminJS->add(__DIR__ . "/../../../shared/scripts/jquery.mask.js");
    $adminJS->add(__DIR__ . "/../../../themes/" . CONF_VIEW_ADMIN . "/assets/js/admin.js");
    $adminJS->minify(__DIR__ . "/../../../themes/" . CONF_VIEW_ADMIN . "/assets/minify/admin.js");

    //TinyMCE JS
    $tinyMCEJS = new MatthiasMullie\Minify\JS();
    $tinyMCEJS->add(__DIR__ . "/../../../themes/" . CONF_VIEW_ADMIN . "/assets/js/tinymce.js");
    $tinyMCEJS->minify(__DIR__ . "/../../../themes/" . CONF_VIEW_ADMIN . "/assets/minify/tinymce.js");
}
