<?php
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Карта объектов');
?>

<link rel="stylesheet" href="style.css">

<div class="container">
    <h1>Карта объектов</h1>

    <div class="map">
        <?php
        // Получение данных из инфоблока
        $iblockCode = 'objects';
        $iblockID = false;
        $iblock = CIBlock::GetList(array(), array('CODE' => $iblockCode))->Fetch();
        if ($iblock) {
            $iblockID = $iblock['ID'];
        }

        if ($iblockID) {
            // Запрос элементов инфоблока
            $elements = CIBlockElement::GetList(
                array(),
                array('IBLOCK_ID' => $iblockID, 'ACTIVE' => 'Y'),
                false,
                false,
                array('ID', 'NAME', 'PROPERTY_PHONE', 'PROPERTY_EMAIL', 'PROPERTY_COORDINATES', 'PROPERTY_CITY')
            );

            $placemarks = array();
            while ($element = $elements->Fetch()) {
                $coordinates = explode(',', $element['PROPERTY_COORDINATES_VALUE']);
                $placemarks[] = array(
                    'LAT' => $coordinates[0],
                    'LON' => $coordinates[1],
                    'TEXT' => $element['NAME'],
                );
            }

            // Вывод компонента карты Яндекс.Карт
            $APPLICATION->IncludeComponent(
                'bitrix:map.yandex.view',
                '',
                array(
                    'INIT_MAP_TYPE' => 'MAP',
                    'MAP_DATA' => serialize(array(
                        'yandex_lat' => 55.753930,
                        'yandex_lon' => 37.620795,
                        'yandex_scale' => 10,
                        'PLACEMARKS' => $placemarks,
                    )),
                    'MAP_WIDTH' => '100%',
                    'MAP_HEIGHT' => '500px',
                    'CONTROLS' => array('ZOOM', 'MINIMAP', 'TYPECONTROL', 'SCALELINE'),
                    'OPTIONS' => array('ENABLE_SCROLL_ZOOM', 'ENABLE_DBLCLICK_ZOOM', 'ENABLE_DRAGGING'),
                    'CACHE_TYPE' => 'A',
                    'CACHE_TIME' => 36000000,
                    'API_KEY' => 'ваш апи',
                ),
                null,
                array('HIDE_ICONS' => 'Y')
            );
        } else {
            echo 'Инфоблок не найден.';
        }
        ?>
    </div>
</div>

<?php require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php'); ?>
