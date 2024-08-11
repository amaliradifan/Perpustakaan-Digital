<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand me-5" href="/">Perpustakaan Digital.</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav nav-underline me-auto">
        <li class="nav-item">
          <a class="nav-link {{$active == 'home' ? "text-primary active" : ""}}" aria-current="page" href="/books">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{$active == 'create' ? "text-primary active" : ""}}" href="/books/create">Add Book</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{$active == 'mybook' ? "text-primary active" : ""}}" href="/categories">Categories</a>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item">
          <form action="/logout" method="POST">
            @csrf
            <button type="submit" class="nav-link text-danger btn btn-link">Logout</button>
          </form>
        </li>
      </ul>
    </div>
  </div>
</nav>