@extends('shared.master')

@section('title')
    Dashboard
@endsection

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-warning card-header-icon">
                            <div class="card-icon">
                            <i class="material-icons">content_copy</i>
                            </div>
                            <p class="card-category">Accounts</p>
                            <h3 class="card-title">{{ count($accounts) }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon">
                        <i class="material-icons">store</i>
                        </div>
                        <p class="card-category">Students</p>
                        <h3 class="card-title">{{ count($students) }}</h3>
                    </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                    <div class="card-header card-header-danger card-header-icon">
                        <div class="card-icon">
                        <i class="material-icons">info_outline</i>
                        </div>
                        <p class="card-category">Courses</p>
                        <h3 class="card-title">{{ count($courses) }}</h3>
                    </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                        <i class="fa fa-twitter"></i>
                        </div>
                        <p class="card-category">Subjects</p>
                        <h3 class="card-title">{{ count($subjects) }}</h3>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
<script>

    $('[id^="menu-"]').removeClass('active')
    $('#menu-dashboard').addClass('active')

</script>
@endsection
