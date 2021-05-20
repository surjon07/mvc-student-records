@extends('shared.master')

@section('title')
    Accounts
@endsection

@section('modal')
    <div class="modal fade" id="main-modal" tabindex="-1" role="dialog" aria-labelledby="main-modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="main-modalLabel">Account Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <div class="modal-body">

                <input type="hidden" class="form-control" id="id">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password">
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
                            <h4 class="card-title">Accounts</h4>
                            <button onclick="Add()" type="button" class="btn btn-sm btn-success">Add New</button>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-hover">
                                <thead class="text-warning">
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Actions</th>
                                </thead>
                                <tbody>
                                    @foreach ($data as $account)
                                    <tr>
                                        <td>{{ $account->id }}</td>
                                        <td>{{ $account->username }}</td>
                                        <td>{{ $account->password }}</td>
                                        <td>
                                            <button onclick="Edit({{ $account->id }})" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></button>
                                            <button onclick="Delete({{ $account->id }})" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
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
    $('#menu-accounts').addClass('active')

    var modal = '#main-modal';

    function Add() {

        $('#id').val('-1')
        $('#username').val('')
        $('#password').val('')

        $(modal).modal({
            'show': true
        })
    }

    function Edit(id) {

        Controller.Post('/api/accounts/item', { 'id': id }).done(function(result) {

            $('#id').val(result.id)
            $('#username').val(result.username)
            $('#password').val(result.password)

            $(modal).modal({
                'show': true
            })

        })

    }

    function Save() {

        var data = {
            id          : $('#id').val(),
            username    : $('#username').val(),
            password    : $('#password').val()
        }

        if(data.id == -1) {
            Controller.Post('/api/accounts/create', data).done(function(result) {
                window.location.reload()
            })
        }
        else if(data.id > 0) {
            Controller.Post('/api/accounts/update', data).done(function(result) {
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
                    Controller.Post('/api/accounts/delete', { 'id': id }).done(function(result) {
                        window.location.reload()
                    })
                }
            }
        })
    }

</script>
@endsection
