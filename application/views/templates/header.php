<html>

<head>
    <title>ciBlog</title>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        referrerpolicy="no-referrer" />

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
                    <a href="<?= ($this->session->userdata('logged_in')) ? base_url() . 'posts' : ''; ?>"
                        class="navbar-brand">
                        <h2>ciBlog</h2>
                    </a>
                </div>
                <div id="navbar" class="navigation">
                    <ul class="nav">
                        <?php if ($this->session->userdata('logged_in')): ?>
                            <li class="nav-item"><a href="<?= base_url(); ?>">Home</a></li>
                            <li class="nav-item"><a href="<?= base_url(); ?>about">About</a></li>
                            <li class="nav-item"><a href="<?= base_url(); ?>posts">Blog</a></li>
                            <li class="nav-item"><a href="<?= base_url(); ?>categories">Categories</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>


            <ul class="nav" id="navbar">
                <?php if (!$this->session->userdata('logged_in')): ?>
                    <li class="nav-item me-3"><a href="<?= base_url() ?>users/login">Login</a></li>
                    <li class="nav-item me-3"><a href="<?= base_url() ?>users/register">Register</a></li>
                <?php endif; ?>
                <?php if ($this->session->userdata('logged_in')): ?>
                    <li class="nav-item me-3"><a href="<?= base_url(); ?>categories/create">Create Categories</a></li>
                    <li class="nav-item me-3"><a href="<?= base_url(); ?>posts/create">Create Post</a></li>
                    <li class="nav-item "><a href=" <?= base_url() ?>users/logout">Logout</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>

    <div class="container py-3">
        <?php if ($this->session->flashdata('user_registered')) {
            echo "<p class = 'alert alert-success'>" . $this->session->flashdata('user_registered') . "</p>";
        } ?>

        <?php if ($this->session->flashdata('post_created')) {
            echo "<p class = 'alert alert-success'>" . $this->session->flashdata('post_created') . "</p>";
        } ?>

        <?php if ($this->session->flashdata('post_updated')) {
            echo "<p class = 'alert alert-success'>" . $this->session->flashdata('post_updated') . "</p>";
        } ?>

        <?php if ($this->session->flashdata('post_deleted')) {
            echo "<p class = 'alert alert-success'>" . $this->session->flashdata('post_deleted') . "</p>";
        } ?>

        <?php if ($this->session->flashdata('category_created')) {
            echo "<p class = 'alert alert-success'>" . $this->session->flashdata('category_created') . "</p>";
        } ?>

        <?php if ($this->session->flashdata('user_loggedin')) {
            echo "<p class = 'alert alert-success'>" . $this->session->flashdata('user_loggedin') . "</p>";
        } ?>

        <?php if ($this->session->flashdata('login_failed')) {
            echo "<p class = 'alert alert-danger'>" . $this->session->flashdata('login_failed') . "</p>";
        } ?>

        <?php if ($this->session->flashdata('user_loggedout')) {
            echo "<p class = 'alert alert-success'>" . $this->session->flashdata('user_loggedout') . "</p>";
        } ?>

        <?php if ($this->session->flashdata('category_post_deleted')) {
            echo "<p class = 'alert alert-success'>" . $this->session->flashdata('category_post_deleted') . "</p>";
        } ?>