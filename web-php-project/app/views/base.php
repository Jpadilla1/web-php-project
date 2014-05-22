<?php require_once 'third_party/ti/ti.php'; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta viewport="">
    <title>SAMS | <?php startblock('title') ?><?php endblock() ?></title>
    <link rel="stylesheet" href="<?php echo Config::get('SITE_URL') ?>static/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo Config::get('SITE_URL') ?>static/css/app.css">
    <link rel="stylesheet" href="<?php echo Config::get('SITE_URL') ?>static/css/datatables.css">
    <?php startblock('extra_css') ?>
    <?php endblock() ?>
</head>
<body>
    <header>
        <?php include 'common/header.php'; ?>
    </header>
    <div id="page_id" class="container">
    <?php startblock('page_id') ?>
    <?php endblock() ?>    
    </div>
    <?php startblock('content') ?>
    <?php endblock() ?>
    <footer>
        <?php include 'common/footer.php'; ?>
    </footer>
    <script src="<?php echo Config::get('SITE_URL') ?>static/js/jquery.js"></script>    
    <script src="<?php echo Config::get('SITE_URL') ?>static/js/bootstrap.min.js"></script>
    <script src="<?php echo Config::get('SITE_URL') ?>static/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo Config::get('SITE_URL') ?>static/js/app.js"></script>
    <?php startblock('extra_js') ?>
    <?php endblock() ?>
</body>
</html>