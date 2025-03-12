self.addEventListener('install', event => {
    event.waitUntil(
        caches.open('your-cache-name').then(async cache => {
            let urlsToCache = [
                '/',
                '/phpscript/index.php',
                '/phpscript/manifest.json',
                '/phpscript/sw.js',
                '/phpscript/icons/icon-192x192.png'
            ];

            console.log('📂 Caching files:', urlsToCache);

            // Use Promise.all() with fetch() to check if each file exists before caching
            let cachePromises = urlsToCache.map(url => {
                return fetch(url, { method: 'HEAD' }) // Check if the file exists
                    .then(response => {
                        if (!response.ok) throw new Error(`🚫 ${url} not found`);
                        return cache.add(url);
                    })
                    .catch(error => console.warn(error.message));
            });

            return Promise.all(cachePromises);
        })
    );
    console.log('✅ Service Worker Installed!');
});
