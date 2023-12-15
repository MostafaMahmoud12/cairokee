<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/logo1.png">
    <title>Cairokee Ticket</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;400;700&display=swap" rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/bootstrap-icons.css" rel="stylesheet">

    <link href="css/Cairokee Ticket.css" rel="stylesheet">


</head>

<body>

<main>


    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                Cairokee Ticket
            </a>

            <a href="ticket.html" class="btn custom-btn d-lg-none ms-auto me-4">Buy Ticket</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav align-items-lg-center ms-auto me-lg-5">
                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="index.html#section_1">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="index.html#section_2">About</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="index.html#section_3">Members</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="index.html#section_5">Pricing</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="index.html#section_6">Contact</a>
                    </li>
                </ul>

                <a href="ticket.html" class="btn custom-btn d-lg-block d-none">Buy Ticket</a>
            </div>
        </div>
    </nav>


    <section class="ticket-section section-padding">
        <div class="section-overlay"></div>

        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-10 mx-auto">
                    <div class="custom-form ticket-form mb-5 mb-lg-0" style="display: flex; flex-direction: column; align-items: center; text-align: center;">
                        <i class="fa fa-check-circle" style="font-size: 60px; color: #EE5007FF;"></i>
                        <br>
                        <h2 class="text-center mb-4" style="color: #1a1e21;">Ticket Has Been Purchased Successfully</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- ... Your existing form code ... -->
        <div class="col-lg-6 col-10 mx-auto">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";

            try {
                $conn = new PDO("mysql:host=$servername;dbname=tickets", $username, $password);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo "";

                // Process form submission
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Sanitize input data
                    $fullName = htmlspecialchars($_POST['ticket-form-name']);
                    $email = htmlspecialchars($_POST['ticket-form-email']);
                    $phone = htmlspecialchars($_POST['ticket-form-phone']);
                    $ticketType = htmlspecialchars($_POST['TicketForm']);
                    $numTickets = htmlspecialchars($_POST['ticket-form-number']);
                    $additionalRequest = htmlspecialchars($_POST['ticket-form-message']);

                    // SQL query to insert data into the database
                    $sql = "INSERT INTO ticket_data (full_name, email, phone, ticket_type, num_tickets, additional_request)
                                VALUES (:fullName, :email, :phone, :ticketType, :numTickets, :additionalRequest)";

                    // Prepare and execute the statement
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(':fullName', $fullName);
                    $stmt->bindParam(':email', $email);
                    $stmt->bindParam(':phone', $phone);
                    $stmt->bindParam(':ticketType', $ticketType);
                    $stmt->bindParam(':numTickets', $numTickets);
                    $stmt->bindParam(':additionalRequest', $additionalRequest);

                    if ($stmt->execute()) {
                        echo "Ticket purchased successfully!";
                    } else {
                        echo "Error: " . $sql . "<br>" . $stmt->errorInfo()[2];
                    }
                }
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            } finally {
                // Close the database connection
                $conn = null;
            }
            ?>
        </div>
    </section>
</main>


<footer class="site-footer">
    <div class="site-footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-12">
                    <h2 class="text-white mb-lg-0">Cairokee Ticket</h2>
                </div>

                <div class="col-lg-6 col-12 d-flex justify-content-lg-end align-items-center">
                    <ul class="social-icon d-flex justify-content-lg-end">
                        <li class="social-icon-item">
                            <a href="#" class="social-icon-link">
                                <span class="bi-twitter"></span>
                            </a>
                        </li>

                        <li class="social-icon-item">
                            <a href="#" class="social-icon-link">
                                <span class="bi-apple"></span>
                            </a>
                        </li>

                        <li class="social-icon-item">
                            <a href="#" class="social-icon-link">
                                <span class="bi-instagram"></span>
                            </a>
                        </li>

                        <li class="social-icon-item">
                            <a href="#" class="social-icon-link">
                                <span class="bi-youtube"></span>
                            </a>
                        </li>

                        <li class="social-icon-item">
                            <a href="#" class="social-icon-link">
                                <span class="bi-pinterest"></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>



    <div class="site-footer-bottom">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-12 mt-5">
                    <p class="copyright-text">Copyright © 2023 Cairokee Ticket - Designed by Cairokee Team</p>
                </div>

                <div class="col-lg-8 col-12 mt-lg-5">
                    <ul class="site-footer-links">
                        <li class="site-footer-link-item">
                            <a href="#" class="site-footer-link">Terms &amp; Conditions</a>
                        </li>

                        <li class="site-footer-link-item">
                            <a href="#" class="site-footer-link">Privacy Policy</a>
                        </li>

                        <li class="site-footer-link-item">
                            <a href="#" class="site-footer-link">Your Feedback</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>


<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.sticky.js"></script>
<script src="js/custom.js"></script>

</body>
</html>