<?php

namespace Source\App\Web;

use Source\App\Resources\WebPage;
use Source\Support\Cookie as CookieSuport;

/**
 * Class Cookie
 * @package Source\App\Web
 */
class Cookie extends WebPage
{
    /**
     * SITE TERMS
     */
    /**
     * @param array $data
     * @return void
     */
    public function cookieConsent(array $data): void
    {
        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
        $cookie = filter_var($data['cookie'], FILTER_SANITIZE_STRIPPED);

        CookieSuport::set('cookieConsent', $cookie, (12 * 43200));  // 1 year

        if ($cookie == 'accept') {
            $json['gtmHead'] = $this->view->render('partials/gtm-head');
            $json['gtmBody'] = $this->view->render('partials/gtm-body');
        }

        $json['cookie'] = true;
        echo json_encode($json);
    }
}
