const messenger = document.querySelector('df-messenger');
messenger.addEventListener('df-response-received', (event) => {
  const response = event.detail.response;
  console.log(response.queryResult.fulfillmentText);
});
