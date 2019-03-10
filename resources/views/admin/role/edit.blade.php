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
  <form role="form" action="{{route('role.update',$roles->id)}}" method="post">
   {{ csrf_field() }}
   {{ method_field('PATCH') }}
   <div class="card-body">

<div class="form-group {{ $errors->has('role') ? 'has-error' : ''}}">
   <label for="exampleInputPassword1">Role Title</label>
   <input type="text" class="form-control" id="exampleInputPassword1" name="role" placeholder="role Title" value="{{$roles->role}}">
   {!! $errors->first('role', '<p class="help-block" style="color:red;">:message</p>') !!}
</div>


<div class="row">
         
         <div class="col-4">
            <label for="name">Posts Permissions</label>
            <div class="checkbox">
            @foreach($permissions as $permission)
               @if($permission->for == 'post')
               <label><input type="checkbox" name="permission[]" value="{{$permission->id}}"
               @foreach($roles->permissions as $role_permit)
               @if($role_permit->id == $permission->id)
               checked
               @endif
               @endforeach >{{$permission->name}}</label><br>
               @endif
            @endforeach
            </div>
         </div>
         <div class="col-4">
            <label for="name">Users Permission</label>
            <div class="checkbox">
            @foreach($permissions as $permission)
               @if($permission->for == 'user')
               <label><input type="checkbox" name="permission[]" value="{{$permission->id}}" @foreach($roles->permissions as $role_permit)
               @if($role_permit->id == $permission->id)
               checked
               @endif
               @endforeach>{{$permission->name}}</label><br>
               @endif
            @endforeach
            </div>
         </div>
         <div class="col-4">
            <label for="name">Users Other</label>
            <div class="checkbox">
            @foreach($permissions as $permission)
               @if($permission->for == 'other')
               <label><input type="checkbox" name="permission[]" value="{{$permission->id}}" @foreach($roles->permissions as $role_permit)
               @if($role_permit->id == $permission->id)
               checked
               @endif
               @endforeach>{{$permission->name}}</label><br>
               @endif
            @endforeach
            </div>
         </div>
      
      </div>

</div>
      <!-- /.card-body -->


</div>


          <div class="card-footer">
         <button type="submit" class="btn btn-primary">Submit</button>
         <a href="{{route('role.index')}}" class="btn btn-warning">Back</a>
      </div>
      </form>
  </div>
  <!-- /.card-body -->

  <!-- /.card-footer-->

<!-- /.card -->

</section>
<!-- /.content -->
  
@endsection