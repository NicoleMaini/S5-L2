<?php
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/nav.php';

$host = 'localhost';
$db   = 'ifoa_filesystem';
$user = 'root';
$pass = '';
$dsn = "mysql:host=$host;dbname=$db";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$pdo = new PDO($dsn, $user, $pass, $options);

$stmt = $pdo->prepare("SELECT title, content FROM news WHERE language = ?"); // ? placheholder sostitutivo per il valore, con il quale andremo a controllare il valore successivo
$stmt->execute([$language]);
$articles = $stmt->fetchAll();

?>

<div class="container mt-5">
    <h1><?php
        switch ($language) {
            case 'it':
                echo "Novità";
                break;
            case 'en':
                echo "News";
                break;
            case 'sp':
                echo "Novedad";
                break;
        }
        ?></h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col"><?php
                                switch ($language) {
                                    case 'it':
                                        echo "Titolo";
                                        break;
                                    case 'en':
                                        echo "Title";
                                        break;
                                    case 'sp':
                                        echo "Título";
                                        break;
                                }
                                ?></th>
                <th scope="col"><?php
                                switch ($language) {
                                    case 'it':
                                        echo "Contenuto";
                                        break;
                                    case 'en':
                                        echo "Content";
                                        break;
                                    case 'sp':
                                        echo "Contenido";
                                        break;
                                }
                                ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 0;
            foreach ($articles as $article) { ?>
                <tr>
                    <th scope="row"><?= $count = $count + 1 ?></th>
                    <td><?= $article['title'] ?></td>
                    <td><?= $article['content'] ?></td>
                </tr>
            <?php }
            ?>
        </tbody>
    </table>
</div>

<?php
require_once __DIR__ . '/includes/footer.php';
