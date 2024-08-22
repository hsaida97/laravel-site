<!DOCTYPE html>

<html lang="en">
@include('admin.partials._head')
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    @include('admin.partials._nav')
    @include('admin.partials.left-side')

    <div class="content-wrapper">
        @yield('_content')
    </div>
    @include('admin.partials.right-side')
    @include('admin.partials._footer')
</div>
</body>
</html>
