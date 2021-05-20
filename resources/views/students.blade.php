@extends('shared.master')

@section('title')
    Students
@endsection

@section('modal')
    <div class="modal fade" id="main-modal" tabindex="-1" role="dialog" aria-labelledby="main-modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="main-modalLabel">Student Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <div class="modal-body">

                <input type="hidden" class="form-control" id="id">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="fullname">Full Name</label>
                            <input type="text" class="form-control" id="fullname">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="course_id">Course</label>
                            <select class="form-control" data-style="btn btn-link" id="course_id">
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button onclick="Save()" type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Students</h4>
                            <button onclick="Add()" type="button" class="btn btn-sm btn-success">Add New</button>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-hover">
                                <thead class="text-warning">
                                    <th>ID</th>
                                    <th>Full Name</th>
                                    <th>Address</th>
                                    <th>Course</th>
                                    <th>Actions</th>
                                </thead>
                                <tbody>
                                    @foreach ($students as $student)
                                    <tr>
                                        <td>{{ $student->id }}</td>
                                        <td>{{ $student->fullname }}</td>
                                        <td>{{ $student->address }}</td>
                                        <td>{{ $student->course->name }}</td>
                                        <td>
                                            <button onclick="Edit({{ $student->id }})" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></button>
                                            <button onclick="Delete({{ $student->id }})" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
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
    $('#menu-students').addClass('active')

    var modal = '#main-modal';

    function Add() {

        $('#id').val('-1')
        $('#fullname').val('')
        $('#address').val('')
        $('#course_id').val('')

        $(modal).modal({
            'show': true
        })
    }

    function Edit(id) {

        Controller.Post('/api/students/item', { 'id': id }).done(function(result) {

            $('#id').val(result.id)
            $('#fullname').val(result.fullname)
            $('#address').val(result.address)
            $('#course_id').val(result.course_id)

            $(modal).modal({
                'show': true
            })

        })

    }

    function Save() {

        var data = {
            id          : $('#id').val(),
            fullname    : $('#fullname').val(),
            address    : $('#address').val(),
            course_id    : $('#course_id').val()
        }

        if(data.id == -1) {
            Controller.Post('/api/students/create', data).done(function(result) {
                window.location.reload()
            })
        }
        else if(data.id > 0) {
            Controller.Post('/api/students/update', data).done(function(result) {
                window.location.reload()
            })
        }

    }

    function Delete(id) {
        bootbox.confirm({
            size: "small",
            message: "Delete this item?",
            callback: function(result){
                if(result) {
                    Controller.Post('/api/students/delete', { 'id': id }).done(function(result) {
                        window.location.reload()
                    })
                }
            }
        })
    }

</script>
@endsection
