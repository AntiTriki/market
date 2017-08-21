//'use strict';

/* eslint-env browser, serviceworker */

//importScripts('./scripts/analytics.js');

//self.analytics.trackingId = 'UA-77119321-2';

self.addEventListener('push', function(event) {
  console.log('Received push');
  let notificationTitle = 'Livees';
  const notificationOptions = {
    body: 'Tienes nuevas publicaciones de tus empresas favoritas.',
    icon: './images/icon-192x192.png',
    tag: 'Livees',
    data: {
      url: 'https://www.livees.net'
    }
  };

  if (event.data) {
    const dataText = event.data.text();
    notificationTitle = 'Livees';
    notificationOptions.body = `Push data: '${dataText}'`;
  }

  event.waitUntil(
    Promise.all([
      self.registration.showNotification(
        notificationTitle, notificationOptions),
      self.analytics.trackEvent('push-received')
    ])
  );
});

self.addEventListener('notificationclick', function(event) {
  event.notification.close();

  let clickResponsePromise = Promise.resolve();
  if (event.notification.data && event.notification.data.url) {
    clickResponsePromise = clients.openWindow(event.notification.data.url);
  }

  event.waitUntil(
    Promise.all([
      clickResponsePromise,
      self.analytics.trackEvent('notification-click')
    ])
  );
});
