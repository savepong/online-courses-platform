<ol class="breadcrumb d-print-none">
    @if(hasRoles(['admin', 'editor']))
    <li class="breadcrumb-item">
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
    </li>
    @endif

    @stack('breadcrumb')
</ol>