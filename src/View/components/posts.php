<article>
    <h2>Recent Posts</h2>
    <?php 
    
    for ($i = 0; $i < 6; $i++) {
        $article = $arcticleController->show($i + 1);
        if ($article) {
            echo <<<HTML
                <ul class="posts">
                    <li class="post-item">
                        <a class="post-link" href="#">
                            <span class="post-title">{$article["title"]}</span>
                            <span class="post-date">{$article["published_at"]}</span>
                        </a>
                    </li>
                </ul>
            HTML;
        }
    }
    
    ?>  
    <a href="<?= url("articles") ?>" class="see-more">MORE ARTICLES</a>
    
</article>
