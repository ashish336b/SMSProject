<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
    <div class="nano">
        <div class="nano-content">
            <div class="logo"><a href="{{ url('/') }}/admin"><span>Admin Dashboard</span></a></div>
            <ul>
                <li class="label">Dashboard</li>
                <li
                    class="{{ Route::is('admin.dashboard')?'active': '' }}">
                    <a href="{{ route('admin.dashboard') }}"><i class="ti-calendar"></i> Stats </a>
                </li>
                <li class="label">Students and Teacher</li>
                <li
                    class="{{ Route::is('admin.teachers')?'active': '' }}">
                    <a href="{{ route('admin.teachers') }}"><i class="ti-calendar"></i> Teacher </a>
                </li>
                <li
                    class="{{ Route::is('admin.students')?'active': '' }}">
                    <a href="{{ route('admin.students') }}"><i class="ti-calendar"></i> Student </a>
                </li>
                <li class="label">Department and classes</li>
                <li
                    class="{{ Route::is('admin.classroom')?'active': '' }}">
                    <a href="{{ route('admin.classroom') }}"><i class="ti-calendar"></i>Classes</a>
                </li>
                <li
                    class="{{ Route::is('admin.department')?'active': '' }}">
                    <a href="{{ route('admin.department') }}"><i
                            class="ti-calendar"></i>Department</a></li>
                <li class="label">Information</li>
                <li
                    class="{{ Route::is('admin.students.feePaymentList')? 'active': '' }}">
                    <a href="{{ route('admin.students.feePaymentList') }}"><i
                            class="ti-calendar"></i>Fee Information</a>
                </li>
                <li
                    class="{{ Route::is('admin.notice')?'active': '' }}">
                    <a href="{{ route('admin.notice') }}"><i class="ti-calendar"></i>Notice</a></li>
                <li class="label">Admin</li>
                <li
                    class="{{ Route::is('admin.list')?'active': '' }}">
                    <a href="{{ route('admin.list') }}"><i class="ti-calendar"></i>Admins List</a>
                </li>
            </ul>
        </div>
    </div>
</div>
