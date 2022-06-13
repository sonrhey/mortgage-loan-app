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