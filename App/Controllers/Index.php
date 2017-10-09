<?php

namespace App\Controllers;

use App\Controller;
use App\Parser;

class Index
    extends Controller
{
    protected function actionIndex()
    {
        $this->view->display(__DIR__ . '/../templates/index.php');
    }

    protected function actionResults()
    {
        $this->view->results = \App\Models\Result::findAll();
        $this->view->display(__DIR__ . '/../templates/results.php');
    }

    protected function actionParse()
    {
        try {
            $parser = new Parser($_POST['url']);
            $parser->saveElements($_POST['type'], $_POST['text']);
            $this->view->success = true;
        } catch (\App\Exceptions\Parser $e) {
            $this->view->error = $e->getMessage();
        }

        $this->view->json();
    }

}