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
        <span key="t-dashboards">Properties</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="{{ route('backend.properties.index') }}" key="t-tui-calendar">All Properties</a></li>
        <li><a href="{{ route('backend.properties.create') }}" key="t-tui-calendar">Create Property</a></li>
        <!--<li>-->
        <!--    <a href="javascript: void(0);" class="has-arrow waves-effect">-->
        <!--        <img src="{{ asset('backend/images/icon/maps.png') }}" class="property_icon" alt="">-->
        <!--        <span key="t-dashboards">Area</span>-->
        <!--    </a>-->
        <!--    <ul class="sub-menu" aria-expanded="false">-->
        <!--        <li><a href="{{ route('backend.area.index') }}" key="t-tui-calendar">All Area</a></li>-->
        <!--    </ul>-->
        <!--</li>-->
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <img src="{{ asset('public/backend/images/icon/maps.png') }}" class="property_icon" alt="">
                <span key="t-dashboards">Area</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('backend.subArea.create') }}" key="t-tui-calendar">Add</a></li>
                <li><a href="{{ route('backend.subArea.index') }}" key="t-tui-calendar">View</a></li>
                <!--<li><a href="{{ route('backend.subArea.createBottom') }}" key="t-tui-calendar">Add Bottom</a></li>-->
                <!--<li><a href="{{ route('backend.subArea.indexBottom') }}" key="t-tui-calendar">View Bottom</a></li>-->
            </ul>
        </li>
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <img src="{{ asset('public/backend/images/icon/category.png') }}" class="property_icon" alt="">
                <span key="t-dashboards">Requirement Type</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('backend.requirementType.index') }}" key="t-tui-calendar">View</a></li>
            </ul>
        </li>
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <img src="{{ asset('public/backend/images/icon/category.png') }}" class="property_icon" alt="">
                <span key="t-dashboards">Property Content</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('backend.content.index') }}" key="t-tui-calendar">View</a></li>
                <li><a href="{{ route('backend.content.create') }}" key="t-tui-calendar">Create</a></li>
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
        <img src="{{ asset('public/backend/images/icon/category.png') }}" class="property_icon" alt="">
        <span key="t-dashboards">Why Rents</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="{{ route('backend.whyRent.index') }}" key="t-tui-calendar">View Why Rents</a></li>
        <li><a href="{{ route('backend.whyRent.create') }}" key="t-full-calendar">Create Why Rents</a></li>
    </ul>
</li>
<li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
        <img src="{{ asset('public/backend/images/icon/banner.png') }}" class="property_icon" alt="">
        <span key="t-dashboards">Banner</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="{{ route('backend.banner.index') }}" key="t-tui-calendar">View Banner</a></li>
        <li><a href="{{ route('backend.banner.create') }}" key="t-full-calendar">Create Banner</a></li>
    </ul>
</li>

{{-- <li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
        <img src="{{ asset('public/backend/images/icon/category.png') }}" class="property_icon" alt="">
        <span key="t-dashboards">What You Want</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="{{ route('backend.WhatYouWant.index') }}" key="t-tui-calendar">View What You Want</a></li>
        <li><a href="{{ route('backend.WhatYouWant.create') }}" key="t-full-calendar">Create What You Want</a></li>
    </ul>
</li> --}}
<li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
        <img src="{{ asset('public/backend/images/icon/banner.png') }}" class="property_icon" alt="">
        <span key="t-dashboards">Banner2</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="{{ route('backend.banner2.index') }}" key="t-tui-calendar">View Banner2</a></li>
        <li><a href="{{ route('backend.banner2.create') }}" key="t-full-calendar">Create Banner2</a></li>
    </ul>
</li>

<li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
        <img src="{{ asset('public/backend/images/icon/banner.png') }}" class="property_icon" alt="">
        <span key="t-dashboards">Corporate Housing</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="{{ route('backend.exploreArea.index') }}" key="t-tui-calendar">View</a></li>
        <li><a href="{{ route('backend.exploreArea.create') }}" key="t-full-calendar">Create</a></li>
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
        <img src="{{ asset('public/backend/images/icon/team.png') }}" class="property_icon" alt="">
        <span key="t-dashboards">Team</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="{{ route('backend.team.index') }}" key="t-tui-calendar">All Teams</a></li>
        <li><a href="{{ route('backend.team.create') }}" key="t-tui-calendar">Create Team</a></li>
    </ul>
</li>

<li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
        <img src="{{ asset('public/backend/images/icon/guideline.png') }}" class="property_icon" alt="">
        <span key="t-dashboards">Easy Guideline</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="{{ route('backend.easyGuideline.create') }}" key="t-tui-calendar">Add</a></li>
        <li><a href="{{ route('backend.easyGuideline.index') }}" key="t-tui-calendar">View</a></li>
        <!--<li><a href="{{ route('backend.easyGuideline.createSub') }}" key="t-tui-calendar">Add Sub</a></li>-->
        <!--<li><a href="{{ route('backend.easyGuideline.indexSub') }}" key="t-tui-calendar">All Sub</a></li>-->
    </ul>
</li>
<li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
        <img src="{{ asset('public/backend/images/icon/career.png') }}" class="property_icon" alt="">
        <span key="t-dashboards">Career</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="{{ route('backend.career.index') }}" key="t-tui-calendar">All Career</a></li>
        <li><a href="{{ route('backend.career.create') }}" key="t-tui-calendar">Create Career</a></li>
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
        <img src="{{ asset('public/backend/images/icon/faq.png') }}" class="property_icon" alt="">
        <span key="t-dashboards">Faq</span>

    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="{{ route('backend.faq.index') }}" key="t-tui-calendar">View Faq</a></li>
        <li><a href="{{ route('backend.faq.create') }}" key="t-full-calendar">Create Faq</a></li>
    </ul>
</li>
<li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
        <img src="{{ asset('public/backend/images/icon/info.png') }}" class="property_icon" alt="">
        <span key="t-dashboards">Terms and Condition</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="{{ route('backend.terms.index') }}" key="t-tui-calendar">View</a></li>
        <li><a href="{{ route('backend.terms.create') }}" key="t-tui-calendar">Create</a></li>
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
<li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
        <i class="mdi mdi-post"></i>
        <span key="t-dashboards">User</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="{{ route('backend.user.index') }}" key="t-tui-calendar">All User</a></li>
        <li><a href="{{ route('backend.user.create') }}" key="t-full-calendar">Add User</a></li>
    </ul>
</li>


{{-- <li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
        <i class="mdi mdi-post"></i>
        <span key="t-dashboards">Property Id</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="{{ route('backend.propertyId.index') }}" key="t-tui-calendar">All Property Id</a></li>
    </ul>
</li> --}}




{{-- @endrole --}}
