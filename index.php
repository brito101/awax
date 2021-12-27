<?php
ob_start();

require __DIR__ . "/vendor/autoload.php";

/**
 * BOOTSTRAP
 */

use CoffeeCode\Router\Router;
use Source\Core\Session;

$session = new Session();
$route = new Router(url(), ":");

/**
 * WEB ROUTES
 */
$route->namespace("Source\App\Web");
$route->group(null);
$route->get("/", "Home:index");

//Cookie
$route->group(null);
$route->post("/cookie-consent", "Cookie:cookieConsent", "web.cookie.consent");

/**
 * ERROR ROUTES
 */
$route->group("/ops");
$route->get("/{errcode}", "Error:index");

//END WEB

/**
 * ADMIN ROUTES
 */
$route->namespace("Source\App\Admin");
$route->group("/admin");

//login
$route->get("/", "Login:root");
$route->get("/login", "Login:login");
$route->post("/login", "Login:login");

//dash
$route->get("/dash", "Dash:dash");
$route->get("/dash/home", "Dash:home");
$route->post("/dash/home", "Dash:home");
$route->get("/logoff", "Dash:logoff");

//portfolio
$route->get("/portfolio/home", "Dossier:home");
$route->post("/portfolio/home", "Dossier:home");
$route->get("/portfolio/home/{search}/{page}", "Dossier:home");
$route->get("/portfolio/post", "Dossier:post");
$route->post("/portfolio/post", "Dossier:post");
$route->get("/portfolio/post/{post_id}", "Dossier:post");
$route->post("/portfolio/post/{post_id}", "Dossier:post");
$route->get("/portfolio/categorias", "Dossier:categories");
$route->get("/portfolio/categorias/{page}", "Dossier:categories");
$route->get("/portfolio/categoria", "Dossier:category");
$route->post("/portfolio/categoria", "Dossier:category");
$route->get("/portfolio/categoria/{category_id}", "Dossier:category");
$route->post("/portfolio/categoria/{category_id}", "Dossier:category");

//certificates
$route->get("/certificados/home", "CertificatePost:home");
$route->post("/certificados/home", "CertificatePost:home");
$route->get("/certificados/home/{search}/{page}", "CertificatePost:home");
$route->get("/certificados/post", "CertificatePost:post");
$route->post("/certificados/post", "CertificatePost:post");
$route->get("/certificados/post/{post_id}", "CertificatePost:post");
$route->post("/certificados/post/{post_id}", "CertificatePost:post");

//blog
$route->get("/blog/home", "Blog:home");
$route->post("/blog/home", "Blog:home");
$route->get("/blog/home/{search}/{page}", "Blog:home");
$route->get("/blog/post", "Blog:post");
$route->post("/blog/post", "Blog:post");
$route->get("/blog/post/{post_id}", "Blog:post");
$route->post("/blog/post/{post_id}", "Blog:post");
$route->get("/blog/categorias", "Blog:categories");
$route->get("/blog/categorias/{page}", "Blog:categories");
$route->get("/blog/categoria", "Blog:category");
$route->post("/blog/categoria", "Blog:category");
$route->get("/blog/categoria/{category_id}", "Blog:category");
$route->post("/blog/categoria/{category_id}", "Blog:category");

//users
$route->get("/usuarios/home", "Users:home");
$route->post("/usuarios/home", "Users:home");
$route->get("/usuarios/home/{search}/{page}", "Users:home");
$route->get("/usuarios/usuario", "Users:user");
$route->post("/usuarios/usuario", "Users:user");
$route->get("/usuarios/usuario/{user_id}", "Users:user");
$route->post("/usuarios/usuario/{user_id}", "Users:user");
//END ADMIN

//API
$route->namespace("Source\App\Api");
$route->group(null);
$route->get("/api/posts", "Posts:index");

/**
 * ROUTE
 */
$route->dispatch();

/**
 * ERROR REDIRECT
 */
if ($route->error()) {
    $route->redirect("/ops/{$route->error()}");
}

ob_end_flush();
