<div>
    <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Users</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Starter Page</li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
      </div>
    <!-- Main content -->
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12">
              <div class="d-flex justify-content-end">
                <button wire:click.prevent="addNew" class="btn btn-primary"><i class="fa fa-plus-circle mr-1"></i>Add New Users</button>
              </div>
                <div class="card">
                  <div class="card-body">
                    <div class="card-body">
                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"><div class="dt-buttons btn-group flex-wrap">               <button class="btn btn-secondary buttons-copy buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>Copy</span></button> <button class="btn btn-secondary buttons-csv buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>CSV</span></button> <button class="btn btn-secondary buttons-excel buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>Excel</span></button> <button class="btn btn-secondary buttons-pdf buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>PDF</span></button> <button class="btn btn-secondary buttons-print" tabindex="0" aria-controls="example1" type="button"><span>Print</span></button> <div class="btn-group"><button class="btn btn-secondary buttons-collection dropdown-toggle buttons-colvis" tabindex="0" aria-controls="example1" type="button" aria-haspopup="true" aria-expanded="false"><span>Column visibility</span></button></div> </div></div><div class="col-sm-12 col-md-6"><div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                      <thead>
                      <tr role="row">
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">#</th>
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Name</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Email</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Registered Date</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Action</th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach($users as $user)
                      <tr class="odd">
                        <th class="dtr-control sorting_1" tabindex="0">{{ $loop->iteration }}</th>
                        <td class="dtr-control sorting_1" tabindex="0">{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->toFormattedDate() }}</td>
                        <td>
                          <a href="" wire:click.prevent="edit({{ $user }})">
                            <i class="fa fa-edit mr-2"></i>
                          </a>

                          <a href="" wire:click.prevent="confirmUserRemoval({{ $user->id }})">
                            <i class="fa fa-trash text-danger"></i>
                          </a>

                        </td>
                      @endforeach
                      </tr>
                      </tbody>
                    </table></div></div>
                  </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
      <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" wire:ignore.self>
            <div class="modal-dialog" role="document">
              <form autocomplete="off" wire:submit.prevent="{{ $showEditModal ? 'updateUser' : 'createUser' }}">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="">
                  @if($showEditModal)
                    <span>Edit User</span>
                  @else
                    <span>
                      Add New User
                    </span>
                  @endif
                  </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" wire:model.defer="state.name" class="form-control @error('name') is-invalid @enderror" id="name" aria-describeby="nameHelp"
                      placeholder="Enter Full Name">
                      @error('name')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="email">Email Address</label>
                      <input type="email" wire:model.defer="state.email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describeby="emailHelp"
                      placeholder="Enter email">
                      @error('email')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" wire:model.defer="state.password" class="form-control @error('password') is-invalid @enderror" id="email" aria-describeby="emailHelp"
                      placeholder="Enter email">
                      @error('password')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="passwordConfirmation">Confirm Password</label>
                      <input type="password" wire:model.defer="state.password_confirmation" class="form-control" id="email" aria-describeby="emailHelp"
                      placeholder="Enter email">
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times mr-1"></i>Cancel</button>
                  <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-1"></i>
                    @if($showEditModal)
                    <span>
                      Update
                    </span>
                    @else
                    <span>
                      Save
                    </span>
                  </button>
                  @endif
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            </form>
            <!-- /.modal-dialog -->
          </div>

          <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" wire:ignore.self>
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                    <h5>Delete User</h5>
                  </div>
                  <div class="modal-body">
                    <h4>Are You Sure You Want To Delete This User?</h4>
                  </div>
                    
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times mr-1"></i>Cancel</button>
                    <button type="button" wire:click.prevent="deleteUser" class="btn btn-danger"><i class="fa fa-save mr-1"></i> Delete User</button>
                  </div>
                </div>
              </div>
            </div>
</div>





