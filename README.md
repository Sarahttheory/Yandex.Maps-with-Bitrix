# Описание проекта
Этот проект реализует задание по выводу списка объектов через Яндекс.Карты на платформе Битрикс. 
Он включает создание инфоблока, заполнение его данными объектов и вывод интерактивной карты с маркерами офисов.

# Установка и настройка
Склонируйте репозиторий или загрузите все файлы проекта на свой локальный компьютер или сервер.

Убедитесь, что у вас установлен и настроен веб-сервер, такой как Apache или Nginx, а также база данных, например, MySQL.

Установите и настройте платформу Битрикс, следуя официальной документации.

Создайте новый веб-сайт в административной панели Битрикса и настройте его параметры, включая название, язык и доменное имя.

В административной панели убедитесь, что установлен и активирован модуль "Информационные блоки".

Запустите скрипт create_infoblock.php, чтобы создать инфоблок и его свойства в Битриксе. Убедитесь, что вы находитесь в корневой директории вашего веб-сайта при запуске скрипта.

Запустите скрипт fill_infoblock.php, чтобы заполнить инфоблок данными объектов. 
Укажите соответствующие данные объектов в массиве $objects внутри файла.

В административной панели создайте новую страницу и добавьте на нее компонент карты Яндекс.Карт, используя файл map.php.

Стили для компонента карты находятся в файле style.css. Убедитесь, что данный файл подключен к вашей странице в административной панели.

Откройте ваш веб-сайт в браузере и перейдите на страницу, на которой вы разместили компонент карты. Вы должны увидеть интерактивную карту с маркерами объектов.

# Зависимости
### Платформа Битрикс: 

Для работы проекта требуется установленная и настроенная платформа Битрикс.

### API Яндекс.Карт:

Для работы компонента карты требуется наличие ключа API Яндекс.Карт. 

Укажите свой ключ API в файле map.php в переменной $api_key.