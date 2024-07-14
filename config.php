<?php
require('stripe-php-master/init.php');

$publishableKey="pk_test_51IebcDSIhfjlYCLdZUf5gurbQDfYwZPNWLNr06cKNxAvaPUW2LMMfqQ197de58qtQpUdW8ZKRT2ZMGwO9q7TdrBI005cnFgrDx";

$secretKey="sk_test_51IebcDSIhfjlYCLdPB2UywLsazltpYHvKWAGuMoTmcW6wxA1VVBfmblbxKIRb1sWLt1AnKUsxyx7gzg3BJDT6JWW00CvDhPjJM";

\Stripe\Stripe::setApiKey($secretKey);
?>