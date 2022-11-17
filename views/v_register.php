<?php require_once(PATH_VIEWS.'header.php');?>
<h1 id="title"><?= REGISTER ?></h1>
<form method="post" action="index.php?page=register">
        <input type="text" id="name" name="name" placeholder="<?= INPUT_NAME ?>">
        <input type="text" id="fname" name="fname" placeholder="<?= INPUT_FIRST_NAME ?>">
        <input type="tel" id="tel" name="tel" placeholder="<?= INPUT_PHONE ?>">
        <input type="email" id="email" name="email" placeholder="<?= INPUT_EMAIL ?>">
        <input type="password" id="password" name="password" placeholder="<?= INPUT_PASSWORD ?>">
        <input type="password" id="confirmPassword" name="confirmPassword" placeholder="<?= INPUT_CONFIRMPASSWORD ?>">
    <input type="submit" value=<?= TOREGISTER ?>></input>
</form>
<?php require_once(PATH_VIEWS.'footer.php'); 