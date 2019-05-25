function calcTotal() {
			var firstItem = document.forms[0].quantity1.value * document.forms[0].rate1.value;
			var secondItem = document.forms[0].quantity2.value * document.forms[0].rate2.value;
			var thirdItem = document.forms[0].quantity3.value * document.forms[0].rate3.value;
		if (isNaN(firstItem) || isNaN(secondItem) || isNaN(thirdItem)) { alert("You can only enter numbers in the Quantity and Rate fields!");
		return false;
		}
		else {
			document.forms[0].amount1.value = firstItem;
			document.forms[0].amount2.value = secondItem;
			document.forms[0].amount3.value = thirdItem;
			var grandTotal = firstItem + secondItem + thirdItem;
			document.forms[0].total.value = grandTotal;
			return true;
			}
		}

function initlinks() {
	calcTotal();
}

//start the ad banner when page loads
window.onload = initlinks;