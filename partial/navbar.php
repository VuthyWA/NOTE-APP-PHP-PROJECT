
<nav class="navbar navbar-expand-lg navbar-light bg-primary position-sticky sticky-top" style="z-index:90">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#"><img src="assets/images/website_logo/pnc_logo.png" alt="logo" style="width:40px;height:40px;"></a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
            <h3 class="text-white"><?=$_SESSION['userName']?></h3>
        </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-danger my-2 my-sm-0" type="submit" name="search">Search</button>
        <!-- btn log out -->
        <a href="index.php?page=log_in"><button class="btn btn-warning my-2 my-sm-0 ml-2 text-white" type="button" name="log_out">Log out</button></a>
    </form>
    </div>
</nav>