<?
	class StdoutStore extends DummyStore
	{
		protected function add($record)
		{
			echo $record;
		}
	}