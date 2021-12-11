<div class="sidebar">
    <h3 class="icon-star">Dashboard/portfólio</h3>
    <p>Aqui você gerencia todos os artigos e categorias do portfólio...</p>

    <nav>
        <?php
        $nav = function ($icon, $href, $title) use ($app) {
            $active = ($app == $href ? "active" : null);
            $url = url("/admin/{$href}");
            return "<a class=\"icon-{$icon} {$active}\" href=\"{$url}\">{$title}</a>";
        };

        echo $nav("pencil-square-o", "portfolio/home", "Portfólio");
        echo $nav("bookmark", "portfolio/categorias", "Categorias");
        echo $nav("plus-circle", "portfolio/post", "Novo Projeto");
        ?>

        <?php if (!empty($post->cover)) : ?>
            <img src="<?= image($post->cover, 680); ?>" alt="<?= $post->title; ?>" title="<?= $post->title; ?>" width="211" height="119" />
        <?php endif; ?>

        <?php if (!empty($category->cover)) : ?>
            <img src="<?= image($category->cover, 680); ?>" alt="<?= $category->title; ?>" title="<?= $category->title; ?>" width="211" height="119" />
        <?php endif; ?>
    </nav>
</div>