<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="/">Jobs</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link " href="/">Главная</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/vacancy">Вакансии</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/blog">Блог</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/contact">Контакты</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
        <?php if (isset($_SESSION['auth'])) : ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?= $_SESSION['email']; ?>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/add-job">Добавить вакансию</a></li>
              <li><a class="dropdown-item" href="/add-news">Добавить новость</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Профиль</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/logout">Выйти</a>
          </li>
        <?php else : ?>
          <li class="nav-item">
            <a class="nav-link" href="/signin">Войти</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/signup">Регистрация</a>
          </li>
        <?php endif; ?>
    </div>
  </div>
</nav>