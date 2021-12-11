<?php $v->layout("_login"); ?>

<div class="login">
    <article>
        <img src="<?= theme("/assets/images/logo.png", CONF_VIEW_ADMIN); ?>" alt="<?= CONF_SITE_NAME; ?>" title="<?= CONF_SITE_NAME; ?>" width="100" height="102" />
        <h2>Login</h2>
        <div class="ajax_response"><?= flash(); ?></div>

        <form name="login" action="<?= url("/admin/login"); ?>" method="post">
            <?= csrf_input(); ?>
            <label>
                <span class="icon-envelope">E-mail:</span>
                <input name="email" type="email" placeholder="Informe seu e-mail" required />
            </label>

            <label>
                <span class="icon-unlock-alt">Senha:</span>
                <input name="password" type="password" placeholder="Informe sua senha:" required />
            </label>

            <button class="icon-sign-in">ENTRAR</button>
        </form>

        <footer>
            <p>Desenvolvido por <b>Rodrigo Carvalho de Brito</b></p>
            <p>&copy; <?= date("Y"); ?> - todos os direitos reservados</p>
            <a target="_blank" rel="noreferrer" class="icon-whatsapp" href="https://api.whatsapp.com/send?phone=5521992247968&text=Olá,&nbsp;preciso&nbsp;de&nbsp;ajuda&nbsp;com&nbsp;o&nbsp;login.">WhatsApp: (21) 99224-7968</a>
        </footer>
    </article>
</div>