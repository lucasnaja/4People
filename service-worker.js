const CACHE_VERSION = 2
const CURRENT_CACHES = { offline: `offline-v${CACHE_VERSION}` }
const OFFLINE_URL = '/offline/index.html'
let root

const createCacheBustedRequest = url => {
	let request = new Request(url, { cache: 'reload' })

	if ('cache' in request) return request

	let bustedUrl = new URL(url, self.location.href)
	bustedUrl.search += `${bustedUrl.search ? '&' : ''}cachebust=${Date.now()}`
	return new Request(bustedUrl)
}

self.addEventListener('message', data => root = data.data)

self.addEventListener('install', event => {
	event.waitUntil(
		fetch(createCacheBustedRequest(OFFLINE_URL)).then(async response => {
			const cache = await caches.open(CURRENT_CACHES.offline)
			return cache.put(OFFLINE_URL, response)
		})
	)
})

self.addEventListener('activate', event => {
	let expectedCacheNames = Object.keys(CURRENT_CACHES).map(key => CURRENT_CACHES[key])

	event.waitUntil(
		caches.keys().then(cacheNames => {
			return Promise.all(
				cacheNames.map(cacheName => {
					if (expectedCacheNames.indexOf(cacheName) === -1) return caches.delete(cacheName)
				})
			)
		})
	)
})

self.addEventListener('fetch', event => {
	if (event.request.mode === 'navigate' || (event.request.method === 'GET' && event.request.headers.get('accept').includes('text/html'))) {
		event.respondWith(fetch(event.request).catch(() => caches.match(OFFLINE_URL)))
	}
})
