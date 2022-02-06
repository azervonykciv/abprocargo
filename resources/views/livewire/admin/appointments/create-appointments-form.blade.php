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
              <form wire:submit.prevent="createAppointment" autocomplete="off">
                <div class="card">
                  <div class="card-body">
                      <div class="row">
                          <div class="col-sm-6">
                              <div class="form-group">
                                  <label>Select Client</label>
                                  <select wire:model.defer="state.client_id" class="form-control @error('client_id')
                                  is-invalid @enderror">
                                      <option value="">Select Client</option>
                                      @foreach($clients as $client)
                                          <option value="{{ $client->id }}">{{ $client->name }}</option>
                                      @endforeach
                                  </select>
                                  @error('client_id')
                                    <div class="invalid-feedback">
                                      {{ $message }}
                                    </div>
                                  @enderror
                               </div>
                          </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                          <label for="appointmentStartTime">Appointment Date</label>
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-clock"></i></span>
                              </div>
                              <x-datepicker wire:model="state.date" id="appointmentDate" :error="'date'"/>
                              @error('date')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                              @enderror
                            </div>
                          </div>
                        </div> 

                        <div class="col-md-6">
                          <div class="form-group">
                          <label for="appointmentStartTime">Appointment Time</label>
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-clock"></i></span>
                              </div>
                              <x-timepicker wire:model="state.time" id="appointmentTime" :error="'time'"/>
                              @error('time')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                              @enderror
                            </div>
                          </div>
                        </div>
                      </div>

                <div class="row">
                  <div class="col-md-12">
                    <div wire:ignore class="form-group">
                      <label for="note">Note:</label>
                      <textarea id="note" data-note="@this" wire:model.defer="state.note" class="form-control"></textarea>
                    </div>  
                  </div>
                </div>   
                <div class="row">
                  <div class="col-sm-6">
                      <div class="form-group">
                          <label>Status:</label>
                          <select wire:model.defer="state.status" class="form-control">
                              <option value="">Select Status</option>
                                  <option value="SCHEDULED">Scheduled</option>
                                  <option value="CLOSED">Closed</option>
                          </select>

                          @error('date')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                              @enderror
                          
                       </div>
                  </div>
              </div>   
              </div>
                <div class="card-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times mr-1"></i>Cancel</button>
                  <button id="submit" type="submit" class="btn btn-primary"><i class="fa fa-save mr-1"></i> Save</button>
                </div>
              </div>
              </form>
                
            </div>
        </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
</div>


@push('js')
  <script>
  
</script>
<script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>
<script>
  ClassicEditor
          .create( document.querySelector( '#note' ) )
          .then( editor => {
                 // editor.model.document.on('change:data', () => {
                 //   let note = $('#note').data('note');
                 //   eval(note).set('state.note', editor.getData());
                 // });

                 document.querySelector('#submit').addEventListener('click', () => {
                   let note = $('#note').data('note');
                   eval(note).set('state.note', editor.getData());
                 });
          } )
          .catch( error => {
                  console.error( error );
          } );
</script>
@endpush