<nav class="custom-wrapper" id="menu">
    <div class="pure-menu"></div>
    <ul class="container-flex list-unstyled">
        <li>
            <a href="{{route('page.home')}}" class="text-uppercase {{setActiveRoute('page.home')}}">Home</a>
        </li>
        <li>
            <a href="{{route('page.about')}}" class="text-uppercase {{setActiveRoute('page.about')}}">About</a>
        </li>
        <li>
            <a href="{{route('page.archive')}}" class="text-uppercase {{setActiveRoute('page.archive')}}">Archive</a>
        </li>
        <li>
            <a href="{{route('page.contact')}}" class="text-uppercase {{setActiveRoute('page.contact')}}">Contact</a>
        </li>
    </ul>
</nav>