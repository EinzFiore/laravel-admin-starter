
<div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add New User</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body">
          <div class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        
            <form>
                <div class="form-group">
                  <label class="col-form-label" for="recipient-name">Name</label>
                  <input class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name" placeholder="Your Full Name">
                </div>
                <div class="form-group">
                  <label class="col-form-label" for="recipient-name">Username</label>
                  <input class="form-control @error('username') is-invalid @enderror" type="text" id="username" name="username" placeholder="Your Username">
                </div>
                <div class="form-group">
                  <label class="col-form-label" for="message-text">Email</label>
                  <input class="form-control @error('email') is-invalid @enderror"  type="email" id="email" name="email" placeholder="john@example.com">
                </div>
                <div class="form-group">
                  <label class="col-form-label" for="message-text">Password</label>
                  <input class="form-control @error('password') is-invalid @enderror" type="password" id="password" name="password" placeholder="123**6">
                </div>
                <div class="form-group">
                  <label class="col-form-label" for="message-text">Role</label>
                  <select name="role" id="role" class="form-control @error('role') is-invalid @enderror"> 
                    <option value="">Select exist role</option>
                    @foreach ($role as $r)
                      <option value="<?= $r->id ?>"><?= $r->name ?></option>
                    @endforeach
                  </select>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" id="addNewUser" type="button">Add</button>
            </div>
        </form>
      </div>
    </div>
  </div>

<div class="modal fade" id="editModalUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit User</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body">
          <div class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        
            <form>
                <div class="form-group">
                  <label class="col-form-label" for="recipient-name">Name</label>
                  <input class="form-control @error('name') is-invalid @enderror" type="text" id="editName" name="name" placeholder="Your Full Name">
                  <input class="form-control" type="hidden" id="idUsers">
                </div>
                <div class="form-group">
                  <label class="col-form-label" for="recipient-name">Username</label>
                  <input class="form-control @error('username') is-invalid @enderror" type="text" id="editUsername" name="username" placeholder="Your Username">
                </div>
                <div class="form-group">
                  <label class="col-form-label" for="message-text">Email</label>
                  <input class="form-control @error('email') is-invalid @enderror"  type="email" id="editEmail" name="email" placeholder="john@example.com">
                </div>
                <div class="form-group">
                  <label class="col-form-label" for="message-text">Role</label>
                  <select name="role" id="editRole" class="form-control @error('role') is-invalid @enderror"> 
                    <option>Select exist role</option>
                    @foreach ($role as $r)
                      <option value="<?= $r->id ?>"><?= $r->name ?></option>
                    @endforeach
                  </select>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" id="updateModalUsers" type="button">Update</button>
            </div>
        </form>
      </div>
    </div>
  </div>