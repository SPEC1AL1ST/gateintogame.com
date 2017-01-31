<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, width=device-width">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Сервис по продаже внутриигровых ценностей и валют, а также оказанию различного вида услуг в онлайн играх жанра MMORPG.">
    <meta name="Keywords" content="online, mmorpg, bless, wow, eve online, aion, swtor, tera l2, lineage, gold, золото, кинары, серебро, голд, иски, isk, купить иски, купить голд, купить золото, продать голд, продать голд блесс, продать иски, продать isk, продать голд вов, купить голд блесс, купить голд вов, купить иски ив онлайн, купить isk, внутриигровая валюта, онлайн игры, прокачка, гарант, сделка, гейтинтогейм">
    <link href="../favicon.ico" rel="shortcut icon" type="image/x-icon">
    <link href="../css/normalize.css" rel="stylesheet">
    <link href="../css/social-likes_birman.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
    <title>GateIntoGame - Детали платежа</title>
</head>
<body>
<div class="layout">
    <header>
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a class="header-menu-item-button" href="../guarantee.php">Гарантии</a>
            <a class="header-menu-item-button" href="../payment.php">Оплата</a>
            <a class="header-menu-item-button" href="../delivery.php">Доставка</a>
            <a class="header-menu-item-button" href="../faq.php">FAQ</a>
            <a class="header-menu-item-button" href="../supplier.php">Поставщикам</a>
            <a class="header-menu-item-button" href="../guarantor.php">Гарант сделок</a>
            <a class="header-menu-item-button" href="../personal_area.php">Личный кабинет</a>
        </div>
        <span class="sidenav-span" onclick="openNav()">&#9776; Меню</span>
        <div class="header-container cf">
            <div class="logo"><a href="//gateintogame.com"><img src="../img/logo.png" alt="Logo"></a></div>
            <div class="header-login cf">
                <div id="wrapper">
                    <div class="form-social-auth-register">
                        <div class="form-social-auth-register-text">
                            <p>Авторизация через социальные сети</p>
                            <a href="#" target="_blank"><img src="../img/vk_logo.png"
                                                             alt="Вконтакте"
                                                             title="Вконтакте"></a>
                            <a href="#" target="_blank"><img
                                        src="../img/facebook_logo.png" alt="Фейсбук" title="Фейсбук"></a>
                            <a href="#" target="_blank"><img src="../img/gplus_logo.png" alt="Google+"
                                                             title="Google+"></a>
                            <a href="#" target="_blank"><img src="../img/twitter_logo.png"
                                                             alt="Твиттер"
                                                             title="Твиттер"></a>
                        </div>
                        <p class="change_link">
                            Вы еще не с нами?
                            <a href="../login.html#toregister" class="to_register">Присоединиться</a>
                        </p>
                    </div>
                    <div id="login" class="animate form cf">
                        <form action="mysuperscript.php" autocomplete="on" method="post">
                            <p>
                                <label for="username" class="uname" data-icon="u"> Ваш e-mail </label>
                                <input id="username" name="username" required="required" type="text" placeholder="mymail@gmail.com"/>
                            </p>
                            <p>
                                <label for="password" class="youpasswd" data-icon="p"> Ваш пароль </label>
                                <input id="password" name="password" required="required" type="password" placeholder="например X8df!90EO"/>
                            </p>
                            <p class="keeplogin">
                                <input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping"/>
                                <label for="loginkeeping">Запомнить меня</label>
                            </p>
                            <p class="login button">
                                <input type="submit" value="Войти"/>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-menu-container">
            <ul class="header-menu-list">
                <li class="header-menu-item"><a class="header-menu-item-button" href="../guarantee.php">Гарантии</a></li>
                <li class="header-menu-item"><a class="header-menu-item-button" href="../payment.php">Оплата</a></li>
                <li class="header-menu-item"><a class="header-menu-item-button" href="../delivery.php">Доставка</a></li>
                <li class="header-menu-item"><a class="header-menu-item-button" href="../faq.php">FAQ</a></li>
                <li class="header-menu-item"><a class="header-menu-item-button" href="../supplier.php">Поставщикам</a></li>
                <li class="header-menu-item"><a class="header-menu-item-button" href="../guarantor.php">Гарант сделок</a></li>
            </ul>
        </div>
    </header>
    <main>
        <div class="main-table-row">
            <div class="main-left-block-container cf">
                <h2>Спасибо за покупку!</h2>
                <div class="success-container">
                    <?php
                    // если переменная uniquecode не передана
                    if (!isset($_GET["uniquecode"])) {
                        ?>
                        <p>Переменная <strong>uniquecode</strong> не была задана!</p>
                    <?php } else {
                        $_GET["uniquecode"] = substr(preg_replace("/[^A-Z0-9]/", "", $_GET["uniquecode"]), 0, 16);

                        // если переменная uniquecode пустая
                        if (empty($_GET["uniquecode"])) {
                            ?>
                            <span class="warning">Ошибка: переменная <strong>uniquecode</strong> не должна быть пустой!</span>
                        <?php } // если количество символов меньше 16
                        elseif (strlen($_GET["uniquecode"]) != 16) {
                            ?>
                            <span class="warning">Ошибка: переменная <strong>uniquecode</strong> должно содержать 16 символов!</span>
                        <?php } else {
                            require_once "./main.php";
                            require_once "./config.php";

                            $obj = new check_code;
                            $sign = md5($id_seller . ":" . $_GET["uniquecode"] . ":" . $pass_DS);
                            $answer = @$obj->answer_check_code($id_seller, $_GET["uniquecode"], $sign);

                            $xml_data = @new SimpleXMLElement($answer);

                            if (!@$xml_data) {
                                echo "<span class=\"warning\">Не удается разобрать XML-ответ!</span>\r\n";
                            } else {

// проверяем возвращаемый код(retval). В случае успеха выполняем необходимые действия
                                /* рекомедуется проверять все полученные параметры ответа, особое внимание стоит обратить на inv.
                                Настоятельно рекомендуем сохранять это значение в своей базе и каждый раз проверять его на уникальность, чтобы избежать повторного начисления */
                                if ($xml_data->retval == 0 && $xml_data->unique_code == $_GET["uniquecode"]) {
                                    echo "<br /><fieldset>
<legend>Детали платежа</legend>
<strong>Номер счета</strong>: " . $xml_data->inv . "<br />
<strong>Дата платежа</strong>: " . $xml_data->date_pay . "<br />
<strong>Идентификатор товара</strong>: " . $xml_data->id_goods . "<br />
<strong>Сумма</strong>: " . $xml_data->amount . "<br />
<strong>Валюта</strong>: " . $xml_data->type_curr . "<br />\r\n";
                                    if (!empty($xml_data->unit_goods) && !empty($xml_data->cnt_goods)) {
                                        echo "<strong>Единица товара</strong>: " . $xml_data->unit_goods . "<br />
<strong>Количество единиц товара</strong>: " . $xml_data->cnt_goods . "<br /><br />
                                    <strong>По возможности, пожалуйста, свяжитесь с оператором для уточнения деталей получения товара.</strong><br />
                                    <span class=\"please-leave-review\"><strong>После получения заказа просим залогиниться на <a href='//oplata.info'>www.oplata.info</a> и оставить отзыв о покупке!</strong></span><br /><br />
                                    <strong>If possible, please contact the operator for further details of receipt of goods.</strong><br />
                                    <span class=\"please-leave-review\"><strong>After receiving the order, please login at the <a href='//oplata.info'>www.oplata.info</a> and give feedback on the purchase!</strong></span>\r\n";
                                    }
                                    echo "</fieldset>\r\n";
                                } else {
                                    echo "<br /><span class=\"warning\">Платеж не найден!</span>\r\n";
                                }
                            }
                        }
                    }
                    ?>
                </div>
                <div class="main-left-block-payment-methods-container cf">
                    <h2 class="main-left-block-payment-methods-header cf">Способы оплаты</h2>
                    <div class="main-left-block-payment-methods-item">
                        <img src="../img/payments/webmoney-white.png" alt="WebMoney" title="WebMoney">
                        <img src="../img/payments/yandexmoney.png" alt="Яндекс.Деньги" title="Яндекс.Деньги">
                        <img src="../img/payments/qiwi.png" alt="QIWI" title="QIWI">
                        <img src="../img/payments/cash_usd.png" alt="Наличные в USD" title="Наличные в USD">
                        <img src="../img/payments/visa.png" alt="Visa" title="Visa">
                        <img src="../img/payments/mastercard.png" alt="MasterCard" title="MasterCard">
                        <img src="../img/payments/maestro.png" alt="Maestro" title="Maestro">
                        <img src="../img/payments/cash_rub.png" alt="Наличные в RUR" title="Наличные в RUR">
                        <img src="../img/payments/privatbank.png" alt="ПриватБанк" title="ПриватБанк">
                        <img src="../img/payments/alfabank-white.png" alt="Альфа-Клик" title="Альфа-Клик">
                        <img src="../img/payments/raiffeisen.png" alt="Райффайзен" title="Райффайзен">
                        <img src="../img/payments/cash_uah.png" alt="Наличные в UAH" title="Наличные в UAH">
                        <img src="../img/payments/sberbank.png" alt="Сбербанк" title="Сбербанк">
                        <img src="../img/payments/liqpay.png" alt="LiqPay" title="LiqPay">
                        <img src="../img/payments/paypal.png" alt="PayPal" title="PayPal">
                        <img src="../img/payments/cash_byr.png" alt="Наличные в BYR" title="Наличные в BYR">
                        <img src="../img/payments/sms.png" alt="SMS" title="SMS">
                        <img src="../img/payments/moneybookers.png" alt="Skrill" title="Skrill">
                        <img src="../img/payments/ukash.png" alt="Ukash" title="Ukash">
                        <img src="../img/payments/cash_eur.png" alt="Наличные в EUR" title="Наличные в EUR">
                    </div>
                </div>
            </div>
            <div class="main-right-block-container cf">
                <div class="main-right-block-contacts-container cf">
                    <h2 class="main-right-block-contacts-header">Контакты</h2>
                    <div class="main-right-block-contacts cf">
                        <div class="main-right-block-contacts-information cf">
                            <div class="main-right-block-contacts-information-item">
                                <img src="../img/icq.png" alt="ICQ" title="ICQ"><span>200685626</span>
                            </div>
                            <div class="main-right-block-contacts-information-item">
                                <img src="../img/skype.png" alt="Skype" title="Skype"><a href="skype:GateIntoGame?chat"
                                                                                         title="Skype">GateIntoGame</a>
                            </div>
                            <div class="main-right-block-contacts-information-item">
                                <img src="../img/discord.png" alt="Discord" title="Discord"><a
                                        href="https://discord.gg/jXtcUrW" title="Discord">GateIntoGame</a>
                            </div>
                            <div class="main-right-block-contacts-information-item">
                                <img src="../img/viber.png" alt="Viber" title="Viber"><a href="https://viber.com/gateintogame"
                                                                                      title="Viber" target="_blank">GateIntoGame</a>
                            </div>
                            <div class="main-right-block-contacts-information-item">
                                <img src="../img/whatsapp.png" alt="WhatsApp" title="WhatsApp"><a
                                        href="whatsapp://chat?number=380954460599" title="WhatsApp">+380954460599</a>
                            </div>
                            <div class="main-right-block-contacts-information-item">
                                <img src="../img/email.png" alt="E-Mail" title="E-Mail"><a href="mailto:admin@gateintogame.com"
                                                                                           title="E-Mail">Почта</a>
                            </div>
                        </div>
                        <div id="vk_groups"></div>
                        <div class="social-likes">
                            <div class="main-right-block-contacts-social-pages-links">
                                <h3 class="main-right-block-contacts-social-pages">Наши страницы</h3>
                                <a href="https://vk.com/gateintogame" target="_blank"><img src="../img/vk_logo.png"
                                                                                           alt="Страница Вконтакте"
                                                                                           title="Страница Вконтакте"></a>
                                <a href="https://www.facebook.com/gateintogame" target="_blank"><img
                                            src="../img/facebook_logo.png" alt="Страница в Фейсбук" title="Страница в Фейсбук"></a>
                                <a href="https://plus.google.com/+Gateintogame" target="_blank"><img src="../img/gplus_logo.png" alt="Страница в Google+"
                                                                 title="Страница в Google+"></a>
                                <a href="https://ok.ru/group/58211336454193" target="_blank"><img src="../img/classmates_logo.png"
                                                                 alt="Страница в Одноклассниках"
                                                                 title="Страница в Одноклассниках"></a>
                                <a href="https://twitter.com/GateIntoGame" target="_blank"><img src="../img/twitter_logo.png"
                                                                 alt="Твиттер"
                                                                 title="Твиттер"></a>
                            </div>
                            <h3 class="main-right-block-contacts-social-sharing">Поделиться</h3>
                            <div class="facebook" title="Поделиться ссылкой на Фейсбуке">Facebook</div>
                            <div class="mailru" title="Поделиться ссылкой в Моём мире">Мой мир</div>
                            <div class="vkontakte" title="Поделиться ссылкой во Вконтакте">Вконтакте</div>
                            <div class="odnoklassniki" title="Поделиться ссылкой в Одноклассниках">Одноклассники</div>
                            <div class="plusone" title="Поделиться ссылкой в Гугл-плюс">Google+</div>
                        </div>
                    </div>
                </div>
                <div class="main-right-block-track-order-container cf">
                    <h2 class="main-right-block-track-order-header">Отследить заказ</h2>
                    <div class="main-right-block-search-box cf">
                        <form action="#" method="post">
                            <label>
                                <input class="main-right-block-search-box-input" type="search" placeholder="Номер заказа">
                                <input class="main-right-block-search-box-button" type="button" value="Поиск">
                            </label>
                        </form>
                    </div>
                </div>
                <div class="main-right-block-reviews-container cf">
                    <h2 class="main-right-block-reviews-header">Последние отзывы</h2>
                    <div class="main-right-block-reviews">
                        <div class="main-right-block-reviews-hidden">
                            <div class="reviews-table">
                                <div class="reviews-table-header">
                                    <div class="reviews-table-cell reviews-table-head">Имя</div>
                                    <div class="reviews-table-cell reviews-table-head">Отзыв</div>
                                </div>
                                <div class="reviews-table-row-group">
                                    <div class="reviews-table-row">
                                        <div class="reviews-table-cell reviews-table-name">Дмитрий222222222222222222</div>
                                        <div class="reviews-table-cell reviews-table-review">Отличный сайт, купил много
                                            золота
                                            без проблем1111111111111111111111111111111111 22222222222222
                                        </div>
                                    </div>
                                    <div class="reviews-table-row">
                                        <div class="reviews-table-cell reviews-table-name">Дмитрий</div>
                                        <div class="reviews-table-cell reviews-table-review">Отличный сайт
                                        </div>
                                    </div>
                                    <div class="reviews-table-row">
                                        <div class="reviews-table-cell reviews-table-name">Дмитрий</div>
                                        <div class="reviews-table-cell reviews-table-review">Отличный сайт, купил много
                                            золота
                                            без проблем222222222222222222333333333333333333333333
                                        </div>
                                    </div>
                                    <div class="reviews-table-row">
                                        <div class="reviews-table-cell reviews-table-name">Дмитрий</div>
                                        <div class="reviews-table-cell reviews-table-review">Отличный сайт, купил много
                                            золота
                                            без проблем
                                        </div>
                                    </div>
                                    <div class="reviews-table-row">
                                        <div class="reviews-table-cell reviews-table-name">Дмитрий</div>
                                        <div class="reviews-table-cell reviews-table-review">Отличный сайт, купил много
                                            золота
                                            без проблем
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
    <div class="footer-bottom-menu-list-container cf">
        <ul class="footer-bottom-menu-list">
            <li class="footer-bottom-menu-list-item"><a href="../guarantee.php">Гарантии</a></li>
            <li class="footer-bottom-menu-list-item"><a href="../payment.php">Оплата</a></li>
            <li class="footer-bottom-menu-list-item"><a href="../delivery.php">Доставка</a></li>
            <li class="footer-bottom-menu-list-item"><a href="../faq.php">FAQ</a></li>
            <li class="footer-bottom-menu-list-item"><a href="../supplier.php">Поставщикам</a></li>
            <li class="footer-bottom-menu-list-item"><a href="../guarantor.php">Гарант сделок</a></li>
            <li class="footer-bottom-menu-list-item"><a href="../personal_area.php">Личный кабинет</a></li>
        </ul>
    </div>
        <div class="footer-container">
            <p class="footer-copyright">
                © Copyright 2006 -
                <time datetime="2017">2017,</time>
                All Rights Reserved
            </p>
            <div class="footer-buttons">
                <!-- begin WebMoney Transfer : attestation label -->
                <div class="footer-buttons-item">
                    <a href="https://passport.webmoney.ru/asp/certview.asp?wmid=206131806689" target=_blank><img
                                src="../img/88x31_wm_blue_on_white_ru.png" alt="WebMoney"
                                title="Здесь находится аттестат нашего WM идентификатора 206131806689"><br><span
                                class="footer-emoney-title">Проверить аттестат</span></a>
                    <!-- end WebMoney Transfer : attestation label -->
                </div>
                <div class="footer-buttons-item">
                    <a href="https://money.yandex.ru/to/410012277396683" target=_blank><img
                                src="../img/88x31_yandex_money_on_white_ru.png"
                                title="Здесь находится кошелёк Яндекс.Денег"><br><span
                                class="footer-emoney-title">Проверить кошелёк</span></a>
                </div>
            </div>
            <p class="footer-tagline">
                Gate into Game | Самое лучшее - только для Вас!
            </p>
        </div>
    </footer>
</div>
<!--<script src="js/main.js"></script>-->
<script src="../js/jquery-3.1.1.min.js"></script>
<script src="../js/social-likes.min.js"></script>
<!--Google Analytics-->
<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-88162574-1', 'auto');
    ga('send', 'pageview');

</script>
<!-- End Google Analytics -->
<!--Slider-->
<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
</script>
<!--Главный виджет ВК-->
<script type="text/javascript" src="//vk.com/js/api/openapi.js?136"></script>
<script type="text/javascript">VK.Widgets.Group("vk_groups", {
        mode: 3,
        width: "220",
        color1: 'FAF9F0'
    }, 133736952);</script>
<!-- End Главный виджет ВК -->
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter42431204 = new Ya.Metrika({
                    id:42431204,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/42431204" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
<!--Социальные сети-->
<script type="application/ld+json">
{
  "@context" : "http://schema.org",
  "@type" : "Organization",
  "name" : "Gate Into Game",
  "url" : "https://gateintogame.com",
  "sameAs" : [
    "https://vk.com/gateintogame",
    "https://www.facebook.com/gateintogame",
    "https://twitter.com/GateIntoGame",
    "https://plus.google.com/+Gateintogame"
  ]
}
</script>
<!-- End Социальные сети -->
<!-- Begin Verbox -->
<script type='text/javascript'>
    (function(d, w, m) {
        window.supportAPIMethod = m;
        var s = d.createElement('script');
        s.type ='text/javascript'; s.id = 'supportScript'; s.charset = 'utf-8';
        s.async = true;
        var id = '37db501e774219d27c78293970c13368';
        s.src = '//admin.verbox.ru/support/support.js?h='+id;
        var sc = d.getElementsByTagName('script')[0];
        w[m] = w[m] || function() { (w[m].q = w[m].q || []).push(arguments); };
        if (sc) sc.parentNode.insertBefore(s, sc);
        else d.documentElement.firstChild.appendChild(s);
    })(document, window, 'Verbox');
</script>
<!-- End Verbox -->
</body>
</html>