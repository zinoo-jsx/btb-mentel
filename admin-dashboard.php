<?php
session_start();
include("./database/db.php");
$admin = isset($_SESSION['auth']);
include("./partials/header.php");
?>
<?php if ($admin) : ?>

<div class="container-xxl">
    <div class="row">
        <div class="col-lg-2">
            <a href="index.php">
                <img src="./Images/Logo.png" width="70" alt="logo">
            </a>
            <ul class="list-group">
                <li class="list-group-item active" aria-current="true"> <a href="index.php"><i class="bi bi-house"></i>
                        Home</a>
                </li>
                <li class="list-group-item"><a href="#doctor"><i class="bi bi-thermometer-high"></i> Doctor</a></li>
                <li class="list-group-item"><a href="#user"><i class="bi bi-people"></i> User</a></li>
                <li class="list-group-item"><a href="create-post.php"><i class="bi bi-people"></i>Create Post</a></li>

            </ul>
        </div>
        <div class="col-lg-10">
            <!-- Doctor section start -->

            <section id="doctor" class="my-5">
                <h3>Doctor</h3>
                <div class="table-responsive">
                    <table
                        class="table table-secondary table-striped table-hover table-bordered table-sm table-responsive-sm">
                        <thead>
                            <tr class="text-center align-middle">
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Address</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Department</th>
                                <th scope="col">Documentation</th>
                                <th scope="col">Experience</th>
                                <th scope="col" colspan="2">Changes</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql = 'SELECT * FROM doctors';
                                $statement = $pdo->query($sql);
                                $doctors = $statement->fetchAll(PDO::FETCH_ASSOC);
                                // print_r($doctors);
                                // exit();
                                foreach ($doctors as $key => $doc) :
                                ?>

                            <tr class="text-center align-middle">
                                <th scope="row"> <?= ++$key ?></th>
                                <td class="img-col">
                                    <img src="./photo/<?php echo $doc['photo'] ?>" alt="photo">
                                    <?= $doc['name'] ?>
                                </td>
                                <td> <?= $doc['phone'] ?></td>
                                <td><?= $doc['address'] ?></td>
                                <td><?= $doc['gender'] ?> </td>
                                <td><?= $doc['department'] ?> </td>
                                <td><a href="files/<?= $doc['documentation'] ?>"> <?= $doc['documentation'] ?></a></td>
                                <td><?= $doc['experience'] ?> Years</td>
                                <td><a href="doctor-edit.php?id=<?= $doc['doctor_id'] ?>">
                                        <div class=" btn btn-sm btn-warning">Edit
                                        </div>
                                    </a></td>
                                <td><a href="doctor-del.php">
                                        <div class="btn btn-sm btn-danger doctor-del-btn"
                                            title="<?= $doc['doctor_id'] ?>" id="<?php echo $doc['doctor_id'] ?>">Delete
                                        </div>
                                    </a></td>
                            </tr>
                            <?php endforeach ?>

                            <p id="doctor_count" style="opacity: 0;"><?php echo count($doctors); ?></p>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Doctor section end -->
            <!-- User section start -->

            <section id="user" class="mt-5">
                <h3>User</h3>
                <div class="table-responsive">
                    <table
                        class="table table-secondary table-striped table-hover table-bordered table-sm table-responsive-sm">
                        <thead>
                            <tr class="text-center align-middle">
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Age</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Address</th>
                                <th scope="col" colspan="2">Changes</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql = 'SELECT * FROM users';
                                $statement = $pdo->query($sql);
                                $users = $statement->fetchAll(PDO::FETCH_ASSOC);

                                // exit();
                                foreach ($users as $key => $user) :
                                ?>

                            <tr class="text-center align-middle">
                                <th scope="row"> <?= ++$key ?></th>
                                <td class="img-col">
                                    <img src="./photo/<?php echo $user['photo'] ?>" alt="photo">
                                    <?= $user['name'] ?>
                                </td>
                                <td> <?= $user['email'] ?></td>
                                <td> <?= $user['phone'] ?></td>
                                <td> <?= $user['age'] ?></td>
                                <td> <?= $user['gender'] ?></td>

                                <td><a href="files/<?= $user['address'] ?>"> <?= $user['address'] ?></a></td>

                                <td><a href="user-edit.php?id=<?= $user['user_id'] ?>">
                                        <div class="btn btn-sm btn-warning">Edit</div>
                                    </a></td>
                                <td><a href="user-del.php">
                                        <div class="btn btn-sm btn-danger user-del-btn" title="<?= $user['user_id'] ?>"
                                            id="<?php echo $user['user_id'] ?>">Delete</div>
                                    </a></td>


                            </tr>
                            <?php endforeach ?>
                            <p id="user_count" style="opacity: 0;"><?php echo count($users); ?></p>


                        </tbody>


                    </table>

                </div>
            </section>
            <!-- User section end -->
            <div class="d-flex">

                <div class="m-3 p-3">
                    <div>
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
                <div class="m-3 p-3">
                    <div>
                        <canvas id="myChart2"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php else : ?>
<?php header('location:index.php') ?>
<?php endif ?>
<?php
include("./partials/footer.php");
?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const ctx = document.getElementById('myChart');
const ctx2 = document.getElementById('myChart2');
let user_count = document.querySelector("#user_count").innerHTML;
let doctor_count = document.querySelector("#doctor_count").innerHTML;
console.log(user_count, doctor_count);
new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['users', 'doctors', ],
        datasets: [{
            label: '# of Votes',
            data: [user_count, doctor_count],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
new Chart(ctx2, {
    type: 'polarArea',
    data: {
        labels: ['users', 'doctors', ],
        datasets: [{
            label: '# of Votes',
            data: [user_count, doctor_count],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>