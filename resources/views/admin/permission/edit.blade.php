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
  <form role="form" action="{{route('permission.update',$permissions->id)}}" method="post">
   {{ csrf_field() }}
   {{ method_field('PATCH') }}
   <div class="card-body">

   <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
            <label for="exampleInputPassword1">Permission Title</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="name" placeholder="Permission" value="{{$permissions->name}}">
            {!! $errors->first('name', '<p class="help-block" style="color:red;">:message</p>') !!}
         </div>

         <div class="form-group">
            <label>Permission for</label>
            <select class="form-control form-control-sm" name="for">
               <option>Select Permission for</option>
               <option value="user">User</option>
               <option value="post">Post</option>
               <option value="other">Other</option>
            </select>
         </div>
</div>
      <!-- /.card-body -->


</div>


          <div class="card-footer">
         <button type="submit" class="btn btn-primary">Submit</button>
         <a href="{{route('permission.index')}}" class="btn btn-warning">Back</a>
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