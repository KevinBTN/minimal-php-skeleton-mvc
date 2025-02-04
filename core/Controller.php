<?php
namespace App\core;

class Controller
{

    public function renderView(string $path, $args = []){

            foreach ($args as $key => $value)
            {
                $$key = $value;
            }
        ob_start();
        require_once __DIR__.'/../view/'.$path.'.php';
        $content = ob_get_clean();
        require_once __DIR__.'/../view/layout.php';
    }

    public function redirectTo(string $path)
    {
        header("Location: $path");
    }

    public function redirectToRoute(string $path)
    {
        header("Location: {$_SERVER["REQUEST_SCHEME"]}://{$_SERVER["HTTP_HOST"]}".BASE_URI."/$path");
    }

    // TODO définir les autres méthodes utiles
}
