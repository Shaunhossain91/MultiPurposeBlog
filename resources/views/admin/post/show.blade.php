
@extends('admin.app')



@section('headerSection')
<link rel="stylesheet" href="{{asset('admin/plugins/datatables/dataTables.bootstrap4.css')}}">
@endsection

@section('main-content')


 <!-- Main content -->
 <section class="content">

<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Title</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
        <i class="fa fa-minus"></i></button>
      <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
        <i class="fa fa-times"></i></button>
    </div>
  </div>
  <div class="card">
            <div class="card-header">
            @can('posts.create', Auth::user())
                <a href="{{route('post.create')}}" class="btn btn-primary">Add New</a>
            @endcan
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div id="example1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="example1_length"><label>Show <select name="example1_length" aria-controls="example1" class="form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row">
                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 152.35px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Sr. No.</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 206.8px;" aria-label="Browser: activate to sort column ascending">Post Title</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 179.583px;" aria-label="Platform(s): activate to sort column ascending">Slogan</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 128.667px;" aria-label="Engine version: activate to sort column ascending">Slug</th>

                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 90.6px;" aria-label="CSS grade: activate to sort column ascending">Modify</th></tr>

                </thead>
                <tbody>
                @foreach($posts as $post)
                <tr role="row" class="odd">
                  <td class="sorting_1">{{$loop->index + 1}}</td>
                  <td>{{$post->title}}</td>
                  <td>{{$post->slogan}}</td>
                  <td>{{$post->slug}}</td>
                  <td>
                  
                  @can('posts.delete',Auth::user())
                  <a href="#" class="btn btn-danger" onClick="if(confirm('Are You Sure,You want to delete this?'))
                  {
                    event.preventDefault(); 
                    document.getElementById('delete-form-{{ $post->id }}').submit();
                    } 
                    else{
                      event.preventDefault(); 
                    }"><i class="fas fa-trash"></i></a>   
                    @endcan
                    <form action="{{route('post.destroy',$post->id)}}" style="display:none;" id="delete-form-{{$post->id}}" method="post">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                    </form>
                    @can('posts.update', Auth::user())
                     <a href="{{route('post.edit',$post->id)}}" class="btn btn-primary"><i class="fas fa-edit"></i>
</a>
@endcan

</td>
                </tr>
                @endforeach
                
                
    
              
              
              </tbody>

              </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="example1_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
            </div>
            <!-- /.card-body -->
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
@endsection

@section('footerSection')
<script src="{{asset('admin/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('admin/plugins/datatables/dataTables.bootstrap4.js')}}"></script>
@endsection