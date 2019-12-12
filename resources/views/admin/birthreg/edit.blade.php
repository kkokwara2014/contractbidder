@extends('admin.layout.app')


@section('content')
{{-- @include('admin.layout.statboard') --}}
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit Birth Registration
            <small>Modify Birth Registration</small>
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
                <a href="{{ route('birthreg.index') }}" class="btn btn-success">
                    <span class="fa fa-eye"></span> All Registered Births
                </a>
                <br><br>

                <div class="row">
                    <div class="col-md-9">

                        <div class="box">
                            <!-- /.box-header -->
                            <div class="box-body">
                                <form action="{{ route('birthreg.update',$birthregs->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{method_field('PUT')}}
                                    <div class="form-group">
                                        <label for="">Certificate #</label>
                                        <input style="background-color: green; color:white;" type="text" class="form-control" name="certnumber" value="{{$birthregs->certnumber}}"
                                            readonly>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                        <label for="">Last Name <b style="color: red;">*</b> </label>
                                                        <input type="text" class="form-control" name="lastname" value="{{$birthregs->lastname}}"
                                                            autofocus>
                                                    </div>
                                                <div class="form-group">
                                                        <label for="">First Name <b style="color: red;">*</b> </label>
                                                        <input type="text" class="form-control" name="firstname" value="{{$birthregs->firstname}}"
                                                            autofocus>
                                                    </div>
                                                <div class="form-group">
                                                        <label for="">Othername </label>
                                                        <input type="text" class="form-control" name="othername" value="{{$birthregs->othername}}"
                                                            autofocus>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Gender </label>
                                                        <select name="gender" class="form-control">
                                                            <option selected="disabled">Select Gender</option>
                                                           
                                                            <option {{old('gender',$birthregs->gender=="Male"?'selected':'')}}>Male</option>
                                                            <option {{old('gender',$birthregs->gender=="Female"?'selected':'')}}>Female</option>
                                                         
                                                        </select>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label for="">Date of Birth</label>
                                                        <input type="text" class="form-control" id="datepicker" name="dob"
                                                        value="{{$birthregs->dob}}">
                                                    </div>
                                        </div>
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                        <label for="">Place of Birth<b style="color: red;">*</b> </label>
                                                        <input type="text" class="form-control" name="placeofbirth" value="{{$birthregs->placeofbirth}}"
                                                            autofocus>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name">State of Origin</label>
                                                        <select name="stateoforigin_id" class="form-control">
                                                            <option selected="disabled">Select State of Origin</option>
                                                            @foreach ($stateoforigins as $stateoforigin)
                
                                                            <option value="{{$stateoforigin->id}}"
                                                                {{$stateoforigin->id==$birthregs->stateoforigin_id ? 'selected':''}}>
                                                                {{$stateoforigin->name}}</option>
                
                                                            @endforeach
                                                        </select>
                                                    </div>
                                            <div class="form-group">
                                                    <label for="">Father's Name <b style="color: red;">*</b> </label>
                                            <input type="text" class="form-control" name="fathername" value="{{$birthregs->fathername}}"
                                                        autofocus>
                                                </div>
                                                <div class="form-group">
                                                        <label for="">Mother's Name <b style="color: red;">*</b> </label>
                                                        <input type="text" class="form-control" name="mothername" value="{{$birthregs->mothername}}"
                                                            autofocus>
                                                    </div>
                                        </div>
                                    </div>
                                        
                                <input type="hidden" name="user_id" value="{{$birthregs->user_id}}">

                                    

                                    
                                    
                                    
                                    

                                    <br>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="{{ route('birthreg.index') }}" class="btn btn-default">Cancel</a>

                            </div>
                            </form>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
        </div>
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