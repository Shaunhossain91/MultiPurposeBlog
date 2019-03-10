@extends('admin.app')


@section('main-content')



    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
   

<div class="card card-primary">


   <!-- Main content -->
   <section class="content">

<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Title</h3>


  </div>
  <div class="card-body">
  <form role="form" action="{{route('category.update',$category->id)}}" method="post">
   {{ csrf_field() }}
   {{ method_field('PATCH') }}
      <div class="card-body">

         <div class="form-group">
            <label for="exampleInputPassword1">Category Title</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="category_title" placeholder="Category Title" value="{{$category->name}}" >
            <?php
               if ($errors->has('category_title')) {
                  ?>
                 
                     <ul style="margin: 0px; padding: 0px;">
                        
                              <li style="color:red; list-style-type:none; margin:0px; padding:0px;"> <?php echo $errors->first('category_title'); ?> </li>
                        
                     </ul>
                
                  <?php
            }
         ?> 
         </div>
         <div class="form-group">
            <label for="exampleInputPassword1">Category Slug</label>
            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Category Slug" name="category_slug" value="{{$category->slug}}" >
            <?php
               if ($errors->has('category_slug')) {
                  ?>
                 
                     <ul style="margin: 0px; padding: 0px;">
                        
                              <li style="color:red; list-style-type:none;margin:0px; padding:0px; "> <?php echo $errors->first('category_slug'); ?> </li>
                        
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
         <a href="{{route('category.index')}}" class="btn btn-warning">Back</a>
      </div>
      </form>
  </div>
  <!-- /.card-body -->
  <div class="card-footer">
    Footer
  </div>
  <!-- /.card-footer-->
</div>
<!-- /.card -->

</section>
<!-- /.content -->
</div>



   

 
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>

  
@endsection