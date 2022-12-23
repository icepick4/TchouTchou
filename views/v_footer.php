<!-- fin de page -->

</section>
<!-- Pied de page -->
<footer>
	<section>
		<nav>
			<h2><?= TITLE_COMPANY ?></h2>
			<a href="index.php?page=cgu"><?= TERMS_OF_USE ?></a>
			<a href="index.php?page=privacy_policy"><?= PRIVACY_POLICY ?></a>
			<a id="license" rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/"><img alt="Licence Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by-nc-nd/4.0/88x31.png" /></a>
		</nav>
		<nav>
			<h2><?= TITLE_INFORM_YOU ?></h2>
			<a href="index.php?page=informations"><?= TITLE_INFORMATION ?></a>
		</nav>
		<nav>
			<h2><?= TITLE_QUICK_ACCESS ?></h2>
			<a href="index.php?page=home"><?= TITLE_HOME ?></a>
			<?php if ($_SESSION['logged']) {
            echo '<a href="index.php?page=logout">'. TITLE_LOGOUT .'</a>';
          } else{
			echo'<a href="index.php?page=login">'.TITLE_LOGIN.'</a>';
		  }?>
		  <?php 
		  $user = new UserDAO();
		  if(!$user->isEmployee($_SESSION['user_id'])){ ?>
			<a href="index.php?page=contact"><?= TITLE_CONTACT ?></a>
		  <?php } ?>
			<a href="http://82.65.238.70:5569/" target="_blank"><?= TITLE_GITPULL ?></a>
		</nav>
	</section>
	<p id="copyright">Tchoutchou Copyright ©2022</p>
</footer>
</body>

</html>