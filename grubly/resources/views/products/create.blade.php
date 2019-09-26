<div class="product editable" id="product-create" 
	@if(!$errors->any())
		style="display: none;"
	@endif>
	<form method="POST" class="form" action="{{route('products.store')}}" style="display: inline-block;" oninput="this.querySelector('a').style.display = '';">
		@csrf
		<div class="product-name">
			<input type="text" name="name" placeholder=" " value="{{old('name')}}"><label>Name</label><br>
			@error('name')
				<strong style="transform: translate(60px, -48px);">{{ $message }}</strong>
			@enderror
			<span class="product-price">
				<span style="transform: translate(-15px, 9px);font-size: 26px;width: 0px;display: inline-block;position: absolute;">$</span>
				<input type="text" name="price" placeholder=" " value="{{old('price')}}" style="width: 50%;"><label>Price</label>
				@error('price')
					<strong>{{ $message }}</strong>
				@enderror
			</span>
			<div class="product-image-upload" onclick="this.firstElementChild.click();">
				<input type="file" name="image" style="display: none;" onchange="if (this.files.length){ this.form.querySelector('.product-img').style.backgroundImage = 'url(&quot;' + window.URL.createObjectURL(this.files[0]) + '&quot;)'; }">
			</div>
		</div>
		<div class="product-img">
		</div>
		<a class="restaurant-preview-unverify" href="#" style="display: none;" onclick="event.preventDefault(); genericSubmitRender(this.parentNode, 'product-create', '.product').then(()=>window.ensureProductCreateExists());">
			Save&nbsp;&nbsp;
		</a>
	</form>
</div>