const toggleIndicator = () => {
  const isInvalid = () => {
    $('#old-password').addClass('is-invalid');
    $('.old-password-alert').removeClass('d-none');
  }

  const isValid = () => {
    $('#old-password').removeClass('is-invalid');
    $('.old-password-alert').addClass('d-none');
  }

  return { isInvalid, isValid }
}