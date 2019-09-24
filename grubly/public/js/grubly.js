
function addProductToCart(productId)
{
	const data = new FormData();
	data.append('product_id', productId);
	fetch(window._urlAddToCart, {
		method: 'POST',
		headers: {'X-CSRF-TOKEN': window._csrfToken},
		body: data
	}).then(updateCartWithResponse);
}
function clearCart()
{
	fetch(window._urlClearCart, {
		method: 'POST',
		headers: {'X-CSRF-TOKEN': window._csrfToken}
	}).then(updateCartWithResponse);
}
/**
 * Takes the response from api calls to the cart and replaces the clients cart render with 
 * the new cart html supplied.
 * Note: this is some horribly dirty corner cutting hackery of which I am not proud. Don't
 * judge me.
 */
function updateCartWithResponse(response)
{
	// Do nothing if not 200
	if (response.status !== 200)
		return;
	// Convert response stream to text, which will contain the current html state of the cart
	response.text().then(text=>{
		// Remove the current cart from the nav
		let cart = document.getElementById('nav-cart');
		if (cart)
		{
			while (cart.nextSibling)
				cart.parentNode.removeChild(cart.nextSibling);
			cart.parentNode.removeChild(cart);
		}
		// Inject the new cart
		document.querySelector('nav').innerHTML += text;
		// The script included with the cart will not evaluate when injected via innerHTML, so regex
		// out its content and eval it.
		const script = text.match(/<script>([\s\S]*)<\/script>/);
		if (script)
			window.eval(script[1]);

		// Give the cart nav icon an animation for some responsiveness
		if ((cart = document.getElementById('nav-cart')))
			cart.classList.add('animate');
	});
}