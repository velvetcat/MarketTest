<?
	abstract class DummyStore implements IStore
	{
		protected $_formatter;

		public function __construct(IDataFormatter $formatter)
		{
			$this -> _formatter = $formatter;
		}

		public function addData($key, $data)
		{
			$record = $this -> _formatter -> formatData ($key, $data);
			$this -> add ($record);
		}

		abstract protected function add($record);		
	}