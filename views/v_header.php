<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= TITLE ?></title>
    <link href="./styles.css" rel="stylesheet" />
  </head>
  <body>
    <nav class="navbar">
      <button onclick="toggleMenu()" class="burger"></button>
      <button class="button"><?= TITLE_HOME ?></button>
      <div class="dropdowns">
        <div class="dropdown">
          <button class="button">
            <?= TITLE_PURCHASE ?>
            <img src="./assets/images/dropdown.svg" />
          </button>
          <div class="dropdown-menu">
            <button>UX/UI Design</button>
            <button>Web Applications</button>
            <button>SEO Advice</button>
          </div>
        </div>
        <div class="dropdown">
          <button class="button">
            Products
            <img src="chevron.svg" />
          </button>
          <div class="dropdown-menu">
            <button>Learn CSS Ebook</button>
            <button>Security Course</button>
            <button>Masterclass Bundle</button>
          </div>
        </div>
        <div class="dropdown">
          <button class="button">
            Support
            <img src="chevron.svg" />
          </button>
          <div class="dropdown-menu">
            <button>Live Chat</button>
            <button>Send Email</button>
            <button>Request Help</button>
          </div>
        </div>
      </div>
    </nav>
    <script>
      const toggleMenu = () => document.body.classList.toggle("open");
    </script>
  </body>
</html>