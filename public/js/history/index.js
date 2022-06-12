const { deletePromptModal } = commonServices();
let selectedId = 0;

$('#delete-all').on('click', function() {
  deletePromptModal({
    type: DELETE_ALL,
    message: null,
    id: PROCEED_DELETE_ALL
  });
});

$(document).on('click', '#delete-entry', function() {
  const data = historyList.row($(this).parents('tr')).data();
  selectedId = data.id;
  const message = DELETE_ONE_PROMPT_BODY.replace('[LOAN_TITLE]', data.loan_ammortization.title);
  deletePromptModal({
    type: DELETE_ONE,
    message: message,
    id: PROCEED_DELETE_ONE
  });
});

$(document).on('click', '#proceed-delete-all', function() {
  deleteAllHistory({
    modal: $('#delete-prompt')
  });
});

$(document).on('click', '#proceed-delete-one', function() {
  const history = {
    "id": selectedId
  }
  deleteSelectedHistory({
    history: history,
    modal: $('#delete-prompt')
  });
});