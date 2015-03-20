<?php
require '_require.php';
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
        <div class="container">
            <div class="jumbotron">
              <h1><?=$config['title']?></h1>
              <p>This page lets you pay for services. Thanks for your custom!</p>
            </div>
<?php
if (isset($_GET['paid'])){
?>
            <div class="row">
                <div class="alert alert-success" role="alert">Thanks, your payment of <?=$_GET['paid']?> was succesful!</div>
            </div>
<?php
}
?>
            <div class="row">
             <div class="col-md-offset-2 col-md-6">
                <form class="form-horizontal" role="form" method="post" action="pay.php">
                    <input type="hidden" name="stripe"/>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-6">
                            <input type="text" name="email" class="form-control" placeholder="Email address">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Amount</label>
                        <div class="col-sm-6">
                            <input type="text" name="pay" class="form-control" placeholder="Amount" value="<?=$_GET['amount']?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Currency</label>
                        <div class="col-sm-6">
                            <select name="currency" class="form-control"><option value="usd" data-symbol="$">US Dollar</option><option value="gbp" data-symbol="£"<?= $_GET['uk'] ? ' selected' : ''?>>British Pound</option></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-6">
                            <button type="submit" class="btn btn-warning stripe-pay" data-stripe="<?=STRIPE_KEY?>">Payment not loaded</button>
                        </div>
                    </div>
                </form>
             </div>
            </div>
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
        <script type="text/javascript" src="https://checkout.stripe.com/checkout.js"></script>
        <script src="js/home.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src='//www.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>