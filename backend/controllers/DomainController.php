<?php
namespace backend\controllers;

use backend\components\Controller;

/**
 * Site controller
 */
class DomainController extends Controller
{
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
