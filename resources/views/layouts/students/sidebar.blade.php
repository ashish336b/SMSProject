<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
    <div class="nano">
        <div class="nano-content">
            <div class="logo"><a href="{{ url('/students') }}"><span>Student Dashboard</span></a>
            </div>
            <ul>
                <li class="label">Student</li>
                <li
                    class="{{ Route::is('students.notice')?'active': '' }}">
                    <a href="{{ route('students.notice') }}"><i class="ti-calendar"></i> Notice </a>
                <li
                    class="{{ Route::is('students.payment')?'active': '' }}">
                    <a href="{{ route('students.payment') }}"><i class="ti-calendar"></i> PayFee </a>
                </li>
                <li
                    class="{{ Route::is('students.feedback')?'active': '' }}">
                    <a href="{{ route('students.feeback') }}"><i class="ti-calendar"></i> Send
                        FeedBack </a>
                </li>
                </li>
            </ul>
        </div>
    </div>
</div>
