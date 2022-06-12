const { loader, toast } = commonServices();
const { show, hide } = loader();

const saveCalculation = async (calculation) => {
  try {
    show();
    const requests = await axios.post(`${APP_URL}/loan-ammortization-calculator/store`, calculation, getHeaders());
    const response = await requests.data;
    hide();
    toast({
      response_code: response.response_code,
      title: "Calculation Saved",
      message: response.message,
      table: null,
      modal: null
    });
    $('#ammortization-list').empty();
    $('#ammortization-list').append(`
      <tr>
        <td colspan="5" class="text-center">No data available.</td>
      </tr>
    `);
    $('.save').prop('disabled', true);
  } catch (error) {
    hide();
    toast({
      response_code: ERROR,
      title: "Calculation Saving Error",
      message: error.message,
      table: null,
      modal: null
    });
    console.error(error);
  } 
}