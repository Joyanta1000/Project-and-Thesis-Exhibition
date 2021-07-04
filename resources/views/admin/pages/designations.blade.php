<!DOCTYPE html>
<html lang="en">
  <head>
    <title>AdminX - Data Tables</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="{{asset('../components/dist/css/adminx.css')}}" media="screen" />
  </head>
  <body>
    <div class="adminx-container">
      <!-- Header -->
      @include('admin.includes.navbar')
      <!-- // Header -->

      <!-- expand-hover push -->
      
      @include('admin.includes.sidebar')

      <!-- Main Content -->
      <div class="adminx-content">
        <div class="adminx-main-content">
          <div class="container-fluid">
            <!-- BreadCrumb -->
            <nav aria-label="breadcrumb" role="navigation">
              <ol class="breadcrumb adminx-page-breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Tables</a></li>
                <li class="breadcrumb-item active  aria-current="page">Regular Tables</li>
              </ol>
            </nav>

            <div class="pb-3">
              <h1>Data Tables</h1>
            </div>
<div>
                  @if (session('status'))
<div class="card-header">
<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert">×</button>
  {{ session('status') }}
</div>
@elseif(session('failed'))
<div class="alert alert-danger" role="alert">
  <button type="button" class="close" data-dismiss="alert">×</button>
  {{ session('failed') }}
</div>
</div>
@endif
</div>
            <div class="row">
              <div class="col">
                <div class="alert alert-warning" role="alert">
                  <strong>DataTables are a jQuery-only plugin</strong><br />
                  If you know a similar vanilla JS library that you want to see supported, feel free to open an issue on GitHub.
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="card mb-grid">
                  <div class="table-responsive-md">
                    <table class="table table-actions table-striped table-hover mb-0" data-table>
                      <thead>
                        <tr>
                          <th scope="col">
                            <label class="custom-control custom-checkbox m-0 p-0">
                              <input type="checkbox" class="custom-control-input table-select-all">
                              <span class="custom-control-indicator"></span>
                            </label>
                          </th>
                          <th scope="col">ID</th>
                          <th scope="col">Designation</th>
                          <th scope="col">Active/Inactive</th>
                          <th scope="col">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($designations as $designation)
                        <tr>
                          <th scope="row">
                            <label class="custom-control custom-checkbox m-0 p-0">
                              <input type="checkbox" class="custom-control-input table-select-row">
                              <span class="custom-control-indicator"></span>
                            </label>
                          </th>
                          <td>{{ $designation->id }}</td>
                          <td>{{ $designation->name }}</td>
                          @if($designation->is_active==1)
                          <td>
                            <a class="badge badge-pill badge-primary"  href="{{URL::to('update_status_of_designation/'.$designation->id)}}">Active</a>
                            <!-- <button >Active</button> -->
                          </td>
                          @endif
                          @if($designation->is_active==0)
                          <td>
                            <a class="badge badge-pill badge-danger" href="{{URL::to('update_status_of_designation/'.$designation->id)}}">Inactive</a>
                            <!-- <button class="badge badge-pill badge-danger">Inactive</button> -->
                          </td>
                          @endif
                          <td>
                            <a type="button" class="btn btn-primary" href="{{URL::to('/edit_designations_info/'.$designation->id)}}">Edit</a>
                          <a type="button" class="btn btn-danger" href="{{URL::to('delete_designations_information/'.$designation->id)}}" onclick="return confirm('Are you sure to delete?')" >Delete</a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- // Main Content -->
    </div>

    <!-- If you prefer jQuery these are the required scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    <script src="{{asset('../components/dist/js/vendor.js')}}"></script>
    <script src="{{asset('../components/dist/js/adminx.js')}}"></script>

    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script>
      $(document).ready(function() {
        var table = $('[data-table]').DataTable({
          "columns": [
            null,
            null,
            null,
            null,
            { "orderable": false }
          ]
        });

        /* $('.form-control-search').keyup(function(){
          table.search($(this).val()).draw() ;
        }); */
      });
    </script>
    <!-- If you prefer vanilla JS these are the only required scripts -->
    <!-- script src="../dist/js/vendor.js"></script>
    <script src="../dist/js/adminx.vanilla.js"></script-->
  </body>
</html>