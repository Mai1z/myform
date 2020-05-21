<?php

error_reporting(0);
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/connection.php';

$myFormData = $connection->query("SELECT * FROM about WHERE age>18");
$myFormData->execute();
$myFormData = $myFormData->fetchAll(PDO::FETCH_ASSOC);

$client = new Google_Client();
$client->setApplicationName('My Simple Form');
$client->setScopes([Google_Service_Sheets::SPREADSHEETS]);
$client->setAccessType('offline');
$client->setAuthConfig(__DIR__ . '/credentials.json');
$service = new Google_Service_Sheets($client);
$spreadsheetId = "1GYMw9bzYBQan8_MPjeOmm0GdR1QX17fBAtfqC7PJNcw";

// Удаление содержимого листа
$requests = [
    new Google_Service_Sheets_Request( [
        'deleteRange' => [
            'range'          => [
                'sheetId' => '0',
            ],
            'shiftDimension' => 'ROWS'
        ]
    ] )
];

$batchUpdateRequest = new Google_Service_Sheets_BatchUpdateSpreadsheetRequest( [
    'requests' => $requests
] );
$service->spreadsheets->batchUpdate( $spreadsheetId, $batchUpdateRequest );

// Формирование листа
$range = "about!A:C";

function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

foreach ($myFormData as $Data)
{
    $values[] = [h($Data['name']),h($Data['surname']),h($Data['age'])];
}

$body = new Google_Service_Sheets_ValueRange([
    'values' => $values
]);

$params = [
    'valueInputOption' => 'RAW'
];

$result = $service->spreadsheets_values->update(
    $spreadsheetId,
    $range,
    $body,
    $params
);

