@extends('shared.master')

@section('title')
    Grades
@endsection

@section('modal')
    <div class="modal fade" id="main-modal" tabindex="-1" role="dialog" aria-labelledby="main-modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="main-modalLabel">Grade Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <div class="modal-body">

                <input type="hidden" class="form-control" id="id">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="grade">Grade</label>
                            <input type="number" class="form-control" id="grade">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="student_id">Student</label>
                            <select class="form-control" data-style="btn btn-link" id="student_id">
                                @foreach ($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->fullname }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="subject_id">Subject</label>
                            <select class="form-control" data-style="btn btn-link" id="subject_id">
                                @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
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
                            <h4 class="card-title">Grades</h4>
                            <button onclick="Add()" type="button" class="btn btn-sm btn-success">Add New</button>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-hover">
                                <thead class="text-warning">
                                    <th>ID</th>
                                    <th>Full Name</th>
                                    <th>Course</th>
                                    <th>Subject</th>
                                    <th>Grade</th>
                                    <th>Actions</th>
                                </thead>
                                <tbody>
                                    @foreach ($grades as $grade)
                                    <tr>
                                        <td>{{ $grade->id }}</td>
                                        <td>{{ $grade->student->fullname }}</td>
                                        <td>{{ $grade->student->course->name }}</td>
                                        <td>{{ $grade->subject->name }}</td>
                                        <td>{{ $grade->grade }}</td>
                                        <td>
                                            <button onclick="Edit({{ $grade->id }})" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></button>
                                            <button onclick="Delete({{ $grade->id }})" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
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
    $('#menu-grades').addClass('active')

    var modal = '#main-modal';

    function Add() {

        $('#id').val('-1')
        $('#grade').val('')
        $('#student_id').val('')
        $('#subject_id').val('')

        $(modal).modal({
            'show': true
        })
    }

    function Edit(id) {

        Controller.Post('/api/grades/item', { 'id': id }).done(function(result) {

            $('#id').val(result.id)
            $('#grade').val(result.grade)
            $('#student_id').val(result.student_id)
            $('#subject_id').val(result.subject_id)

            $(modal).modal({
                'show': true
            })

        })

    }

    function Save() {

        var data = {
            id          : $('#id').val(),
            grade       : $('#grade').val(),
            student_id  : $('#student_id').val(),
            subject_id  : $('#subject_id').val()
        }

        if(data.id == -1) {
            Controller.Post('/api/grades/create', data).done(function(result) {
                window.location.reload()
            })
        }
        else if(data.id > 0) {
            Controller.Post('/api/grades/update', data).done(function(result) {
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
                    Controller.Post('/api/grades/delete', { 'id': id }).done(function(result) {
                        window.location.reload()
                    })
                }
            }
        })
    }

</script>
@endsection
