const saveCalculation = async (calculation) => {
  try {
  const requests = await axios.post(`${APP_URL}/loan-ammortization-calculator/store`, calculation, getHeaders());
  const response = await requests.data;
  console.log(response);  
  } catch (error) {
    console.error(error);
  } 
}