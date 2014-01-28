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
    <h1 class="text-center"></br></br>Movie Search</h1>
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2">
            <form method="get" action="results.php" >
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Title" name="title">
                        <span class="input-group-btn">
                            <input class="btn btn-default" type="submit" value="Search">
                        </span>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="../../dist/js/bootstrap.min.js"></script>
</body>
</html>