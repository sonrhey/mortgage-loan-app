$('#calculate').on('click', function() {
  $('#btn-save').prop('disabled', false);
  const loanAmount = Number($('#loan-amount').val());
  const interestRate = Number($('#interest-rate').val()) / 100;
  const ammortizationPeriod = Number($('#ammortization-period').val());

  const principal = loanAmount / ammortizationPeriod;

  const monthlyPaments = computeMonthly({
    loanAmount : loanAmount,
    principal: principal,
    interestRate: interestRate,
    ammortizationPeriod : ammortizationPeriod
  });
});

const computeMonthly = ({ 
  loanAmount : loanAmount,
  principal : principal,
  interestRate: interestRate,
  ammortizationPeriod : ammortizationPeriod
}) => {
  let oldBalance = loanAmount;
  const currencySymbol = $('#currency').val();
  $('#ammortization-list').empty();

  for (let a = 1 ; a <= ammortizationPeriod; a++) {
    const interest = (oldBalance * interestRate) / ammortizationPeriod;
    oldBalance = Number(oldBalance) - Number(principal);
    const payment = principal + interest;
    oldBalance = (oldBalance < 0) ? convertToPositive(oldBalance) : oldBalance ;
    $('#ammortization-list').append(`
      <tr>
      <td>${a}</td>
      <td>${accounting.formatMoney(payment, currencySymbol, 2, ",", ".")}</td>
      <td>${accounting.formatMoney(principal, currencySymbol, 2, ",", ".")}</td>
      <td>${accounting.formatMoney(interest, currencySymbol, 2, ",", ".")}</td>
      <td>${accounting.formatMoney(oldBalance, currencySymbol, 2, ",", ".")}</td>
    `);
  }

}

const convertToPositive = (oldBalance) => {
  return oldBalance * -1;
}