<!DOCTYPE html>
<html lang="pt-br" itemscope itemtype="http://schema.org/WebPage">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <?= $head; ?>
    <link rel="stylesheet" href="<?= theme("/assets/minify/admin.css", CONF_VIEW_ADMIN); ?>" />
    <link rel="icon" type="image/png" href="<?= theme("/assets/images/logo.png", CONF_VIEW_ADMIN); ?>" />
</head>

<body>
    <h1 class="hide"><?= CONF_SITE_NAME . " | Área de administração do site"; ?></h1>
    <div class="ajax_load">
        <div>
            <div></div>
            <p>Aguarde, carregando...</p>
        </div>
    </div>

    <div class="ajax_response"><?= flash(); ?></div>

    <div class="dash">
        <aside class="dash_sidebar">
            <h2 class="hide">Menu</h2>
            <button class="icon-notext icon-times close_menu" title="Fechar o menu"></button>
            <button class="icon-notext icon-chevron-left short_menu" title="Encurtar ou expandir o menu"></button>
            <article>
                <?php
                $photo = user()->photo();
                $userPhoto = ($photo ? image($photo, 300, 300) : theme("/assets/images/avatar.jpg", CONF_VIEW_ADMIN));
                ?>
                <div><img src="<?= $userPhoto; ?>" alt="<?= user()->fullName(); ?>" title="<?= user()->fullName(); ?>" width="300" /></div>
                <h3><?= user()->fullName(); ?></h3>
            </article>

            <ul>
                <li class="<?= $menu == 'dash' ? 'active' : ''; ?>">
                    <a class="icon-tachometer" href="<?= url("/admin/dash"); ?>" title="Dashboard">Dashboard</a>
                </li>
                <li class="<?= $menu == 'portfolio' ? 'active' : ''; ?>">
                    <a class="icon-tag" href="<?= url("/admin/portfolio/home"); ?>" title="Portfólio">Portfólio</a>
                </li>
                <li class="<?= $menu == 'certificados' ? 'active' : ''; ?>">
                    <a class="icon-graduation-cap" href="<?= url("/admin/certificados/home"); ?>" title="Certificados">Certificados</a>
                </li>
                <li class="<?= $menu == 'blog' ? 'active' : ''; ?>">
                    <a class="icon-pencil-square-o" href="<?= url("/admin/blog/home"); ?>" title="Blog">Blog</a>
                </li>
                <li class="<?= $menu == 'usuarios' ? 'active' : ''; ?>">
                    <a class="icon-user" href="<?= url("/admin/usuarios/home"); ?>" title="Usuários">Usuários</a>
                </li>
                <li>
                    <a class="icon-link" target="_blank" href="<?= url(); ?>" title="Ver site">Ver site</a>
                </li>
                <li>
                    <a class="icon-sign-out on_mobile" href="<?= url("/admin/logoff"); ?>" title="Sair">Sair</a>
                </li>
            </ul>
        </aside>
        <section class="dash_content">
            <div>
                <div class="dash_userbar_box">
                    <div class="dash_content_box">
                        <a href="<?= url("/admin/dash"); ?>" class="logo" title="Dashboard">
                            <img src="<?= theme("/assets/images/logo.png", CONF_VIEW_ADMIN); ?>" alt="<?= CONF_SITE_NAME; ?>" title="<?= CONF_SITE_NAME; ?>" width="30" height="30" />
                            <h3><?= CONF_SITE_NAME; ?></h3>
                        </a>
                        <div class="dash_userbar_box_bar">
                            <span class="no_mobile icon-clock-o"><?= date("d/m H\hi"); ?></span>
                            <a class="no_mobile icon-sign-out" title="Sair" href="<?= url("/admin/logoff"); ?>">Sair</a>
                            <span class="icon-bars icon-notext mobile_menu"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content">
                <h2 class="hide">Conteúdo Principal</h2>
                <?= $v->section("content"); ?>
            </div>
        </section>
    </div>

    <?= $v->section("pre-scripts"); ?>
    <script src="<?= theme("/assets/minify/admin.js", CONF_VIEW_ADMIN); ?>"></script>
    <?= $v->section("pos-scripts"); ?>

</body>

</html>