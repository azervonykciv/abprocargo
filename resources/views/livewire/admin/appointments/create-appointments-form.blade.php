<div>
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Add Appointments</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Appointments</a></li>
                <li class="breadcrumb-item active">Create</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <form wire:submit.prevent="createAppointment">
                <div class="card">
                  <div class="card-body">
                      <div class="row">
                          <div class="col-sm-6">
                              <div class="form-group">
                                  <label>Select Client</label>
                                  <select wire:model.defer="state.client_id" class="form-control">
                                      <option value="">Select Client</option>
                                      @foreach($clients as $client)
                                          <option value="{{ $client->id }}">{{ $client->name }}</option>
                                      @endforeach
                                  </select>
                                  <!-- /.input group -->
                               </div>
                          </div>
                      </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Date:</label>
                          <div wire:ignore class="input-group date" id="appointmentDate" data-target-input="nearest" data-appointmentdate="@this">
                              <input type="text" class="form-control datetimepicker-input" 
                              data-target="#appointmentDate" id="appointmentDateInput">
                              <div class="input-group-append" data-target="#appointmentDate" data-toggle="datetimepicker">
                                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                          </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Time picker:</label>
                        <div class="input-group date" id="appointmentTime" data-target-input="nearest" data-appointmenttime="@this">
                          <input wire:model.defer="state.time" type="text" class="form-control datetimepicker-input" data-target="#appointmentTime" id="appointmentTimeInput">
                          <div class="input-group-append" data-target="#appointmentTime" data-toggle="datgetimepicker">
                              <div class="input-group-text"><i class="far fa-clock"></i></div>
                          </div>
                          </div>
                        <!-- /.input group -->
                      </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="note">Note:</label>
                      <textarea wire:model.defer="state.note" class="form-control"></textarea>
                    </div>  
                  </div>
                </div>      
              </div>
                <div class="card-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times mr-1"></i>Cancel</button>
                  <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-1"></i> Save</button>
                </div>
              </div>
              </form>
                
            </div>
        </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
</div>
