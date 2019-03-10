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
  <form role="form" action="{{route('tag.store')}}" method="post">
   {{ csrf_field() }}
      <div class="card-body">

         <div class="form-group">
            <label for="exampleInputPassword1">Tag Title</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="tag_title" placeholder="Tag Title">
            <?php
               if ($errors->has('tag_title')) {
                  ?>
                 
                     <ul style="margin: 0px; padding: 0px;">
                        
                              <li style="color:red; list-style-type:none; margin:0px; padding:0px;"> <?php echo $errors->first('tag_title'); ?> </li>
                        
                     </ul>
                
                  <?php
            }
         ?> 
         </div>
         <div class="form-group">
            <label for="exampleInputPassword1">Tag Slug</label>
            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Tag Slug" name="tag_slug">
            <?php
               if ($errors->has('tag_slug')) {
                  ?>
                 
                     <ul style="margin: 0px; padding: 0px;">
                        
                              <li style="color:red; list-style-type:none;margin:0px; padding:0px; "> <?php echo $errors->first('tag_slug'); ?> </li>
                        
                     </ul>
                
                  <?php
            }
         ?>            
         </div>

      </div>
      <!-- /.card-body -->


</div>


          <div class="card-footer">
         <button type="submit" class="btn btn-primary">Submit</button>
         <a href="{{route('tag.index')}}" class="btn btn-warning">Back</a>
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