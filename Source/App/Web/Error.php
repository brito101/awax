<?php

namespace Source\App\Web;

use Source\App\Resources\WebPage;

/**
 * Class Error
 * @package Source\App\Web
 */
class Error extends WebPage
{
    /**
     * ERROR INDEX
     * @param array $data
     */
    public function index(array $data): void
    {
        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
        $protocol = (isset($_SERVER["SERVER_PROTOCOL"]) ? $_SERVER["SERVER_PROTOCOL"] : "HTTP/1.0");
        $error = new \stdClass();

        switch ($data['errcode']) {
            case "problemas":
                $error->code = "OPS";
                $error->title = "Estamos enfrentando problemas!";
                $error->message = "Parece que meu serviço não está diponível no momento. Já estou vendo isso, mas caso precise, envie um e-mail :)";
                $error->linkTitle = "ENVIAR E-MAIL";
                $error->link = "mailto:" . CONF_MAIL_SUPPORT;
                $error->httpResponseCode = header($protocol . " 503 Service Unavailable");
                break;

            case "manutencao":
                $error->code = "OPS";
                $error->title = "Desculpe, estou em manutenção!";
                $error->message = "Voltarei logo! Por hora estou trabalhando para melhorar o conteúdo :P";
                $error->linkTitle = null;
                $error->link = null;
                $error->httpResponseCode = header($protocol . " 503 Service Unavailable");
                break;

            default:
                $error->code = $data['errcode'];
                $error->title = "Ooops! Conteúdo indisponível!";
                $error->message = "Sinto muito, mas o conteúdo que você tentou acessar não existe, está indisponível no momento ou foi removido :(";
                $error->linkTitle = "Continue navegando!";
                $error->link = url_back();
                $error->httpResponseCode = header($protocol . ($data['errcode'] == 405 ? " 405 Method Not Allowed" : " 404 Not Found"));
                break;
        }

        $head = $this->seo->render(
            CONF_SITE_NAME . " - {$error->code} | {$error->title}",
            $error->message,
            url("/ops/{$error->code}"),
            theme("/assets/images/share.png"),
            false
        );

        echo $this->view->render("error", [
            "head" => $head,
            "error" => $error,
            "menu" => 'error'
        ]);
    }
}
