@if (session('update_info_success'))
<div class="container mt-2">
    <div class="alert alert-success">
        {{session('update_info_success')}}
    </div>
</div>
@endif

@if (session('update_password_success'))
<div class="container mt-2">
    <div class="alert alert-success">
        {{session('update_password_success')}}
    </div>
</div>
@endif

@if (session('delete_user_failed'))
<div class="container mt-2">
    <div class="alert alert-success">
        {{session('delete_user_failed')}}
    </div>
</div>
@endif

@if (session('user_not_same'))
<div class="container mt-2">
    <div class="alert alert-success">
        {{session('user_not_same')}}
    </div>
</div>
@endif