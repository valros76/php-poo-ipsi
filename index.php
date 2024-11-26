<?php

// PROJET FIL ROUGE : Blog - Thème voyage - Sous-catégories : Culinaire / Art / Actus Sportives + Possibilité de reviews - Si possible, devis voyage.
/**
 * Galerie photo / formulaire via lien externes ?
 * Culinaire
 * Actus sportive
 * Voyage
 * Art
 * Reviews
 * Création de devis
 */
use Models\Autoloader;
ini_set("date.timezone", "Europe/Paris");
require_once "./utils/Defines.php";
require_once "./models/Autoloader.php";

/**
 * Use autoloader to import all models
 */
Autoloader::register();
use Models\BDD;
use Models\Article;

$article = new Article(BDD::connect());

$article_test = [
  "title" => "Test",
  "content" => "Contenu de test",
  "author" => "webdevoo"
];

/**
 * Utilisation classique de la méthode add(), de la classe Article
 */
// $article->add(
//   $article_test["title"],
//   $article_test["content"],
//   $article_test["author"],
// );

var_dump($article::getList());
echo "<hr/>";
var_dump($article::getById(1));

$article_updated = [
  "id" => 1,
  "title" => "Test modifié",
  "content" => "Contenu modifié",
  "author" => "WebdevooUpdated",
  "created_date" => new \Datetime("now")
];

$article::update(
  $article_updated["id"],
  $article_updated["title"],
  $article_updated["content"],
  $article_updated["author"],
  $article_updated["created_date"]->sub(\DateInterval::createFromDateString("1 hour"))->format("Y/m/d H:i:s"),
);