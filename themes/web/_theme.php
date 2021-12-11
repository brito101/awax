<!DOCTYPE html>
<html lang="pt-br" itemscope itemtype="http://schema.org/WebPage">

<head>
    <?php if ($cookieConsent == 'accept') : ?>
        <?= $v->insert('partials/gtm-head'); ?>
    <?php endif; ?>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <?= $head; ?>
    <link rel="icon" type="image/png" href="<?= theme("/assets/images/logo.svg"); ?>" />
    <link rel="stylesheet" href="<?= theme("/assets/minify/style.css"); ?>" />
    <!--ANDROID-->
    <link rel="manifest" href="/../manifest.json" />
    <meta name="theme-color" content="#B28756" />
    <!--IOS-->
    <meta name="apple-mobile-web-app-capable" content="true" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <link rel="apple-touch-icon" href="/../images/icons/icon-512x512.png" />
    <link rel="apple-touch-startup-image" href="/../images/icons/icon-512x512.png" />
</head>

<body>
    <?php if ($cookieConsent == 'accept') : ?>
        <?= $v->insert('partials/gtm-body'); ?>
    <?php endif; ?>

    <!--HEADER-->
    <header class="main_header">
        <h1 class="hide"><?= CONF_SITE_NAME; ?></h1>
        <div>
            <div class="logo">
                <a title="<?= CONF_SITE_NAME; ?>" href="<?= url(); ?>">
                    <img src="<?= theme("/assets/images/logo.svg"); ?>" alt="<?= CONF_SITE_NAME; ?>" width="75" height="76" />
                </a>
            </div>

            <nav>
                <h2 class="hide">Barra de Navegação</h2>
                <button class="j_menu_mobile_open icon-bars icon-notext"></button>
                <div class="j_menu_mobile_tab">
                    <button class="j_menu_mobile_close icon-times icon-notext"></button>
                    <ul>
                        <li><a class="link <?= $menu == 'home' ? 'active' : ''; ?>" href="<?= url(); ?>" data-go=".banner">Home</a></li>
                        <?php if (!in_array($menu, ['terms', 'error'])) : ?>
                            <li><a class="link" data-go=".about" href="#sobre" title="Sobre">Sobre</a></li>
                            <li><a class="link" data-go=".services" href="#servicos" title="Serviços">Serviços</a></li>
                            <li><a class="link" data-go=".projects" href="#projetos" title="Projetos">Projetos</a></li>
                            <li><a class="link" data-go=".team" href="#time" title="Time">Time</a></li>
                            <li><a class="link" data-go=".testimonials" href="#clientes" title="Clientes">Clientes</a></li>
                            <li><a class="link" data-go=".prices" href="#precos" title="Preços">Preços</a></li>
                            <li><a class="link" data-go="#fatos" href="#fatos" title="Fatos">Fatos</a></li>
                            <li><a class="link" data-go="#contato" href="#contato" title="Contato">Contato</a></li>
                        <?php endif; ?>

                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <!--CONTENT-->
    <main class="main_content">
        <?= $v->section("content"); ?>
    </main>

    <!--FOOTER-->
    <footer class="main_footer">
        <div class="main_footer_container">
            <section class="main_footer_content">
                <h2 class="hide">Footer</h2>
                <article>
                    <h2>Sobre:</h2>
                    <p>Padrão e design no desenvolvimento de sites e sistemas.</p>
                    <a title="Termos de uso" href="<?= url("/termos"); ?>">Termos de uso</a>
                </article>
                <article>
                    <h2>Mais:</h2>
                    <a title="Home" href="<?= url(); ?>">Home</a>
                    <a title="Portfólio" href="<?= url("/portfolio"); ?>">Portfólio</a>
                    <a title="Blog" href="<?= url("/blog"); ?>">Blog</a>
                    <a title="Sobre mim" href="<?= url("/sobre"); ?>">Sobre mim</a>
                </article>
                <article>
                    <h2>Contato:</h2>
                    <p class="icon-phone"><b>Telefone:</b><br>
                        <a href="https://wa.me/5521992247968" title="Contato via WhatsApp" target="_blank" rel="noreferrer">+55 (21) 99224-7968</a>
                    </p>
                    <p class="icon-envelope"><b>Email:</b><br>
                        <a title="Contato por e-mail" href="mailto:contato@rodrigobrito.dev.br" rel="noreferrer">contato@rodrigobrito.dev.br</a>
                    </p>
                </article>
                <article class="social">
                    <h2>Social:</h2>
                    <div>
                        <a target="_blank" rel="noreferrer" class="icon-facebook" href="https://www.facebook.com/<?= CONF_SOCIAL_FACEBOOK_PAGE; ?>" title="<?= CONF_SITE_DEVELOPER; ?> no Facebook"></a>
                        <a target="_blank" rel="noreferrer" class="icon-github" href="https://github.com/<?= CONF_SOCIAL_GITHUB; ?>" title="<?= CONF_SITE_DEVELOPER; ?> no Github"></a>
                        <a target="_blank" rel="noreferrer" class="icon-packagist" href="https://packagist.org/<?= CONF_SOCIAL_PACKAGIST; ?>" title="<?= CONF_SITE_DEVELOPER; ?> no Packagist"></a>
                        <a target="_blank" rel="noreferrer" class="icon-stack-overflow" href="https://pt.stackoverflow.com/<?= CONF_SOCIAL_STACKOVERFLOW; ?>" title="<?= CONF_SITE_DEVELOPER; ?> no Stackoverflow"></a>
                    </div>
                </article>
            </section>
        </div>
    </footer>

    <?php if (!$cookieConsent) : ?>
        <div id="cookieConsent">
            <p>Este website utiliza cookies próprios e de terceiros a fim de personalizar o conteúdo, melhorar a experiência do usuário, fornecer funções de mídias sociais e analisar o tráfego. Para continuar navegando você deve concordar com nossa
                <a href="<?= $router->route('web.terms'); ?>">Política de Privacidade</a>
            </p>
            <a data-action="<?= $router->route('web.cookie.consent'); ?>" data-cookie="accept" href="#" class="footer_optout_btn icon-thumbs-up">
                Sim, eu aceito.
            </a>
            <a data-action="<?= $router->route('web.cookie.consent'); ?>" data-cookie="decline" href="#" class="footer_optout_btn icon-thumbs-down">
                Não, eu não aceito.
            </a>
        </div>
    <?php endif; ?>
    <button class="smoothscroll-top icon-chevron-circle-up icon-notext" aria-label="Voltar ao topo da página" title="Voltar ao topo da página"></button>
    <script src="<?= theme("/assets/minify/scripts.js"); ?>"></script>
    <?= $v->section("scripts"); ?>
</body>

</html>