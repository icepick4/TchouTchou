<style type="text/css">
    .loader {
      position: absolute;
      width: 100%;
      height: 100%;
      background-color: var(--bg-header-color);
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .letter {
      color: var(--bg-header-color);
      font-size: 80px;
      letter-spacing: 15px;
      animation: flash 1.2s linear infinite;
    }

    @keyframes flash {
      0% {
        color: var(--main-color);
        text-shadow: 0 0 7px var(--main-color);
      }

      90% {
        color: var(--bg-header-color);
        text-shadow: none;
      }

      100% {
        color: var(--main-color);
        text-shadow: 0 0 7px var(--main-color);
      }
      
    }
    .fondu-out {
      opacity :0;
      transition: opacity 0.4s ease-out;
    }
  </style>
  <script>
    const loader = document.querySelector('.loader');
    window.addEventListener('load', () => {
      loader.classList.add('fondu-out');
    } );
  </script>

<div class="loader">
    <span class="lettre">L</span>
    <span class="lettre">O</span>
    <span class="lettre">A</span>
    <span class="lettre">D</span>
    <span class="lettre">I</span>
    <span class="lettre">N</span>
    <span class="lettre">G</span>
  </div>