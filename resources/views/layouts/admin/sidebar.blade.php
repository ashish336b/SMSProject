<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
    <div class="nano">
        <div class="nano-content">
            <div class="logo"><a href="{{ url('/') }}/admin"><span>Admin Dashboard</span></a></div>
            <ul>
                <li class="label">Student</li>
                <li><a href="{{ route('admin.teachers') }}"><i class="ti-calendar"></i> Teacher </a>
                </li>
                <li><a href="{{ route('admin.students') }}"><i class="ti-calendar"></i> Student </a>
                </li>
                <li class="label">Department and classes</li>
                <li><a href="{{ route('admin.classroom') }}"><i class="ti-calendar"></i>Classes</a>
                </li>
                <li><a href="{{ route('admin.department') }}"><i
                            class="ti-calendar"></i>Department</a></li>
                <li class="label">Notification and Message</li>
                {{-- <li><a href="{{ route('admin.message') }}"><i class="ti-calendar"></i>Message</a> --}}
                </li>
                <li><a href="{{ route('admin.notification') }}"><i class="ti-calendar"></i>Send
                        Notification</a></li>
            </ul>
        </div>
    </div>
</div>
