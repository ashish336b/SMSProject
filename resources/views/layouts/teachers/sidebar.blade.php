<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
    <div class="nano">
        <div class="nano-content">
            <div class="logo"><a href="{{ url('/teachers/notice') }}"><span>Teacher Dashboard</span></a>
            </div>
            <ul>
                <li class="label">Notice</li>
                <li
                    class="{{ Route::is('teachers.notice')?'active': '' }}">
                    <a href="{{ route('teachers.notice') }}"><i class="ti-calendar"></i> Notice </a>
                </li>
                <li
                    class="{{ Route::is('teachers.attachment')?'active': '' }}">
                    <a href="{{ route('teachers.attachment') }}"><i class="ti-calendar"></i>Send Attachment</a>
                </li>
            </ul>
        </div>
    </div>
</div>
