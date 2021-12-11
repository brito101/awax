<div class="sidebar">
    <h3 class="icon-star">Dashboard/Usuários</h3>
    <p>Gerencie, monitore e acompanhe os usuários do seu site aqui...</p>

    <nav>
        <?php
        $nav = function ($icon, $href, $title) use ($app) {
            $active = ($app == $href ? "active" : null);
            $url = url("/admin/{$href}");
            return "<a class=\"icon-{$icon} {$active}\" href=\"{$url}\">{$title}</a>";
        };

        echo $nav("user", "usuarios/home", "Usuários");
        echo $nav("plus-circle", "usuarios/usuario", "Novo usuário");
        ?>

        <?php if (!empty($user) && $user->photo()) : ?>
            <img src="<?= image($user->photo, 600, 600); ?>" alt="<?= $user->fullName(); ?>" title="<?= $user->fullName(); ?>" width="211" height="211" />
        <?php endif; ?>
    </nav>
</div>