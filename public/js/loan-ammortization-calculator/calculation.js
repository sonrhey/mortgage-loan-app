const calculate = () => {
  const description = $('#description').val();
  const loanAmount = Number($('#loan-amount').val());
  const interestRate = Number($('#interest-rate').val()) / PERCENTAGE;
  const ammortizationPeriod = Number($('#ammortization-period').val());
  const currencySymbol = $('#currency').val();

  const monthlyInterestRate = paymentInterestCalculation({
    frequency: selectedFrequency,
    interestRate: interestRate
  });

  const monthlyInterestRatePlusOne = monthlyInterestRate + ONE;
  const dividend = monthlyInterestRate * Math.pow(monthlyInterestRatePlusOne, ammortizationPeriod);
  const divisor = Math.pow(monthlyInterestRatePlusOne, ammortizationPeriod) - ONE;
  const monthlyPayment = loanAmount * (dividend / divisor);

  return { description, loanAmount, interestRate, ammortizationPeriod, currencySymbol, monthlyPayment }
}

const paymentInterestCalculation = ({
  frequency: frequency,
  interestRate: interestRate
}) => {
  let interestValue = 0;
  switch (frequency) {
    case FREQUENCY_MONTH:
      interestValue = interestRate / MONTHS;
      break;
    case FREQUENCY_YEAR:
      interestValue = interestRate;
      break;
  }
  return interestValue;
}

const monthlyYearlyInterestCalculation = ({
  frequency: frequency,
  balance: balance,
  interestRate: interestRate
}) => {
  let interestValue = 0;
  switch (frequency) {
    case FREQUENCY_MONTH:
      interestValue = (balance * interestRate) / MONTHS;
      break;
    case FREQUENCY_YEAR:
      interestValue = balance * interestRate;
      break;
  }
  return interestValue;
}