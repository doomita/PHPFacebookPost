PHPFacebookPost
============

PHPFacebookPost è una classe in PHP che aiuta il programmatore a recuperare i post di una determanata pagina Facebook con poche righe di codice. Prima di tutto, specifico che questa classe usa le API di facebook version 3, se non le avete, scaricando questo repository già le troverete incluse.

PS: dovete avere un account dev di facebook, quindi dovete essere in possesso di un **appID** e un **secret** ( https://developers.facebook.com/ )


FILE INCLUSI
-----------
* **/facebookAPIv3/**       contiene le api ufficiali di facebook.
* **/PHPFacebookPost.php**  file principale ( cuore del progetto ).
* **/test_page.php**        esempio di utilizzo.

ESEMPIO
--------
```php
include ("PHPFacebookPost.php");
$param = array(
"facebook_API_path" => "facebookAPIv3/facebook.php",
"appId" => "YOUR_APP_ID",
"secret" => "YOUR_SECRET",
"page_id" => "PAGE_ID_FACEBOOK"
);
	 
$fb = new PHPFacebookPost($param);
$fb -> load_post();
```

Descrizione Esempio
--------
```php
include ("PHPFacebookPost.php");
```
include nella pagine il file principale.

```php
$param = array(
"facebook_API_path" => "facebookAPIv3/facebook.php",
"appId" => "YOUR_APP_ID",
"secret" => "YOUR_SECRET",
"page_id" => "PAGE_ID_FACEBOOK"
);
```

array dove specificare i parametri necessari per collegarsi su facebook:

**facebook_API_path** percorso per raggiungere il file api di facebook.

**appId** il tuo appId dell'account developer di facebook.

**secret** il tuo secret dell'account developer di facebook.

**page_id** codice id della pagina fecebook dove volete recuperare i post.

```php
$fb = new PHPFacebookPost($param);
```
istanzia la classe passando i parametri.

```php
$fb -> load_post();
```
carica i post generando e stampando il codice HTML, seguendo lo stile grafico metro di una GridView di un Windows Phone ( per intenderci i cubettoni )

Prossime Release
--------
personalizzazioni grafiche!
