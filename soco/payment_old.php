<?php

require "connection.php";

if (isset($_GET["id"])) {

    $id = $_GET["id"];


    $payment_user_rs =   Database::search("SELECT user_payments.id AS upid,user_payments.amount AS upamount,user_payments.date_time AS update_time,user_payments.user_id AS upuid,user_payments.project_id AS uppid,user_payments.py_type_id AS uppy_type_id,user_payments.status_py_id AS upstatus_py_id,
    status_py.name AS status_py_name,py_type.name AS py_type_name,user.email AS uemail,project.title AS ptitle
    FROM `user_payments`
    INNER JOIN `user` ON `user`.`id`=`user_payments`.`user_id` 
    INNER JOIN `project` ON `project`.`id`=`user_payments`.`project_id` 
    INNER JOIN `py_type` ON `py_type`.`id`=`user_payments`.`py_type_id` 
    INNER JOIN `status_py` ON `status_py`.`id`=`user_payments`.`status_py_id` 
    WHERE `user_payments`.`id`='" . $id . "'  ");

    $payment_user_data = $payment_user_rs->fetch_assoc();



    $amount =  $payment_user_data["upamount"];

    $payment_id =  $payment_user_data['upid'];

    $project_id =  $payment_user_data['uppid'];

    $project_title = $payment_user_data["ptitle"];

    $payment_type = $payment_user_data["py_type_name"];

    $email = $payment_user_data["uemail"];

    // $base_url = 'http://localhost/soco/invoice.php';

    $base_url = 'http://localhost/soco/success.php';
    $query_string = http_build_query(['id' => $payment_id]);
    $url = $base_url . '?' . $query_string;


    require_once('vendor/autoload.php');
    \Stripe\Stripe::setApiKey('sk_test_51MqH4wEkC1btBuXKO8lixJJp5soYFBZcOb0bGZxkWClZ4cUyOrQUk6ex5WK0qVJIrBOiVde3uYf9iSVrRqRLpsBu00KHfUwY5H');

    $session = \Stripe\Checkout\Session::create([
        'payment_method_types' => ['card'],
        'line_items' => [[
            'price_data' => [
                'currency' => 'LKR',
                'product_data' => [
                    'name' => $payment_id,
                    'description' => $project_title,
                ],
                'unit_amount' => $amount * 100,
            ],
            'quantity' => 1,
        ]],
        'mode' => 'payment',
        'success_url' => $url,
        'cancel_url' => 'http://localhost/soco/profile.php',
        'customer_email' => $email,
    ]);


?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>MaestroCrew</title>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="style.css" />

        <link rel="icon" href="Img/MaestroCrew8.png" />

        <script src="https://js.stripe.com/v3/"></script>
    </head>

    <body>

        <div class="container-fluid animated-element">
            <div class="row">

                <?php include "header.php"; ?>

                <nav class="mt-5" aria-label="breadcrumb">
                    <ol class="breadcrumb mt-5">
                        <li class="breadcrumb-item"><a href="profile.php">Profile</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Invoice</li>
                    </ol>
                </nav>

                <div class="bodyPAY">

                    <div class="loader-overlay animated-element">
                        <div class="d-flex align-items-center">
                            <strong role="status">Loading...</strong>
                            <div class="spinner-border ms-auto" aria-hidden="true"></div>
                        </div>
                    </div>

                    <section class="sectionPAY">
                        <div class="productPAY">
                            <img class="imgpay" src="https://i.imgur.com/EHyR2nP.png" />
                            <div class="descriptionPAY">
                                <h3 class="h3PAY"><?php echo $project_title; ?></h3>
                                <h4 class="h4PAY"><?php echo $payment_type; ?></h4>
                                <h5 class="h5PAY">$<?php echo $amount; ?></h5>
                            </div>
                        </div>
                        <button class="buttonPAY" id="checkout-button">Pay Now</button>
                    </section>

                </div>

            </div>
        </div>


        <script>
            var stripe = Stripe('pk_test_51MqH4wEkC1btBuXKK2jzu28RSxf1ptOQBFWRysWetXoebavIId8Wv5btoFxxDDwFkShBrlr6Rw23T3gC2WTFQjze00DRyA0qWe');
            const btn = document.getElementById("checkout-button")
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                stripe.redirectToCheckout({
                    sessionId: "<?php echo $session->id; ?>"
                });
            });
        </script>
        <script src="bootstrap.bundle.js"></script>
        <script src="script.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    </body>

    </html>

<?php

} else {
    header("Location:profile.php");
}
