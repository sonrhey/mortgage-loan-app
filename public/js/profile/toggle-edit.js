const toggleEditProfile = ({
  isEdit: isEdit
}) => {
  $('[name="name"]').prop('disabled', isEdit);
  $('[name="email"]').prop('disabled', isEdit);
  $('[name="created_at"]').prop('disabled', isEdit);
  if (!isEdit) {
    $('.btn-edit').addClass('d-none');
    $('.btn-save').removeClass('d-none');
    return;
  }
  $('.btn-edit').removeClass('d-none');
  $('.btn-save').addClass('d-none');
}