<footer class="py-5 mindloops-bg-footer">
    <div class="container-fluid text-white">
        <div class="row" style="margin-left: 0px;margin-right: 0px; text-align: left">
            <div class="col-md-6 mb-3">
                <img src="<?= BASE_URL ?>assets/images/logo/231206_White_ML_Logo_(big).png" loading="lazy" style="max-width:50%;" alt="Your Logo" class="img-fluid mb-3">
                <ul class="list-unstyled d-flex">
                    <li class="ms-3"><a class="link-body-emphasis" href="https://www.facebook.com/mindloopsmy"><img src="<?= BASE_URL ?>assets/images/homepage/facebook.png" alt="Your Logo" loading="lazy" class="img-fluid mb-3"></a></li>
                    <li class="ms-3"><a class="link-body-emphasis" href="https://www.instagram.com/mindloopsmy"><img src="<?= BASE_URL ?>assets/images/homepage/instagram.png" loading="lazy" alt="Your Logo" class="img-fluid mb-3"></a></li>
                    <li class="ms-3"><a class="link-body-emphasis" href="https://www.tiktok.com/@mindloopsmy"><img src="<?= BASE_URL ?>assets/images/homepage/tik-tok.png" alt="Your Logo" loading="lazy" class="img-fluid mb-3"></a></li>
                </ul>
                <p>EDESS Education Development and Solutions Specialist Sdn. Bhd. (EDESS)
                    <br>Jalan Pontian Lama, KM20 81300 Skudai, Johor.
                    <br>
                    <a class="btn text-white p-0" href="tel:07550 0077">07-550 0077</a>
                <br><a class="btn text-white p-0" href="mailto: editorial@edess.asia"> editorial@edess.asia </a>
            </div>

            <div class="col-md-2 mb-3 text-white text-start">
                <h5 class="fw-bolder">Resources</h5>
                <ul class="nav flex-column ">
                    <li class="nav-item mb-2"><a href="magazine" class="nav-link p-0 text-white">Magazines</a></li>
                    <li class="nav-item mb-2"><a href="mind-booster" class="nav-link p-0 text-white">Mind Booster</a></li>
                    <li class="nav-item mb-2"><a href="loops" class="nav-link p-0 text-white">Loops</a></li>
                    <li class="nav-item mb-2"><a href="videos" class="nav-link p-0 text-white">Videos</a></li>
                    <!-- <li class="nav-item mb-2"><a href="community" class="nav-link p-0 text-white">Community</a></li> -->
                    <li class="nav-item mb-2"><a href="blogs" class="nav-link p-0 text-white">Blogs</a></li>
                </ul>
            </div>

            <div class="col-md-2 mb-3 text-white text-start">
                <h5 class="fw-bolder">Policies</h5>
                <ul class="nav flex-column ">
                    <li class="nav-item mb-2"><a href="terms-conditions" class="nav-link p-0 text-white">Terms & Conditions</a></li>
                    <li class="nav-item mb-2"><a href="privacy-policy" class="nav-link p-0 text-white">Privacy Policy</a></li>

                </ul>
            </div>

            <div class="col-md-2 mb-3 text-white text-start">
                <h5 class="fw-bolder">Support</h5>
                <ul class="nav flex-column ">
                    <li class="nav-item mb-2"><a href="contact-us" class="nav-link p-0 text-white">Contact Us</a></li>

                </ul>
            </div>
        </div>

    </div>
</footer>


<script>
    let errors_username = false;
    let errors_email = false;
    const loginUser = () => {
        // console.log("here");

        let form = document.getElementsByName('loginUser')[0];
        if (form.email.value == '') {
            alert('Enter username');
            form.email.focus();
            return false;
        }
        if (form.password.value == '') {
            alert('Enter password');
            form.password.focus();

            return false;
        }

        let url = "userlogin.php";

        let formdata = new FormData(form);

        fetch(url, {
            method: 'post',
            body: formdata
        }).then(data => data.json()).then(data => {
            // console.log(data);
            // return false;
            if (data.login_status == 0) {
                alert('Invalid user details');
                return false;
            }
            if (data.role_id == 1 || data.role_id == 5) {
                window.location.href = './admin/';
            }
            // else if (data.role_id == 3)  {
            //     window.location.href = './parent';
            // }else if (data.role_id == 2)  {
            //     window.location.href = './teacher';
            // } 
            else {
                window.location.href = './dashboard';
            }
        });
        // return false;
    }

    let registerform = document.getElementById('registerForm');

    const userRegister = (form) => {
        // registerForm
        if (errors_username || errors_email) {
            alert("We can't proceed unless you resolve the issues");
            return false;
        }
        if (form.password.value != form.confirm_password.value) {
            alert("Password do not match");
            form.confirm_password.focus();
            return false;
        }

        fetch('checkEmail.php?email=' + form.email.value).then(data => data.text()).then(data => {
            // return data == 'New Email'

            if (data != 'Email already exist') {
                let newform = new FormData(form);

                fetch('userRegister.php', {
                    method: 'POST',
                    body: newform
                }).then(data => data.text()).then(data => {
                    if (data == 'Record inserted successfully') {
                        // $("#RegistrationModal").modal('hide');
                        // $("#ChooseUserModal").modal('show');
                        window.location.href = './dashboard'
                    }
                });
            } else {
                alert("Email alredy registered. Please login.");
                return false;
            }
        })


    }

    document.getElementById('userloginform').addEventListener('submit', function(e) {
        e.preventDefault();
        loginUser();
    })
    // document.getElementById('userLogin').addEventListener('click', function() {
    //     loginUser()
    // });

    registerform.addEventListener('submit', function(e) {
        e.preventDefault();
        // console.log(this.password.value);
        userRegister(this);

    });

    function setRole(role) {
        fetch('setrole.php?role=' + role).then(data => data.text()).then(data => {
            console.log(data);
            window.location.href = './' + role;
        });
    }

    <?php
    //   var_dump($_SESSION);
    if (!isset($_SESSION['role_id']) && isset($_SESSION['uid'])) {
    ?>
        $(document).ready(function() {
            $("#ChooseUserModal").modal("show");
        });

        document.getElementById('for_teacher').addEventListener('click', function() {
            // alert("here");
            setRole('teacher');
        })
        document.getElementById('for_parent').addEventListener('click', function() {
            // alert("here");
            setRole('parent');


        })
    <?php
    }
    ?>


    function checkusername(username) {
        // console.log(username);
        let user_msg = document.getElementById('user_msg');
        console.log(user_msg.innerText)
        if (username.value.length == 0)
            return false;
        fetch('checkusername.php?username=' + username.value).then(data => data.text()).then(data => {
            console.log(data);
            if (data == 'Username already exist') {
                user_msg.innerText = 'Username already exists, please try another username';
                // alert(data);
                username.focus();
                // username.style.border="red";
                errors_username = true;

                return false;
            } else {
                user_msg.innerText = '';
                errors_username = false;
                //   username.style.border="green";
            }
        });
    }

    function checkemail(email) {
        // console.log(email);
        let email_msg = document.getElementById('email_msg');
        // console.log(email_msg)
        if (email.value.length == 0)
            return false;
        fetch('checkEmail.php?email=' + email.value).then(data => data.text()).then(data => {
            if (data == 'Email already exist') {
                email_msg.innerText = 'email already exists, please try another email';
                // alert(data);
                email.focus();
                errors_email = true;
                return false;
            } else {
                email_msg.innerText = '';
                errors_email = false;
            }
        });
    }
</script>

</body>

</html>