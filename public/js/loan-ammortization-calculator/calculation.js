const calculate = () => {
  const description = $('#description').val();
  const loanAmount = Number($('#loan-amount').val());
  const interestRate = Number($('#interest-rate').val()) / PERCENTAGE;
  const ammortizationPeriod = Number($('#ammortization-period').val());
  const currencySymbol = $('#currency').val();

  const monthlyInterestRate = interestRate / MONTHS;
  const monthlyInterestRatePlusOne = monthlyInterestRate + ONE;
  const dividend = monthlyInterestRate * Math.pow(monthlyInterestRatePlusOne, ammortizationPeriod);
  const divisor = Math.pow(monthlyInterestRatePlusOne, ammortizationPeriod) - ONE;
  const monthlyPayment = loanAmount * (dividend / divisor);

  return { description, loanAmount, interestRate, ammortizationPeriod, currencySymbol, monthlyPayment }
}