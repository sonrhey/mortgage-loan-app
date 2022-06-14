const { loader, toast } = commonServices();
const { show, hide } = loader();
const { isValid, isInvalid } = toggleIndicator();

const checkOldPassword = async (password) => {
  show();
  const request = await axios.post(`${APP_URL}/profile/check-password`, password, getHeaders());
  const response = await request.data;
  console.log(response.data);
  if (response.data) {
    isValid();
    toggleFields({
      toggle: false
    });
    hide();
    return;
  }
  toggleFields({
    toggle: true
  });
  isInvalid();
  hide();
}

const changePassword = async (password) => {
  try {
    show();
    const request = await axios.put(`${APP_URL}/profile/change-password`, password, getHeaders());
    const response = await request.data;
    toast({
      response_code: response.response_code,
      title: PASSWORD_UPDATED_HEADER,
      message: PASSWORD_UPDATED_BODY,
      table: null,
      modal: $('#change-password')
    });
    toggleFields({
      toggle: true
    });
    toggleButton({
      toggle: true
    });
    hide();
  } catch (error) {
    hide();
    toast({
      response_code: ERROR,
      title: "Calculation Saved",
      message: error.message,
      table: null,
      modal: null
    });
    console.error(error);
  }
} 