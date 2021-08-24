# [Whatsapp API](https://wha-api.com/)
 Whatsapp API, It does not require verification, you can use it by paying.
 For 3 days of free use, please [click here](https://wha-api.com/).
 
 
 ### First get the file library.
 ```php
include 'wha-api.class.php';
```
 
  ### Enter API information
 ```php
$whaAPI = new WhaAPI();
$whaAPI->setApiKey('EM8Zk4x4grH3');
$whaAPI->setInstance('161076');
```
 
 ### Send Message
```php
$sendMessage = $whaAPI->sendMessage(array(
    'phone' => '14233071206',
    'body' => 'test'
));

if ($sendMessage->status == 'success') {
    echo 'Message sent';
}
```