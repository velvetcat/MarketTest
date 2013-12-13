<?
	class TestScript extends MarketScript
	{
		const requestDelay = 1;
		protected $_store;

		public function __construct(IMarket $market, IStore $store)
		{	
			parent::__construct ($market);
			$this -> _market = $market;
			$this -> _store = $store;
		}


		public function go($modelId, $regionId)
		{
			try 
			{
				// TODO: убрать дубликацию кода
				$this -> _store -> addData ('Общая информация по модели '. $modelId, $this -> _market -> getModel ($modelId, $regionId)); $this -> wait();
				$this -> _store -> addData ('Характеристики модели '. $modelId, $this -> _market -> getModelDetails ($modelId)); $this -> wait();
				$this -> _store -> addData ('Предложения на модель '. $modelId, $this -> _market -> getModelOffers ($modelId, $regionId)); $this -> wait();
				$this -> _store -> addData ('Точки продаж модели '. $modelId, $this -> _market -> getModelOffers ($modelId, $regionId)); $this -> wait();

			} catch (Exception $e) 
			{
				raise; // TODO: определиться, что делать с ошибками, куда выводить и пр. и реализовать здесь.				
			}
		}

		private function wait()
		{
				sleep (self::requestDelay);
		}

}
