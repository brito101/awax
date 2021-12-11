<?php

namespace Source\App\Web;

use Source\Models\Portfolio;
use Source\App\Resources\WebPage;
use Source\Models\User;

/**
 * Class Home
 * @package Source\App\Web
 */
class Home extends WebPage
{
    /**
     * SITE HOME
     */
    public function index(): void
    {
        $head = $this->seo->render(
            CONF_SITE_NAME,
            CONF_SITE_TITLE,
            url(),
            theme("/assets/images/share.png")
        );

        echo $this->view->render("home", [
            "head" => $head,
            "portfolioList" => (new Portfolio())
                ->findPost()
                ->order("post_at DESC")
                ->limit(6)
                ->fetch(true),
            "menu" => 'home',
            "team" => (new User())->find("status = 'confirmed'")->fetch(true)
        ]);
    }
}
