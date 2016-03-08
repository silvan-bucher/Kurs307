<?php
/**
 * Ergänze hier alle erlaubten
 * Views (Dateiname ohne Endung)
 *
 * @var array
 */
$availableViews = [
    'home',
 // 'andere-view',
];

/**
 * Validierungsfehler
 * 
 * @var array
 */
$errors = [];


// -------------------------------------------------------
//  Unterhalb dieser Zeile ist keine Anpassung notwendig.
// -------------------------------------------------------

include __DIR__ . '/helpers.php';

// Falls die `url` keine erlaubte ist,
// die 404-Fehler-Seite anzeigen
$view = $_GET['url'] ?? 'home';
if ( ! in_array($view, $availableViews)) {
    $view = '404';
}

// Controller für die aktuelle View einbinden,
// falls einer existiert.
$controllerPath = __DIR__ . "/controller/${view}.php";
if (file_exists($controllerPath)) {
    include $controllerPath;
}

include __DIR__ . '/templates/app.php';
