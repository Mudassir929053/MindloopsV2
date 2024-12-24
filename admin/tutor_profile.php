<?php
// include('../config/connection.php');
// var_dump($mysqli);
// exit;
include('function/function.php');
include_once 'includes/head.php';
?>
<?php
include_once 'includes/sidebar.php';
?>
<!-- #Main ============================ -->
<div class="page-container">
    <?php include_once 'includes/header.php'; ?>
    <main class='main-content bgc-grey-100'>
        <div class="container-fluid">
            <!-- START Of Magazine Header  -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <!-- Page Header -->
                    <div class="border-bottom pb-4 mb-4 d-md-flex align-items-center justify-content-between">
                        <div class="mb-3 mb-md-0">
                            <h1 class="mb-1 h2 fw-bold">Manage Tutor Profile</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Of Magazine Header  -->
            <!-- START OF Table content DATA  -->
            <div class="row">
                <div class="col-md-12 col-12">
                    <div class="bgc-white bd bdrs-3 p-20 mB-20 m-5">
                        <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Profile Photo</th>
                                    <th>Name</th>
                                    <th>Subject</th>
                                    <th>Experience certificate</th>
                                    <th>Education certificates</th>
                                    <th>Available Time</th>
                                    <th>Registration date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Fetch user data from the database
                                $query = "SELECT *
                FROM tutorprofiles AS tp
                INNER JOIN user_table AS ut ON tp.user_id = ut.uid;";
                                $result = mysqli_query($mysqli, $query);
                                if (mysqli_num_rows($result) > 0) {
                                    $count = 1;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                        <tr>
                                            <td class="align-content-center" style="text-align: center;"><?= $count++ ?></td>
                                            <td class="align-content-center" style="text-align: center;"><img src="../assets/uploads/tutor/profile_pictures/<?= $row['profile_picture'] ?>" alt="Profile Picture" width="80" height="80"></td>
                                            <td class="align-content-center" style="text-align: center;"><?= $row['full_name'] ?></td>
                                            <td class="align-content-center" style="text-align: center;"><?= $row['subject'] ?></td>
                                            <td class="align-content-center" style="text-align: center;">
                                                <?php if (!empty($row['experience_certificate'])) : ?>
                                                    <a href="../assets/uploads/tutor/experience_certificates/<?php echo $row['experience_certificate']; ?>" target="_blank">
                                                        <i class="fa-solid fa-file-word fa-2xl" style="color: #1790ee;"></i>
                                                    </a>
                                                <?php endif; ?>
                                            </td>
                                            <td class="align-content-center" style="text-align: center;">
                                                <?php
                                                if (!empty($row['education_certificates'])) {
                                                    $certificates = explode(',', $row['education_certificates']);
                                                    foreach ($certificates as $certificate) {
                                                        $certificateUrl = "../assets/uploads/tutor/education_certificates/" . trim($certificate);
                                                ?>

                                                        <a class="pe-md-3" href="<?php echo $certificateUrl; ?>" target="_blank" style="color: #dd4c0e;">
                                                            <i class="fa-solid fa-file-powerpoint fa-2xl"></i>
                                                        </a>

                                                <?php
                                                    }
                                                }
                                                ?>
                                            </td>


                                            <td class="align-content-center" style="text-align: center;">
                                                <?= date("h:i A", strtotime($row['from_time'])) ?> to <?= date("h:i A", strtotime($row['to_time'])) ?>
                                            </td>
                                            <td class="align-content-center" style="text-align: center;"><?= date("F j, Y, g:i a", strtotime($row['created_at'])) ?></td>
                                            <td class="align-content-center" style="text-align: center;">
                                                <?php
                                                $statusText = (strtolower($row['profile_status']) == '1') ? 'Active' : 'Inactive';
                                                $badgeClass = (strtolower($row['profile_status']) == '1') ? 'bg-success' : 'bg-danger';
                                                ?>
                                                <a href="#" class="status-toggle" data-user-id="<?php echo $row['id']; ?>" data-user-status="<?= $row['profile_status'] ?>">
                                                    <span class="badge rounded-pill lh-0 p-10 fw-bold <?php echo $badgeClass; ?>"><?php echo $statusText; ?></span>
                                                </a>
                                            </td>
                                            <td class="align-content-center" style="text-align: center;">
                                                <a href="tutor_details.php?uid=<?= $row['uid']; ?>&id=<?= $row['id']; ?>" class="btn btn-sm btn-secondary text-white">
                                                    <i class="fa fa-eye" aria-hidden="true"></i> View
                                                </a>
                                            </td>

                                        </tr>
                                <?php
                                    }
                                } else {
                                    echo '<tr><td colspan="9">No Tutors found.</td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END OF Table content DATA  -->
        </div>
        <script>
            var element = '';
            $(document).ready(function() {
                $('.status-toggle').click(function(e) {
                    e.preventDefault(); // Prevent default link behavior
                    element = $(this);
                    // Get the user ID from the data attribute
                    var userId = $(element).data('user-id');
                    var status = parseInt($(element).attr('data-user-status')) == 0 ? 1 : 0;
                    // console.log(status);                    
                    // Send AJAX request
                    $.ajax({
                        url: 'update_status.php',
                        type: 'POST',
                        data: {
                            user_id: userId,
                            status: status
                        },
                        dataType: 'json',
                        success: function(response) {
                            $(element).attr('data-user-status', status);
                            var newStatus = response.profile_status == 1 ? 'Active' : 'Inactive';
                            var newBadgeClass = response.profile_status == 1 ? 'bg-success' : 'bg-danger';
                            $(element).find('.badge').text(newStatus).removeClass('bg-success bg-danger').addClass(newBadgeClass);
                        },
                        error: function() {
                            alert('Error: Unable to update status');
                        }
                    });
                });
            });
        </script>
    </main>
</div>
<?php
include_once 'includes/footer.php';
// $mysqli->close();
?>