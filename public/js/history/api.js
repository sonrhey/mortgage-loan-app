
const historyList = $('#history-list').DataTable({
  ajax: {
    url: APP_URL+"/history/all-history",
    type: 'GET',
    dataType: 'json',
    headers: getHeaders()
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
          <button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
          <button class="btn btn-warning"><i class="fa-solid fa-eye"></i></button>
        </div>
      `;

      return action_buttons;
    }
}]
});