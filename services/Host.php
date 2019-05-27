<?php  
    class Host
    {
        const HOME = "home";

        public static function getLocal()
        {
            return env("host");

        }

        public static function nameCookie()
        {
            return 'WB';
        }

    }