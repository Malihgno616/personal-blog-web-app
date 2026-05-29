<?php 

namespace Controller;

require_once __DIR__ . "/../Model/ArticleModel.php";

use Model\ArticleModel;

class ArticleController {
    private $model;

    public function __construct() {
        $this->model = new ArticleModel();
    }

    public function showRecentPosts($id) {
        $title = $this->model->getTitle($id);
        $description = $this->model->getDescription($id);
        $date = $this->model->getDate($id);

        require __DIR__ . "/../View/components/posts.php";
    }

    public function showPost($id) {
        $title = $this->model->getTitle($id);
        $description = $this->model->getDescription($id);
        $date = $this->model->getDate($id);

        require __DIR__ . "/../View/components/post.php";
    }

}
