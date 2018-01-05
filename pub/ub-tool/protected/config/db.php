<?php
return array(
    'components'=>array(
        //database of Magento1
        'db1' => array(
            'connectionString' => 'mysql:host=localhost;port=3306;dbname=headsupfourtailsnew',
            'emulatePrepare' => true,
            'username' => 'headsupfourtails',
            'password' => 'PqDyyR3Q9r9BeE1h',
            'charset' => 'utf8',
            'tablePrefix' => 'mg_',
            'class' => 'CDbConnection'
        ),
        //database of Magento 2 (we use this database for this tool too)
        'db' => array(
            'connectionString' => 'mysql:host=localhost;port=3306;dbname=headsupfourtails',
            'emulatePrepare' => true,
            'username' => 'headsupfourtails',
            'password' => 'PqDyyR3Q9r9BeE1h',
            'charset' => 'utf8',
            'tablePrefix' => '',
            'class' => 'CDbConnection'
        ),
    )
);
