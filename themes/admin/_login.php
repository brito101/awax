<!--
What are you snooping around here?!
Feel free to inspect the code. This layer doesn't have much, but it's pretty clean!!
Good journey!
@born October 7, 2020
@author Rodrigo Brito <contato@rodrigobrito.dev.br>
-->

<!DOCTYPE html>
<html lang="pt-br" itemscope itemtype="http://schema.org/WebPage">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="robots" content="noindex" />
    <meta name="AdsBot-Google" content="noindex" />
    <meta name="Googlebot" content="noindex">
    <?= $head; ?>
    <link rel="stylesheet" href="<?= theme("/assets/minify/login.css", CONF_VIEW_ADMIN); ?>" />
    <link rel="icon" type="image/png" href="<?= theme("/assets/images/logo.png", CONF_VIEW_ADMIN); ?>" />
</head>

<body>
    <h1 class="hide"><?= CONF_SITE_NAME; ?>: Área de adminstração</h1>
    <div class="ajax_load">
        <div>
            <div></div>
            <p>Aguarde, carregando...</p>
        </div>
    </div>

    <?= $v->section("content"); ?>

    <script src="<?= theme("/assets/minify/login.js", CONF_VIEW_ADMIN); ?>"></script>
</body>

</html>