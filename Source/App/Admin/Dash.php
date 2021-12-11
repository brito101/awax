<?php

namespace Source\App\Admin;

use Source\Models\Auth;
use Source\Models\Category;
use Source\Models\CategoryPortfolio;
use Source\Models\Post;
use Source\Models\Portfolio;
use Source\Models\Certificate;
use Source\Models\Report\Online;

/**
 * Class Dash
 * @package Source\App\Admin
 */
class Dash extends Admin
{

    /**
     * Dash constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     *
     */
    public function dash(): void
    {
        redirect("/admin/dash/home");
    }

    /**
     * @param array|null $data
     * @throws \Exception
     */
    public function home(?array $data): void
    {
        $online = new Online();
        //real time access
        if (!empty($data["refresh"])) {
            $list = null;
            $items = $online->findByActive();
            if ($items) {
                foreach ($items as $item) {
                    $list[] = [
                        "dates" => date("H:i:s", strtotime($item->created_at)) . " - " . date("H:i:s", strtotime($item->updated_at)),
                        "pages" => $item->pages,
                        "url" => $item->url
                    ];
                }
            }

            echo json_encode([
                "count" => $online->findByActive(true),
                "list" => $list
            ]);
            return;
        }

        $head = $this->seo->render(
            CONF_SITE_NAME . " | Dashboard",
            "Padrão e design no desenvolvimento de sites e sistemas.",
            url("/admin"),
            theme("/assets/images/theme.jpg", CONF_VIEW_ADMIN),
            false
        );

        $post = new Post();
        $portfolio = new Portfolio();
        $cerificate = new Certificate();

        $postChart = new \stdClass();
        $postChart->data = '';
        $postChart->series = '';

        $posts = $post->find("status = 'post'", null, 'title, views')->order('views DESC')->limit(10)->fetch(true);
        foreach ($posts as $p) {
            $postChart->data .= "'" . $p->views . "', ";
            $postChart->series .=  "'" . $p->title . "', ";
        }

        $portfolioChart = new \stdClass();
        $portfolioChart->data = '';
        $portfolioChart->series = '';

        $portfolios = $portfolio->find("status = 'post'", null, 'title, views')->order('views DESC')->limit(10)->fetch(true);
        foreach ($portfolios as $p) {
            $portfolioChart->data .= "'" . $p->views . "', ";
            $portfolioChart->series .=  "'" . $p->title . "', ";
        }

        echo $this->view->render("widgets/dash/home", [
            "app" => "dash",
            "head" => $head,
            "blog" => (object) [
                "posts" => $post->find("status = 'post'", null, 'id')->count(),
                "drafts" => $post->find("status = 'draft'", null, 'id')->count(),
                "categories" => (new Category())->find("type = 'post'", null, 'id')->count()
            ],
            "portfolio" => (object) [
                "posts" => $portfolio->find("status = 'post'", null, 'id')->count(),
                "drafts" => $portfolio->find("status = 'draft'", null, 'id')->count(),
                "categories" => (new CategoryPortfolio())->find("type = 'post'", null, 'id')->count()
            ],
            "certificates" => (object) [
                "posts" => $cerificate->find("status = 'post'", null, 'id')->count(),
                "drafts" => $cerificate->find("status = 'draft'", null, 'id')->count()
            ],
            "online" => $online->findByActive(),
            "onlineCount" => $online->findByActive(true),
            "postChartData" => $postChart->data,
            "postChartSeries" => $postChart->series,
            "portfolioChartData" => $portfolioChart->data,
            "portfolioChartSeries" => $portfolioChart->series,
            "menu" => 'dash'
        ]);
    }

    /**
     *
     */
    public function logoff(): void
    {
        $this->message->success("Você saiu com sucesso {$this->user->first_name}.")->flash();

        Auth::logout();
        redirect("/admin/login");
    }
}
