const cache_NAME = 'pwa=v1 - '+ new Date();

self.addEventListener('install', function(event) {
  event.waitUntil(
    caches.open(cache_NAME).then(function(cache) {
      return cache.addAll([
    // './',
    '/denuncia',
    '/offline',
    '/css/animation.css',
    '/css/indexPwa.css',
    '/img/database.png',
    '/manifest.json',
      ]);
    })
  );
});


self.addEventListener('activate', function activator(event) {
  event.waitUntil(
    caches.keys().then(function (keys) {
      return Promise.all(keys
        .filter(function (key) {
          return key.indexOf(cache_NAME) !== 0;
        })
        .map(function (key) {
          return caches.delete(key);
        })
      );
    })
  );
});


self.addEventListener("fetch", event => {
  event.respondWith(
    caches.match(event.request)
      .then(response => {
        return response || fetch(event.request);
      })
      .catch(() => {
        return caches.match('/offline');
      })
  )
});