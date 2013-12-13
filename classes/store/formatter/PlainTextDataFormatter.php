<?
	class PlainTextDataFormatter implements IDataFormatter
	{
		public function formatData ($key, $data)
		{
			return $key."\r\n".$data."\r\n\r\n";
		}
	}