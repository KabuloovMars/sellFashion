<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            {{-- navbar --}}
            @include('admin.navbar')
            {{-- sidebar --}}
            @include('admin.sidebar')
            <!-- Main Content -->

            <div class="main-content">
                @if (Session::has('message'))
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>{{ session()->get('message') }}</strong>
                  </div>
                @endif
                {{-- @if (Session::has('del'))
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>{{ session()->get('del') }}</strong>
                  </div>
                @endif --}}
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add Category</h4>
                        </div>
                        <form action="{{ route('addCategory') }}" method="post">
                            @csrf
                        <div class="card-body ">
                            <div class="form-group">
                                <label>Text</label>
                                <input type="text" name="name" class="form-control ">
                            </div>

                            <div class="input-group-append">
                                <button  class="btn btn-primary" type="submit">Button</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
                <div class="col-12 col-md-6  col-lg-10">
                    <div class="card">
                      <div class="card-header">
                        <h4>Simple Table</h4>
                      </div>
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-bordered table-md">
                            <tr>
                              <th>#</th>
                              <th>Name</th>
                              <th>Created At</th>
                              <th>Status</th>
                              <th>Edit</th>
                              <th>Delete</th>
                            </tr>
                            @foreach ($categories as  $category)

                            <tr>
                              <td>1</td>
                              <td>{{ $category->name }}</td>
                              <td>{{ $category->created_at }}</td>
                              <td>
                                <div class="badge badge-success">Active</div>
                              </td>
                              <td><a href="{{ route('editCategory',$category->id) }}" class="btn btn-primary">Edit</a></td>
                              <td>


                                <a href="{{ route('deleteCategory',$category->id) }}" class="btn btn-danger">Delete</a></td>
                            </tr>
                            @endforeach


                          </table>
                        </div>
                      </div>
                      <div class="card-footer text-right">
                        <nav class="d-inline-block">
                          <ul class="pagination mb-0">
                            <li class="page-item disabled">
                              <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1 <span
                                  class="sr-only">(current)</span></a></li>
                            <li class="page-item">
                              <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                              <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                            </li>
                          </ul>
                        </nav>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>


    {{-- footer --}}


    @include('admin.footer')
    </div>
    </div>
    </div>
    {{-- Js --}}
    @include('admin.js')
</body>

</html>
