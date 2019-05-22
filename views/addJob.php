<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>AddJob</title>
</head>
<body>
<div class="container">
    <h1 class="mb-4 col-8">Add Job</h1>
    <form action="<?php echo(BASE_URL);?>jobs/add" method="post" class="col-8">
        <div class="form-group">
            <label for="input-title">Title:</label>
            <input type="text" class="form-control" id="input-title" name="title">
        </div>
        <div class="form-group">
            <label for="input-description">Description:</label>
            <input type="text" class="form-control" id="input-description" name="description">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
</body>
</html>
