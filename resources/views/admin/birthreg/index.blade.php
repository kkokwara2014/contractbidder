@extends('admin.layout.app')


@section('content')
{{-- @include('admin.layout.statboard') --}}
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Birth Registration
            <small>All Birth Registrations</small>
        </h1>
        {{-- <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Dashboard</li>
            </ol> --}}
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">
                {{-- @if (Auth::user()->role->id==4) --}}

                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                    <span class="fa fa-plus"></span> Register Birth
                </button>

                {{-- <a href="{{route('chapter.index')}}" class="btn btn-success"><span class="fa fa-eye"></span>
                Chapters
                </a> --}}
                {{-- @endif --}}


                {{-- @if (Auth::user()->role->id==2)
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default-assign">
                    <span class="fa fa-exchange"></span> Assign Project
                </button>
                <a href="{{route('project.allocated')}}" class="btn btn-success"><span class="fa fa-eye"></span>
                Allocated Projects</a>
                @endif

                <br><br> --}}

                <div class="row">
                    <div class="col-md-12">

                        <div class="box">
                            <!-- /.box-header -->
                            <div class="box-body">
                                @if (count($birthregisters)>0)

                                <table id="example1" class="table table-bordered table-striped table-responsive">
                                    <thead>
                                        <tr>
                                            <th>Cert. #</th>
                                            <th>Child's Name</th>
                                            <th>Gender</th>                                            
                                            <th>DOB</th>
                                            <th>Place of Birth</th>
                                            <th>State of Origin</th>
                                            <th>Father</th>
                                            <th>Mother</th>
                                            
                                            <th>Registered By</th>

                                            <th>Edit</th>
                                            <th>Delete</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($birthregisters as $birthreg)
                                        {{-- @if
                                        ($birthreg->user->id==Auth::user()->id||Auth::user()->role->id==1||Auth::user()->role->id==2) --}}
                                        <tr>
                                            <td>{{$birthreg->certnumber}}</td>
                                            <td>{{$birthreg->lastname.', '.$birthreg->firstname.' '.$birthreg->othername}}</td>
                                            <td>{{$birthreg->gender}}</td>
                                            <td>{{$birthreg->dob}}</td>
                                            <td>{{$birthreg->placeofbirth}}</td>
                                            <td>{{$birthreg->stateoforigin->name}}</td>
                                            <td>{{$birthreg->fathername}}</td>
                                            <td>{{$birthreg->mothername}}</td>
                                            
                                            <td>{{$birthreg->user->lastname.', '.$birthreg->user->firstname}}</td>
                                            {{-- <td>{{$birthreg->user->lastname.', '.$birthreg->user->firstname.' - '.$birthreg->user->identitynumber}} --}}
                                            </td>
                                            {{-- <td style="text-align: center">
                                                <a href="{{ route('birthreg.show',$birthreg->id) }}"><span
                                                        class="fa fa-eye fa-2x text-primary"></span></a>
                                            </td> --}}

                                            <td style="text-align: center">
                                                {{-- @if ($birthreg->user->id==Auth::user()->id) --}}
                                                <a href="{{ route('birthreg.edit',$birthreg->id) }}"><span
                                                        class="fa fa-edit fa-2x text-primary"></span>
                                                </a>
                                                {{-- @endif --}}
                                            </td>

                                            <td style="text-align: center">
                                                <form id="delete-form-{{$birthreg->id}}" style="display: none"
                                                    action="{{ route('birthreg.destroy',$birthreg->id) }}" method="post">
                                                    {{ csrf_field() }}
                                                    {{method_field('DELETE')}}
                                                </form>
                                                <a href="" onclick="
                                                            if (confirm('Are you sure you want to delete this?')) {
                                                                event.preventDefault();
                                                            document.getElementById('delete-form-{{$birthreg->id}}').submit();
                                                            } else {
                                                                event.preventDefault();
                                                            }
                                                        "><span class="fa fa-trash fa-2x text-danger"></span>
                                                </a>

                                            </td>
                                        </tr>
                                        {{-- @endif --}}
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                                <th>Cert. #</th>
                                                <th>Child's Name</th>
                                                <th>Gender</th>
                                                
                                                <th>DOB</th>
                                                <th>Place of Birth</th>
                                                <th>State of Origin</th>
                                                <th>Father</th>
                                                <th>Mother</th>
                                                
                                                <th>Registered By</th>
    
                                                <th>Edit</th>
                                                <th>Delete</th>
                                        </tr>
                                    </tfoot>
                                </table>

                                @else
                                <p class="alert alert-info">No Birth Registration added yet!</p>
                                @endif
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                </div>


                {{-- Data input modal area --}}
                <div class="modal fade" id="modal-default">
                    <div class="modal-dialog modal-lg">

                        <form action="{{ route('birthreg.store') }}" method="post">
                            {{ csrf_field() }}
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title"><span class="fa fa-tags"></span> Register Birth</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="">Certificate #</label>
                                        <input style="background-color: green; color:white;" type="text" class="form-control" name="certnumber" value="{{'breg'.date('Y').'-'. rand(55000998, 99955998)}}"
                                            readonly>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                        <label for="">Last Name <b style="color: red;">*</b> </label>
                                                        <input type="text" class="form-control" name="lastname" placeholder="Last Name"
                                                            autofocus>
                                                    </div>
                                                <div class="form-group">
                                                        <label for="">First Name <b style="color: red;">*</b> </label>
                                                        <input type="text" class="form-control" name="firstname" placeholder="First Name"
                                                            autofocus>
                                                    </div>
                                                <div class="form-group">
                                                        <label for="">Othername </label>
                                                        <input type="text" class="form-control" name="othername" placeholder="Othername(s)"
                                                            autofocus>
                                                    </div>
                                                <div class="form-group">
                                                        <label for="">Gender </label>
                                                        <select name="gender" class="form-control">
                                                            <option selected="disabled">Select Gender</option>
                                                           
                                                            <option>Male</option>
                                                            <option>Female</option>
                                                         
                                                        </select>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label for="">Date of Birth</label>
                                                        <input type="text" class="form-control" id="datepicker" name="dob"
                                                        placeholder="Date of Birth">
                                                    </div>
                                        </div>
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                        <label for="">Place of Birth<b style="color: red;">*</b> </label>
                                                        <input type="text" class="form-control" name="placeofbirth" placeholder="Place of birth"
                                                            autofocus>
                                                    </div>
                                                <div class="form-group">
                                                <label for="">State of Origin</label>
                                                <select name="stateoforigin_id" class="form-control">
                                                    <option selected="disabled">Select State of Origin</option>
                                                    @foreach ($stateoforigins as $stateoforigin)
                                                    <option value="{{$stateoforigin->id}}">{{$stateoforigin->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                    <label for="">Father's Name <b style="color: red;">*</b> </label>
                                                    <input type="text" class="form-control" name="fathername" placeholder="Father's Name"
                                                        autofocus>
                                                </div>
                                                <div class="form-group">
                                                        <label for="">Mother's Name <b style="color: red;">*</b> </label>
                                                        <input type="text" class="form-control" name="mothername" placeholder="Mother's Name"
                                                            autofocus>
                                                    </div>
                                        </div>
                                    </div>
                                        
                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                            <!-- /.modal-content -->

                        </form>
                    </div>
                    <!-- /.modal-dialog -->
                </div>

                <!-- /.modal -->

               

            </section>
            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            {{-- <section class="col-lg-5 connectedSortable"> --}}


            {{-- </section> --}}
            <!-- right col -->
        </div>
        <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection