<?
	interface IMarket
	{
		public function setFormat ($format);
		public function getModel ($modelId, $regionId);
		public function getModelDetails ($modelId);
		public function getModelOffers ($modelId, $regionId);
		public function getModelOutlets ($modelId, $regionId);
	}