<?php
include 'wha-api.class.php';

$whaAPI = new WhaAPI();
$whaAPI->setApiKey('EM8Zk4x4grH3');
$whaAPI->setInstance('161076');

/* Me */
$sendMessage = $whaAPI->me();

/* sendMessage */
$sendMessage = $whaAPI->sendMessage(array(
    'phone' => '14233071206',
    'body' => 'test'
));

if ($sendMessage->status == 'success') {
    echo 'Message sent';
}

print_r($sendMessage);

