fetch('https://iss.moex.com//iss/statistics/engines/currency/markets/selt/rates/cbrf.json')
.then((response) => {
	return response.json();
})
.then((data) => {
	// в консоли можно увидеть массив, который пришел
  console.log(data);
  // выводим нужное на страницу
  document.querySelector("#usd").innerHTML = data['cbrf']['data'][0][3];
  document.querySelector("#eur").innerHTML = data['cbrf']['data'][0][6];
})
.catch((error) => {
  console.error(error)
})