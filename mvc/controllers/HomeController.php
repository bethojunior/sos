<?php

class HomeController extends View{


    function actionIndex(){
        $js  = ['modulos/authenticate/login','modulos/authenticate/login' , 'controllers/UserController'];
        $css = ['home/init','preload'];
        $views = ['preload/index','home/index'];

        $seo = new stdClass();
        $seo->description   = '';
        $seo->title         = 'SOS Variedades';

        $this->layoutBuilder($views, $js, $css, $seo);

    }

}