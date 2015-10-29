<?php
	include("./includes/login.inc.php");
	if (!LoggedIn()) { die("must be logged in to admin"); }

  require_once './google-api-php-client/src/Google/autoload.php';



$p12FilePath = 'client_secrets.p12';


$serviceClientId = '621194595079-5tmt0eorpgj64qib92i51ocoahe044tj@developer.gserviceaccount.com.apps.googleusercontent.com';

$serviceAccountName = '621194595079-5tmt0eorpgj64qib92i51ocoahe044tj@developer.gserviceaccount.com';

$scopes = array(
    'https://www.googleapis.com/auth/analytics.readonly'
);

$googleAssertionCredentials = new Google_Auth_AssertionCredentials(
    $serviceAccountName,
    $scopes,
    file_get_contents($p12FilePath)
);

$client = new Google_Client();
$client->setAssertionCredentials($googleAssertionCredentials);
$client->setClientId($serviceClientId);
$client->setApplicationName("Project");

$analytics = new Google_Service_Analytics($client);

$analyticsViewId    = 'ga:107681508';

$startDate          = '2015-01-01';
$endDate            = '2020-12-15';
$metrics            = 'ga:sessions,ga:pageviews,ga:avgSessionDuration';

$data = $analytics->data_ga->get($analyticsViewId, $startDate, $endDate, $metrics, array(

    'sort'          => '-ga:pageviews',
));

// Data 
$items = $data->getRows();

echo ("<table>");

echo ("<th>Visitor Count</th>");
echo ("<th>Page Views</th>");
echo ("<th>Average Time Spent (sec)</th>");


foreach ($items as $item) {
	echo ("<tr>");
	foreach($item as $subitem) {
		echo ("<td>$subitem</td>");
	}
	echo ("</tr>");
}
echo ("</table>");

?>
