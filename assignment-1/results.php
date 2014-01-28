<?php

$host = 'itp460.usc.edu';
$dbname = 'dvd';
$user = 'student';
$pass = 'ttrojan';

$title = $_GET['title'];

$pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

$sql = "
    SELECT title, rating, genre, format
    FROM dvd_titles
    INNER JOIN ratings
    ON dvd_titles.rating_id = ratings.id
    INNER JOIN genres
    ON dvd_titles.genre_id = genres.id
    INNER JOIN formats
    ON dvd_titles.format_id = formats.id
    WHERE title LIKE ?
";

$statement = $pdo->prepare($sql);

$like = '%'.$title.'%';

$statement->bindParam(1, $like);
$statement->execute();
$titles = $statement->fetchAll(PDO::FETCH_OBJ);

//var_dump($titles);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Movie Database</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap-theme.min.css">
</head>
    <body>
    <!-- Nav Bar Template from Bootstrap "Getting Started" -->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="search.php">Movie Database</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="search.php">Search</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container">
        </br></br></br></br>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <?php if(count($titles) <= 0) : ?>
                    <div class="alert alert-danger">
                        <strong>Error. </strong>No results found for <em><?php echo $title ?>.</em>
                    </div>
                <?php else : ?>
                    <p class="lead">Success! Results for <em><?php echo $title ?>.</em></p>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Rating</th>
                            <th>Genre</th>
                            <th>Format</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($titles as $title) : ?>
                            <tr>
                                <td><?php echo $title->title ?></td>
                                <td><?php echo $title->rating ?></td>
                                <td><?php echo $title->genre ?></td>
                                <td><?php echo $title->format ?></td>
                            </tr>
                        <?php endforeach ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    </body>
</html>


