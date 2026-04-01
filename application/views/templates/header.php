<html>

<head>
    <title>ciBlog</title>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">


    <style>
        #navbar a {
            text-decoration: none;
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container">
            <div class="d-flex align-items-center">
                <div class="navbar-header me-5">
                    <a href="<?= base_url(); ?>posts" class="navbar-brand">
                        <h2>ciBlog</h2>
                    </a>
                </div>
                <div id="navbar" class="navigation">
                    <ul class="nav">
                        <li class="nav-item"><a href="<?= base_url(); ?>">Home</a></li>
                        <li class="nav-item"><a href="<?= base_url(); ?>about">About</a></li>
                        <li class="nav-item"><a href="<?= base_url(); ?>posts">Blog</a></li>
                        <li class="nav-item"><a href="<?= base_url(); ?>categories">Categories</a></li>
                    </ul>
                </div>
            </div>


            <ul class="nav" id="navbar">
                <li class="nav-item"><a href="<?= base_url(); ?>categories/create">Create Categories</a></li>
                <li class="nav-item"><a href="<?= base_url(); ?>posts/create">Create Post</a></li>
            </ul>
        </div>
    </nav>

    <div class="container py-3">