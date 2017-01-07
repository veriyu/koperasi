 {{-- SIDE MENU {ModuleName} --}}
<li><a><i class="fa fa-clone"></i>{ModuleName} <span class="fa fa-chevron-down"></span></a>
    <ul class="nav child_menu">
        <li><a href="{{ URL::to('{ModuleRoute}') }}">{ModuleName}</a></li>
    </ul>
</li>
{{-- /SIDE MENU {ModuleName} --}}