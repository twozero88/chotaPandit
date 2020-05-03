console.log("SW REGISTERED");
var cacheName = 'Chota Pandit';
var filesToCache = [
  '/',
  '/index.html',
  '/index.css',
  '/main.js',
  '/index.js',
  '/loader.gif',
  '/about.html',
  '/assets/icon-512x512.png',
  '/assets/audio_files/bb.mp3'
];

/* Start the service worker and cache all of the app's content */
self.addEventListener('install', function(e) {
    e.waitUntil(
    caches.open(cacheName).then(function(cache) {
      return cache.addAll(filesToCache);
    })
  );
});

/* Serve cached content when offline */
self.addEventListener('fetch', function(e) {
  e.respondWith(
    caches.match(e.request).then(function(response) {
      return response || fetch(e.request);
    })
  );
});

