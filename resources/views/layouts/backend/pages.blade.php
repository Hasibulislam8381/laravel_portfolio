{{-- @role('super-admin|admin') --}}

<li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
        <img src="{{ asset('public/backend/images/icon/info.png') }}" class="property_icon" alt="">
        <span key="t-dashboards">General Info</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="{{ route('backend.general_info.edit', 1) }}" key="t-full-calendar">View</a></li>
    </ul>
</li>
<li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
        <img src="{{ asset('public/backend/images/icon/house.png') }}" class="property_icon" alt="">
        <span key="t-dashboards">Projects</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">

   
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <img src="{{ asset('public/backend/images/icon/maps.png') }}" class="property_icon" alt="">
                <span key="t-dashboards">Create Projects</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('backend.subArea.create') }}" key="t-tui-calendar">Add</a></li>
                <li><a href="{{ route('backend.subArea.index') }}" key="t-tui-calendar">View</a></li>
  
            </ul>
        </li>
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <img src="{{ asset('public/backend/images/icon/category.png') }}" class="property_icon" alt="">
                <span key="t-dashboards">Project Type</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('backend.requirementType.index') }}" key="t-tui-calendar">View</a></li>
            </ul>
        </li>
       
    </ul>

</li>
<li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
        <img src="{{ asset('public/backend/images/icon/blog.png') }}" class="property_icon" alt="">
        <span key="t-dashboards">Blog</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="{{ route('backend.blog.index') }}" key="t-tui-calendar">All Blogs</a></li>
        <li><a href="{{ route('backend.blog.create') }}" key="t-full-calendar">Create Blog</a></li>
    </ul>
</li>

<li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
        <img src="{{ asset('public/backend/images/icon/partner.png') }}" class="property_icon" alt="">
        <span key="t-dashboards">Partner</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="{{ route('backend.partner.index') }}" key="t-tui-calendar">All Partners</a></li>
    </ul>
</li>



<li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
        <img src="{{ asset('public/backend/images/icon/info.png') }}" class="property_icon" alt="">
        <span key="t-dashboards">About Us</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="{{ route('backend.about.edit', 1) }}" key="t-tui-calendar">View</a></li>
    </ul>
</li>

<li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
        <img src="{{ asset('public/backend/images/icon/meta.png') }}" class="property_icon" alt="">
        <span key="t-dashboards">Meta</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="{{ route('backend.meta.index') }}" key="t-tui-calendar">Meta Info</a></li>
    </ul>
</li>






{{-- @endrole --}}
