<?php

namespace Source\App\Api;

use Source\Models\Post;

/**
 * Class Posts
 * @package Source\App\Api
 */
class Posts extends Api
{
    /**
     * Users constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();
        $this->protectedRoute = false;
    }

    /**
     * list user data
     */
    public function index(): void
    {
        $posts = (new Post())->find()->fetch(true);

        $list = [];
        foreach ($posts as $post) {
            $list[] = $post->data();
        }

        $response["posts"] = $list;

        $this->back($response);
        return;
    }
}
