<?php
 
function downloadJs($file_url, $save_to)
{
    $content = file_get_contents($file_url);
    file_put_contents($save_to, $content);
}
 
// Указываем URL, затем папку от корня сайта и имя файла с расширением.
// Проверьте чтобы на папке были права на запись 777/755
// Метрика
downloadJs('https://mc.yandex.ru/metrika/watch.js', realpath("./cache") . '/watch.js');
 
// Google Analytics
downloadJs('https://www.google-analytics.com/analytics.js', realpath("./cache") . '/analytics.js');

// VK
downloadJs('https://vk.com/js/api/openapi.js?136', realpath("./cache") . '/openapi.js');

//Verbox
// downloadJs('https://admin.verbox.ru/support/support.js', realpath("./cache") . '/support.js');
 
// Для скриптов без расширения
// downloadJs('http://code.jivosite.com/script/widget/NuT1gBLsC6', realpath("./cache") . '/NuT1gBLsC6');
 
?>