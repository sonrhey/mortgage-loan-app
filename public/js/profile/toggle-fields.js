const toggleFields = ({
  toggle: toggle
}) => {
  $("#new-password").prop('disabled', toggle);
  $("#confirm-new-password").prop('disabled', toggle);
}

const toggleButton = ({
  toggle: toggle
}) => {
  $('.proceed').prop('disabled', toggle);
}