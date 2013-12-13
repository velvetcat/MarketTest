<?
	class HtmlDataFormatter implements IDataFormatter
	{
		public function formatData ($key, $data)
		{
			return '<h3>'.$key.'</h3>'.'<p>'. htmlentities($data) . '</p>'; // TODO: пофиксить htmlentities для русских символов
		}
	}