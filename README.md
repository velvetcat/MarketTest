MarketTest
==========
Простая (пока) программка, использующая несколько методов API Яндекс.Маркета.

Зачем здесь все эти классы?
---------------------------
Исходная задача звучала как "Загрузить какую-нибудь информацию с Маркета". Какая информация, в каком формате ее загружать, куда сохранять и что потом с ней делать - не известно.

Кроме того, доступ к API был разрешен только с боевого сервера, поэтому до момента выкладки приходилось использовать фейковый загрузчик.

В дальнейем этот же код предполагалось использовать повторно в дальнейшем.

Итоговое решение - сразу строить программу на основе слабо связанных классов. 
