<?php
session_start();
$id = $_GET['id'];

include "./database/db.php";
include "./partials/header.php";
include "./partials/navbar.php";
// echo $id;
?>
<section id="user" class="mt-5">

    <?php
    $user_id = $_GET['id'];
    $sql = 'SELECT * FROM users
        WHERE user_id = :user_id';

    $statement = $pdo->prepare($sql);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);
    ?>

    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5"
                        width="150px" src="./photo/<?php echo $user['photo'] ?>"><span
                        class="font-weight-bold"><?php echo $user['name'] ?></span></div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <div class="mb-2">
                        <label for="">Name :</label><span><?= $user['name'] ?></span>
                    </div>
                    <div class="mb-2">
                        <label for="">Email :</label><span><?= $user['email'] ?></span>
                    </div>
                    <div class="mb-2">

                        <label for="">Gender :</label><span><?= $user['gender'] ?></span>
                    </div>
                    <div class="mb-2">

                        <label for="">phone :</label><span><?= $user['phone'] ?></span>
                    </div>
                    <div class="mb-2">

                        <label for="">age :</label><span><?= $user['age'] ?></span>
                    </div>
                    <div class="mb-2">

                        <label for="">address :</label><span><?= $user['address'] ?></span>
                    </div>
                    <label for="">Gender :</label><span><?= $user['gender'] ?></span>
                </div>
                <h4>Mentel Record</h4>
                <?php
                $user_id = $_SESSION['user_id'];

                $sql = 'SELECT * FROM check_results As cr LEFT JOIN users As u ON u.user_id = cr.userid WHERE cr.userid = :user_id';
                // var_dump($sql);
                $statement = $pdo->prepare($sql);
                $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
                $statement->execute();
                $results = $statement->fetchAll(PDO::FETCH_ASSOC);
                // echo $user_id;
                // print_r($results);
                // print_r($results);
                // exit();
                foreach ($results as $key => $r) :
                ?>
                <div class="p-3 bg-info my-2">

                    <span>Date : :</span><label for=""><?php echo $r['created_date'] ?></label>
                    <h5 class="mt-2">Result</h5>
                    <p><?php echo $r['result_name'] ?></p>
                </div>

                <?php endforeach ?>
            </div>

            <div class="col-md-4">
                <div class="p-3 py-5">
                    <a class="d-flex justify-content-between align-items-center experience"><span>Edit
                            Profile</span><a href="user-edit.php?id=<?= $user['user_id'] ?>"
                            class="border px-3 p-1 add-experience btn btn-primary text-white"><i
                                class="fa fa-plus"></i>&nbsp;Edit</a></a><br>

                </div>
            </div>
        </div>
    </div>
    </div>
    </div>







</section>

<?php
include("./partials/footer.php")
?>