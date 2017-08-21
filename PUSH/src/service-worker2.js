//'use strict';

/* eslint-env browser, serviceworker */

//importScripts('./scripts/analytics.js');

//self.analytics.trackingId = 'UA-77119321-2';

self.addEventListener('push', function(event) {
  console.log('Received push');
  let notificationTitle = 'Livees';
  const notificationOptions = {
    body: 'Tus empresas favoritas están publicado. Se el primero en enterarte de que se trata.',
    icon: './images/icon-192x192.png',
    tag: 'simple-push-demo-notification',
    data: {
      url: 'http://www.livees.net'
    }
  };

  if (event.data) {
    const dataText = event.data.text();
    notificationTitle = 'Livees';
    notificationOptions.body = 'Enterate de lo ultimo.'`;
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
