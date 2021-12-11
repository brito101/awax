<?php

namespace Source\App\Resources;

use Source\Core\Controller;
use CoffeeCode\Router\Router;
use Source\Models\Report\Access;
use Source\Models\Report\Online;
use Source\Support\Cookie;

/**
 * Class WebPage
 * @package Source\App\Resources
 */
class WebPage extends Controller
{
    private $router;

    /**
     * Web constructor.
     * @param Router $router
     */
    public function __construct(Router $router)
    {
        parent::__construct(__DIR__ . "/../../../themes/" . CONF_VIEW_THEME . "/");

        $this->router = $router;

        (new Access())->report();
        (new Online())->report();

        //share data to all views
        $this->view->data([
            'router' => $this->router,
            'cookieConsent' => Cookie::get('cookieConsent')
        ]);
    }
}
