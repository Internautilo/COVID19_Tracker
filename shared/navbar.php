<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>






<!-- Fixed navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary" aria-label="Tenth navbar example">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample08"
      aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample08">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">COVID-19 Tracker
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-houses"
              viewBox="0 0 16 16">
              <path
                d="M5.793 1a1 1 0 0 1 1.414 0l.647.646a.5.5 0 1 1-.708.708L6.5 1.707 2 6.207V12.5a.5.5 0 0 0 .5.5.5.5 0 0 1 0 1A1.5 1.5 0 0 1 1 12.5V7.207l-.146.147a.5.5 0 0 1-.708-.708zm3 1a1 1 0 0 1 1.414 0L12 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l1.854 1.853a.5.5 0 0 1-.708.708L15 8.207V13.5a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 4 13.5V8.207l-.146.147a.5.5 0 1 1-.708-.708zm.707.707L5 7.207V13.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5V7.207z" />
            </svg>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="bonus.php">Bonus <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
              fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
              <path
                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z" />
            </svg>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<style>
  .loading-img {
    width: 200px;
    height: 200px;
    object-fit: contain;
    margin-bottom: 5px;
  }

  .pre-loader {
    position: fixed;
    z-index: 3000;
    /** make sure this is the highest value compared to all other divs **/
    top: 0;
    left: 0;
    background: #000937;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 100%;
    width: 100%;
  }

  .pre-loader.hidden {
    animation: fadeOut 0.8s ease-in-out forwards;

  }

  @keyframes fadeOut {
    100% {
      opacity: 0;
      visibility: hidden;
    }
  }

  .custom-loader {
    width: 70px;
    height: 70px;
    border-radius: 50%;
    background:
      radial-gradient(farthest-side, #0172cf 94%, #0000) top/8px 8px no-repeat,
      conic-gradient(#0000 30%, #0172cf);
    -webkit-mask: radial-gradient(farthest-side, #0000 calc(100% - 8px), #000 0);
    animation: s3 1s infinite linear;
  }

  @keyframes s3 {
    100% {
      transform: rotate(360deg)
    }
  }
</style>



<div class='pre-loader'>
  <svg xmlns="http://www.w3.org/2000/svg" width="96" height="96" fill="currentColor" class="bi bi-capsule mb-5"
    viewBox="0 0 16 16">
    <path
      d="M1.828 8.9 8.9 1.827a4 4 0 1 1 5.657 5.657l-7.07 7.071A4 4 0 1 1 1.827 8.9Zm9.128.771 2.893-2.893a3 3 0 1 0-4.243-4.242L6.713 5.429z" />
  </svg>
  <div class="custom-loader"></div>
</div>


<script type='text/javascript'>
  window.addEventListener('load', function () {
    setTimeout(function () {
      document.querySelector('.pre-loader').className += ' hidden';
    }, 1000)
  });
</script>