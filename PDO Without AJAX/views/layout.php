<html>
<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <title><?=$this->e($title)?></title>
</head>
<body>

<?php @session_start(); if(isset($_SESSION['error'])): ?>
<!-- Error Message -->
<div class="alert alert-danger">
    <p><?=$this->e($_SESSION['error'])?></p>
</div>
<?php unset($_SESSION['error']); endif ?>

<?php @session_start(); if(isset($_SESSION['message'])): ?>
<!-- Success Message -->
<div class="alert alert-success">
    <p><?=$this->e($_SESSION['message'])?></p>
</div>
<?php unset($_SESSION['message']); endif ?>

<div class="container">
    <?=$this->section('content')?>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>