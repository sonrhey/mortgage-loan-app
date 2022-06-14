<div class="modal fade" id="change-password" tabindex="-1" aria-labelledby="change-password-label" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form id="change-password-form">
        <div class="modal-header border-bottom">
          <h5 class="modal-title" id="change-password-label">Change Password</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body"  id="change-password-body">
          <div class="row">
            <div class="col-md-12">
              <label class="form-label">Old Password</label>
              <input type="password" class="form-control" id="old-password" value="********" required>
              <div class="invalid-feedback old-password-alert d-none">Old Password is Incorrect.</div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <label class="form-label">New Password</label>
              <input type="password" class="form-control" id="new-password" value="********" disabled>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <label class="form-label">Confirm New Password</label>
              <input type="password" class="form-control" id="confirm-new-password" value="********" disabled>
              <div class="invalid-feedback password-not-match-alert d-none">Pasword did not match.</div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-danger proceed" disabled>Change Password</button>
        </div>
      </form>
    </div>
  </div>
</div>