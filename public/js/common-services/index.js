const commonServices = () => {
  const loader = () => {

    const show = () => {
      $('html, body').waitMe({
        effect : 'rotateplane',
        text : '',
        bg : 'rgba(255,255,255,0.1)',
        color : '#000',
        maxSize : '',
        waitTime : -1,
        textPos : 'vertical',
        fontSize : '',
        source : '',
      });
    }

    const hide = () => {
      $('html, body').waitMe("hide");
    }

    return { show, hide }
  }

  const toast = ({ 
    response_code: response_code, 
    title: title,
    message : message, 
    table : table, 
    modal : modal 
  }) => {
    if (response_code === SUCCESS) {
      toastOpen({
        type: "success",
        title: title,
        message: message
      }).then(() => {
        if (table) {
          table.ajax.reload();
        }
      });

      resetForm();
    } else if (response_code === ERROR) {
      let newMessage = "Something went wrong.";
      toastOpen({
        type: "danger",
        title: "Error",
        message: newMessage
      })
    }
  }

  const resetForm = () => {
    $('form').trigger('reset');
  }

  return { loader, toast }
}