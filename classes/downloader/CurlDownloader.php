<?
    class CurlDownloader implements IDownloader
    {
        private $_curl;

        public function __construct()
        {
            $this -> _curl = curl_init(); 
            curl_setopt($this -> _curl, CURLOPT_SSL_VERIFYPEER, false); 
            curl_setopt($this -> _curl, CURLOPT_SSL_VERIFYHOST, 2);
            curl_setopt($this -> _curl, CURLOPT_RETURNTRANSFER, 1);
        }

        public function setProxy ($proxyAddr)
        {
            if ($proxyAddr)
                curl_setopt($this -> _curl, CURLOPT_PROXY, $proxyAddr);
        }

        public function setProxyAuth ($proxyAuth)
        {
            if ($proxyAuth)
                curl_setopt($this -> _curl, CURLOPT_PROXYUSERPWD, $proxyAuth);
        }

        public function get($url, $headers)
        {
            curl_setopt($this -> _curl, CURLOPT_HTTPHEADER, $headers + array('Connection: Keep-Alive', 'Keep-Alive: 300'));
            curl_setopt($this -> _curl, CURLOPT_URL, $url);

            $answer = curl_exec($this -> _curl);
            if (curl_errno($this -> _curl))
                throw new Exception ('Download Error: '.print_r (curl_getinfo($this -> _curl), true).chr(13).chr(10).curl_error($this -> _curl).chr(13).chr(10).curl_errno($this -> _curl), 1);

            return $answer;
        }

    }