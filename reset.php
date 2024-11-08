<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Reset Password | Fleet Manager</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1" />
    <!-- Favicon -->
    <link rel="icon" href="assets/images/favicon.png">
    <!-- CSS Files -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha512-iQQV+nXtBlmS3XiDrtmL+9/Z+ibux+YuowJjI4rcpO7NYgTzfTOiFNm09kWtfZzEB9fQ6TwOVc8lFVWooFuD/w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/frontend/css/theme.css?v=2.3.1" />
    <link rel="stylesheet" href="assets/frontend/content/nyks/css/nyks.css" />
    <!-- End Page Styles -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-52376036-7"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-52376036-7');
    </script>
</head>

<!-- BODY START -->
<body>
    <!-- Wrapper -->
    <section id="wrapper">
        <!-- ALL SECTIONS -->
        <section id="content">
            <!-- CONTENT -->
            <section class="fullscreen t-center fullwidth cover" style="background-color: rgba(0, 204, 55, 242)">
                <!-- Container -->
                <div class="container-xs mxw-350 v-center">
                    <!-- Start card -->
                    <div class="card">
                        <div class="card-body">
                            <div class="t-center">
                                <h1 class="bold-title">Reset Password</h1>

                                <div class="alert alert-danger xs-mt" style="display: none;">
                                    Error: Invalid email address.
                                </div>
                                
                                <div class="alert alert-success xs-mt" style="display: none;">
                                    Success: Your password has been reset.
                                </div>

                                <div class="form dark xs-mt normal-title">
                                    <form action="reset-password.php" method="post">
                                        <!-- Email -->
                                        <input type="hidden" name="token" value="your_token_here" />
                                        <input type="hidden" name="_token" value="csrf_token_here" />

                                        <input type="email" name="email" id="email" placeholder="Registered email address." class="classic_form bg-white radius" value="user@example.com" readonly />
                                        
                                        <input type="password" name="password" id="password" placeholder="New Password" class="classic_form bg-white radius" required />
                                        
                                        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" class="classic_form bg-white radius" required />
                                        
                                        <!-- Send Button -->
                                        <button type="submit" id="submit" class="bg-colored1 click-effect white bold qdr-hover-6 classic_form uppercase no-border radius">
                                            Reset Your Password
                                        </button>
                                        <!-- End Send Button -->
                                    </form>
                                </div>

                                <div class="p-2 radius-sm gray8" style="background-color: rgba(255, 255, 255, .5)">
                                    <h5 class="mt-1 bold">
                                        Don't have an account?
                                        <a href="#register" class="underline">Register</a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End card -->
                </div>
            </section>
            <!-- END CONTENT -->
        </section>
        <!-- END ALL SECTIONS -->
    </section>
    <!-- END WRAPPER -->

    <!-- Back To Top -->
    <a id="back-to-top" href="#top"><i class="fa fa-angle-up"></i></a>

    <!-- jQuery -->
    <script src="assets/frontend/js/jquery.min.js?v=2.3"></script>
    <!-- PAGE OPTIONS - You can find special scripts for this version -->
    <script src="assets/frontend/content/nyks/js/plugins.js"></script>
    <!-- MAIN SCRIPTS - Classic scripts for all theme -->
    <script src="assets/frontend/js/scripts.js?v=2.3.1"></script>
</body>
<!-- Body End -->
</html>
