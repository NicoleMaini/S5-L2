<?php
include_once __DIR__ . '/constants.php';
include_once __DIR__ . '/translations.php';


// determinare la lingua scelta nel cookie
$cookie_expiration = time() + 60 * 60 * 24 * 365 * 10;

if (!isset($_COOKIE['language'])) {
    setcookie('language', 'it', $cookie_expiration);
    $language = 'it';
    echo 'sono qui dentro';
} else {
    $language = $_COOKIE['language'];
    echo $language;
}

?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="<?= SITE_URL ?>"><?= $labels[$language]['site_name'] ?></a>
        <form action="<?= SITE_URL . '/change-language.php' ?>" method="get" class="d-flex">
            <select name="language" class="form-select" aria-label="Default select example">
                <option value="it" <?= $language === 'it' ? ' selected' : '' ?>>Italiano</option>
                <option value="en" <?= $language === 'en' ? ' selected' : '' ?>>English</option>
                <option value="sp" <?= $language === 'sp' ? ' selected' : '' ?>>Español</option>
            </select>
            <button type="submit" class="btn btn-outline-secondary">Cambia</button>
        </form>
    </div>
    </div>
</nav>