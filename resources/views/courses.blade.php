@extends('shared.master')

@section('title')
    Courses
@endsection

@section('modal')
    <div class="modal fade" id="main-modal" tabindex="-1" role="dialog" aria-labelledby="main-modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="main-modalLabel">Course Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <div class="modal-body">

                <input type="hidden" class="form-control" id="id">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">Course Name</label>
                            <input type="text" class="form-control" id="name">
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
                            <h4 class="card-title">Courses</h4>
                            <button onclick="Add()" type="button" class="btn btn-sm btn-success">Add New</button>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-hover">
                                <thead class="text-warning">
                                    <th>ID</th>
                                    <th>Course Name</th>
                                    <th>Actions</th>
                                </thead>
                                <tbody>
                                    @foreach ($data as $course)
                                    <tr>
                                        <td>{{ $course->id }}</td>
                                        <td>{{ $course->name }}</td>
                                        <td>
                                            <button onclick="Edit({{ $course->id }})" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></button>
                                            <button onclick="Delete({{ $course->id }})" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
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
    $('#menu-courses').addClass('active')

    var modal = '#main-modal';

    function Add() {

        $('#id').val('-1')
        $('#name').val('')

        $(modal).modal({
            'show': true
        })
    }

    function Edit(id) {

        Controller.Post('/api/courses/item', { 'id': id }).done(function(result) {

            $('#id').val(result.id)
            $('#name').val(result.name)

            $(modal).modal({
                'show': true
            })

        })

    }

    function Save() {

        var data = {
            id      : $('#id').val(),
            name    : $('#name').val(),
        }

        if(data.id == -1) {
            Controller.Post('/api/courses/create', data).done(function(result) {
                window.location.reload()
            })
        }
        else if(data.id > 0) {
            Controller.Post('/api/courses/update', data).done(function(result) {
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
                    Controller.Post('/api/courses/delete', { 'id': id }).done(function(result) {
                        window.location.reload()
                    })
                }
            }
        })
    }

</script>
@endsection
