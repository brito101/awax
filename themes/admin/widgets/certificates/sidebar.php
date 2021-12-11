<div class="sidebar">
    <h3 class="icon-star">Dashboard/certificados</h3>
    <p>Aqui você gerencia todos os certificados...</p>

    <nav>
        <?php
        $nav = function ($icon, $href, $title) use ($app) {
            $active = ($app == $href ? "active" : null);
            $url = url("/admin/{$href}");
            return "<a class=\"icon-{$icon} {$active}\" href=\"{$url}\">{$title}</a>";
        };

        echo $nav("pencil-square-o", "certificados/home", "Certificados");
        echo $nav("plus-circle", "certificados/post", "Novo certificado");
        ?>

        <?php if (!empty($post->cover)) : ?>
            <img src="<?= image($post->cover, 680); ?>" alt="<?= $post->title; ?>" title="<?= $post->title; ?>" width="220" height="155" />
        <?php endif; ?>
    </nav>
</div>