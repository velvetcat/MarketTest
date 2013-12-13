<?
    interface IDownloader
    {
        public function setProxy ($proxyAddr);
        public function setProxyAuth ($proxyAuth);
        public function get($url, $headers);
    }