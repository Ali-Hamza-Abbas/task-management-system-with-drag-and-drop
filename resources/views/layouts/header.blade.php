<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('projects.index') }}">Projects</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('tasks.index') }}">Tasks</a>
            </li>
        </ul>
    </div>
</nav>