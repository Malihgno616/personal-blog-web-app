<?php 

namespace Model;

class ArticleModel {
    private $db;

    public function __construct() {
        $this->db = json_decode(file_get_contents(__DIR__ . "/../config/db.json"), true);
    }
  
    public function getTitle($id) {
        foreach ($this->db["articles"] as $article) {
            if ($article["id"] == $id) {
                return $article["title"];
            }
        }
        return null;
    }

    public function getDescription($id) {
        foreach ($this->db["articles"] as $article) {
            if ($article["id"] == $id) {
                return $article["description"];
            }
        }
        return null;
    }

    public function getDate($id) {
        foreach ($this->db["articles"] as $article) {
            if ($article["id"] == $id) {
                return $article["published_at"];
            }
        }
        return null;
    }

    public function paginatedArticles($limit, $offset) {

        return [
            "posts" => array_slice($this->db["articles"], $offset, $limit),
            "total" => count($this->db["articles"]),
            "pages" => ceil(count($this->db["articles"]) / $limit),
            "limit" => $limit,
            "offset" => $offset
        ];
  
    }

}

// $articleModel = new ArticleModel();
// var_dump($articleModel->paginatedArticles(3, 0));
