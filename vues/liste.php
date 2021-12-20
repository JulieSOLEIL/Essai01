<section>
    <h3>Liste des articles</h3>
    <br>
    <table>
        <tr>
            <th>Photo</th>
            <th>Code article</th>
            <th>Libellé</th>
            <th>prix unitaire</th>
        </tr>
        <?php
               foreach ($articles as $article) {
                //var_dump($article);
                echo '<tr>';
                echo '<td><img src="/upload/'.$article->getUrlPhoto().'"></td>';
                echo '<td>' . $article->getId() . '</td>';
                echo '<td>' . $article->getLibelle(). '</td>';
                echo '<td>' . $article->getPrix() . '</td>';
                echo '</tr>';
            }
            ?>
        </table>
    
    </section>