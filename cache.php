<?php
 
function downloadJs($file_url, $save_to)
{
    $content = file_get_contents($file_url);
    file_put_contents($save_to, $content);
}
 
// ��������� URL, ����� ����� �� ����� ����� � ��� ����� � �����������.
// ��������� ����� �� ����� ���� ����� �� ������ 777/755
// �������
downloadJs('https://mc.yandex.ru/metrika/watch.js', realpath("./cache") . '/watch.js');
 
// Google Analytics
downloadJs('https://www.google-analytics.com/analytics.js', realpath("./cache") . '/analytics.js');

// VK
downloadJs('https://vk.com/js/api/openapi.js?136', realpath("./cache") . '/openapi.js');

//Verbox
// downloadJs('https://admin.verbox.ru/support/support.js', realpath("./cache") . '/support.js');
 
// ��� �������� ��� ����������
// downloadJs('http://code.jivosite.com/script/widget/NuT1gBLsC6', realpath("./cache") . '/NuT1gBLsC6');
 
?>