function updateCartWithResponse(response)
{
	response.text().then(text=>{
		let cart = document.getElementById('nav-cart');
		if (cart)
		{
			while (cart.nextSibling)
			{
				cart.parentNode.removeChild(cart.nextSibling);
			}
			cart.parentNode.removeChild(cart);
		}
		document.querySelector('nav').innerHTML += text;
		const script = text.match(/<script>([\s\S]*)<\/script>/);
		if (script)
			window.eval(script[1]);

		cart = document.getElementById('nav-cart');
		if (cart)
			cart.classList.add('animate');
	});
}
function addProductToCart(productId)
{
	const data = new FormData();
	data.append('product_id', productId);
	fetch(window._urlAddToCart, {
		method: 'POST',
		headers: {
			'X-CSRF-TOKEN': window._csrfToken
		},
		body: data
	}).then(updateCartWithResponse);
}
function clearCart()
{
	fetch(window._urlClearCart, {
		method: 'POST',
		headers: {
			'X-CSRF-TOKEN': window._csrfToken
		}
	}).then(updateCartWithResponse);
}