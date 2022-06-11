$('#calculate').on('click', function() {
  $('#btn-save').prop('disabled', false);
  const loanAmount = Number($('#loan-amount').val());
  const interestRate = Number($('#interest-rate').val()) / PERCENTAGE;
  const ammortizationPeriod = Number($('#ammortization-period').val());
  const currencySymbol = $('#currency').val();

  const monthlyInterestRate = interestRate / MONTHS;
  const monthlyInterestRatePlusOne = monthlyInterestRate + ONE;
  const dividend = monthlyInterestRate * Math.pow(monthlyInterestRatePlusOne, ammortizationPeriod);
  const divisor = Math.pow(monthlyInterestRatePlusOne, ammortizationPeriod) - ONE;
  const monthlyPayment = loanAmount * (dividend / divisor);

  const monthlyPaments = computeMonthly({
    loanAmount: loanAmount,
    interestRate: interestRate,
    ammortizationPeriod: ammortizationPeriod,
    monthlyPayment: monthlyPayment,
    currencySymbol: currencySymbol
  });

  const requests = {
    loanAmount: loanAmount,
    interestRate: interestRate,
    ammortizationPeriod: ammortizationPeriod,
    monthlyPayment: monthlyPayment,
    monthlyPaments: monthlyPaments
  }

});

const computeMonthly = ({
  loanAmount : loanAmount,
  interestRate: interestRate,
  ammortizationPeriod : ammortizationPeriod,
  monthlyPayment: monthlyPayment,
  currencySymbol: currencySymbol
}) => {
  let begginingBalance = loanAmount;
  let calculation = [];

  $('#ammortization-list').empty();
  for (let a = 1 ; a <= ammortizationPeriod; a++) {
    const monthlyInterest = (begginingBalance * interestRate) / MONTHS;
    const principal = monthlyPayment - monthlyInterest;
    begginingBalance = begginingBalance - principal;
    const endingBalance = (begginingBalance < 0) ? convertToPositive(begginingBalance) : begginingBalance ;
    $('#ammortization-list').append(`
      <tr>
      <td>${a}</td>
      <td>${accounting.formatMoney(monthlyPayment, currencySymbol, 2, ",", ".")}</td>
      <td>${accounting.formatMoney(principal, currencySymbol, 2, ",", ".")}</td>
      <td>${accounting.formatMoney(monthlyInterest, currencySymbol, 2, ",", ".")}</td>
      <td>${accounting.formatMoney(endingBalance, currencySymbol, 2, ",", ".")}</td>
    `);

    calculation.push({
      month: a,
      monthlyPayment: monthlyPayment,
      principal: principal,
      monthlyInterest: monthlyInterest,
      endingBalance: endingBalance
    })
  }

  return calculation;
}

const convertToPositive = (oldBalance) => {
  return oldBalance * -1;
}