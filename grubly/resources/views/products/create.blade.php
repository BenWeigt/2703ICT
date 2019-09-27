{{-- products.create --}}
{{-- 
	products.create can be rendered via @include as part of constructing another view, but can
	also be accessed directly via the standard route. In this case, it will be being fetched 
	asynchronously via client js, and the html used to swap out the clients render of a specific
	instance without reloading the surrounding page.
--}}

{{-- Closely mimicks the layout and aesthetics of products.show --}}
{{-- If there are errors, we are being swapped/injected in and should be immediatly visible --}}
<div class="product editable" id="product-create" @if(!$errors->any()) style="display: none;"	@endif> 
	<form method="POST" class="form" action="{{route('products.store')}}" style="display: inline-block;" oninput="this.querySelector('a').style.display = '';">
		@csrf
		<div class="product-name">

			{{-- Name --}}
			<input type="text" name="name" placeholder=" " value="{{old('name')}}"><label>Name</label><br>
			@error('name')
				<strong style="transform: translate(60px, -48px);">{{ $message }}</strong>
			@enderror
			<span class="product-price">
				<span style="transform: translate(-15px, 9px);font-size: 26px;width: 0px;display: inline-block;position: absolute;">$</span>

				{{-- Price --}}
				<input type="text" name="price" placeholder=" " value="{{old('price')}}" style="width: 50%;"><label>Price</label>
				@error('price')
					<strong>{{ $message }}</strong>
				@enderror
			</span>

			{{-- Image upload --}}
			<div class="product-image-upload" onclick="this.firstElementChild.click();">
				<input type="file" name="image" style="display: none;" onchange="if (this.files.length){ this.form.querySelector('.product-img').style.backgroundImage = 'url(&quot;' + window.URL.createObjectURL(this.files[0]) + '&quot;)'; }">
			</div>
		</div>
		<div class="product-img">
		</div>

		{{-- Submit --}}
		<a class="restaurant-preview-unverify" href="#" style="display: none;" onclick="event.preventDefault(); genericSubmitRender(this.parentNode, 'product-create', '.product').then(()=>window.ensureProductCreateExists());">
			Save&nbsp;&nbsp;
		</a>
	</form>
</div>