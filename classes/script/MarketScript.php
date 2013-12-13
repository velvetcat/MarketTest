<?
	abstract class MarketScript
	{
		private $_market;

		public function __construct(IMarket $market)
		{
			$this -> _market = $market;
		}

	}
