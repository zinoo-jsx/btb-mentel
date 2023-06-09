<?php
session_start();
include("./database/db.php");
include("./partials/header.php");
include("./partials/navbar.php");
include("./partials/carousel.php");
?>
<main class="p-lg-5 p-2">
    <section id="update-news">
        <h1 class="text-center mb-5">Health News</h1>
        <div class="container-lg">
            <div class="row g-2">
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="card">
                        <img src="./Images/Q1.jpeg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the
                                bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="card">
                        <img src="./Images/Q10.jpeg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the
                                bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="card">
                        <img src="./Images/Q2.jpeg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the
                                bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="card">
                        <img src="./Images/Q12.jpeg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the
                                bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="card">
                        <img src="./Images/Q9.jpeg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the
                                bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="card">
                        <img src="./Images/Q8.jpeg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the
                                bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="card">
                        <img src="./Images/Q4.webp" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the
                                bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="card">
                        <img src="./Images/Q6.jpeg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the
                                bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="article" class="p-lg-5 p-0">
        <h1 class="text-center mb-5">Article</h1>
        <div class="swiper mySwiper">
            <div class="swiper-wrapper my-5">

                <?php
                $sql = 'SELECT * FROM posts';
                $statement = $pdo->query($sql);
                $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
                // print_r($posts);
                // exit();
                foreach ($posts as $key => $p) :
                ?>

                <div class="swiper-slide">
                    <div class="swiper-card">
                        <img src="./Images/<?php echo $p['image'] ?>" alt="image">

                        <h3 class="my-2"><?= $p['title'] ?></h3>
                        <p><?= $p['content'] ?></p>
                    </div>
                </div>
                <?php endforeach ?>


            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>
    <section>
        <h1 class="text-center mb-5" id="contact-us">Contact Us</h1>
        <form action="" method="post" class="w-50 m-auto p-5 shadow-lg">
            <div class="img">
                <img src="./Images/Logo.png" width="240" alt="">
            </div>
            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="mb-3">
                <label for="message">Message</label>
                <textarea name="message" id="message" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <input type="submit" name="submit" class="btn btn-secondary">
            </div>

        </form>
    </section>
</main>
<?php
include("./partials/footer.php")
?>