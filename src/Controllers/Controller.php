<?php

namespace App\Controllers;

use App\Framework\Utilities\Url;
use League\Plates\Engine;
use League\Plates\Extension\Asset;
use Exception;

class Controller
{
    protected $request;
    protected $templates;

    public function __construct($params = null, $query = null)
    {
        $this->request = new \stdClass();
        $this->request->params = $params;
        $this->request->query = $query;
        $this->request->input = (object) $_POST;

        $this->templates = new Engine(__DIR__ . '/../../resources/views');
        $this->templates->loadExtension(new Asset(__DIR__.'/../../public'));
    }

    public function render($view, $data = [])
    {
        return $this->templates->render($view, $data);
    }

    public function redirect($path)
    {
        header("Cache-Control: no-cache, must-revalidate");
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        return header("Location: " . Url::getFullPath($path), true, 301);
    }

    public function isPost() {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }

    public function shouldBePost() {
        if (!$this->isPost()) {
            throw new Exception('Method not allowed');
        }
    }
}