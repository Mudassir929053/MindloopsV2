<?php include 'includes/page-head.php' ?>
<?php
// Check if $_SESSION['uid'] is set
if (isset($_SESSION['uid'])) {
    $u_id = $_SESSION['uid'];
} else {
    // Redirect to index.php if $_SESSION['uid'] is not set
    echo "<script>window.location.href = 'index.php';</script>";
    exit();
}
if ($role == 3) {
    $type = "Parent";
} elseif ($role == 2) {
    $type = "Teacher";
} elseif ($role == 4) {
    $type = "Student";
} else {
    $type = "Null";
}
?>
<?php

// Fetch user data based on the UID from the session
$uid = $_SESSION['uid'];
$sql = "SELECT * FROM `user_table` WHERE `uid` = $uid";
$result = $mysqli->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Extract data from the query result
    $username = $row['username'];
    // $fullName = $row['full_name'];
    $email = $row['email'];
    $mobile = $row['mobile'];
}
?>
<style>
    [data-bs-theme=dark] .btn-close {
        filter: none !important;
        color: black !important;
    }

    .mar {
        margin-bottom: 20px;
        border-radius: 15px;

    }

    .mar1 {
        text-align: center;
        padding: 2rem;

    }

    .subscription-title {
        font-size: 1.5rem;
    }

    .subscription-text {
        font-size: 1.25rem;
    }

    .modal-content{
    background-color: #bee1f7 !important; /* Your desired background color */

}

    /* You may need to adjust other styles to ensure content visibility */


    .custom-btn {
        position: relative;
        right: 20px;
        bottom: 20px;
        border: none;
        box-shadow: none;
        width: 130px;
        height: 40px;
        line-height: 42px;
        -webkit-perspective: 230px;
        perspective: 230px;
        background-color: #DEEDFF;
    }

    .custom-btn span {
        background: rgb(0, 172, 238);
        background: linear-gradient(0deg, rgba(0, 172, 238, 1) 0%, rgba(2, 126, 251, 1) 100%);
        display: block;
        position: absolute;
        width: 130px;
        height: 40px;
        box-shadow: inset 2px 2px 2px 0px rgba(255, 255, 255, .5), 7px 7px 20px 0px rgba(0, 0, 0, .1), 4px 4px 5px 0px rgba(0, 0, 0, .1);
        border-radius: 5px;
        margin: 0;
        text-align: center;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        -webkit-transition: all .3s;
        transition: all .3s;
    }

    .custom-btn span:nth-child(1) {
        box-shadow: -7px -7px 20px 0px #fff9, -4px -4px 5px 0px #fff9, 7px 7px 20px 0px #0002, 4px 4px 5px 0px #0001;
        -webkit-transform: rotateX(90deg);
        -moz-transform: rotateX(90deg);
        transform: rotateX(90deg);
        -webkit-transform-origin: 50% 50% -20px;
        -moz-transform-origin: 50% 50% -20px;
        transform-origin: 50% 50% -20px;
    }

    .custom-btn span:nth-child(2) {
        -webkit-transform: rotateX(0deg);
        -moz-transform: rotateX(0deg);
        transform: rotateX(0deg);
        -webkit-transform-origin: 50% 50% -20px;
        -moz-transform-origin: 50% 50% -20px;
        transform-origin: 50% 50% -20px;
    }

    .custom-btn:hover span:nth-child(1) {
        box-shadow: inset 2px 2px 2px 0px rgba(255, 255, 255, .5), 7px 7px 20px 0px rgba(0, 0, 0, .1), 4px 4px 5px 0px rgba(0, 0, 0, .1);
        -webkit-transform: rotateX(0deg);
        -moz-transform: rotateX(0deg);
        transform: rotateX(0deg);
    }

    .custom-btn:hover span:nth-child(2) {
        box-shadow: inset 2px 2px 2px 0px rgba(255, 255, 255, .5), 7px 7px 20px 0px rgba(0, 0, 0, .1), 4px 4px 5px 0px rgba(0, 0, 0, .1);
        color: transparent;
        -webkit-transform: rotateX(-90deg);
        -moz-transform: rotateX(-90deg);
        transform: rotateX(-90deg);
    }
</style>

<body>
    <div class="wrapper bg-white text-dark">
        <main class="main-content">
            <!-- Your content here -->

            <div class="container-fluid bgimage-memberclub_lp">
                <?php include 'includes/page-header.php' ?>
                <!-- <div class="container"> -->
                <div class="row px-3 py-md-5 justify-content-center align-items-center">
                    <!-- First Column - Text -->
                    <div class="col-md-5">
                        <div class="mt-md-5">
                            <h1 class="fw-bolder" style="font-size: 3rem">Mindloops Membership Club</h1>
                            <p style="font-size: 1.4rem">Exclusive benefits and features for our members.</p>
                            <a href="#" class="btn btn-warning rounded-pill" onclick="openSubscriptionModal()">Become a member</a>
                        </div>
                    </div>
                    <div class="col-md-5 ml-5">
                        <img class="img-fluid" src="assets/images/homepage/Rectangle.png" alt="">
                    </div>
                </div>
                <!-- </div> -->
            </div>
            <!-- 
            <div class="container pt-md-5 px-5">
                <div class="text-center pt-2 pb-md-4">
                    <h1 class="fw-bolder">Features</h1>
                    <p>Ease your burden on other things, focus on what matters the most - to teach!</p>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 mb-3">
                        <img src="<?= BASE_URL ?>/assets/images/memberclub/lp-sec2.png" alt="Image 1" class="img-fluid w-75 mx-auto d-block">
                    </div>
                </div>
            </div>
 -->

            <!-- test -->
            <div class="container pt-md-5 pb-md-5 px-5">
                <div class="text-center pt-2 pb-md-4">
                    <h1 class="fw-bolder">Features</h1>
                    <p>Ease your burden on other things, focus on what matters the most - to teach!</p>
                </div>
                <div class="row justify-content-center">

                    <div class="col-lg-4 mb-3">
                        <div class="card bg-white text-dark" style="background-image: url('<?= BASE_URL ?>/assets/images/memberclub/Rectangle_362.png');background-size:100% 100%;background-repeat: no-repeat;">
                            <div class="card-body p-md-4">
                                <div class="row text-center mb-3">
                                    <div class="col">
                                        <h2 class="mb-0 fw-bolder" style="color: #753E0C;"><img class="img-fluid pe-4" src="<?= BASE_URL ?>/assets/images/memberclub/Group_1001.png" alt="">Learning</h2>
                                    </div>
                                </div>
                                <div class="row mt-md-5">
                                    <div class="col">
                                        <h4 class="mb-md-3 pb-2 fw-bolder" style="color: #753E0C;">Learning Growth</h4>
                                    </div>
                                    <div class="pe-md-4">
                                        <p class="pe-md-2" style="color: #753E0C;">
                                            Want to track your child's learning
                                            progress? Try the learning progress
                                            feature on our platform.
                                        </p>
                                    </div>
                                    <div class="pe-md-4">
                                        <p class="pe-md-2" style="color: #753E0C;">
                                            It will help your child to remain focus
                                            and motivated them to complete the
                                            lesson. You can also assign a learning
                                            activity to them.
                                        </p>
                                    </div>
                                    <div class="col pt-md-5">
                                        <h4 class="mb-md-3 pt-2 pb-2 fw-bolder" style="color: #753E0C;">Empower Teachers With
                                            Digital Classroom</h4>
                                    </div>
                                    <div class="pe-md-4">
                                        <p class="pe-md-2" style="color: #753E0C;">
                                            We help teachers to elevate their
                                            teaching method by providing our
                                            digital classroom platform.
                                        </p>
                                    </div>
                                    <div class="pe-md-5 pb-md-3">
                                        <p class="pe-md-3" style="color: #753E0C;">
                                            Teachers can upload learning materials,
                                            assign students, conduct quizzes.
                                            games, and videos. You can also track
                                            their progress and feedback.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7 mb-3">
                        <div class="row">
                            <div class="card bg-white text-dark rounded" style="background-image: url('<?= BASE_URL ?>/assets/images/memberclub/Rectangle_363.png');background-size:100% 100%;background-repeat: no-repeat;">
                                <div class="card-body p-md-4">
                                    <div class="row mb-3">
                                        <div class="col">
                                            <h2 class="mb-0 fw-bolder" style="color: #753E0C;"><img class="img-fluid pe-4" src="<?= BASE_URL ?>/assets/images/memberclub/Group_1002.png" alt="">Lifestyle</h2>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <h4 class="mb-md-2 pb-1 fw-bolder" style="color: #753E0C;">Member's Discounts</h4>
                                        </div>
                                        <div class="pe-md-5">
                                            <p class="pe-md-3" style="color: #753E0C;">
                                                Premium user enjoys exclusive discounts from participating brands.
                                                ranging from FnB, leisure parks, and more.
                                            </p>
                                        </div>
                                        <div class="col">
                                            <h4 class="mb-md-2 pb-1 fw-bolder" style="color: #753E0C;">Events & Happenings</h4>
                                        </div>
                                        <div class="pe-md-5">
                                            <p class="pe-md-3" style="color: #753E0C;">
                                                Get exclusive invites to exciting events and happenings relating to
                                                education, webinars and more.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row pt-2">
                            <div class="card bg-white text-dark rounded" style="background-image: url('<?= BASE_URL ?>/assets/images/memberclub/Rectangle_364.png');background-size:100% 100%;background-repeat: no-repeat;">
                                <div class="card-body p-md-4">
                                    <div class="row mb-3">
                                        <div class="col">
                                            <h2 class="mb-0 fw-bolder" style="color: #753E0C;"><img class="img-fluid pe-4" src="<?= BASE_URL ?>/assets/images/memberclub/Group_1000.png" alt="">Early Access</h2>
                                        </div>
                                    </div>
                                    <div class="row mt-md-3">
                                        <div class="col">
                                            <h4 class="mb-md-3 pb-2 fw-bolder" style="color: #753E0C;">Qualified Tutors</h4>
                                        </div>
                                        <div class="pe-md-5">
                                            <p class="pe-md-3" style="color: #753E0C;">
                                                Never have to worry about making a background check when
                                                searching for a qualified and trustworthy tutor for both academic
                                                and afterschool activities.
                                            </p>
                                            <a href="#" class="btn btn-sm btn-warning text-white rounded-pill">Explore Tutors</a>
                                        </div>
                                        <div class="col pt-md-3">
                                            <h4 class="mb-md-3 pt-2 pb-2 fw-bolder" style="color: #753E0C;">Shop @ Mindloops</h4>
                                        </div>
                                        <div class="pe-md-5">
                                            <p class="pe-md-3" style="color: #753E0C;">
                                                Looking for a school supply for your child? We have a wide range
                                                of products that your child needs.
                                            </p>
                                            <a href="#" class="btn btn-sm btn-warning text-white rounded-pill">Explore Products</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Test -->
            <div class="container-fluid py-md-5 mb-md-5" style="background-color: #fff4d4;">
                <div class="text-center pt-2 pb-md-5">
                    <h1 class="fw-bolder">Benefits</h1>
                    <p>Ease your burden on other things, focus on what matters the most - to teach!</p>
                </div>
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <!-- First column containing the image -->
                            <img src="<?= BASE_URL ?>/assets/images/memberclub/Frame.png" alt="Image" class="img-fluid">
                        </div>
                        <div class="offset-md-1 col-md-5 mt-md-5 pt-md-5">
                            <h4 class="mb-4 fw-bold">Learning Growth</h4>
                            <div class="mb-4">
                                <h6 class="fw-bold" style="color: #00308d;">Early Intervention</h6>
                                <p>Our learning progress tracker helps parents to identify the areas of
                                    improvement for the child. Parents can choose subjects that can enhance
                                    the child's comprehension. We encourage parents to participate in the
                                    child's learning journey by explaining the concept and conducting the
                                    exercise together.</p>
                            </div>
                            <div class="mb-4">
                                <h6 class="fw-bold" style="color: #00308d;">A Better Interactive Teaching</h6>
                                <p>Our digital classroom provides enhance teaching tools to help teachers
                                    conduct their learning activities through quizzes, games. worksheet, and
                                    more for a dynamic lesson.</p>
                            </div>
                            <div class="py-md-1">
                                <hr class="my-md-5">
                            </div>
                            <h4 class="mb-4 fw-bold">Lifestyle</h4>
                            <div class="mb-4">
                                <h6 class="fw-bold" style="color: #00308d;">Study Hard, Play Hard</h6>
                                <p>Enjoy exclusive discounts from our participating partners on a wide range
                                    of products and services to reward your child's learning journey.</p>
                            </div>
                            <div class="mb-4">
                                <h6 class="fw-bold" style="color: #00308d;">Better Informed. Better Skills, Better You</h6>
                                <p>You can develop skills relating to parenting, education, and even life skills
                                    that provides a better opportunity. Your child can also meet and greet
                                    your favourite mascot and characters from participating brands.</p>
                            </div>
                            <div class="py-md-1">
                                <hr class="my-md-5">
                            </div>
                            <h4 class="mb-4 fw-bold">Early Access</h4>
                            <div class="mb-4">
                                <h6 class="fw-bold" style="color: #00308D;">Be the first to use our latest features</h6>
                                <p>Be the first to use our latest features.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="container py-md-5 bg-white">
                <div class="text-center pt-2 pb-md-4">
                    <h3 class="text-center fw-bold">Frequently Asked Questions</h3>
                    <p>Ease your burden on other things, focus on what matters the most - to teach!</p>
                </div>
                <div class="accordion text-dark" id="accordionFlushFAQ" style="background-color: #E1E1E1;">
                    <div class="accordion-item border-0 text-dark" style="background-color: #E1E1E1;">
                        <h2 class="accordion-button fw-bold collapsed text-dark border border-0" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseOne" aria-expanded="false" aria-controls="faqCollapseOne" style="background-color: #E1E1E1;">
                            What is the MindLoops member's club?
                        </h2>
                        <div id="faqCollapseOne" class="accordion-collapse collapse text-dark" data-bs-parent="#accordionFlushFAQ">
                            <div class="accordion-body text-dark">The MindLoops member's club is a community platform designed to provide resources, support, and networking opportunities for educators and parents. It offers access to exclusive content, events, workshops, and a community forum where members can collaborate and share ideas.</div>
                        </div>
                    </div>
                    <hr class="mx-4 text-secondary">
                    <div class="accordion-item text-dark border border-0" style="background-color: #E1E1E1;">
                        <h2 class="accordion-button fw-bold collapsed text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseTwo" aria-expanded="false" aria-controls="faqCollapseTwo" style="background-color: #E1E1E1;">
                            How much is the price for the membership?
                        </h2>
                        <div id="faqCollapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushFAQ">
                            <div class="accordion-body">The membership price varies depending on the subscription plan you choose. We offer both monthly and annual subscription options, with discounts available for annual commitments. Please visit our pricing page for detailed information on membership plans and pricing.</div>
                        </div>
                    </div>
                    <hr class="mx-4 text-secondary">
                    <div class="accordion-item  border border-0" style="background-color: #E1E1E1;">
                        <h2 class="accordion-button fw-bold collapsed text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseThree" aria-expanded="false" aria-controls="faqCollapseThree" style="background-color: #E1E1E1;">
                            Does it expire?
                        </h2>
                        <div id="faqCollapseThree" class="accordion-collapse collapse text-dark" data-bs-parent="#accordionFlushFAQ">
                            <div class="accordion-body">Yes, membership subscriptions have expiration dates based on the selected plan duration. Monthly subscriptions renew automatically each month until canceled, while annual subscriptions renew annually. You can manage your subscription and view its expiration date in your account settings.</div>
                        </div>
                    </div>
                    <hr class="mx-4 text-secondary">
                    <div class="accordion-item text-dark border border-0" style="background-color: #E1E1E1;">
                        <h2 class="accordion-button fw-bold collapsed text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseFour" aria-expanded="false" aria-controls="faqCollapseFour" style="background-color: #E1E1E1;">
                            What can I do with the membership?
                        </h2>
                        <div id="faqCollapseFour" class="accordion-collapse collapse text-dark" data-bs-parent="#accordionFlushFAQ">
                            <div class="accordion-body">
                                With the membership, you can enjoy the following benefits:
                                <ul>
                                    <li>Receive exclusive invitations to events, workshops, and webinars.</li>
                                    <li>Access to premium content, tips, and advice from experts and influencers.</li>
                                    <li>Join a community of like-minded members and network with them.</li>
                                    <li>Get up to 50% off on selected items from participating brands.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <hr class="mx-4 text-secondary">
                    <div class="accordion-item text-dark border border-0" style="background-color: #E1E1E1;">
                        <h2 class="accordion-button fw-bold collapsed text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseFive" aria-expanded="false" aria-controls="faqCollapseFive" style="background-color: #E1E1E1;">
                            Who are the participating brands?
                        </h2>
                        <div id="faqCollapseFive" class="accordion-collapse collapse text-dark" data-bs-parent="#accordionFlushFAQ">
                            <div class="accordion-body">
                                We partner with a diverse range of brands across various industries to offer exclusive discounts and benefits to our members. Participating brands include educational suppliers, technology companies, wellness brands, and more. Explore our partner directory to discover the brands currently participating in our program.
                            </div>
                        </div>
                    </div>
                    <hr class="mx-4 text-secondary">
                    <div class="accordion-item text-dark border border-0" style="background-color: #E1E1E1;">
                        <h2 class="accordion-button fw-bold collapsed text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseSix" aria-expanded="false" aria-controls="faqCollapseSix" style="background-color: #E1E1E1;">
                            What is the difference between a paid user vs a free user?
                        </h2>
                        <div id="faqCollapseSix" class="accordion-collapse collapse text-dark" data-bs-parent="#accordionFlushFAQ">
                            <div class="accordion-body">
                                Paid users have access to all premium features and content available on the platform, including exclusive resources, events, and discounts from participating brands. Free users have limited access to certain features and content and may encounter restrictions on certain platform functionalities.
                            </div>
                        </div>
                    </div>
                    <hr class="mx-4 text-secondary">
                    <div class="accordion-item text-dark border border-0" style="background-color: #E1E1E1;">
                        <h2 class="accordion-button fw-bold collapsed text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseSeven" aria-expanded="false" aria-controls="faqCollapseSeven" style="background-color: #E1E1E1;">
                            Can I cancel my membership?
                        </h2>
                        <div id="faqCollapseSeven" class="accordion-collapse collapse text-dark" data-bs-parent="#accordionFlushFAQ">
                            <div class="accordion-body">
                                Yes, you can cancel your membership at any time. Simply log in to your account, navigate to the subscription settings, and follow the prompts to cancel your subscription. Please note that cancellation may result in the loss of access to certain premium features and benefits associated with your membership plan.
                            </div>
                        </div>
                    </div>
                    <hr class="mx-4 text-secondary">
                    <div class="accordion-item text-dark border border-0" style="background-color: #E1E1E1;">
                        <h2 class="accordion-button fw-bold collapsed text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseEight" aria-expanded="false" aria-controls="faqCollapseEight" style="background-color: #E1E1E1;">
                            How many members are allowed under the family account?
                        </h2>
                        <div id="faqCollapseEight" class="accordion-collapse collapse text-dark" data-bs-parent="#accordionFlushFAQ">
                            <div class="accordion-body">
                                Our family account allows up to five members to be linked under a single subscription. Each member will have their own login credentials and access to the platform's resources and features. Additional members can be added for an extra fee per member.
                            </div>
                        </div>
                    </div>
                    <hr class="mx-4 text-secondary">
                    <div class="accordion-item text-dark border border-0" style="background-color: #E1E1E1;">
                        <h2 class="accordion-button fw-bold collapsed text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseNine" aria-expanded="false" aria-controls="faqCollapseNine" style="background-color: #E1E1E1;">
                            I am a teacher and a parent. Do I have to pay for a different membership fee?
                        </h2>
                        <div id="faqCollapseNine" class="accordion-collapse collapse text-dark" data-bs-parent="#accordionFlushFAQ">
                            <div class="accordion-body">
                                No, you do not need to pay for separate membership fees if you are both a teacher and a parent. Our membership plans are designed to accommodate individuals with multiple roles, such as educators who are also parents. You can enjoy all the benefits of our membership with a single subscription.
                            </div>
                        </div>
                    </div>
                    <hr class="mx-4">
                </div>
            </div>

            <div class="container-fluid" style="background-color: #DEEDFF;">
                <div class="row text-center pb-4">
                    <div class="col-12 mt-5 pt-5">
                        <h2>Join MindLoops Membership Today</h2>
                    </div>
                </div>
                <div class="row text-center pb-4">
                    <div class="col-12 mb-5 pb-5">
                        <a href="#" class="btn btn-warning rounded-pill" onclick="openSubscriptionModal()">Become a member</a>
                    </div>
                </div>
            </div>


            <!-- Modal Markup -->
            <div class="modal fade" id="subscriptionModal" tabindex="-1" aria-labelledby="subscriptionModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content bg-white text-dark rounded-3" style="background-color: #00308D;">
                        <div class="modal-header">
                            <h5 class="modal-title fw-bolder display-6 text-capitalize" id="subscriptionModalLabel">Membership Club Subscription</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Subscription Options -->
                            <div class="container py-md-4 px-md-3">
                                <div class="row">
                                    <!-- Subscription Card - 1 Month -->
                                    <div class="col-md-4">
                                        <div class="card text-dark mar shadow-sm" style="background-color: #DEEDFF;">
                                            <div class="card-body mar1">
                                                <form action="subscription/billplz/billplzpost.php" method="post">
                                                    <!-- Subscription Type (Hidden Input) -->
                                                    <input type="hidden" name="subscription_type" value="1 Month">
                                                    <input type="hidden" name="packagePrice" value="100"> 
                                                    <input type="hidden" name="amount" value="MXT">
                                                    <input type="hidden" name="name" value="<?= $username ?>">
                                                    <input type="hidden" name="email" value="<?= $email ?>">
                                                    <input type="hidden" name="mobile" value="60141234567">
                                                    <input type="hidden" name="usertype" value="<?= $type ?>">
                                                    <input type="hidden" name="userid" class="bg-white text-dark" value="<?= $u_id ?>">
                                                    <img src="assets/images/homepage/subs.png" class="img-fluid pb-md-3" alt="">
                                                    <h5 class="card-title">1 Month Subscription</h5>
                                                    <p class="card-text fs-3 fw-bold">RM 100</p>
                                                    <!-- <button type="submit" class="btn btn-primary subscribe-btn">Subscribe</button> -->
                                                    <button type="submit" class="custom-btn btn-12"><span>Click!</span><span>Subscribe</span></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Subscription Card - 6 Months -->
                                    <div class="col-md-4">
                                        <div class="card text-dark mar" style="background-color: #DEEDFF;">
                                            <div class="card-body mar1">
                                                <form action="subscription/billplz/billplzpost.php" method="post">
                                                    <!-- Subscription Type (Hidden Input) -->
                                                    <input type="hidden" name="subscription_type" value="6 Month">
                                                    <input type="hidden" name="packagePrice" value="100">
                                                    <input type="hidden" name="amount" value="MYZ">
                                                    <input type="hidden" name="name" value="<?= $username ?>">
                                                    <input type="hidden" name="email" value="<?= $email ?>">
                                                    <input type="hidden" name="mobile" value="60141234567">
                                                    <input type="hidden" name="usertype" value="<?= $type ?>">
                                                    <input type="hidden" name="userid" class="bg-white text-dark" value="<?= $u_id ?>">
                                                    <img src="assets/images/homepage/subs.png" class="img-fluid pb-md-3" alt="">
                                                    <h5 class="card-title">6 Months Subscription</h5>
                                                    <p class="card-text fs-3 fw-bold">RM 550</p>
                                                    <!-- <button type="submit" class="btn btn-primary subscribe-btn">Subscribe</button> -->
                                                    <button type="submit" class="custom-btn btn-12"><span>Click!</span><span>Subscribe</span></button>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Subscription Card - 12 Months -->
                                    <div class="col-md-4">
                                        <div class="card text-dark mar" style="background-color: #DEEDFF;">
                                            <div class="card-body mar1">
                                                <form action="subscription/billplz/billplzpost.php" method="post">
                                                    <!-- Subscription Type (Hidden Input) -->
                                                    <input type="hidden" name="subscription_type" value="12 Month">
                                                    <input type="hidden" name="packagePrice" value="100">
                                                    <input type="hidden" name="amount" value="MYT">
                                                    <input type="hidden" name="name" value="<?= $username ?>">
                                                    <input type="hidden" name="email" value="<?= $email ?>">
                                                    <input type="hidden" name="mobile" value="60141234567">
                                                    <input type="hidden" name="usertype" value="<?= $type ?>">
                                                    <input type="hidden" name="userid" class="bg-white text-dark" value="<?= $u_id ?>">
                                                    <img src="assets/images/homepage/subs.png" class="img-fluid pb-md-3" alt="">
                                                    <h5 class="card-title subscription-title">12 Months Subscription</h5>
                                                    <p class="card-text subscription-text fs-3 fw-bold">RM 1000</p>
                                                    <!-- <button type="submit" class="btn btn-primary subscribe-btn">Subscribe</button> -->
                                                    <button type="submit" class="custom-btn btn-12"><span>Click!</span><span>Subscribe</span></button>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </main>
    </div>
    <?php include 'includes/page-footer.php' ?>
    <script>
        // JavaScript function to open the subscription modal
        function openSubscriptionModal() {
            $('#subscriptionModal').modal('show');
        }
    </script>