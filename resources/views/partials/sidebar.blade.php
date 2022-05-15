<nav id="left-sidebar-nav" class="sidebar-nav">
    <ul id="main-menu" class="metismenu">
        <li class="header">Main</li>
        {{-- ROles --}}
        @if(auth()->user()->role !== 'office-assistant')
        <li class="{{ (Route::is('income-tax') || Route::is('sales-tax') || Route::is('with-holding-tax') || Route::is('sindh-revenue-board') || Route::is('trade-mark') || Route::is('misc') || (request()->is('clients*'))) ? 'active open' : '' }}"> <!-- active open -->
            <a href="#myPage" class="has-arrow"><i class="icon-users"></i><span>Clients</span></a>
            <ul>
                <li class="{{ (Route::is('clients.create')) ? 'active' : '' }}"><a href="{{ route('clients.create') }}">Add Client</a></li>
                <li class="{{ (Route::is('income-tax')) ? 'active' : '' }}"><a href="{{ route('income-tax') }}">Income Tax </a></li>
                <li class="{{ (Route::is('sales-tax')) ? 'active' : '' }}"><a href="{{ route('sales-tax') }}">Sales Tax </a></li>
                <li class="{{ (Route::is('with-holding-tax')) ? 'active' : '' }}"><a href="{{ route('with-holding-tax') }}">With Holding Tax </a></li>
                <li class="{{ (Route::is('sindh-revenue-board')) ? 'active' : '' }}"><a href="{{ route('sindh-revenue-board') }}">Sindh Revenue Board </a></li>
                <li class="{{ (Route::is('trade-mark')) ? 'active' : '' }}"><a href="{{ route('trade-mark') }}">Trade Mark </a></li>
                <li class="{{ (Route::is('misc')) ? 'active' : '' }}"><a href="{{ route('misc') }}">Miscellaneous </a></li>
            </ul>
        </li>

        <li class="{{ (Route::is('view-summary')) ? 'active open' : '' }}"> <!-- active open -->
            <a href="#myPage" class="has-arrow"><i class="icon-bar-chart"></i><span>Fee Summary</span></a>
            <ul>
                <li class="{{ (Route::is('view-summary')) ? 'active' : '' }}"><a href="{{ route('view-summary') }}">View Summary</a></li>
            </ul>
        </li>
        @endif

        @if(auth()->user()->role !== 'tax-expert')
        <li class="{{ (Route::is('expenditures.index')) || (Route::is('expenditures.create')) ? 'active open' : '' }}"> <!-- active open -->
            <a href="#myPage" class="has-arrow"><i class="icon-credit-card"></i><span>Expenditures</span></a>
            <ul>
                <li class="{{ (Route::is('expenditures.index')) ? 'active' : '' }}"><a href="{{ route('expenditures.index') }}">All Expenditures</a></li>
                <li class="{{ (Route::is('expenditures.create')) ? 'active' : '' }}"><a href="{{ route('expenditures.create') }}">Add Expenditure</a></li>
            </ul>
        </li>
        @if(auth()->user()->role !== 'office-assistant')

        <li class="{{ (Route::is('users.index')) || (Route::is('users.create')) ? 'active open' : '' }}">
            <a href="#myPage" class="has-arrow"><i class="icon-users"></i><span>Users</span></a>
            <ul>
                <li class="{{ (Route::is('users.index')) ? 'active' : '' }}"><a href="{{ route('users.index') }}">All Users</a></li>
                <li class="{{ (Route::is('users.create')) ? 'active' : '' }}"><a href="{{ route('users.create') }}">Add New</a></li>
            </ul>
        </li>

        <li class="{{ (Route::is('global-password')) || (Route::is('activity-log-table')) ? 'active open' : '' }}">
            <a href="#myPage" class="has-arrow"><i class="icon-wrench"></i><span>Tools</span></a>
            <ul>
                <li class="{{ (Route::is('global-password')) ? 'active' : '' }}"><a href="{{ route('global-password') }}">Global Password</a></li>
                <li class="{{ (Route::is('activity-log-table')) ? 'active' : '' }}"><a href="{{ route('activity-log-table') }}">Activity Log</a></li>
            </ul>
        </li>
        @endif
        @endif

    </ul>
</nav>  