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
        $js  = ['controllers/UserController','controllers/ContentController','modulos/nav/init','modulos/dashboard/content'];
        $css = ['home/init','preload','dashboard/content','nav/main'];
        $views = ['preload/index','nav/main','dashboard/content'];

        $seo = new stdClass();
        $seo->description   = '';
        $seo->title         = 'SOS - Vender';

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

    function actionUsers(){
        $js  = ['controllers/UserController','modulos/nav/init','modulos/dashboard/users'];
        $css = ['home/init','preload','dashboard/users','nav/main'];
        $views = ['preload/index','nav/main','dashboard/users'];

        $seo = new stdClass();
        $seo->description   = '';
        $seo->title         = 'SOS';

        $this->layoutBuilder($views, $js, $css, $seo);
    }

    function actionTips(){
        $js  = ['controllers/UserController','modulos/nav/init','modulos/dashboard/tips'];
        $css = ['home/init','preload','dashboard/tips','nav/main'];
        $views = ['preload/index','nav/main','dashboard/tips'];

        $seo = new stdClass();
        $seo->description   = '';
        $seo->title         = 'SOS';

        $this->layoutBuilder($views, $js, $css, $seo);
    }



}