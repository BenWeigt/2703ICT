<div class="product editable" id="product-{{$product->id}}">
	<form method="POST" class="delete" action="{{route('products.update', $product)}}" style="display: block;position: absolute; width: 100%;height: 100%;">
		@csrf @method('delete')
		<a class="restaurant-preview-unverify" href="#" onclick="event.preventDefault(); genericSubmitRender(this.parentNode, 'product-{{$product->id}}');">
			Delete
		</a>
	</form>

	<form method="POST" class="form" action="{{route('products.update', $product)}}" style="display: inline-block;" oninput="this.querySelector('a').style.display = '';">
		@csrf @method('put')
		<div class="product-name">
			<input type="text" name="name" placeholder=" " value="{{old('name') ?? $product->name}}"><label>Name</label><br>
			@error('name')
				<strong style="transform: translate(60px, -48px);">{{ $message }}</strong>
			@enderror
			<span class="product-price">
				<span style="transform: translate(-15px, 9px);font-size: 26px;width: 0px;display: inline-block;position: absolute;">$</span>
				<input type="text" name="price" placeholder=" " value="{{old('price') ?? number_format($product->price, 2)}}" style="width: 50%;"><label>Price</label>
				@error('price')
					<strong>{{ $message }}</strong>
				@enderror
			</span>
			<div class="product-image-upload" onclick="this.firstElementChild.click();">
				<input type="file" name="image" style="display: none;" onchange="if (this.files.length){ this.form.querySelector('.product-img').style.backgroundImage = 'url(&quot;' + window.URL.createObjectURL(this.files[0]) + '&quot;)'; }">
			</div>
		</div>
		<div class="product-img" @if ($product->image)style="background-image: url('{{$product->image}}');"@endif>
		</div>
		<a class="restaurant-preview-unverify" href="#" style="display: none;" onclick="event.preventDefault(); genericSubmitRender(this.parentNode, 'product-{{$product->id}}')">
			Update
		</a>
	</form>
</div>