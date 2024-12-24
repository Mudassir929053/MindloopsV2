<?php
require_once 'config.php'; // Include the config.php file

// Ensure the user is authenticated
if (!isset($_SESSION['access_token'])) {
    echo json_encode(['success' => false, 'message' => 'User not authenticated']);
    exit();
}

$client->setAccessToken($_SESSION['access_token']);
$service = new Google_Service_Calendar($client);

// Get the date and time from the POST request
$data = json_decode(file_get_contents('php://input'), true);
$classDate = $data['date'];
$classTime = $data['time'];

if (!$classDate || !$classTime) {
    echo json_encode(['success' => false, 'message' => 'Invalid date or time']);
    exit();
}

// Combine date and time
$startDateTime = new DateTime("$classDate $classTime");
$endDateTime = clone $startDateTime;
$endDateTime->modify('+1 hour');

$event = new Google_Service_Calendar_Event([
    'summary' => 'Online Class',
    'description' => 'Class description',
    'start' => [
        'dateTime' => $startDateTime->format(DateTime::RFC3339),
        'timeZone' => 'America/Los_Angeles',
    ],
    'end' => [
        'dateTime' => $endDateTime->format(DateTime::RFC3339),
        'timeZone' => 'America/Los_Angeles',
    ],
    'conferenceData' => [
        'createRequest' => [
            'conferenceSolutionKey' => [
                'type' => 'hangoutsMeet'
            ],
            'requestId' => 'some-random-string'
        ]
    ],
    'attendees' => [], // No need to specify attendees at this point
]);

try {
    $event = $service->events->insert('primary', $event, ['conferenceDataVersion' => 1]);
    $meetLink = $event->hangoutLink;

    echo json_encode(['success' => true, 'meet_link' => $meetLink]);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'An error occurred: ' . $e->getMessage()]);
}
?>
