;
/**
 * asignar un nombre y versión al cache
 *
 * Lo que se pretenda cachear se deben agregar en el arreglo urlsToCache
 **/
const CACHE_NAME = 'v1_pwa_app_edwdev_cache',
    urlsToCache = [
        './',
        '/front/css/bootstrap.min.css?version='+version_files_app,
        '/front/css/all.min.css?version='+version_files_app,
        '/front/css/simple-line-icons.css?version='+version_files_app,
        '/front/css/slick.css?version='+version_files_app,
        '/front/css/animate.css?version='+version_files_app,
        '/front/css/magnific-popup.css?version='+version_files_app,
        '/front/css/style.css?version='+version_files_app,
        '/front/js/jquery-1.12.3.min.js?version='+version_files_app,
        '/front/js/jquery.easing.min.js?version='+version_files_app,
        '/front/js/jquery.waypoints.min.js?version='+version_files_app,
        '/front/js/jquery.counterup.min.js?version='+version_files_app,
        '/front/js/popper.min.js?version='+version_files_app,
        '/front/js/bootstrap.min.js?version='+version_files_app,
        '/front/js/isotope.pkgd.min.js?version='+version_files_app,
        '/front/js/infinite-scroll.min.js?version='+version_files_app,
        '/front/js/imagesloaded.pkgd.min.js?version='+version_files_app,
        '/front/js/slick.min.js?version='+version_files_app,
        '/front/js/contact.js?version='+version_files_app,
        '/front/js/validator.js?version='+version_files_app,
        '/front/js/wow.min.js?version='+version_files_app,
        '/front/js/morphext.min.js?version='+version_files_app,
        '/front/js/parallax.min.js?version='+version_files_app,
        '/front/js/jquery.magnific-popup.min.js?version='+version_files_app,
        '/front/js/custom.js?version='+version_files_app,
        '/front/js/pwa/script.js?version='+version_files_app,
        '/favicon/favicon.png?version='+version_files_app,
    ]

//durante la fase de instalación, generalmente se almacena en caché los activos estáticos
self.addEventListener('install', e => {
    e.waitUntil(
        caches.open(CACHE_NAME)
            .then(cache => {
                return cache.addAll(urlsToCache)
                    .then(() => self.skipWaiting())
            })
            .catch(err => console.log('Falló registro de cache', err))
    )
})

//una vez que se instala el SW, se activa y busca los recursos para hacer que funcione sin conexión
self.addEventListener('activate', e => {
    const cacheWhitelist = [CACHE_NAME]

    e.waitUntil(
        caches.keys()
            .then(cacheNames => {
                return Promise.all(
                    cacheNames.map(cacheName => {
                        //Eliminamos lo que ya no se necesita en cache
                        if (cacheWhitelist.indexOf(cacheName) === -1) {
                            return caches.delete(cacheName)
                        }
                    })
                )
            })
            // Le indica al SW activar el cache actual
            .then(() => self.clients.claim())
    )
})

//cuando el navegador recupera una url
self.addEventListener('fetch', e => {
    //Responder ya sea con el objeto en caché o continuar y buscar la url real
    e.respondWith(
        caches.match(e.request)
            .then(res => {
                if (res) {
                    //recuperar del cache
                    return res
                }
                //recuperar de la petición a la url
                return fetch(e.request)
            }).catch(err => console.log('Falló algo al solicitar recursos', err))
    )
})
