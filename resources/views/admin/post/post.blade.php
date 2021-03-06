
@extends('admin.app')



@section('headerSection')
<link rel="stylesheet" href="{{asset('admin/plugins/select2/select2.min.css')}}">
@endsection

@section('main-content')



    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">

        <div class="card card-primary">

   <!-- /.card-header -->
   <!-- form start -->
   <form role="form" action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
   {{ csrf_field() }}
      <div class="card-body">
         <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="title" placeholder="Title">
            <?php
               if ($errors->has('title')) {
                  ?>
                 
                     <ul style="margin: 0px; padding: 0px;">
                        
                              <li style="color:red; list-style-type:none; margin:0px; padding:0px;"> <?php echo $errors->first('title'); ?> </li>
                        
                     </ul>
                
                  <?php
            }
         ?> 
         </div>
         <div class="form-group">
            <label for="exampleInputPassword1">Slogan</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="slogan" placeholder="Slogan">
            <?php
               if ($errors->has('slogan')) {
                  ?>
                 
                     <ul style="margin: 0px; padding: 0px;">
                        
                              <li style="color:red; list-style-type:none; margin:0px; padding:0px;"> <?php echo $errors->first('slogan'); ?> </li>
                        
                     </ul>
                
                  <?php
            }
         ?> 
         </div>
         <div class="form-group">
            <label for="exampleInputPassword1">Slug</label>
            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Slug" name="slug">
            <?php
               if ($errors->has('slug')) {
                  ?>
                 
                     <ul style="margin: 0px; padding: 0px;">
                        
                              <li style="color:red; list-style-type:none;margin:0px; padding:0px; "> <?php echo $errors->first('slug'); ?> </li>
                        
                     </ul>
                
                  <?php
            }
         ?>            
         </div>
         <div class="form-group">
            <label for="exampleInputFile">File input</label>
            <div class="input-group">
               <div class="custom-file">
                  <input type="file" class="custom-file-input" name="image" id="exampleInputFile" >
                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
               </div>
               
            </div>
         </div>
         <div class="form-check">
            <input type="checkbox" class="form-check-input" name="publish" id="exampleCheck1" value="1" >
            <label class="form-check-label" for="exampleCheck1">Publish</label>
         </div>


         <div class="form-group">
                  <label>Select Tag</label>
                  
                  <select class="form-control select2 select2-hidden-accessible"  multiple="" data-placeholder="Select a State" 
                  style="width: 100%;" tabindex="-1" aria-hidden="true" name="tags[]" >
                    
                  @foreach ($tags as $tag)
                     <option value = "{{$tag->id}}">{{$tag->name}}</option>
                  @endforeach
                  </select>
         </div>

         <div class="form-group">
                  <label>Select Category </label>
                  <select class="form-control select2 select2-hidden-accessible" name="categories[]" multiple="" data-placeholder="Select a State" style="width: 100%;" tabindex="-1" aria-hidden="true">
                    
                    @foreach ($categories as $category)
                       <option value = "{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                    </select>
         </div>
      <!-- /.card-body -->


</div>



          <div class="card card-outline card-info">

            <!-- /.card-header -->
            <div class="card-body pad">
              <div class="mb-3">
                <textarea class="textarea" name="body" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
              </div>
              <?php
               if ($errors->has('body')) {
                  ?>
                 
                     <ul style="margin: 0px; padding: 0px;">
                        
                              <li style="color:red; list-style-type:none;margin:0px; padding:0px; "> <?php echo $errors->first('body'); ?> </li>
                        
                     </ul>
                
                  <?php
            }
         ?> 
            </div>
          </div>
          <div class="card-footer">
         <button type="submit" class="btn btn-primary">Submit</button>
         <a href="{{route('post.index')}}" class="btn btn-warning">Back</a>
      </div>
      </form>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>

@endsection

@section('footerSection')
<script src="{{asset('admin/plugins/select2/select2.full.min.js')}}"></script>
<script>
$(document).ready(function(){
   $('.select2').select2();
});

</script>
@endsection

