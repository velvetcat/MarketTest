<? 
	include __DIR__.'/classes/base/Autoloader.php';
	$autoloader = new Autoloader;
	$autoloader::registerDirectory (__DIR__.'/classes');
	$autoloader::turnOn();

	$store = new StdoutStore (new PlainTextDataFormatter);
	$market = new Market(new /*CurlDownloader */ FakeDownloader, 'ZZZZZZ');
	$script = new TestScript ($market, $store);

	/**
	 * Вызываем всевозможные методы Маркета
	 * @param int $modelId ID модели на Яндексе
	 * @param int $geoId ID региона
	 */
	$script -> go(10531856, 225);

?>
