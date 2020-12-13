
// Переменная для функции "Показать еще" (отвечает за вывод следующих товаров)
var btnShowMore = document.querySelector("#show_more");

// Переменная для функции "Показать еще" (отвечает за то чтобы оставаться на главной странице)
// Ссылка на локальный сервер
var siteURL = "http://shop-master.local/"
// Ссылка на хостинг
// var siteURL = "http://f6793849.beget.tech/"

if (btnShowMore) {
	// Функция "Показать еще"
btnShowMore.onclick = function () {
	var currentPageInput = document.querySelector("#current_page");
	var ajax = new XMLHttpRequest();
		ajax.open("GET", siteURL + "modules/products/get_more.php?page=" + currentPageInput.value, false);
		ajax.send();

	currentPageInput.value = +currentPageInput.value + 1;

	// если все товары показанны, то скрывать кнопку
	if(ajax.response == "")
	{
		btnShowMore.style.display = "none";
	}
	var productsBlock = document.querySelector("#products");
		productsBlock.innerHTML = productsBlock.innerHTML + ajax.response;
		// btnClickBasket();
}
}


// Не обращать внимание, просто это как вариант написание кода
// function btnClickBasket()
// {
// 	var btnAddBasket = document.querySelectorAll(".btn-add-basket");
// console.dir(btnAddBasket);
// for(var i = 0; i < btnAddBasket.length; i++)
// {
// 	btnAddBasket[i].onclick = function()
// 	{
// 	alert("click basket");
// 	}
// }
// }

// btnClickBasket();

// Функция "Добавить товар в корзину"
function addToBasket(btn)
{
	/*
		1. Сделать аякс запрос на добавление в корзину- done
		2. Получить данные об успешном добавлении в корзину - done
		3. Обновить информацию в корзине - done

	*/

	var ajax = new XMLHttpRequest();
		ajax.open("POST", siteURL + "/modules/basket/add_basket.php", false);
		ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		ajax.send("id=" + btn.dataset.id);

// Декодирование JSON строки 
		var response = JSON.parse(ajax.response);


	var btnGoBasket = document.querySelector("#go_basket span");
// Изменение значений count на кнопке Корзины
		btnGoBasket.innerText = response.count;
}


// Удаление товара с корзины

 function deleteProductBasket(obj, id)
 {
 	console.dir(id);
 	var ajax = new XMLHttpRequest();
 		ajax.open("POST", siteURL + "/modules/basket/delete.php", false);
 		ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		ajax.send("id=" + id);

		alert("Товар удален");

	// удалить строку с товаром
	obj.parentNode.parentNode.remove();

 }

// Изменение количества товаров в корзине и расчет стоимости

function editCountCostProduct(edit, id)
{
console.dir(id);
	var ajax = new XMLHttpRequest();
		ajax.open("POST", siteURL + "/modules/basket/count.php", false);
 		ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	
		ajax.send("id=" + id + 
			"&count=" + edit.value);

		
}





// Изменение количества товаров в корзине

// function costProduct(count, cost, id)
// {
// console.dir(id);
// 	var ajax = new XMLHttpRequest();
// 		ajax.open("POST", siteURL + "/modules/basket/count.php", false);
//  		ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
// 	var data = "count=" + count.value +
// 		"&cost=" + cost +
// 		"&id=" + id;
// 		console.log(data);
// 		ajax.send(data);

		
// }
