<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');

$iblockTypeID = 'objects';
$iblockCode = 'objects';
$iblockName = 'Объекты';

$iblock = new CIBlock;
$iblockFields = array(
    'ACTIVE' => 'Y',
    'NAME' => $iblockName,
    'CODE' => $iblockCode,
    'IBLOCK_TYPE_ID' => $iblockTypeID,
    'SITE_ID' => array('s1'),
    'SORT' => 500,
    'GROUP_ID' => array('2' => 'R'),
);
$iblockID = $iblock->Add($iblockFields);

if ($iblockID) {
    $property = new CIBlockProperty;

    // Добавление свойства "Название объекта"
    $propertyFields = array(
        'NAME' => 'Название объекта',
        'CODE' => 'NAME',
        'PROPERTY_TYPE' => 'S',
        'SORT' => 100,
        'IBLOCK_ID' => $iblockID,
    );
    $property->Add($propertyFields);

    // Добавление свойства "Телефон"
    $propertyFields = array(
        'NAME' => 'Телефон',
        'CODE' => 'PHONE',
        'PROPERTY_TYPE' => 'S',
        'SORT' => 200,
        'IBLOCK_ID' => $iblockID,
    );
    $property->Add($propertyFields);

    // Добавление свойства "Email"
    $propertyFields = array(
        'NAME' => 'Email',
        'CODE' => 'EMAIL',
        'PROPERTY_TYPE' => 'S',
        'SORT' => 300,
        'IBLOCK_ID' => $iblockID,
    );
    $property->Add($propertyFields);

    // Добавление свойства "Координаты"
    $propertyFields = array(
        'NAME' => 'Координаты',
        'CODE' => 'COORDINATES',
        'PROPERTY_TYPE' => 'S',
        'SORT' => 400,
        'IBLOCK_ID' => $iblockID,
    );
    $property->Add($propertyFields);

    // Добавление свойства "Город"
    $propertyFields = array(
        'NAME' => 'Город',
        'CODE' => 'CITY',
        'PROPERTY_TYPE' => 'S',
        'SORT' => 500,
        'IBLOCK_ID' => $iblockID,
    );
    $property->Add($propertyFields);

    echo 'Инфоблок успешно создан и заполнен свойствами!';
} else {
    echo 'Ошибка при создании инфоблока: '.$iblock->LAST_ERROR;
}
?>
