<?php

require_once __DIR__ . '/vendor/autoload.php';
use src\FinanceNewsParser;

$url = 'https://search.cnbc.com/rs/search/combinedcms/view.xml?partnerId=wrss01&id=10000664';

$parser = new FinanceNewsParser($url);

$news = $parser->parse();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finance News</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f9f9f9;
            padding: 20px;
        }
        .news-item {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 20px;
            padding: 15px;
        }
        .news-title {
            font-size: 18px;
            margin-bottom: 5px;
        }
        .news-description {
            color: #666;
        }
        .news-link {
            color: #007bff;
            text-decoration: none;
        }
        .news-pubDate {
            font-size: 12px;
            color: #999;
        }
    </style>
</head>
<body>
<h1>Finance News</h1>
<?php foreach ($news as $item): ?>
    <div class="news-item">
        <h2 class="news-title"><?php echo $item->getTitle(); ?></h2>
        <p class="news-description"><?php echo $item->getDescription(); ?></p>
        <p><a class="news-link" href="<?php echo $item->getLink(); ?>" target="_blank">Read more</a></p>
        <p class="news-pubDate">Published on <?php echo $item->getPubDate(); ?></p>
    </div>
<?php endforeach; ?>
</body>
</html>