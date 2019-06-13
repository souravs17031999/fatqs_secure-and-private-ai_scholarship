<?php
require 'google-clients/drive-client.php';
require 'common/helper.php';
// Get the API client and construct the service object.
$client = getDriveClient();
$httpClient = $client->authorize();
$response = $httpClient->get(getenv("google_drive"));

$lessons = json_decode($response->getBody()->getContents())->items;
$lessons = sort_lessons($lessons);
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="css/style.css"/>

</head>

<body>
<section class="banner center-align theme--bg">
    <h1>Secure and Private AI</h1>
    <h2>FATQs in the Slack channel of Udacity's Secure and Private Scholarship Challenge 2019.</h2>
    <a href="#">View on GitHub</a>
</section>
<section class="main__content--block">
    <h2>Content</h2>
    <ol>
        <?php
            foreach($lessons as $lesson) {
                echo '<li>';
                echo '<a href = "lesson.php?id=' . $lesson[0] . '&title=' . $lesson[1] .'" target="_blank">' . $lesson[1] . '</a>';
                echo '</li>';
            }
        ?>
    </ol>
    <h2>Why we have created this repo?</h2>
    <p>All the channels of our Slack community are constantly buzzing with great questions and amazing answers.
        These answers can be in the form of lucid explanations from our peers or references to some awesome resources.
        But due to a limitation of the free plan of Slack, we can search only upto the last 10K messages. As such, we
        are
        loosing the efforts of our peers and all the amazing resources. To prevent this loss of invaluable resources,
        we have created this repo where we would be regularly be adding frequently asked questions and the possible
        solutions
        shared by our peers in the Slack channels. Also, this repo would help future students of this course as they
        would
        find solutions to most of the common problems in a single repo.</p>
    <p>We hope to make this repo useful not only for the students of “Secure and Private AI Scholarship Challenge with
        Facebook” but also for future students of <a href="#">Secure and Private AI course</a> by Facebook AI on
        Udacity.</p>
    <h2>Other Resources</h2>
    <ul>
        <li><a href="#">FATQs 2018/19 PyTorch Scholarship challenge</a>.</li>
        <li><a href="#">Pytorch Udacity resource airtable</a>.</li>
        <li><a href="#">Secure and Private AI resource airtable</a>, you can contribute by submitting your resource
            through this <a href="#">link</a>.
        </li>
    </ul>

</section>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>