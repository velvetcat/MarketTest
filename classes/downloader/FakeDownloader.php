<?
    class FakeDownloader implements IDownloader
    {
        public function __construct()
        {
        }

        public function setProxy ($proxyAddr)
        {
        }

        public function setProxyAuth ($proxyAuth)
        {
        }

        public function get($url, $headers)
        {
            $answer  = '<!-- URL: '. $url . '-->';
            $answer .= '<!-- headers: '. print_r ($headers, 1) . '-->';
            $answer .= '<model id="{идентификатор_модели}" offers-count="{количество_товарных_предложений}" category-id="{идентификатор_категории}" rating="{значение_рейтинга_модели}" reviews-count="{количество_отзывов}" is-new="{признак_новизны}" vendor-id="{идентификатор_производителя}">
                          <parent-model id="{идентификатор_групповой_модели}"/>
                          <photos>
                            <photo height="{высота_изображения}" width="{ширина_изображения}">{URL_изображения}</photo>
                            ...
                          </photos>
                          <name>{наименование_модели}</name>
                          <main-photo height="{высота}" width="{ширина}">{URL_изображения}</main-photo>
                          <big-photo height="{высота}" width="{ширина}">{URL_изображения}</big-photo>
                          <prices max="{максимальная_цена}" min="{минимальная_цена}" avg="{средняя_цена}">
                            <cur-name>{название_валюты}</cur-name>
                            <cur-code>{идентификатор_валюты}</cur-code>
                          </prices>
                          <link>{URL_карточки_модели}</link>
                          <is-group>{признак_групповой_модели}</is-group>
                          <vendor>{наименование_производителя}</vendor>
                          <description>{описание_модели}</description>
                          <facts>
                            <pro>{достоинства}</pro>
                            ...
                            <contra>{недостатки}</contra>
                            ...
                          </facts>
                        </model>';

            return $answer;
        }

    }