<?php

return [
  'gcm' => [
      'priority' => 'normal',
      'dry_run' => false,
      'apiKey' => 'My_ApiKey',
  ],
  'fcm' => [
        'priority' => 'normal',
        'dry_run' => false,
        'apiKey' => 'AAAAXSiWIp8:APA91bFKTb9YQRiKaLww6WR_-UDlkpDSkagkFuEqi_l9d1o3AQBDYTNR7JN_9ez6ijMes2dD4DD_m6pW6QktxnEk9mQiuZRaSnOYnio3cxemL_gB0oPKxUuDX4XVcGlssuz3USn7Lzo-',
  ],
  'apn' => [
      'certificate' => __DIR__ . '/iosCertificates/apns-dev-cert.pem',
      'passPhrase' => '1234', //Optional
      'passFile' => __DIR__ . '/iosCertificates/yourKey.pem', //Optional
      'dry_run' => true
  ]
];