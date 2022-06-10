const getCurrency = (async () => {
  const request = await axios.post('https://api.cloudmersive.com/currency/exchange-rates/list-available', [], {
    headers: {
      'Apikey': `6d242c41-9cde-4e3b-b532-25d12f924a1d`
    }
  });
  const response = await request.data.Currencies;
  $('#currency').empty();
  for (let a = 0; a < response.length; a++) {
    $('#currency').append(`
    <option value=${response[a].CurrencySymbol}>${response[a].ISOCurrencyCode} - ${response[a].CurrencyEnglishName}</option>
    `);
  }
  $('#description').prop('disabled', false);
  $('#loan-amount').prop('disabled', false);
  $('#interest-rate').prop('disabled', false);
  $('#ammortization-period').prop('disabled', false);
  $('#calculate').prop('disabled', false);
})();