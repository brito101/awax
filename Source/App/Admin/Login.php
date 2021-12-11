<?php

namespace Source\App\Admin;

use Source\Core\Controller;
use Source\Models\Auth;

/**
 * Class Login
 * @package Source\App\Admin
 */
class Login extends Controller
{

    /**
     * Login constructor.
     */
    public function __construct()
    {
        parent::__construct(__DIR__ . "/../../../themes/" . CONF_VIEW_ADMIN . "/");
    }

    /**
     * Admin access redirect
     */
    public function root(): void
    {
        $user = Auth::user();

        if ($user && $user->level >= 5) {
            redirect("/admin/dash");
        } else {
            redirect("/admin/login");
        }
    }

    /**
     * @param array|null $data
     */
    public function login(?array $data): void
    {
        $user = Auth::user();

        if ($user && $user->level >= 5) {
            redirect("/admin/dash");
        }

        if (!empty($data["email"]) && !empty($data["password"])) {
            if (!csrf_verify($data)) {
                $json["message"] = $this->message->error("Tentativa inválida de acesso.")->render();
                echo json_encode($json);
                return;
            }

            if (request_limit("loginLogin", 3, 5 * 60)) {
                $json["message"] = $this->message->error("Limite de tentativas de acesso atingido")->render();
                echo json_encode($json);
                return;
            }

            $auth = new Auth();
            $login = $auth->login($data["email"], $data["password"], true, 5);

            if ($login) {
                $json["redirect"] = url("/admin/dash");
            } else {
                $json["message"] = $auth->message()->render();
            }

            echo json_encode($json);
            return;
        }

        $head = $this->seo->render(
            CONF_SITE_NAME . " | Admin",
            "Padrão e design no desenvolvimento de sites e sistemas.",
            url("/admin"),
            theme("/assets/images/theme.jpg", CONF_VIEW_ADMIN),
            false
        );

        echo $this->view->render("widgets/login/login", [
            "head" => $head
        ]);
    }
}
