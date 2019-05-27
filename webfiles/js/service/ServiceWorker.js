const CACHE_NAME = 'static-v1';

self.addEventListener('install', function (event) {
    event.waitUntil(
        caches.open(CACHE_NAME).then(function (cache) {
            return cache.addAll([
                '/',
                '/index.html',
                '/webfiles/css/home/init.css',
                '/webfiles/css/vendor/materialize.min.css',
                '/webfiles/js/libs/jquery.js',
                '/webfiles/js/libs/materialize.min.js',
                '/webfiles/img/logo.png',
            ])
        })
    )
});

self.addEventListener('activate', function activator(event) {
    event.waitUntil(
        caches.keys().then(function (keys) {
            return Promise.all(keys.filter(function (key) {
                    return key.indexOf(CACHE_NAME) !== 0;
                }).map(function(key){
                    return caches.delete(key);
                })
            );
        })
    );
});

self.addEventListener("fetch",function(event){
    event.respondWith(
        caches.match(event.request).then(function(cachedResponse){
            return cachedResponse || fetch(event.request);
        })
    );
});