<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style1.css">
</head>

<body>
    <?php
    session_start();
    ?>
    <header>
        <div id="nav">
            <nav class="navbar navbar-expand-lg bg-dark fixed-top">
                <div class="container-fluid">
                    <img class="logo " src="logo/maruf.svg" alt="alternative-text " width="width_in_pixels" height="height_in_pixels">
                    <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="btnn" href="add_post.php?id=<?= $_SESSION['id'] ?> ">Create post</a>
                            </li>
                            <li class="nav-item">
                                <img class="img" src="image/<?= $_SESSION['image'] ?>" alt="alternativ-text" width="width_in_pixel" height="height_in_pixel">
                            </li>
                            <li class="nav-item">
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="true">
                                        <span class="username"><?= $_SESSION['username'] ?></span>
                                    </button>
                                    <ul class="dropdown-menu " aria-labelledby="dropdownMenuButton1">
                                        <li><a class="logout" href="logout.php" name="logout">Log out</a></li>

                                    </ul>
                                </div>
                            </li>
                        </ul>

                    </div>
                </div>
            </nav>
        </div>
    </header>
    <main>
        <aside>
            <div class="cointainer-fluid">
                <div class="row flex-nowarp">
                    <div class=" bg-dark col-auto col-md-4 col-lg-3 min-vh-100 d-flex flex-column justify-content">
                        <div class="bg-dark p-2">
                            <a class="d-flex text-decoration-none mt-1 align-items-center text-white">
                                </i><span class="fs-4 d-none d-sm-inline">SideMenu</span>
                            </a>
                            <ul class="nav nav-pills flex-column mt-4">
                                <li class="nav-item">
                                    <a href="#" class="nav-link text-white" aria-current="page">
                                        <i class="fs-5 fas fa-qrcode"></i> <span class="fs-4 ms-3 d-none d-sm-inline">Dashboard</span>
                                    </a>
                                </li>
                                <li class="nav-item py-2 py-sm-0">
                                    <a href="#" class="nav-link">
                                        <i class="fs-5 fa fa-house"></i><span class="fs-4 ms-3 d-none d-sm-inline">Home</span>
                                    </a>
                                </li>
                                <li class="nav-item py-2 py-sm-0">
                                    <a href="#" class="nav-link">
                                        <i class="fs-5 fa fa-table-list"></i><span class="fs-4 ms-3 d-none d-sm-inline">posts</span>

                                    </a>
                                </li>
                                <li class="nav-item py-2 py-sm-2">
                                    <a href="#" class="nav-link">
                                        <i class=" fs-5 fa-solid fa-phone"></i><span class="fs-4 ms-3 d-none d-sm-inline">Contact</span>

                                    </a>
                                </li>
                            </ul>

                        </div>
                    </div>
                    
                </div>
            </div>
        </aside>
        <section>



        </section>







    </main>







    <script src="https://kit.fontawesome.com/023b36564e.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>