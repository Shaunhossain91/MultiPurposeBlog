@extends('admin.app')


@section('main-content')



   <!-- Main content -->
   <section class="content">

<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Title</h3>


  </div>
  <div class="card-body">
  <form role="form" action="{{route('user.store')}}" method="post">
   {{ csrf_field() }}
      <div class="card-body">

         <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
            <label for="exampleInputPassword1">Name</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="name" placeholder="Name">
            {!! $errors->first('name', '<p class="help-block" style="color:red;">:message</p>') !!}
         </div>
         <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
            <label for="exampleInputPassword1">Email</label>
            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Email" name="email">
            {!! $errors->first('email', '<p class="help-block" style="color:red;">:message</p>') !!}           
         </div>

         <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
            <label for="exampleInputPassword1">Phone</label>
            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Phone" name="phone">
            {!! $errors->first('phone', '<p class="help-block" style="color:red;">:message</p>') !!}           
         </div>


         <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
            {!! $errors->first('password', '<p class="help-block" style="color:red;">:message</p>') !!}           
         </div>

         <div class="form-group {{ $errors->has('confirm_password') ? 'has-error' : ''}}">
            <label for="exampleInputPassword1">Confirm Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Confirm password" name="password_confirmation">
            {!! $errors->first('confirm_password', '<p class="help-block" style="color:red;">:message</p>') !!}            
         </div>

         <div class="form-group">
            <label class="checkbox-inline" style="margin-right: 5px;"><input type="checkbox"  value="1" name="status">Status</label>
         </div> 

         <div class="form-group ">
            @foreach($roles as $role)
            <label class="checkbox-inline" style="margin-right: 5px;"><input type="checkbox"  value="{{$role->id}}" name="role[]">{{$role->role}}</label>
            @endforeach
         </div>

      </div>
      <!-- /.card-body -->


</div>


          <div class="card-footer">
         <button type="submit" class="btn btn-primary">Submit</button>
         <a href="{{route('user.index')}}" class="btn btn-warning">Back</a>
      </div>
      </form>
  </div>
  <!-- /.card-body -->

  <!-- /.card-footer-->
</div>
<!-- /.card -->

</section>
<!-- /.content -->
  
@endsection