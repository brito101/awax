<?php

namespace Source\App\Admin;

use Source\Models\Certificate as CertificateModel;
use Source\Support\Pager;
use Source\Support\Thumb;
use Source\Support\Upload;

/**
 * Class Certificate
 * @package Source\App\Admin
 */
class Certificate extends Admin
{

    /**
     * Certificate constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param array|null $data
     */
    public function home(?array $data): void
    {
        //search redirect
        if (!empty($data["s"])) {
            $s = str_search($data["s"]);
            echo json_encode(["redirect" => url("/admin/certificados/home/{$s}/1")]);
            return;
        }

        $search = null;
        $posts = (new CertificateModel())->find();

        if (!empty($data["search"]) && str_search($data["search"]) != "all") {
            $search = str_search($data["search"]);
            $posts = (new CertificateModel())->find("title LIKE :s", "s=%{$search}%");
            if (!$posts->count()) {
                $this->message->info("Sua pesquisa não retornou resultados")->flash();
                redirect("/admin/certificados/home");
            }
        }

        $all = ($search ?? "all");
        $pager = new Pager(url("/admin/certificados/home/{$all}/"));
        $pager->pager($posts->count(), 12, (!empty($data["page"]) ? $data["page"] : 1));

        $head = $this->seo->render(
            CONF_SITE_NAME . " | Certificados",
            "Padrão e design no desenvolvimento de sites e sistemas.",
            url("/admin"),
            theme("/admin/assets/images/theme.jpg"),
            false
        );

        echo $this->view->render("widgets/certificates/home", [
            "app" => "certificados/home",
            "head" => $head,
            "posts" => $posts->limit($pager->limit())->offset($pager->offset())->order("title")->fetch(true),
            "paginator" => $pager->render(),
            "search" => $search,
            "menu" => 'certificados'
        ]);
    }

    /**
     * @param array|null $data
     * @throws \Exception
     */
    public function post(?array $data): void
    {
        //create
        if (!empty($data["action"]) && $data["action"] == "create") {
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

            $postCreate = new CertificateModel();
            $postCreate->title = $data["title"];
            $postCreate->status = $data["status"];
            $postCreate->uri = str_slug($postCreate->title);

            //upload cover
            if (!empty($_FILES["cover"])) {
                $files = $_FILES["cover"];
                $upload = new Upload();
                $image = $upload->image($files, $postCreate->title);

                if (!$image) {
                    $json["message"] = $upload->message()->render();
                    echo json_encode($json);
                    return;
                }

                $postCreate->cover = $image;
            }

            if (!$postCreate->save()) {
                $json["message"] = $postCreate->message()->render();
                echo json_encode($json);
                return;
            }

            $this->message->success("Certificado criado com sucesso...")->flash();
            $json["redirect"] = url("/admin/certificados/post/{$postCreate->id}");

            echo json_encode($json);
            return;
        }

        //update
        if (!empty($data["action"]) && $data["action"] == "update") {
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
            $postEdit = (new CertificateModel())->findById($data["post_id"]);

            if (!$postEdit) {
                $this->message->error("Você tentou editar um certificado que não existe ou foi removido")->flash();
                echo json_encode(["redirect" => url("/admin/certificados/home")]);
                return;
            }

            $postEdit->title = $data["title"];
            $postEdit->uri = str_slug($postEdit->title);
            $postEdit->status = $data["status"];

            //upload cover
            if (!empty($_FILES["cover"])) {
                if ($postEdit->cover && file_exists(__DIR__ . "/../../../" . CONF_UPLOAD_DIR . "/{$postEdit->cover}")) {
                    unlink(__DIR__ . "/../../../" . CONF_UPLOAD_DIR . "/{$postEdit->cover}");
                    (new Thumb())->flush($postEdit->cover);
                }

                $files = $_FILES["cover"];
                $upload = new Upload();
                $image = $upload->image($files, $postEdit->title);

                if (!$image) {
                    $json["message"] = $upload->message()->render();
                    echo json_encode($json);
                    return;
                }

                $postEdit->cover = $image;
            }

            if (!$postEdit->save()) {
                $json["message"] = $postEdit->message()->render();
                echo json_encode($json);
                return;
            }

            $this->message->success("Certificado atualizado com sucesso...")->flash();
            echo json_encode(["reload" => true]);
            return;
        }

        //delete
        if (!empty($data["action"]) && $data["action"] == "delete") {
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
            $postDelete = (new CertificateModel())->findById($data["post_id"]);

            if (!$postDelete) {
                $json["message"] = $this->message->error("A certificado não existe ou já foi excluído antes")->render();
                echo json_encode($json);
                return;
            }

            if ($postDelete->cover && file_exists(__DIR__ . "/../../../" . CONF_UPLOAD_DIR . "/{$postDelete->cover}")) {
                unlink(__DIR__ . "/../../../" . CONF_UPLOAD_DIR . "/{$postDelete->cover}");
                (new Thumb())->flush($postDelete->cover);
            }

            $postDelete->destroy();

            $this->message->success("O certificado foi excluído com sucesso...")->flash();
            echo json_encode(["reload" => true]);

            return;
        }

        $postEdit = null;
        if (!empty($data["post_id"])) {
            $postId = filter_var($data["post_id"], FILTER_VALIDATE_INT);
            $postEdit = (new CertificateModel())->findById($postId);
        }

        $head = $this->seo->render(
            CONF_SITE_NAME . " | Certificados",
            "Padrão e design no desenvolvimento de sites e sistemas.",
            url("/admin"),
            theme("/admin/assets/images/theme.jpg"),
            false
        );

        echo $this->view->render("widgets/certificates/post", [
            "app" => "certificados/post",
            "head" => $head,
            "post" => $postEdit,
            "menu" => 'certificados'
        ]);
    }
}
