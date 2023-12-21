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
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add Category</h4>
                        </div>
                        <form action="" method="post">
                        <div class="card-body ">
                            <div class="form-group">
                                <label>Text</label>
                                <input type="text" class="form-control ">
                            </div>

                            <div class="input-group-append">
                                <button  class="btn btn-primary" type="submit">Button</button>
                            </div>
                        </div>
                    </form>
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
