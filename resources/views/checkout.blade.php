<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Quick Delivery Payment</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://www.2checkout.com/checkout/api/2co.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-4 offset-md-4">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <h3 class="text-xs-center">Payment Details</h3>
                            <img class="img-fluid cc-img" src="http://www.prepbootstrap.com/Content/images/shared/misc/creditcardicons.png">
                        </div>
                    </div>
                    <div class="card-block">
                        <form id="myCCForm" action="{{ url('/api/v1/quickorders/createpayment') }}" method="post">
                            <input name="token" type="hidden" value="" />
                            <input name="orderid" type="hidden" value="<?php echo isset($_GET['order_id'])? $_GET['order_id'] : null ?>">
                            <input name="vallet" type="hidden" value="<?php echo isset($_GET['vallet'])? $_GET['vallet'] : null ?>">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label>CARD NUMBER</label>
                                        <div class="input-group">
                                            <input id="ccNo" type="text" value="" class="form-control" autocomplete="off" required />
                                            <span class="input-group-addon"><span class="fa fa-credit-card"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-7 col-md-7">
                                    <div class="form-group">
                                        <label><span class="visible-xs-inline">EXP</span> Month</label>
                                        <input id="expMonth" type="text" class="form-control" size="2" required />
                                    </div>
                                </div>
                                <div class="col-xs-5 col-md-5 float-xs-right">
                                    <div class="form-group">
                                        <label><span class="visible-xs-inline">EXP</span> Year</label>
                                        <input id="expYear" type="text" class="form-control" size="4" required />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label>CVV</label>
                                        <input id="cvv" type="text" class="form-control" value="" autocomplete="off" required />
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <input type="submit" class="btn btn-warning btn-lg btn-block" value="Submit Payment" />
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .cc-img {
            margin: 0 auto;
        }
    </style>
    <br>
    <br>
    <br>

    <script>
        // Called when token created successfully.
        var successCallback = function(data) {
            var myForm = document.getElementById('myCCForm');

            // Set the token as the value for the token input
            myForm.token.value = data.response.token.token;

            // IMPORTANT: Here we call `submit()` on the form element directly instead of using jQuery to prevent and infinite token request loop.
            myForm.submit();
        };

        // Called when token creation fails.
        var errorCallback = function(data) {
            // Retry the token request if ajax call fails
            if (data.errorCode === 200) {
                // This error code indicates that the ajax call failed. We recommend that you retry the token request.
            } else {
                alert(data.errorMsg);
            }
        };

        var tokenRequest = function() {
            // Setup token request arguments
            var args = {
                sellerId: "901407885",
                publishableKey: "4401B202-8145-4119-BE77-5B6EA7FE4196",
                ccNo: $("#ccNo").val(),
                cvv: $("#cvv").val(),
                expMonth: $("#expMonth").val(),
                expYear: $("#expYear").val()
            };

            // Make the token request
            TCO.requestToken(successCallback, errorCallback, args);
        };

        $(function() {
            // Pull in the public encryption key for our environment
            TCO.loadPubKey('sandbox');

            $("#myCCForm").submit(function(e) {
                // Call our token request function
                tokenRequest();

                // Prevent form from submitting
                return false;
            });
        });
    </script>
</body>

</html>