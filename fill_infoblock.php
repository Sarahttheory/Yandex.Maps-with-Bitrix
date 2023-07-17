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
        array(
            'NAME' => 'Объект 2',
            'PHONE' => '+987654321',
            'EMAIL' => 'object2@example.com',
            'COORDINATES' => '55.123456, 37.987654',
            'CITY' => 'Санкт-Петербург',
        ),
        array(
            'NAME' => 'Объект 3',
            'PHONE' => '+789456123',
            'EMAIL' => 'object3@example.com',
            'COORDINATES' => '56.854612, 35.825469',
            'CITY' => 'Тверь',
        ),
        array(
            'NAME' => 'Объект 4',
            'PHONE' => '+456789123',
            'EMAIL' => 'object4@example.com',
            'COORDINATES' => '53.227283, 50.237634',
            'CITY' => 'Самара',
        ),
        array(
            'NAME' => 'Объект 5',
            'PHONE' => '+321654987',
            'EMAIL' => 'object5@example.com',
            'COORDINATES' => '56.838011, 60.597465',
            'CITY' => 'Екатеринбург',
        ),
        array(
            'NAME' => 'Объект 6',
            'PHONE' => '+654789321',
            'EMAIL' => 'object6@example.com',
            'COORDINATES' => '59.934280, 30.335099',
            'CITY' => 'Санкт-Петербург',
        ),
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
