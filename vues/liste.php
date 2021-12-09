<section>
        <h3>Liste des articles</h3>
        <br>
        <table>
            <tr>
            <th>Photo</th>    
            <th>code article</th>
            <th>libellé</th>
            <th>prix</th>
            </tr>
            <?php
                //j'appelle la fontion
                $articles = getAllArticle();

                foreach ($articles as $article) { // ici je déclare pour chaque élément du tableau $articles, chaque $article
                //var_dump($article);
                // echo '<br>'; // je demande d'aller à la ligne après chaque déclaration d'article, ensuite, je veux les mettre sous forme d'un tableau:
                echo '<tr>';
                echo '<td style="border: 1px black solid;"><img src="/upload/'.$article['photo_article'].'"></td>;';
                echo '<td style="border: 1px black solid;">'.$article['id_art'].'</td>';
                echo '<td style="border: 1px black solid;">'.$article['libelle_art'].'</td>';
                echo '<td style="border: 1px black solid;">'.$article['prix_art'].'</td>';
                echo '</tr>';
                }
                ?>
        </table>
    </section>