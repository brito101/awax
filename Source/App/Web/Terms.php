<?php

namespace Source\App\Web;

use Source\App\Resources\WebPage;

/**
 * Class Terms
 * @package Source\App\Web
 */
class Terms extends WebPage
{
    /**
     * TERMS INDEX
     */
    public function index(): void
    {
        $head = $this->seo->render(
            CONF_SITE_NAME . " - Termos de uso",
            "Conheça os termos de uso",
            url("/termos"),
            theme("/assets/images/share.png")
        );

        echo $this->view->render("terms", [
            "head" => $head,
            "menu" => 'terms'
        ]);
    }
}
