    <link rel="stylesheet" href="{{ elixir('css/all.css') }}">

    <div id="header-area">
        <img id="epl-logo" src="/images/eplbpm-vertical.png" alt="EPL Logo">
        <div id="right-pos">
            <div id="nav">
                <ul>
                    <li><a href="/dashboard" class="{{ Request::segments()[0] == "dashboard" ? "active" : "" }}">Dashboard</a></li>
                    <li><a href="/view" class="{{ Request::segments()[0] == "view" ? "active" : "" }}">View Plan</a></li>
                    <li><a href="/changes" class="{{ Request::segments()[0] == "changes" ? "active" : "" }}">Changelog  </a></li>
                    <li><a href="/manage" class="{{ Request::segments()[0] == "manage" ? "active" : "" }}">Manage Plan</a></li>
                    @if (Auth::user() && Auth::user()->is_admin)
                    <li><a href="/admin/users" class="{{ Request::segments()[0] == "admin" ? "active" : "" }}">Admin</a></li>
                    @endif
                    <ul id="logout-area">
                        <li class="logout-bar"><a href="/logout">Logout</a></li>
                    </ul>
                </ul>
                </div>
            </div>
        </div>
    </div>



