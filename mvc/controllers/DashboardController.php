<?php


class DashboardController extends View
{

    public $byPost;

    function  __construct()
    {
        $this->byPost = $_POST['data'];
    }

    function actionIndex(){
        $js  = ['modulos/nav/init','modulos/dashboard/init','controllers/UserController'];
        $css = ['home/init','preload','dashboard/init','nav/main'];
        $views = ['preload/index','nav/main','dashboard/init'];

        $seo = new stdClass();
        $seo->description   = '';
        $seo->title         = 'Web cursinho';

        $this->layoutBuilder($views, $js, $css, $seo);
    }

    function actionstudent(){
        $js  = ['controllers/UserController','modulos/nav/init','modulos/dashboard/student'];
        $css = ['home/init','preload','dashboard/student','nav/main'];
        $views = ['preload/index','nav/main','dashboard/student'];

        $seo = new stdClass();
        $seo->description   = '';
        $seo->title         = 'Web cursinho';

        $this->layoutBuilder($views, $js, $css, $seo);
    }

    function actionContent(){
        $js  = ['controllers/UserController','controllers/ContentController','modulos/nav/init','modulos/dashboard/content'];
        $css = ['home/init','preload','dashboard/content','nav/main'];
        $views = ['preload/index','nav/main','dashboard/content'];

        $seo = new stdClass();
        $seo->description   = '';
        $seo->title         = 'Web cursinho';

        $this->layoutBuilder($views, $js, $css, $seo);
    }

    function actionUsers(){
        $js  = ['controllers/UserController','modulos/nav/init','modulos/dashboard/users'];
        $css = ['home/init','preload','dashboard/users','nav/main'];
        $views = ['preload/index','nav/main','dashboard/users'];

        $seo = new stdClass();
        $seo->description   = '';
        $seo->title         = 'Web cursinho';

        $this->layoutBuilder($views, $js, $css, $seo);
    }

    function actionTips(){
        $js  = ['controllers/UserController','modulos/nav/init','modulos/dashboard/tips'];
        $css = ['home/init','preload','dashboard/tips','nav/main'];
        $views = ['preload/index','nav/main','dashboard/tips'];

        $seo = new stdClass();
        $seo->description   = '';
        $seo->title         = 'Web cursinho';

        $this->layoutBuilder($views, $js, $css, $seo);
    }

}