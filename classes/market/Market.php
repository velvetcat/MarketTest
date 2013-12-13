<?
	class Market implements IMarket
	{
		const baseUrl = 'https://api.content.market.yandex.ru/v1/';
		const formatXml = 'xml';
		const formatJson = 'json';

		private $_authorizationKey;
		private $_downloader;
		private $_format;

		public function __construct (IDownloader $downloader, $authorizationKey)
		{
			$this -> _authorizationKey = $authorizationKey;
			$this -> _downloader = $downloader;
			$this -> _format = self::formatXml;
			$this -> _regionId = 0;
		}

		public function setFormat ($format)
		{
			if ($format == self::formatXml)
				$this -> _format = self::formatXml;
			else if ($format == self::formatJson)
				$this -> _format = self::formatJson;
			else 
				throw new Exception("Erroneous format. Possible values: MarketContent::formatXml and MarketContent::formatJson.", 1);
		}
		
		public function getModel($modelId, $regionId)
		{
			return $this -> _downloader -> get (self::baseUrl . 'model/' . $modelId .'.' . $this -> _format . '?geo_id=' . $regionId, $this -> makeHeaders());
		}

		public function getModelDetails($modelId)
		{
			return $this -> _downloader -> get (self::baseUrl . 'model/' . $modelId . '/details.' . $this -> _format . '?geo_id=' . $regionId, $this -> makeHeaders());
		}

		public function getModelOffers($modelId, $regionId)
		{
			return $this -> _downloader -> get (self::baseUrl . 'model/' . $modelId . '/offers.' . $this -> _format . '?geo_id=' . $regionId, $this -> makeHeaders());
		}

		public function getModelOutlets($modelId, $regionId)
		{
			return $this -> _downloader -> get (self::baseUrl . 'model/' . $modelId . '/outlets.' . $this -> _format . '?geo_id=' . $regionId, $this -> makeHeaders());
		}

		private function makeHeaders()
		{
			return array('Accept:*/*','Authorization:'.$this -> _authorizationKey);
		}

	}


?>