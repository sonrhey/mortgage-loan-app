$('.btn-edit').on('click', function() {
  toggleEditProfile({
    isEdit: false
  });
});

$('.btn-cancel').on('click', function() {
  toggleEditProfile({
    isEdit: true
  });
});

$('#old-password').on('change', function() {
  const password = {
    old_password: this.value
  }
  checkOldPassword(password);
});

$('#confirm-new-password').on('keyup', function() {
  const newPassword = $('#new-password').val();
  if (newPassword === this.value) {
    $(this).removeClass('is-invalid');
    $('.password-not-match-alert').addClass('d-none');
    toggleButton({
      toggle: false
    });
    return;
  }
  toggleButton({
    toggle: true
  });
  $(this).addClass('is-invalid');
  $('.password-not-match-alert').removeClass('d-none');
});

$('#change-password-form').on('submit', function(e) {
  e.preventDefault();
  const password = {
    new_password: $('#new-password').val()
  }
  changePassword(password);
});