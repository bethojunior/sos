<?php

class DashboardController extends View
{

    public $byPost;

    function  __construct()
    {
        $this->byPost = $_POST['data'];
    }


    function actionInit(){
        $js  = ['controllers/UserController','modulos/nav/init','modulos/dashboard/init'];
        $css = ['home/init','preload','dashboard/student','nav/main'];
        $views = ['preload/index','nav/main','dashboard/init'];

        $seo = new stdClass();
        $seo->description   = '';
        $seo->title         = 'SOS - Inicio';

        $this->layoutBuilder($views, $js, $css, $seo);
    }

    function actionSale(){
        $js  = ['controllers/UserController','controllers/ContentController','controllers/SalesController','modulos/nav/init','modulos/dashboard/sales'];
        $css = ['home/init','preload','dashboard/sales','nav/main'];
        $views = ['preload/index','nav/main','dashboard/sales'];

        $seo = new stdClass();
        $seo->description   = '';
        $seo->title         = 'SOS - Vendas';

        $this->layoutBuilder($views, $js, $css, $seo);
    }

    function actionProducts(){
        $js  = ['controllers/UserController','controllers/ContentController','modulos/nav/init','modulos/dashboard/content'];
        $css = ['home/init','preload','dashboard/content','nav/main'];
        $views = ['preload/index','nav/main','dashboard/content'];

        $seo = new stdClass();
        $seo->description   = '';
        $seo->title         = 'SOS - Produtos';

        $this->layoutBuilder($views, $js, $css, $seo);
    }

    function actionCashier(){
        $js  = ['controllers/UserController','controllers/ContentController','modulos/nav/init','modulos/dashboard/cashier'];
        $css = ['home/init','preload','dashboard/cashier','nav/main'];
        $views = ['preload/index','nav/main','dashboard/cashier'];

        $seo = new stdClass();
        $seo->description   = '';
        $seo->title         = 'SOS';

        $this->layoutBuilder($views, $js, $css, $seo);
    }


}