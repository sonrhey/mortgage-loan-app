const { loader, toast } = commonServices();
const { show, hide } = loader();

const historyList = $('#history-list').DataTable({
  ajax: {
    url: APP_URL+"/history/all-history",
    type: 'GET',
    dataType: 'json',
    headers: getHeaders(),
    complete: function(data) {
      if (data.responseJSON.data.length) {
        $('#delete-all').prop('disabled', false);
      } else {
        $('#delete-all').prop('disabled', true);
      }
    }
  },
  order : [ 0, 'desc' ],
  columns: [
    { data: "id"},
    { data: "loan_type.description"},
    { data: "loan_ammortization.title"},
    { data: "loan_ammortization.loan_amount",
      render: function ( data, type, row ) {
        return `${accounting.formatMoney(row.loan_ammortization.loan_amount, row.loan_ammortization.currency, 2, ",", ".")}`;
      }
    },
    { data: "loan_ammortization.interest_rate",
      render: function ( data, type, row ) {
        const interest = row.loan_ammortization.interest_rate * PERCENTAGE;
        return `${interest} %`;
      }
    },
    { data: "loan_ammortization.ammortization_period",
      render: function ( data, type, row ) {
        const period = parseInt(row.loan_ammortization.ammortization_period);
        return `${period} month(s)`;
      }
    },
    { data: "created_at",
        render: function ( data, type, row ) {
            const created_at = new Date(row.created_at);
            return created_at.toLocaleString();
        }
    }
  ],
  columnDefs: [{
    "targets": 7,
    "data" : null,
    render : function ( data, type, row ) {
      const action_buttons = `
        <div class="btn-group" role="group" aria-label="controls">
          <button class="btn btn-danger" id="delete-entry"><i class="fa-solid fa-trash-can"></i></button>
          <button class="btn btn-warning"><i class="fa-solid fa-eye"></i></button>
        </div>
      `;

      return action_buttons;
    }
}]
});

const deleteAllHistory = async ({
  modal: modal
}) => {
  try {
    show();
    const requests = await axios.delete(`${APP_URL}/history/delete-all`, getHeaders());
    const response = await requests.data;
    toast({
      response_code: response.response_code,
      title: "Calculation Deleted",
      message: response.data,
      table: historyList,
      modal: modal
    });
    hide();
  } catch (error) {
    hide();
    toast({
      response_code: ERROR,
      title: "Calculation Deletion Error",
      message: error.message,
      table: null,
      modal: modal
    });
    console.error(error);
  }
}

const deleteSelectedHistory = async ({
  history: history,
  modal: modal
}) => {
  try {
    show();
    const requests = await axios.delete(`${APP_URL}/history/destroy`, { data: history } ,getHeaders());
    const response = await requests.data;
    toast({
      response_code: response.response_code,
      title: "Calculation Deleted",
      message: response.data,
      table: historyList,
      modal: modal
    });
    hide();
  } catch (error) {
    hide();
    toast({
      response_code: ERROR,
      title: "Calculation Deletion Error",
      message: error.message,
      table: null,
      modal: modal
    });
    console.error(error);
  }
}