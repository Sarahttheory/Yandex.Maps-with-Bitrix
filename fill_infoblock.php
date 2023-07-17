<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');

// Получение ID инфоблока по его коду
$iblockCode = 'objects';
$iblockID = false;
$iblock = CIBlock::GetList(array(), array('CODE' => $iblockCode))->Fetch();
if ($iblock) {
    $iblockID = $iblock['ID'];
}

if ($iblockID) {
    $objects = array(
        array(
            'NAME' => 'Объект 1',
            'PHONE' => '+123456789',
            'EMAIL' => 'object1@example.com',
            'COORDINATES' => '55.753930, 37.620795',
            'CITY' => 'Москва',
        ),
        // Добавьте остальные объекты
    );

    $element = new CIBlockElement;
    foreach ($objects as $object) {
        $elementFields = array(
            'IBLOCK_ID' => $iblockID,
            'NAME' => $object['NAME'],
            'ACTIVE' => 'Y',
            'PROPERTY_VALUES' => array(
                'PHONE' => $object['PHONE'],
                'EMAIL' => $object['EMAIL'],
                'COORDINATES' => $object['COORDINATES'],
                'CITY' => $object['CITY'],
            ),
        );
        $element->Add($elementFields);
    }

    echo 'Инфоблок успешно заполнен данными!';
} else {
    echo 'Инфоблок не найден.';
}
?>
