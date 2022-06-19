<?php require_once('vendor/header.php') ?>
<div class="text-center" style="position: relative">
<nav class="navbar navbar-light bg-light text-center" id="children">
    <div class="container-fluid">
        <form class="d-flex" method="post" action="src/request.php">
            <input class="form-control me-2" type="search" placeholder="Введите город" name="city" aria-label="Поиск">
            <button class="btn btn-outline-success" type="submit">Поиск</button>
        </form>
    </div>
</nav>
</div>
<style>
    #children{
        position: absolute;
        left: 51%;
        top: 48%;
        -webkit-transform: translate(-50%, -50%);
        -moz-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        -o-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        margin-top: 100px;
    }
</style>
<?php require_once('vendor/footer.php') ?>