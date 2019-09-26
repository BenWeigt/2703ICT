(()=>{



	window.genericSubmitRender = (form, nodeId, selector)=>{
		fetch(form.action, {
			method: form.method,
			body: new FormData(form)
		}).then(response=>
			_reRenderWithResponse(selector || ('#'+nodeId), response)
		);
	};









	window.products = {
		reRender(id) {
			fetch(window._routes.products+'/'+id, {
				method: 'GET'
			}).then(response=>
				_reRenderWithResponse('#product-'+id, response)
			);
		}
	};

	window.cart = {
		addProduct(productId) {
			const data = new FormData();
			data.append('product_id', productId);
			fetch(window._routes.addToCart, {
				method: 'POST',
				headers: {'X-CSRF-TOKEN': window._csrfToken},
				body: data
			}).then(_reRenderCartWithResponse);
		},
		removeProduct(productId) {
			const data = new FormData();
			data.append('product_id', productId);
			fetch(window._routes.removeFromCart, {
				method: 'POST',
				headers: {'X-CSRF-TOKEN': window._csrfToken},
				body: data
			}).then(_reRenderCartWithResponse);
		},
		async clear() {
			const response = fetch(window._routes.clearCart, {
				method: 'POST',
				headers: {'X-CSRF-TOKEN': window._csrfToken}
			});
			await _reRenderCartWithResponse(await response);
			for (const product of document.querySelectorAll('.product')) {
				if (product.id)
					window.products.reRender(product.id.substr(8));
			}
		}
	};


	function _reRenderWithResponse(selector, response)
	{
		// Convert response stream to text, which will contain the current html state of the cart
		response.text().then(text=>{
			const old = document.querySelector(selector);
			if (!old)
				return;
			const template = document.createElement('template');
			template.innerHTML = text;
			const replacement = template.content.querySelector(selector);
			if (replacement)
				old.parentNode.insertBefore(replacement, old);
			old.parentNode.removeChild(old);
		});
	}

	/**
	 * Takes the response from api calls to the cart and replaces the clients cart render with 
	 * the new cart html supplied.
	 * Note: this is some horribly dirty corner cutting hackery of which I am not proud. Don't
	 * judge me.
	 */
	async function _reRenderCartWithResponse(response)
	{
		// Do nothing if not 200
		if (response.status !== 200)
			return;
		// Convert response stream to text, which will contain the current html state of the cart
		let text = await response.text();
		// Remove the current cart from the nav
		let cart = document.getElementById('nav-cart');
		let show = document.getElementById('cart-wrapper');
		show = show ? show.classList.contains('active') : false;
		if (cart)
		{
			while (cart.nextSibling)
				cart.parentNode.removeChild(cart.nextSibling);
			cart.parentNode.removeChild(cart);
		}
		if (!text)
			return;

		// Inject the new cart
		const template = document.createElement('template');
		template.innerHTML = text;
		if (show)
			template.content.getElementById('cart-wrapper').classList.add('active');
		for (const replacement of template.content.childNodes) {
			document.querySelector('nav').appendChild(replacement);
		}
		
		// The script included with the cart will not evaluate when injected via innerHTML, so regex
		// out its content and eval it.
		const script = text.match(/<script>([\s\S]*)<\/script>/);
		if (script)
			window.eval(script[1]);

		// Give the cart nav icon an animation for some responsiveness
		if ((cart = document.getElementById('nav-cart')))
			cart.classList.add('animate');
		return true;
	}
})();









