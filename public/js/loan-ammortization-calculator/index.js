let calculation = [];
let selectedFrequency = "";
const { getURLParameter } = commonServices();

$('#calculate').on('click', function() {
  $('.save').prop('disabled', false);
  const monthlyPaments = computeMonthly({
    ...calculate()
  });
});


$('#btn-save').on('submit', function(e) {
  e.preventDefault();
  const { description, currencySymbol, loanAmount, interestRate, ammortizationPeriod } = calculate();
  const url = getURLParameter({
    url: window.location.href
  });
  const loanTypeCalculatorId = Number(url[2]);

  const requests = {
    base: {
      loan_type_calculator_id: loanTypeCalculatorId
    },
    form: {
      title: description,
      currency: currencySymbol,
      loan_amount: loanAmount,
      interest_rate: interestRate,
      ammortization_period: ammortizationPeriod,
    },
    monthlyPaments: calculation
  }

  saveCalculation(requests);
});

$('[name="loan-frequency"]').on('change', function() {
  const value = this.value;
  selectedFrequency = value;
  $('.frequency').html(selectedFrequency);
});

const computeMonthly = ({
  loanAmount : loanAmount,
  interestRate: interestRate,
  ammortizationPeriod : ammortizationPeriod,
  currencySymbol: currencySymbol,
  monthlyPayment: monthlyPayment
}) => {
  let begginingBalance = loanAmount;
  calculation = [];

  $('#ammortization-list').empty();
  for (let a = 1 ; a <= ammortizationPeriod; a++) {
    const monthlyInterest = monthlyYearlyInterestCalculation({
      frequency: selectedFrequency,
      balance: begginingBalance,
      interestRate: interestRate
    });
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
      payment: monthlyPayment,
      principal: principal,
      interest: monthlyInterest,
      balance: endingBalance
    })
  }
}

const convertToPositive = (oldBalance) => {
  return oldBalance * -1;
}