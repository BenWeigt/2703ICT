<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{

/**
 * The following js can be run in the inspector console for an uber eats restaurant page. It will
 * scrape the restaurant products and output them as insertion statements for use here.
(()=>{
	const r_id = 1; // Replace with the id of the Restaurant these products should be scraped into
	let total = 0;
	let result = '';
	let arrTitles = document.querySelectorAll('#clamped-content-menu_item_title');
	for (const nTitle of arrTitles) {
		// Ignore products without an image
		if (!nTitle.parentNode.parentNode.parentNode.nextSibling || !nTitle.parentNode.parentNode.parentNode.nextSibling.firstElementChild.src)
			continue;
		// Ignore products without a price
		if (nTitle.parentNode.parentNode.parentNode.lastElementChild.firstElementChild.innerText[0] !== '$')
			continue;
		let name = nTitle.innerText;
		let price = nTitle.parentNode.parentNode.parentNode.lastElementChild.firstElementChild.innerText.substr(1);
		let image = nTitle.parentNode.parentNode.parentNode.nextSibling.firstElementChild.src;
		total++;
		result += 
`		DB::table('products')->insert([
			'name' => '${name}',
			'price' => ${price},
			'image' => '${image}',
			'restaurant_id' => ${r_id}
		]);
`;
	}
	console.log(result);
	console.log(total + ' products scraped.');
})();
 */

	/**
	 * Run the database seeds.
	 * 
	 * @return void
	 */
	public function run()
	{
		/**
		 * McDonalds (2)
		 */
		DB::table('products')->insert([
			'name' => 'Quarter Pounder',
			'price' => 12.25,
			'image' => 'https://d1ralsognjng37.cloudfront.net/2fd4e126-c81c-49ce-ae88-f1aa7e6a2844',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Double Cheeseburger',
			'price' => 10.25,
			'image' => 'https://d1ralsognjng37.cloudfront.net/329dfd20-2d4e-4817-84cb-2ad509a5f032',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Chicken McNuggets - 10pc',
			'price' => 13.25,
			'image' => 'https://d1ralsognjng37.cloudfront.net/93d6ab61-e935-4704-8792-7e68a6253648.jpeg',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Grilled Chicken Deluxe Burger',
			'price' => 12.85,
			'image' => 'https://d1ralsognjng37.cloudfront.net/87f69dc7-ab63-478d-9c7c-fd8e299023ef.jpeg',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Crispy BBQ Chicken',
			'price' => 13.35,
			'image' => 'https://d1ralsognjng37.cloudfront.net/172df087-42bc-403f-812c-648d76eefb4f.jpeg',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Grilled BBQ Chicken',
			'price' => 13.35,
			'image' => 'https://d1ralsognjng37.cloudfront.net/53f22bdc-3057-4aec-97d6-0507eafba281.jpeg',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Crispy Chicken Deluxe Burger',
			'price' => 12.85,
			'image' => 'https://d1ralsognjng37.cloudfront.net/e147e949-e6dc-42c1-8a74-d0f4f97c0a6d.jpeg',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'McChicken',
			'price' => 11.90,
			'image' => 'https://d1ralsognjng37.cloudfront.net/0d7046f0-b3e2-4bcd-9e87-efea53d8d00e',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Hash Brown',
			'price' => 2.65,
			'image' => 'https://d1ralsognjng37.cloudfront.net/7607c08d-77bb-43dd-acc1-d4e89ae91fea',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Apple Pie McFlurry',
			'price' => 4.90,
			'image' => 'https://d1ralsognjng37.cloudfront.net/e5b27597-1f18-4ed1-ab0e-720567717c37.jpeg',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Fries',
			'price' => 2.90,
			'image' => 'https://d1ralsognjng37.cloudfront.net/c58a6185-ac83-47c0-a230-135c1e4d24e4',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'BBQ Bacon Angus',
			'price' => 14.30,
			'image' => 'https://d1ralsognjng37.cloudfront.net/b7815bad-ad37-41f0-8647-80c0339d910c',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Classic Angus',
			'price' => 13.70,
			'image' => 'https://d1ralsognjng37.cloudfront.net/9c383d35-697a-48f6-873d-067d4459227d',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Angus Clubhouse',
			'price' => 14.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/a54fc93e-d901-40ab-a533-e905ce67eb39',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Big Mac',
			'price' => 11.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/43e94f72-7531-4e80-acb1-7b01fefde16d',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Double Big Mac',
			'price' => 14.45,
			'image' => 'https://d1ralsognjng37.cloudfront.net/73fdb7b8-d6cd-4daf-94c8-d52ba4e52655',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Quarter Pounder',
			'price' => 12.25,
			'image' => 'https://d1ralsognjng37.cloudfront.net/b1798846-c9cd-4a8b-aca0-9d2c44a51f68',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Double Quarter Pounder',
			'price' => 13.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/653657b3-ec24-43c9-9c6e-40f95c9a6d42',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'McFeast',
			'price' => 12.45,
			'image' => 'https://d1ralsognjng37.cloudfront.net/bfc8023f-5644-4bfb-87d0-c61a1883270f.jpeg',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Cheeseburger',
			'price' => 8.30,
			'image' => 'https://d1ralsognjng37.cloudfront.net/3e20528c-11bb-470f-bbed-a03a303933d4',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Triple Cheeseburger',
			'price' => 11.10,
			'image' => 'https://d1ralsognjng37.cloudfront.net/6ed8aca5-fcce-4025-a016-ace6d1fc19ed',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Double Cheeseburger',
			'price' => 10.25,
			'image' => 'https://d1ralsognjng37.cloudfront.net/b861d766-c4c4-402a-b922-2dea557b013f',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Classic Beef McWrap',
			'price' => 13.45,
			'image' => 'https://d1ralsognjng37.cloudfront.net/1680313d-a26a-4050-9cc0-a4463e81a627',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Broncos Burger',
			'price' => 12.55,
			'image' => 'https://d1ralsognjng37.cloudfront.net/a5b41f9e-68db-4bfc-8cad-97b0e5ce8c15',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Hamburger',
			'price' => 7.50,
			'image' => 'https://d1ralsognjng37.cloudfront.net/b8de0cc5-f35d-445c-8b72-52fe4046cc23',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Mates Deal for 2',
			'price' => 28.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/b1193926-6ccc-47b6-b495-db70fea09915',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Single Gravy Loaded Fries',
			'price' => 4.60,
			'image' => 'https://d1ralsognjng37.cloudfront.net/a397748f-3e7f-4610-bb24-bebd5c14afab.jpeg',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Chicken McNuggets - 20pc',
			'price' => 14.15,
			'image' => 'https://d1ralsognjng37.cloudfront.net/af666cb9-bd23-4ef6-8561-5a1ff728096b',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Chicken McNuggets - 20pc',
			'price' => 18.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/e79f9d7b-facb-4453-8e94-9a411197eb7c',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Chicken McNuggets - 10pc',
			'price' => 8.35,
			'image' => 'https://d1ralsognjng37.cloudfront.net/3284e823-98d0-4ba3-8d60-5defeb6592b4.jpeg',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Chicken McNuggets - 10pc',
			'price' => 13.25,
			'image' => 'https://d1ralsognjng37.cloudfront.net/93d6ab61-e935-4704-8792-7e68a6253648.jpeg',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Grilled Chicken Deluxe Burger',
			'price' => 12.85,
			'image' => 'https://d1ralsognjng37.cloudfront.net/53bcf8f6-f62f-4b59-94e5-7df900e69a6d.jpeg',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Crispy Spicy Chicken Clubhouse',
			'price' => 14.35,
			'image' => 'https://d1ralsognjng37.cloudfront.net/61864dd4-0435-4ea6-9fa7-e2e7ca1e7548.jpeg',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Grilled Spicy Chicken Clubhouse',
			'price' => 14.35,
			'image' => 'https://d1ralsognjng37.cloudfront.net/94759f92-14d0-41f0-a785-8d6591a1fe56.jpeg',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Crispy BBQ Chicken',
			'price' => 13.35,
			'image' => 'https://d1ralsognjng37.cloudfront.net/fc23c228-5a26-4b3e-b1db-b03f0a847d26.jpeg',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Grilled BBQ Chicken',
			'price' => 13.35,
			'image' => 'https://d1ralsognjng37.cloudfront.net/8b04f12d-cce2-4eb7-b693-7531f099ba74.jpeg',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Chicken McNuggets - 6pc',
			'price' => 11.45,
			'image' => 'https://d1ralsognjng37.cloudfront.net/1ec16a9e-e543-4aa7-b0ad-3136cb94cd29',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Crispy Chicken Deluxe Burger',
			'price' => 12.85,
			'image' => 'https://d1ralsognjng37.cloudfront.net/23f28bb1-c26d-4cc6-9ea9-2d1602dcc3d8.jpeg',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'McChicken',
			'price' => 11.90,
			'image' => 'https://d1ralsognjng37.cloudfront.net/39f1aea0-9e02-4263-830d-cbf2b57b9f29',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Double McChicken',
			'price' => 14.10,
			'image' => 'https://d1ralsognjng37.cloudfront.net/f9f43bf9-5db5-4940-ab4a-a9b38ff7a4b8',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Filet-O-Fish',
			'price' => 11.30,
			'image' => 'https://d1ralsognjng37.cloudfront.net/a2f1f176-7c29-49c2-8750-7ad081a72ee6',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Double Filet-O-Fish',
			'price' => 13.10,
			'image' => 'https://d1ralsognjng37.cloudfront.net/e34605f1-1a52-49f2-8691-3433085757e2',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Chicken McNuggets - 10pc',
			'price' => 13.25,
			'image' => 'https://d1ralsognjng37.cloudfront.net/343cefca-1ced-4ffc-871e-82ae5fe375f5.jpeg',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Chicken McNuggets - 20pc',
			'price' => 18.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/40ee03be-3e84-41be-ae53-06edccf90350',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Grilled Spicy Chicken McWrap',
			'price' => 13.45,
			'image' => 'https://d1ralsognjng37.cloudfront.net/ac742834-4bdd-4b1f-865d-a054648d47b5',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Crispy Chicken Caesar McWrap',
			'price' => 13.45,
			'image' => 'https://d1ralsognjng37.cloudfront.net/92deb0dc-17a7-415b-a63b-df82709f9f4d',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Grilled Chicken Caesar McWrap',
			'price' => 13.45,
			'image' => 'https://d1ralsognjng37.cloudfront.net/7d09d7dc-ac0a-4fdf-9c4a-553ab8263077',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Crispy Chicken Caesar Salad',
			'price' => 14.40,
			'image' => 'https://d1ralsognjng37.cloudfront.net/ee472c6f-f983-4d29-81c9-81c44a3931c8.jpeg',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Grilled Chicken Pieces Happy Meal',
			'price' => 8.30,
			'image' => 'https://d1ralsognjng37.cloudfront.net/f394e4b6-54d0-4011-acdc-851cbfc69eb4',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Chicken McNuggets 3pc Happy Meal',
			'price' => 6.90,
			'image' => 'https://d1ralsognjng37.cloudfront.net/a2271f55-f16c-4d77-8620-54e1335f63d1',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Chicken McNuggets 6pc Happy Meal',
			'price' => 8.75,
			'image' => 'https://d1ralsognjng37.cloudfront.net/4c1176a1-ed93-446c-89d4-20a2f0577a91',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Grilled Chicken Snack Wrap Happy Meal',
			'price' => 6.90,
			'image' => 'https://d1ralsognjng37.cloudfront.net/e5968dbe-9708-4b0c-8f6a-2df90669a50b',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Crispy Chicken Snack Wrap Happy Meal',
			'price' => 6.90,
			'image' => 'https://d1ralsognjng37.cloudfront.net/523b0ef5-0d74-4453-a997-fa31873240af',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Cheeseburger Happy Meal',
			'price' => 6.90,
			'image' => 'https://d1ralsognjng37.cloudfront.net/2fc2ef9b-5b17-40be-be27-b9a52323037c',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Apple Slices',
			'price' => 2.40,
			'image' => 'https://d1ralsognjng37.cloudfront.net/d9966e5c-b1d2-4bab-bd14-dc15eb6f49b6.jpeg',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Chicken McNuggets - 6pc',
			'price' => 11.45,
			'image' => 'https://d1ralsognjng37.cloudfront.net/1f454928-6ad4-4d47-8434-104ff37436a5',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Chicken McNuggets - 10pc',
			'price' => 13.25,
			'image' => 'https://d1ralsognjng37.cloudfront.net/42d0cc50-ec40-4f82-8cf5-83b1eb5a25c6.jpeg',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Chicken McNuggets - 20pc',
			'price' => 18.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/a6a879a3-2cd5-43c8-afe7-23e03acd57a8',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Grilled Spicy Chicken McWrap',
			'price' => 13.45,
			'image' => 'https://d1ralsognjng37.cloudfront.net/360a4499-dbc2-426d-89b0-9469ff626dfb',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Crispy Chicken Caesar McWrap',
			'price' => 13.45,
			'image' => 'https://d1ralsognjng37.cloudfront.net/1a95c787-ea72-4447-a687-b49fd7fa80fd',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Grilled Chicken Caesar McWrap',
			'price' => 13.45,
			'image' => 'https://d1ralsognjng37.cloudfront.net/6b64eb68-cf37-4b06-bf29-74c3125ef48b',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Classic Beef McWrap',
			'price' => 13.45,
			'image' => 'https://d1ralsognjng37.cloudfront.net/1680313d-a26a-4050-9cc0-a4463e81a627',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Crispy Chicken Caesar Salad',
			'price' => 14.40,
			'image' => 'https://d1ralsognjng37.cloudfront.net/0a617672-8176-4f6d-be55-0d0a28aef0b9.jpeg',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Hotcakes with Syrup McValue Meal',
			'price' => 10.60,
			'image' => 'https://d1ralsognjng37.cloudfront.net/897539fd-3879-42a3-ae28-2b1f25c4462b',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Bacon & Egg McMuffin McValue Meal',
			'price' => 10.30,
			'image' => 'https://d1ralsognjng37.cloudfront.net/4e21a9b3-ea65-41b4-8c3c-412432b61a53',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Sausage & Egg McMuffin Meal',
			'price' => 10.40,
			'image' => 'https://d1ralsognjng37.cloudfront.net/409fdd7c-9606-4807-b74f-2566576dc3b1',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Sausage McMuffin Meal',
			'price' => 9.10,
			'image' => 'https://d1ralsognjng37.cloudfront.net/41ebe755-be07-4792-b5fc-43a904acc3d0',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'McCafé - Cappuccino',
			'price' => 4.30,
			'image' => 'https://d1ralsognjng37.cloudfront.net/c405ba37-7bb6-48dc-990d-3e8994fc01de',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'McCafé - Flat White',
			'price' => 4.30,
			'image' => 'https://d1ralsognjng37.cloudfront.net/c7fb6720-fbd5-44c7-99d5-be6617923b96',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'McCafé - Latte',
			'price' => 4.30,
			'image' => 'https://d1ralsognjng37.cloudfront.net/1b7a2f89-c629-4380-89f8-b1f1efe20d60',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'McCafé - Long Black',
			'price' => 4.30,
			'image' => 'https://d1ralsognjng37.cloudfront.net/7cca8b83-7a5d-4e2d-9f1d-876bbcf29a03',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'McCafé - Mocha',
			'price' => 4.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/09701186-c5b9-465c-9107-5160e9099c13',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'McCafé - Hot Chocolate',
			'price' => 4.35,
			'image' => 'https://d1ralsognjng37.cloudfront.net/b2a20226-f478-46a4-8fb3-6cc154643310',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'McCafé - Chai Latte',
			'price' => 4.60,
			'image' => 'https://d1ralsognjng37.cloudfront.net/0d8f95c1-964f-4120-8542-a378557b1dac',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Macchiato McCafé',
			'price' => 3.45,
			'image' => 'https://d1ralsognjng37.cloudfront.net/0547eeae-6e6a-4991-8a00-c5476e644658',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Espresso McCafé',
			'price' => 3.45,
			'image' => 'https://d1ralsognjng37.cloudfront.net/dccd74ba-3e76-4e7c-a928-90b7cbbce623',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'McCafé - Iced Latte',
			'price' => 4.10,
			'image' => 'https://d1ralsognjng37.cloudfront.net/fe50da60-e618-4367-85e3-f42e88b9b947',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Piccolo Latte',
			'price' => 4.20,
			'image' => 'https://d1ralsognjng37.cloudfront.net/33501162-25d6-4dbd-8f1c-770e197f12dc',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Dilmah English Breakfast Tea',
			'price' => 4.20,
			'image' => 'https://d1ralsognjng37.cloudfront.net/38cb3b51-150a-4db1-a95f-960770651454',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Dilmah Jasmine Green Tea',
			'price' => 4.20,
			'image' => 'https://d1ralsognjng37.cloudfront.net/6114787e-04ba-4c14-98eb-e2a812e24c1e',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Dilmah Peppermint Tea',
			'price' => 4.20,
			'image' => 'https://d1ralsognjng37.cloudfront.net/280906e6-8ecd-4a09-be62-6aee05ad1027',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Apple Pie McFlurry',
			'price' => 4.90,
			'image' => 'https://d1ralsognjng37.cloudfront.net/e5b27597-1f18-4ed1-ab0e-720567717c37.jpeg',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'McFlurry with OREO® Cookie',
			'price' => 4.90,
			'image' => 'https://d1ralsognjng37.cloudfront.net/ad09eb5a-18e7-47bf-8cd2-e964b37482c2.jpeg',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'M&Ms® MINIS McFlurry',
			'price' => 4.90,
			'image' => 'https://d1ralsognjng37.cloudfront.net/d1f5e3df-cbba-4158-94e4-b9a8781f5848.jpeg',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Hot Fudge Sundae',
			'price' => 4.15,
			'image' => 'https://d1ralsognjng37.cloudfront.net/3cd12cc0-1386-4130-b3bb-b7ca9dfbe33e.jpeg',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Hot Caramel Sundae',
			'price' => 4.15,
			'image' => 'https://d1ralsognjng37.cloudfront.net/62996f07-59e2-4d75-8478-a2cfc66845bd.jpeg',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Strawberry Sundae',
			'price' => 4.15,
			'image' => 'https://d1ralsognjng37.cloudfront.net/5d4634bc-8891-43d9-8880-d24f2b8d5110.jpeg',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'McDonaldland Cookies',
			'price' => 1.25,
			'image' => 'https://d1ralsognjng37.cloudfront.net/0f7a321d-025e-46b9-a2be-26a170fb4d86',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Hot Apple Pie',
			'price' => 3.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/58ea2d56-3089-4f74-81a0-e70d1940b59b',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Raspberry & Custard Pie',
			'price' => 3.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/c2bc5ae2-6a62-496e-a265-2acda6b555c2',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Apple Slices',
			'price' => 2.40,
			'image' => 'https://d1ralsognjng37.cloudfront.net/09f64120-6079-4a68-ab80-2f2125b9d7e5.jpeg',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Fries',
			'price' => 2.90,
			'image' => 'https://d1ralsognjng37.cloudfront.net/613a0e98-e26c-45a4-9178-7304fecfcbd3',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Hash Brown',
			'price' => 2.65,
			'image' => 'https://d1ralsognjng37.cloudfront.net/4090a727-2a4d-4df6-8be8-f96bc2d83397',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Single Gravy Loaded Fries',
			'price' => 4.60,
			'image' => 'https://d1ralsognjng37.cloudfront.net/cee7d083-465f-4f18-85d2-675d10f62ac9.jpeg',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Chicken McNuggets - 6pc',
			'price' => 7.20,
			'image' => 'https://d1ralsognjng37.cloudfront.net/f877158b-4d83-4eda-9eae-65d8d142a4f0',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Chicken McNuggets - 6pc',
			'price' => 11.45,
			'image' => 'https://d1ralsognjng37.cloudfront.net/f3f027c4-a917-430a-9fb2-dd6c859971a1',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Chicken McNuggets - 3pc',
			'price' => 4.35,
			'image' => 'https://d1ralsognjng37.cloudfront.net/d882d896-6ab7-4826-8e7b-80ff4c409bbd.jpeg',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Cheeseburger',
			'price' => 4.15,
			'image' => 'https://d1ralsognjng37.cloudfront.net/d2f7b499-f384-4521-bacb-c30c3ad3fee6.jpeg',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Cheeseburger',
			'price' => 8.30,
			'image' => 'https://d1ralsognjng37.cloudfront.net/a966f732-6886-43cb-8add-0a3f4a5c7730.jpeg',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Grilled Chicken Snack Wrap',
			'price' => 4.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/66e11943-efd7-4cda-8cfc-f478b55fd53b.jpeg',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Crispy Chicken Snack Wrap',
			'price' => 4.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/b26f82c6-90de-4c66-b5cb-389a41edb6a9.jpeg',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Hamburger',
			'price' => 3.15,
			'image' => 'https://d1ralsognjng37.cloudfront.net/362965f0-65e8-4dc6-995e-5583a2fcb5fe.jpeg',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Hamburger',
			'price' => 7.50,
			'image' => 'https://d1ralsognjng37.cloudfront.net/dbf24c6b-5bad-4644-8bcb-bf5e5ccd52ab.png',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Garden Salad',
			'price' => 4.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/ab90a591-220f-4355-9c5d-39dc8ceaf6eb.jpeg',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Yoplait Miam Strawberry Yoghurt',
			'price' => 2.40,
			'image' => 'https://d1ralsognjng37.cloudfront.net/b797f069-a573-4575-a808-519ac68b27f6',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'McDonaldland Cookies',
			'price' => 1.25,
			'image' => 'https://d1ralsognjng37.cloudfront.net/49f41a10-f5c7-4c38-a41a-89986f82f289.jpeg',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Hot Apple Pie',
			'price' => 3.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/e842cf7a-290b-4d27-9083-02e818e03c46',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Raspberry & Custard Pie',
			'price' => 3.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/7b5edb01-7f51-41e8-a835-20d87893b0bc',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Apple Slices',
			'price' => 2.40,
			'image' => 'https://d1ralsognjng37.cloudfront.net/1ab9e060-472a-4623-b6d8-d88a5e22420d.jpeg',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Coke®',
			'price' => 3.35,
			'image' => 'https://d1ralsognjng37.cloudfront.net/9c8feee9-64db-4d94-aa16-0421f408384c',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Diet Coke®',
			'price' => 3.35,
			'image' => 'https://d1ralsognjng37.cloudfront.net/72352477-dc89-459d-a955-3c505903d0b3',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Sprite®',
			'price' => 3.35,
			'image' => 'https://d1ralsognjng37.cloudfront.net/e318f794-b035-4ff8-b911-d500e1f92ee3',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Fanta®',
			'price' => 3.35,
			'image' => 'https://d1ralsognjng37.cloudfront.net/167c52c4-7aa0-453c-a501-4ee8ac828149',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Coke® No Sugar',
			'price' => 3.35,
			'image' => 'https://d1ralsognjng37.cloudfront.net/8bb2b562-e7f9-4baa-a3d3-74bfceb7a589',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Vanilla Coke®',
			'price' => 3.35,
			'image' => 'https://d1ralsognjng37.cloudfront.net/a163f255-6cbd-43fb-a8e0-6e498011de11.jpeg',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Sparkling Water',
			'price' => 3.35,
			'image' => 'https://d1ralsognjng37.cloudfront.net/6e71a41f-8816-4f89-9a76-e142c77340e4',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Salted Caramel Frappé',
			'price' => 4.85,
			'image' => 'https://d1ralsognjng37.cloudfront.net/8a0b298c-5a0a-47d3-839f-8d2ad23b65a3.jpeg',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Chocolate Frappé',
			'price' => 4.85,
			'image' => 'https://d1ralsognjng37.cloudfront.net/ad069f4b-cc2b-4f10-aa14-53b797bbf98e.jpeg',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Chocolate Shake',
			'price' => 4.65,
			'image' => 'https://d1ralsognjng37.cloudfront.net/58838d1a-369b-4f96-9b53-82aca794f4b8.jpeg',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Strawberry Shake',
			'price' => 4.65,
			'image' => 'https://d1ralsognjng37.cloudfront.net/5609cbaf-6560-4d6f-8913-56092ac7bded.jpeg',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Coffee Frappé',
			'price' => 4.85,
			'image' => 'https://d1ralsognjng37.cloudfront.net/590df7d3-5e95-46f6-8f6f-429a5a71fe15.jpeg',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Vanilla Shake',
			'price' => 4.65,
			'image' => 'https://d1ralsognjng37.cloudfront.net/18dfeac7-40db-494b-a1c1-a38654d9cf3f.jpeg',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Bottled Water 250mL',
			'price' => 2.75,
			'image' => 'https://d1ralsognjng37.cloudfront.net/82f9c843-84be-4879-a935-c5664ea794c2',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Apple Juice 250mL',
			'price' => 2.85,
			'image' => 'https://d1ralsognjng37.cloudfront.net/ac0737a1-1cd0-4085-8d44-af2c1e7c4307',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'CalciYum™ Chocolate Flavoured Milk',
			'price' => 3.15,
			'image' => 'https://d1ralsognjng37.cloudfront.net/97e162ec-90e7-4460-a5aa-69e9b9ed1b3d',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Sweet n Sour Sauce',
			'price' => 0.55,
			'image' => 'https://d1ralsognjng37.cloudfront.net/9a9985fa-0492-42d2-bb32-031be822ade2',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Aioli Sauce Tub',
			'price' => 0.55,
			'image' => 'https://d1ralsognjng37.cloudfront.net/6311a741-fb00-4ace-b45d-0de9e0452896',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Big Mac Special Sauce',
			'price' => 0.55,
			'image' => 'https://d1ralsognjng37.cloudfront.net/ffafe0ba-797a-4d89-972e-84d0306f2015',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Barbecue Sauce',
			'price' => 0.55,
			'image' => 'https://d1ralsognjng37.cloudfront.net/b7523520-219f-4e98-9dfe-cce22161c8c7',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Ketchup',
			'price' => 0.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/2bbd78ab-2b5b-4739-bdd2-1714a9c37fdc',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Sriracha Sauce',
			'price' => 0.55,
			'image' => 'https://d1ralsognjng37.cloudfront.net/a7d1d46d-7c33-4471-bf6f-aa0c7a4542a0.jpeg',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'BBQ Bacon Angus',
			'price' => 9.50,
			'image' => 'https://d1ralsognjng37.cloudfront.net/eec45008-b1cf-497c-8acc-7aa550d01ff3',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Classic Angus',
			'price' => 8.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/758cdd01-9f22-46e3-9441-66d141392acd',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Angus Clubhouse',
			'price' => 9.90,
			'image' => 'https://d1ralsognjng37.cloudfront.net/f292cdf2-33a9-4045-904b-42aa3a449ed9.jpeg',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Big Mac',
			'price' => 6.50,
			'image' => 'https://d1ralsognjng37.cloudfront.net/3ceb003b-2726-4203-8947-46b8640ffecf.jpeg',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Double Big Mac',
			'price' => 9.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/484c8c0c-b2bb-401c-9ddc-4022442f30f5.jpeg',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Quarter Pounder',
			'price' => 6.80,
			'image' => 'https://d1ralsognjng37.cloudfront.net/8c2ad08d-2f36-43ba-a113-157485708256',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Double Quarter Pounder',
			'price' => 8.65,
			'image' => 'https://d1ralsognjng37.cloudfront.net/80f801f3-25e8-4d1b-9d71-0fccde2d677b',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'McFeast',
			'price' => 7.20,
			'image' => 'https://d1ralsognjng37.cloudfront.net/3b69c879-968c-493e-aedf-7678d9216019.jpeg',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Cheeseburger',
			'price' => 4.15,
			'image' => 'https://d1ralsognjng37.cloudfront.net/a0c43f08-11aa-4e4f-afa7-f1a6debf9f19',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Triple Cheeseburger',
			'price' => 7.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/152e79c4-5ddd-49b0-94bb-0be2b5fd41b3',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Double Cheeseburger',
			'price' => 5.55,
			'image' => 'https://d1ralsognjng37.cloudfront.net/ba4226b6-3c1e-4e39-ac69-e8ac2351cf5d',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Classic Beef McWrap',
			'price' => 8.80,
			'image' => 'https://d1ralsognjng37.cloudfront.net/0069c1c0-31d4-48ee-8f63-741af5232674',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Broncos Burger',
			'price' => 7.80,
			'image' => 'https://d1ralsognjng37.cloudfront.net/96086d74-710b-49ff-b345-403fad72b774',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Hamburger',
			'price' => 3.15,
			'image' => 'https://d1ralsognjng37.cloudfront.net/81698231-76c8-44f2-b51a-dfc0b613ad2e',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Grilled Chicken Deluxe Burger',
			'price' => 7.90,
			'image' => 'https://d1ralsognjng37.cloudfront.net/2a056ad1-f11f-4c53-a91b-f1bd731f1cec.jpeg',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Crispy Spicy Chicken Clubhouse',
			'price' => 9.40,
			'image' => 'https://d1ralsognjng37.cloudfront.net/0b7d7b36-2d43-4638-8314-ca0cce9a9332.jpeg',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Grilled Spicy Chicken Clubhouse',
			'price' => 9.40,
			'image' => 'https://d1ralsognjng37.cloudfront.net/b126664e-1b08-4775-9004-0816942ed638.jpeg',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Crispy BBQ Chicken',
			'price' => 8.40,
			'image' => 'https://d1ralsognjng37.cloudfront.net/dce4c6df-9a76-4061-a491-537eab9935d4.jpeg',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Grilled BBQ Chicken',
			'price' => 8.40,
			'image' => 'https://d1ralsognjng37.cloudfront.net/067f5861-f53a-43f0-8d03-81f6f3f62641.jpeg',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Chicken McNuggets - 6pc',
			'price' => 7.20,
			'image' => 'https://d1ralsognjng37.cloudfront.net/f877158b-4d83-4eda-9eae-65d8d142a4f0',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Crispy Chicken Deluxe Burger',
			'price' => 7.90,
			'image' => 'https://d1ralsognjng37.cloudfront.net/8743bf86-2581-4e5b-a960-9cb24c10f719.jpeg',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'McChicken',
			'price' => 6.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/35853bbc-8ba0-4357-904c-3949198362a6',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Double McChicken',
			'price' => 9.15,
			'image' => 'https://d1ralsognjng37.cloudfront.net/203be232-dda9-495d-8cce-d2bade250cfc',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Chicken McNuggets - 3pc',
			'price' => 4.35,
			'image' => 'https://d1ralsognjng37.cloudfront.net/d882d896-6ab7-4826-8e7b-80ff4c409bbd.jpeg',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Filet-O-Fish',
			'price' => 5.80,
			'image' => 'https://d1ralsognjng37.cloudfront.net/e0cb4b8f-77e7-4d36-8f5b-798c71151179',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Double Filet-O-Fish',
			'price' => 7.60,
			'image' => 'https://d1ralsognjng37.cloudfront.net/77096cdf-01e7-45b1-8273-8384ead67d9f',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Chicken McNuggets - 10pc',
			'price' => 8.35,
			'image' => 'https://d1ralsognjng37.cloudfront.net/a9771e99-3ef5-43b6-96c8-24ccdefdb24c.jpeg',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Chicken McNuggets - 20pc',
			'price' => 14.15,
			'image' => 'https://d1ralsognjng37.cloudfront.net/cda012c0-2c10-4ffe-b46d-9bb574c5a589',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Grilled Chicken Snack Wrap',
			'price' => 4.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/6e1aa1ff-1034-45f0-af57-b88d2d8951ad',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Crispy Chicken Snack Wrap',
			'price' => 4.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/ab7cb273-f12b-4b27-9072-1710e7aeb1c1',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Crispy Spicy Chicken McWrap',
			'price' => 8.80,
			'image' => 'https://d1ralsognjng37.cloudfront.net/f2716446-2736-40e5-8850-19064164596b.jpeg',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Grilled Spicy Chicken McWrap',
			'price' => 8.80,
			'image' => 'https://d1ralsognjng37.cloudfront.net/fa1f8903-f8d1-4977-a978-6298f6c6b2a1',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Crispy Chicken Caesar McWrap',
			'price' => 8.80,
			'image' => 'https://d1ralsognjng37.cloudfront.net/8fe0f34c-5546-40ce-a4be-79b1853273b2.jpeg',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Crispy Chicken Caesar Salad',
			'price' => 10.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/b832f51c-9a67-4766-a68c-39ffd0e2332e.jpeg',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Garden Salad',
			'price' => 4.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/b719369c-e53b-44f8-b847-f5ce80e041a0',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Hotcakes with Butter & Syrup',
			'price' => 5.20,
			'image' => 'https://d1ralsognjng37.cloudfront.net/73157d2d-3d9c-4144-881f-1010ee497896',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Bacon & Egg McMuffin',
			'price' => 4.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/928187e0-f24f-442c-b415-3eb21e7c88ad',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Sausage & Egg McMuffin',
			'price' => 5.10,
			'image' => 'https://d1ralsognjng37.cloudfront.net/22f61eca-9f0c-46da-96aa-97a17f33171b',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Sausage McMuffin',
			'price' => 4.35,
			'image' => 'https://d1ralsognjng37.cloudfront.net/8d1795f3-8446-423f-91dc-76cb821cf7b0',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'English Muffin with Jam',
			'price' => 2.25,
			'image' => 'https://d1ralsognjng37.cloudfront.net/3f10feb8-7e1a-426c-bdf1-cfc914cbda85',
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'Hash Brown',
			'price' => 2.65,
			'image' => 'https://d1ralsognjng37.cloudfront.net/37dda43e-e85b-4e4a-967b-574783772b32',
			'restaurant_id' => 2
		]);









		/**
		 * Sushi Train
		 */
		DB::table('products')->insert([
			'name' => 'St Salmon Combo',
			'price' => 18.80,
			'image' => 'https://d1ralsognjng37.cloudfront.net/b1e7c6c4-cc6a-4920-b8c0-3805114f23e0',
			'restaurant_id' => 3
		]);
		DB::table('products')->insert([
			'name' => 'St Chicken Combo',
			'price' => 15.80,
			'image' => 'https://d1ralsognjng37.cloudfront.net/cce667bc-2597-4761-b8e9-eb215eaaa78c',
			'restaurant_id' => 3
		]);
		DB::table('products')->insert([
			'name' => 'St Roll Combo',
			'price' => 15.80,
			'image' => 'https://d1ralsognjng37.cloudfront.net/73d86dc8-04b0-4e0f-b363-552d21adff33',
			'restaurant_id' => 3
		]);
		DB::table('products')->insert([
			'name' => 'St Baby Roll Combo',
			'price' => 17.80,
			'image' => 'https://d1ralsognjng37.cloudfront.net/8579f683-2fd6-4388-8304-4def5f6ed17c',
			'restaurant_id' => 3
		]);
		DB::table('products')->insert([
			'name' => 'St Nigiri Combo',
			'price' => 23.80,
			'image' => 'https://d1ralsognjng37.cloudfront.net/a7b6a07f-31e1-4a9a-a495-95536300f8ad',
			'restaurant_id' => 3
		]);
		DB::table('products')->insert([
			'name' => 'St Hot Dish Combo',
			'price' => 19.80,
			'image' => 'https://d1ralsognjng37.cloudfront.net/2ff8f508-69a8-4c57-b462-84956cc49a62',
			'restaurant_id' => 3
		]);
		DB::table('products')->insert([
			'name' => 'Salmon Sashimi 9pcs',
			'price' => 18.80,
			'image' => 'https://d1ralsognjng37.cloudfront.net/6ea30332-60c7-4ca5-a9fd-7cc09d610bd3',
			'restaurant_id' => 3
		]);
		DB::table('products')->insert([
			'name' => 'Tuna Sashimi 9pcs',
			'price' => 18.80,
			'image' => 'https://d1ralsognjng37.cloudfront.net/10cb0504-619b-4433-8be8-1e1cac187ce8',
			'restaurant_id' => 3
		]);
		DB::table('products')->insert([
			'name' => 'Kingfish Sashimi 9pcs',
			'price' => 18.80,
			'image' => 'https://d1ralsognjng37.cloudfront.net/a35018bd-e5ad-4e16-8841-3c2264f895e5',
			'restaurant_id' => 3
		]);
		DB::table('products')->insert([
			'name' => 'Mix Sashimi 9pcs',
			'price' => 18.80,
			'image' => 'https://d1ralsognjng37.cloudfront.net/2e03112f-84f0-4848-8061-3575660433e6',
			'restaurant_id' => 3
		]);
		DB::table('products')->insert([
			'name' => 'Teriyaki Chicken Rice Bowl Set',
			'price' => 18.80,
			'image' => 'https://d1ralsognjng37.cloudfront.net/41438f2a-8075-4bc9-a534-edaf1e6666da',
			'restaurant_id' => 3
		]);
		DB::table('products')->insert([
			'name' => 'Karaage Rice Bowl Set',
			'price' => 18.80,
			'image' => 'https://d1ralsognjng37.cloudfront.net/590679bc-e992-43b0-8a90-dd4e8b232b73',
			'restaurant_id' => 3
		]);
		DB::table('products')->insert([
			'name' => 'Chicken Katsu Rice Bowl Set',
			'price' => 18.80,
			'image' => 'https://d1ralsognjng37.cloudfront.net/93212bc6-ca28-4423-b8cb-a7f1233d37f0',
			'restaurant_id' => 3
		]);
		DB::table('products')->insert([
			'name' => 'Gyoza 8pcs',
			'price' => 13.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/d2f72f1d-0204-498a-8a00-a599e59519df',
			'restaurant_id' => 3
		]);
		DB::table('products')->insert([
			'name' => 'Chicken Karaage 8pcs',
			'price' => 13.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/419feb79-ac06-4832-8d9e-735dc256e36c',
			'restaurant_id' => 3
		]);
		DB::table('products')->insert([
			'name' => 'Spring Roll 8pcs',
			'price' => 10.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/2ee28c87-7fef-494b-bcc5-ebf3c37ef977',
			'restaurant_id' => 3
		]);







		/**
		 * Fresca Mex
		 */
		DB::table('products')->insert([
			'name' => 'Burrito (VO)',
			'price' => 11.90,
			'image' => 'https://d1ralsognjng37.cloudfront.net/82540431-5bb7-4813-bb69-d3bab384248b',
			'restaurant_id' => 4
		]);
		DB::table('products')->insert([
			'name' => 'Nachos (VO)',
			'price' => 13.90,
			'image' => 'https://d1ralsognjng37.cloudfront.net/cf2236b9-7608-40b8-be15-1fc634955b47',
			'restaurant_id' => 4
		]);
		DB::table('products')->insert([
			'name' => 'Enchilada (VO)',
			'price' => 13.90,
			'image' => 'https://d1ralsognjng37.cloudfront.net/26d6897d-f1c1-4cc9-a165-163e102df7f4',
			'restaurant_id' => 4
		]);
		DB::table('products')->insert([
			'name' => 'Quesadilla (VO)',
			'price' => 13.90,
			'image' => 'https://d1ralsognjng37.cloudfront.net/c06a436a-f678-4aba-b4bb-7200642c4ab3',
			'restaurant_id' => 4
		]);
		DB::table('products')->insert([
			'name' => 'Chimmichanga (VO)',
			'price' => 13.90,
			'image' => 'https://d1ralsognjng37.cloudfront.net/6547afb0-5548-432a-9860-5857bc7d1332',
			'restaurant_id' => 4
		]);
		DB::table('products')->insert([
			'name' => 'Burrito (VO)',
			'price' => 11.90,
			'image' => 'https://d1ralsognjng37.cloudfront.net/82540431-5bb7-4813-bb69-d3bab384248b',
			'restaurant_id' => 4
		]);
		DB::table('products')->insert([
			'name' => 'Nachos (VO)',
			'price' => 13.90,
			'image' => 'https://d1ralsognjng37.cloudfront.net/cf2236b9-7608-40b8-be15-1fc634955b47',
			'restaurant_id' => 4
		]);
		DB::table('products')->insert([
			'name' => 'Enchilada (VO)',
			'price' => 13.90,
			'image' => 'https://d1ralsognjng37.cloudfront.net/26d6897d-f1c1-4cc9-a165-163e102df7f4',
			'restaurant_id' => 4
		]);
		DB::table('products')->insert([
			'name' => 'Quesadilla (VO)',
			'price' => 13.90,
			'image' => 'https://d1ralsognjng37.cloudfront.net/c06a436a-f678-4aba-b4bb-7200642c4ab3',
			'restaurant_id' => 4
		]);
		DB::table('products')->insert([
			'name' => 'Chimmichanga (VO)',
			'price' => 13.90,
			'image' => 'https://d1ralsognjng37.cloudfront.net/6547afb0-5548-432a-9860-5857bc7d1332',
			'restaurant_id' => 4
		]);
		DB::table('products')->insert([
			'name' => 'Crinkle Cut Fries and Sauce',
			'price' => 5.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/d58dc089-57c0-4c74-a85c-88a63e668d70',
			'restaurant_id' => 4
		]);







		/**
		 * Crust Pizza
		 */
		DB::table('products')->insert([
			'name' => 'Mediterranean Lamb Pizza',
			'price' => 25.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/95c0260d-f6e1-4342-89e3-32163c7b3ea0',
			'restaurant_id' => 5
		]);
		DB::table('products')->insert([
			'name' => 'Vegetarian Supreme Pizza',
			'price' => 25.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/05c42fd3-a0d5-4513-ad2d-e6e74643fb05',
			'restaurant_id' => 5
		]);
		DB::table('products')->insert([
			'name' => 'Crust Supreme Pizza',
			'price' => 25.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/e52e3ece-3aa1-4bd6-bddc-72caf715073a',
			'restaurant_id' => 5
		]);
		DB::table('products')->insert([
			'name' => 'Peri Peri Chicken Pizza',
			'price' => 25.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/0f1ba742-b812-4705-912a-b1e99d4178fa',
			'restaurant_id' => 5
		]);
		DB::table('products')->insert([
			'name' => 'Upper Crust Peking Duck',
			'price' => 27.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/70402fb9-f8fb-473e-872d-109a54c1b68f',
			'restaurant_id' => 5
		]);
		DB::table('products')->insert([
			'name' => 'Upper Crust Moroccan Lamb',
			'price' => 27.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/550a7c76-43f4-4163-a763-a1a851d6f638',
			'restaurant_id' => 5
		]);
		DB::table('products')->insert([
			'name' => 'Upper Crust Truffle Beef Rossini',
			'price' => 27.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/0625a199-3a58-492b-a8ef-a21b5e97c50a',
			'restaurant_id' => 5
		]);
		DB::table('products')->insert([
			'name' => 'Upper Crust Pulled Pork & Slaw',
			'price' => 27.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/26891cac-0dbc-4bbd-8cb5-667c05227c24',
			'restaurant_id' => 5
		]);
		DB::table('products')->insert([
			'name' => 'Upper Crust Smokey Beef Brisket',
			'price' => 28.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/3e9b2d07-dfd7-466d-b628-de6b14cb9dca',
			'restaurant_id' => 5
		]);
		DB::table('products')->insert([
			'name' => 'Pesto Chicken Club',
			'price' => 25.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/676e53eb-e460-48ba-bc2d-02b02052c5ea',
			'restaurant_id' => 5
		]);
		DB::table('products')->insert([
			'name' => 'Peri Peri Chicken Pizza',
			'price' => 25.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/0f1ba742-b812-4705-912a-b1e99d4178fa',
			'restaurant_id' => 5
		]);
		DB::table('products')->insert([
			'name' => 'Tandoori Chicken Pizza',
			'price' => 25.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/17f0a725-d2c4-4618-aeb0-068722aba80e',
			'restaurant_id' => 5
		]);
		DB::table('products')->insert([
			'name' => 'BBQ Chicken Pizza',
			'price' => 25.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/0aee4825-68ea-44f5-8ae6-6212b1e9d1ca',
			'restaurant_id' => 5
		]);
		DB::table('products')->insert([
			'name' => 'Vietnamese Chilli Chicken Pizza',
			'price' => 25.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/9c868836-2cfa-4c6d-872d-23470c4277bf',
			'restaurant_id' => 5
		]);
		DB::table('products')->insert([
			'name' => 'Meat Deluxe Pizza',
			'price' => 25.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/cedad25f-074d-48f2-aa1e-c754b22705a7',
			'restaurant_id' => 5
		]);
		DB::table('products')->insert([
			'name' => 'Mediterranean Lamb Pizza',
			'price' => 25.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/95c0260d-f6e1-4342-89e3-32163c7b3ea0',
			'restaurant_id' => 5
		]);
		DB::table('products')->insert([
			'name' => 'Prosciutto Pizza',
			'price' => 25.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/f58dae98-3937-48d7-a6aa-1399eedf543a',
			'restaurant_id' => 5
		]);
		DB::table('products')->insert([
			'name' => 'Pepperoni Pizza',
			'price' => 25.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/33c0eb15-23e4-4725-8cc1-433540962e2d',
			'restaurant_id' => 5
		]);
		DB::table('products')->insert([
			'name' => 'Mexican Pizza',
			'price' => 25.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/36766bad-2c62-4d7d-8312-3edb7b39fa51',
			'restaurant_id' => 5
		]);
		DB::table('products')->insert([
			'name' => 'Crust Supreme Pizza',
			'price' => 25.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/e52e3ece-3aa1-4bd6-bddc-72caf715073a',
			'restaurant_id' => 5
		]);
		DB::table('products')->insert([
			'name' => 'Seafood Marinara Pizza',
			'price' => 26.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/1c50bb02-8fb1-4539-a4ce-a9b19e495633',
			'restaurant_id' => 5
		]);
		DB::table('products')->insert([
			'name' => 'Garlic Prawn Pizza',
			'price' => 26.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/420b69d7-1c15-4d2a-bdd9-ff8db89a1488',
			'restaurant_id' => 5
		]);
		DB::table('products')->insert([
			'name' => 'Szechuan Chilli Prawn Pizza',
			'price' => 26.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/da3f98e1-a6cb-4fef-8529-7a659117977c',
			'restaurant_id' => 5
		]);
		DB::table('products')->insert([
			'name' => 'Vegetarian Supreme Pizza',
			'price' => 25.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/05c42fd3-a0d5-4513-ad2d-e6e74643fb05',
			'restaurant_id' => 5
		]);
		DB::table('products')->insert([
			'name' => 'c. 1889 Margherita Pizza',
			'price' => 25.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/d89f61fe-3472-46a7-8d5a-6fb82b95dbce',
			'restaurant_id' => 5
		]);
		DB::table('products')->insert([
			'name' => 'Tandoori Mushroom Pizza',
			'price' => 25.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/2acefaac-d7a4-42dd-8e05-42e1bd0a6133',
			'restaurant_id' => 5
		]);
		DB::table('products')->insert([
			'name' => 'Sweet Peppered Pineapple Pizza',
			'price' => 25.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/53cf5f82-b109-415d-9e04-df8f98b9ab20',
			'restaurant_id' => 5
		]);
		DB::table('products')->insert([
			'name' => 'Smokey BBQ Pulled Jackfruit Pizza',
			'price' => 25.00,
			'image' => 'https://duyt4h9nfnj50.cloudfront.net/sku/547cab341a016953041a41069fc808c3',
			'restaurant_id' => 5
		]);
		DB::table('products')->insert([
			'name' => 'Margherita Pizza',
			'price' => 19.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/3621080c-64ad-45c4-9b56-9679b90791bd',
			'restaurant_id' => 5
		]);
		DB::table('products')->insert([
			'name' => 'Capricciosa Pizza',
			'price' => 19.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/82085e27-a173-4915-b2c3-156700b52bc7',
			'restaurant_id' => 5
		]);
		DB::table('products')->insert([
			'name' => 'Australian Pizza',
			'price' => 19.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/8813395d-1378-4f41-b2a9-fe1a14c5a2c1',
			'restaurant_id' => 5
		]);
		DB::table('products')->insert([
			'name' => 'Hawaiian Pizza',
			'price' => 19.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/65f4cfef-c7b8-43e2-9bfa-9ff5d42c802b',
			'restaurant_id' => 5
		]);
		DB::table('products')->insert([
			'name' => 'Prosciutto Blanco',
			'price' => 17.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/8a290bdc-be46-46d1-9c3b-1e65d4721c56',
			'restaurant_id' => 5
		]);
		DB::table('products')->insert([
			'name' => 'Truffled Mushroom Gnocchi',
			'price' => 18.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/8e9a2f77-2cba-4dcb-9806-5bc08bde0d7c',
			'restaurant_id' => 5
		]);
		DB::table('products')->insert([
			'name' => 'Homestyle Bolognese',
			'price' => 15.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/f0730ade-38d5-418b-a066-e9f8d48b0522',
			'restaurant_id' => 5
		]);
		DB::table('products')->insert([
			'name' => 'Herb n Garlic Squares',
			'price' => 10.50,
			'image' => 'https://d1ralsognjng37.cloudfront.net/be46bacd-129a-41df-80be-141d4d2e8aa1',
			'restaurant_id' => 5
		]);
		DB::table('products')->insert([
			'name' => 'Bourbon BBQ Pork Ribs',
			'price' => 16.50,
			'image' => 'https://d1ralsognjng37.cloudfront.net/c521b6e4-d577-4ce2-902b-6f2ef8f1c624',
			'restaurant_id' => 5
		]);
		DB::table('products')->insert([
			'name' => 'Herb n Garlic Sourdough',
			'price' => 8.50,
			'image' => 'https://d1ralsognjng37.cloudfront.net/b72a47d5-5015-4604-98c5-b150f7564c0e',
			'restaurant_id' => 5
		]);
		DB::table('products')->insert([
			'name' => 'Bruschetta Squares',
			'price' => 11.50,
			'image' => 'https://d1ralsognjng37.cloudfront.net/5058758c-bf56-436c-a870-e7b93f74893c',
			'restaurant_id' => 5
		]);
		DB::table('products')->insert([
			'name' => 'Prosciutto Chicken Tenders',
			'price' => 16.50,
			'image' => 'https://d1ralsognjng37.cloudfront.net/a4f4f55a-fef0-4e11-8f34-e8266b05a681',
			'restaurant_id' => 5
		]);
		DB::table('products')->insert([
			'name' => 'Thai Wagyu Beef Bowl',
			'price' => 16.50,
			'image' => 'https://d1ralsognjng37.cloudfront.net/5ab45208-f299-4f4a-80de-73e97c641447',
			'restaurant_id' => 5
		]);
		DB::table('products')->insert([
			'name' => 'Garden Salad Bowl',
			'price' => 10.50,
			'image' => 'https://d1ralsognjng37.cloudfront.net/1d9f5141-514c-4661-bccd-9b014173bba0',
			'restaurant_id' => 5
		]);
		DB::table('products')->insert([
			'name' => 'Middle Eastern Falafel Bowl',
			'price' => 15.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/3bbdd31e-f7b3-4940-beb3-cc37d2d728fe',
			'restaurant_id' => 5
		]);
		DB::table('products')->insert([
			'name' => 'Panzanella Salad Bowl',
			'price' => 15.50,
			'image' => 'https://d1ralsognjng37.cloudfront.net/75ec182b-45c2-4cc2-b1e1-d4e7e35385fb',
			'restaurant_id' => 5
		]);
		DB::table('products')->insert([
			'name' => 'Peking Duck Bowl',
			'price' => 16.50,
			'image' => 'https://d1ralsognjng37.cloudfront.net/6143ee92-0cd9-43ff-9b6f-9d04f7b578a7',
			'restaurant_id' => 5
		]);
		DB::table('products')->insert([
			'name' => 'KIDS Ham & Cheese Pizza + Juice',
			'price' => 11.50,
			'image' => 'https://d1ralsognjng37.cloudfront.net/975c25e4-c8b0-4abc-9170-5101cc49ff6a',
			'restaurant_id' => 5
		]);
		DB::table('products')->insert([
			'name' => 'Chicken n Pineapple Pizza + Juice',
			'price' => 11.50,
			'image' => 'https://d1ralsognjng37.cloudfront.net/6a941f6e-1302-4eb9-af9b-515f024cbe00',
			'restaurant_id' => 5
		]);
		DB::table('products')->insert([
			'name' => 'Ham n Pineapple Pizza + Juice',
			'price' => 11.50,
			'image' => 'https://d1ralsognjng37.cloudfront.net/8a9093eb-1552-404d-b882-e0076536b5bf',
			'restaurant_id' => 5
		]);
		DB::table('products')->insert([
			'name' => 'Super Hero Pasta with Juice',
			'price' => 12.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/3e5dd034-d3f9-43ac-86c4-ec533dc83ce3',
			'restaurant_id' => 5
		]);
		DB::table('products')->insert([
			'name' => 'Super Hero Scrolls with Juice',
			'price' => 12.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/3e9e254b-bd03-467b-ad8c-84638e288ac9',
			'restaurant_id' => 5
		]);
		DB::table('products')->insert([
			'name' => 'KIDS Cheese Pizza + Juice',
			'price' => 11.50,
			'image' => 'https://d1ralsognjng37.cloudfront.net/b98b50e6-05e5-4053-916a-e6db4fd52c8f',
			'restaurant_id' => 5
		]);
		DB::table('products')->insert([
			'name' => 'House Cooked Belgian Waffle',
			'price' => 14.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/3113fa97-deb3-4acc-a47d-71aa0f8a2c14',
			'restaurant_id' => 5
		]);
		DB::table('products')->insert([
			'name' => 'Chocolate Mousse',
			'price' => 6.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/b4b1cc5e-c674-41d5-bb92-bd92ca24d955',
			'restaurant_id' => 5
		]);
		DB::table('products')->insert([
			'name' => 'Movenpick Swiss Chocolate',
			'price' => 6.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/05450f30-5210-448f-9b43-2db69ced2d2b',
			'restaurant_id' => 5
		]);
		DB::table('products')->insert([
			'name' => 'Movenpick Vanilla Dream',
			'price' => 6.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/9d11f195-55ed-490c-a93a-ab0c454f2c4c',
			'restaurant_id' => 5
		]);
		DB::table('products')->insert([
			'name' => 'Black Forest Crumble',
			'price' => 14.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/a0e57624-89ab-4265-933e-a705c69c3bd1',
			'restaurant_id' => 5
		]);
		DB::table('products')->insert([
			'name' => 'Dark Chocolate Panzerotti with Salted Honey',
			'price' => 14.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/a69d975d-3670-4688-95a9-186fa2aa4a93',
			'restaurant_id' => 5
		]);
		DB::table('products')->insert([
			'name' => 'Mount Franklin Still (1.5L)',
			'price' => 6.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/62fc3963-91ef-49ec-908e-0e3d04c3bec6',
			'restaurant_id' => 5
		]);
		DB::table('products')->insert([
			'name' => 'MF Lightly Sparkling (1.25L)',
			'price' => 6.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/8395865f-adae-44c9-a769-edae7764509f',
			'restaurant_id' => 5
		]);
		DB::table('products')->insert([
			'name' => 'Sprite (1.25L)',
			'price' => 6.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/13651c58-13f7-45e0-9dad-b3dcf2894d23',
			'restaurant_id' => 5
		]);
		DB::table('products')->insert([
			'name' => 'Lift (1.25L)',
			'price' => 6.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/e9c61fd7-3d4e-447d-ae6b-3e9f9317f95d',
			'restaurant_id' => 5
		]);
		DB::table('products')->insert([
			'name' => 'Fanta (1.25L)',
			'price' => 6.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/946359b1-30f2-4a78-a7f5-b3c4dfe55f2b',
			'restaurant_id' => 5
		]);
		DB::table('products')->insert([
			'name' => 'Diet Coke (1.25L)',
			'price' => 6.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/69759284-4b2c-4950-a340-36bcda44345d',
			'restaurant_id' => 5
		]);
		DB::table('products')->insert([
			'name' => 'Coke NO Sugar (1.25L)',
			'price' => 6.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/2cb1b667-fdb3-4941-8a59-bbcc03ca624e',
			'restaurant_id' => 5
		]);
		DB::table('products')->insert([
			'name' => 'Coke (1.25L)',
			'price' => 6.00,
			'image' => 'https://d1ralsognjng37.cloudfront.net/b6caf56a-4163-4b3a-a095-5f219013f912',
			'restaurant_id' => 5
		]);





		/**
		 * Schnitz
		 */
		DB::table('products')->insert([
			'name' => 'Basic Instinct',
			'price' => 11.50,
			'image' => 'https://d1ralsognjng37.cloudfront.net/89b0fedb-1687-4106-b1fe-71fc652d4538',
			'restaurant_id' => 6
		]);
		DB::table('products')->insert([
			'name' => 'Plain and Simple',
			'price' => 12.50,
			'image' => 'https://d1ralsognjng37.cloudfront.net/6697b78b-c035-4c46-975c-92a366a65b1b',
			'restaurant_id' => 6
		]);
		DB::table('products')->insert([
			'name' => 'Status Quo',
			'price' => 13.50,
			'image' => 'https://d1ralsognjng37.cloudfront.net/9fd46927-931f-4d6c-bcdd-0ad78583b0f9',
			'restaurant_id' => 6
		]);
		DB::table('products')->insert([
			'name' => 'American Dream',
			'price' => 14.50,
			'image' => 'https://d1ralsognjng37.cloudfront.net/227a60de-7943-48de-b9ec-57342b7248c5',
			'restaurant_id' => 6
		]);
		DB::table('products')->insert([
			'name' => 'The Swiss',
			'price' => 14.90,
			'image' => 'https://d1ralsognjng37.cloudfront.net/c0e9f0bb-e07e-4362-9250-f48dd0f94def',
			'restaurant_id' => 6
		]);
		DB::table('products')->insert([
			'name' => 'The Hawaiian',
			'price' => 14.90,
			'image' => 'https://d1ralsognjng37.cloudfront.net/7460cbe6-4f70-4729-9483-e3926a204358',
			'restaurant_id' => 6
		]);
		DB::table('products')->insert([
			'name' => 'The Aussie',
			'price' => 15.50,
			'image' => 'https://d1ralsognjng37.cloudfront.net/f00e74e2-b32c-4a6e-a247-fc899eb33c2d',
			'restaurant_id' => 6
		]);
		DB::table('products')->insert([
			'name' => 'OMG!',
			'price' => 17.90,
			'image' => 'https://d1ralsognjng37.cloudfront.net/a5c55ec8-c0a0-429e-81dc-d357ca146186',
			'restaurant_id' => 6
		]);
		DB::table('products')->insert([
			'name' => 'Parmageddon',
			'price' => 16.50,
			'image' => 'https://d1ralsognjng37.cloudfront.net/705d0179-29a7-4d42-bffd-79d8f640461f',
			'restaurant_id' => 6
		]);
		DB::table('products')->insert([
			'name' => 'Garden of Eden',
			'price' => 14.50,
			'image' => 'https://d1ralsognjng37.cloudfront.net/eb4d2e32-023b-47b1-a9ea-cbe5ba55c3a8',
			'restaurant_id' => 6
		]);
		DB::table('products')->insert([
			'name' => 'Schnitzel',
			'price' => 8.90,
			'image' => 'https://d1ralsognjng37.cloudfront.net/05389903-e8bc-4f4b-9202-59e0a89977ec',
			'restaurant_id' => 6
		]);
		DB::table('products')->insert([
			'name' => 'Parmigiana',
			'price' => 11.50,
			'image' => 'https://d1ralsognjng37.cloudfront.net/e6ece541-e44e-4c14-88ef-8f2a6d15fb43',
			'restaurant_id' => 6
		]);
		DB::table('products')->insert([
			'name' => 'Crumb-Free Chicken Fillet',
			'price' => 8.90,
			'image' => 'https://d1ralsognjng37.cloudfront.net/be2d2a22-a885-4d19-ab06-6a43ee6a9ef4',
			'restaurant_id' => 6
		]);
		DB::table('products')->insert([
			'name' => 'Schnitzel and Chips',
			'price' => 12.90,
			'image' => 'https://d1ralsognjng37.cloudfront.net/3b79b788-aee7-4457-8dd0-737c805f11b9',
			'restaurant_id' => 6
		]);
		DB::table('products')->insert([
			'name' => 'Schnitzel with Chips and Salad',
			'price' => 17.50,
			'image' => 'https://d1ralsognjng37.cloudfront.net/651f2515-d593-4dff-8e99-427156a142bb',
			'restaurant_id' => 6
		]);
		DB::table('products')->insert([
			'name' => 'Parma and Chips',
			'price' => 14.90,
			'image' => 'https://d1ralsognjng37.cloudfront.net/a2be46ad-9cce-4a45-a3bd-bd01755df6da',
			'restaurant_id' => 6
		]);
		DB::table('products')->insert([
			'name' => 'Vegan Basic Instinct',
			'price' => 11.50,
			'image' => 'https://d1ralsognjng37.cloudfront.net/7355d7ee-9d64-4b8b-aab8-8ed0accaaabe',
			'restaurant_id' => 6
		]);
		DB::table('products')->insert([
			'name' => 'Vegan Parmageddon',
			'price' => 16.50,
			'image' => 'https://d1ralsognjng37.cloudfront.net/afeb4d44-1ac8-44b9-a67b-3cace5f6bdd4',
			'restaurant_id' => 6
		]);
		DB::table('products')->insert([
			'name' => 'Vegan Schnitzel',
			'price' => 8.90,
			'image' => 'https://d1ralsognjng37.cloudfront.net/17c32c76-b1a2-4b76-bba6-2a34640b60f7',
			'restaurant_id' => 6
		]);
		DB::table('products')->insert([
			'name' => 'Vegan Parmigiana',
			'price' => 11.50,
			'image' => 'https://d1ralsognjng37.cloudfront.net/f078e2e6-caee-4efc-9a09-ecc7781016b5',
			'restaurant_id' => 6
		]);


		/**
		 * Pizza Capers
		 */
		DB::table('products')->insert([
			'name' => 'Bourbon BBQ Chicken Wings',
			'price' => 9.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/72dab968-42ad-46d1-8aea-8ddcb606e9c6.png',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Classic Garlic Calzone',
			'price' => 6.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/50e8e9e1-8d98-41f2-a32b-15ae7eff2989',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'BBQ Bonanza Pizza',
			'price' => 21.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/fadb8d47-08bd-4633-af9d-72c336de06d0',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Piri Piri Chicken Pizza',
			'price' => 21.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/18929d2c-873d-4b3e-9497-4a71c86aac77',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Reef & Beef Pizza',
			'price' => 24.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/350bec01-67c7-4f43-b444-a45bdb4c58fc',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Kids Ham & Pineapple Pizza',
			'price' => 7.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/16ed0080-d493-469f-be4d-2bd4a4a3b63e',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'T-bird',
			'price' => 18.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/735346b8-902c-4f01-95ed-47004448f356',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Motor City Mushroom',
			'price' => 18.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/0ca37d2f-bea2-40a9-8c27-4ab293227f0e',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Pontiac Pepperoni',
			'price' => 18.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/c2529e04-2684-485d-a09c-4cfc3adac9b5',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Chevy Cheese',
			'price' => 18.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/e8319540-ffaf-4c0e-8690-105e408ba41f',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Maple Bacon Beef Royale',
			'price' => 21.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/836aafc9-d6f9-4c84-b66f-92dd94c137d2.png',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Reef & Beef Pizza',
			'price' => 24.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/350bec01-67c7-4f43-b444-a45bdb4c58fc',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'BBQ Bonanza Pizza',
			'price' => 21.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/fadb8d47-08bd-4633-af9d-72c336de06d0',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Tuscan Pesto Chicken & Bacon Pizza',
			'price' => 21.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/07c82230-531f-42a7-8258-42e66da4409c',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Lamb-Baa-Gini Pizza',
			'price' => 21.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/a2d83ab2-a93d-4027-970c-0d696eaa3707',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Bourbon Chicken & Bacon Pizza',
			'price' => 21.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/e3e871a0-6d8d-44fd-a222-aaf0fc6d2aa1',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Porknado Pizza',
			'price' => 21.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/3c5c9e8f-e862-44f9-b324-68e5dfc588ed',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Chicken & Avocado Pizza',
			'price' => 21.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/d4861403-c5b4-46ee-9ed0-6440e18e11db',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'New Orleans Pizza',
			'price' => 21.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/d714be9c-3b6c-412e-bfb6-c648da4f61a2',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Piri Piri Chicken Pizza',
			'price' => 21.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/18929d2c-873d-4b3e-9497-4a71c86aac77',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Seafood Barcelona Pizza',
			'price' => 24.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/7866387a-e6b2-4308-8a2e-1f2b7139f7f5',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Alfunghi Pizza',
			'price' => 21.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/660ffb96-6f7a-4ea2-b104-46d95c3125db',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Italian Connection Pizza',
			'price' => 21.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/64aeb862-828e-4e26-9370-7d5b34ef0c2d',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'New Mexico Pizza',
			'price' => 21.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/c4c590b0-d541-4c4c-a0ab-2ff65a0850f0.png',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Rustic Lamb Pizza',
			'price' => 21.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/ce1a7600-fcf9-4445-a777-6587a37f2a10.png',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Vegan Satay Tofu (VG)',
			'price' => 21.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/b920268f-7219-40c4-bb7e-ff5f251361f6',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Supremo Pizza',
			'price' => 21.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/2df23189-cc96-4578-9d66-866b0d46d99e',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'The Prawn Pizza',
			'price' => 24.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/32ab1e13-3de3-43ed-bc33-c4bb14d3bdb6',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Sweet Potato Vegan Lovers (VG)',
			'price' => 21.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/229b4725-f169-44cf-aa97-c864d0e88556',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Karaage Chicken Pizza',
			'price' => 21.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/6a907670-5a5c-42a0-941e-8d467cf3e5da',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Smoke Cured Pepperoni Pizza',
			'price' => 16.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/85f6bdee-e7af-45c1-adad-3bbe77ca647b',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Vegetarian Pizza',
			'price' => 16.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/49794a9d-91b8-4352-b99d-e02bf45ad810.png',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'BBQ Chicken & Mushroom Pizza',
			'price' => 16.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/a13ab6c1-fbe7-42a5-a554-0f0281ef86b8',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Capricciosa Pizza',
			'price' => 16.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/d6281a93-8ab8-4f19-b71e-4c26c899c651.png',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Margherita Pizza',
			'price' => 16.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/c9df94a3-9470-4b46-b48a-285028036b46',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Troppo Pizza',
			'price' => 16.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/ec7350d4-279a-4275-b1d1-b0c45d900e2f',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Kids Cheesy Grin Pizza',
			'price' => 7.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/9675c11b-a44d-4bdb-b207-a4f00ecdc177',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Kids Chicken & Cheese Pizza',
			'price' => 7.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/2fc6909c-e767-47c5-9cf9-dc291396abe3',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Kids Ham & Cheese Pizza',
			'price' => 7.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/67f8af2b-83f6-4e6a-994e-1f93d8012cda',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Kids Ham & Pineapple Pizza',
			'price' => 7.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/16ed0080-d493-469f-be4d-2bd4a4a3b63e',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Cheesy-Mate Fingers',
			'price' => 6.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/ff44deb1-24fb-40f5-a07a-3c6cc5f435ce',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Bacon & Mushroom Carbonara Pasta',
			'price' => 15.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/5083728a-5bd1-4586-b83e-4c2b1c7bdda9',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Garlic Prawn',
			'price' => 15.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/4d2b57fa-b986-410d-83b3-a71b96f428b3',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Amatriciana',
			'price' => 15.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/ca0472b0-69d3-4922-bcda-1c1fbd9ed7b9',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Four Cheeses',
			'price' => 15.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/b39cfd7f-2d6c-4aa7-a752-210a08533f5e',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Pesto Chicken Pasta',
			'price' => 15.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/7e404762-fedb-4d7b-bd8d-fead70fd1841',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Deep Blue Sea Pasta',
			'price' => 15.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/f36e02b6-5648-4301-b8af-32ecc292f2c9',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Classic Bolognese Pasta',
			'price' => 15.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/6e938e24-c5c6-4499-b45a-6ef87c96b347',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Royale Jumbo Wings',
			'price' => 9.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/62a4642f-1964-42fd-b755-8dcc4737b856',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Nashville Hot Jumbo Wings & Ranch Sauce',
			'price' => 9.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/3a2f05d7-44b4-4874-8e7f-a2c679beb163.png',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Bourbon BBQ Chicken Wings',
			'price' => 9.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/72dab968-42ad-46d1-8aea-8ddcb606e9c6.png',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Piri Piri Chicken Wings',
			'price' => 9.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/faef415c-771a-4835-a4f1-07242f7b995a.png',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Dipping Crust & Duo of Dips',
			'price' => 7.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/9165fd9c-c2e9-4cd2-b73a-d2a1400b18b3',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Caesar Salad',
			'price' => 7.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/91a1f16f-ac3f-4173-95d7-01119b221712',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Traditional Garden Salad',
			'price' => 7.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/3467cf76-c5fb-4c3f-819e-5330bb1faee3',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Sweet Potato n Bacon Mess',
			'price' => 9.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/ba0d3e92-91bb-4074-8629-e8ebc49da102',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Karaage Chicken Bites',
			'price' => 9.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/82912aa1-4039-4b0a-9034-1147e297b409',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Popcorn Prawns',
			'price' => 10.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/fc20b04e-9f69-437c-b6bb-217d1ef90b0e',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Blue Cheese & Garlic Calzone',
			'price' => 6.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/bb31e899-c3bf-4304-8e50-5a4f58e0d7b4',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Blue Cheese & Garlic Pizza Bread',
			'price' => 6.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/3da1b899-08bd-41ab-bbbb-af7604a7e379',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Blue Cheese & Garlic (GF)',
			'price' => 8.50,
			'image' => 'https://d1ralsognjng37.cloudfront.net/af7580a8-d6d0-424d-a774-aadfd7419c47',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Classic Garlic Calzone',
			'price' => 6.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/50e8e9e1-8d98-41f2-a32b-15ae7eff2989',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Classic Garlic Calzone (VEGAN)',
			'price' => 6.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/edee6466-0333-4510-b790-de744068a296',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Classic Garlic Pizza Bread',
			'price' => 6.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/bbb9ee7f-8d01-4ce7-bcb1-acb62a9305f4',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Classic Garlic Pizza Bread (GF)',
			'price' => 8.50,
			'image' => 'https://d1ralsognjng37.cloudfront.net/c99c2158-6e1d-455d-8b2a-b2bbdf2aa293',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Garlic & Fresh Rosemary Calzone',
			'price' => 6.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/1667070b-aa5d-483b-99d3-6eb4173b437e',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Garlic & Fresh Rosemary Calzone (VEGAN)',
			'price' => 6.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/354fc01f-1159-41f0-9e4b-b0ff4588e2e6',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Garlic & Fresh Rosemary Pizza Bread',
			'price' => 6.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/4edf4b2d-ea47-400b-8dde-9daa96b3848e',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Garlic & Fresh Rosemary (GF)',
			'price' => 8.50,
			'image' => 'https://d1ralsognjng37.cloudfront.net/98962388-c91a-4dbc-9456-dc7ca0681da1',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Pesto & Feta Calzone',
			'price' => 6.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/6191a0a8-4ab4-4288-bb4b-1fd894c3444e',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Pesto & Feta Pizza Bread',
			'price' => 6.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/09efd685-aa58-45d3-9429-c4cd4a4c3a06',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Pesto & Feta Pizza Bread (GF)',
			'price' => 8.50,
			'image' => 'https://d1ralsognjng37.cloudfront.net/11454490-b555-429a-8159-186bb9ec3d2f',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Sweet Chilli Calzone',
			'price' => 6.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/b2d2260d-8579-48aa-84ea-a0af21a8bdeb',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Sweet Chilli Calzone (VEGAN)',
			'price' => 6.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/d2495b65-208d-404f-b9e1-a459e896dfe2',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Sweet Chilli Pizza Bread',
			'price' => 6.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/28df6271-9a03-484f-b8e2-6d5bc3f2358c',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Sweet Chilli Bread (GF)',
			'price' => 8.50,
			'image' => 'https://d1ralsognjng37.cloudfront.net/1909efa5-7e67-44dd-9cb2-6f5c0fd1b8ce',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Cheesy-Mate Fingers',
			'price' => 6.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/ff44deb1-24fb-40f5-a07a-3c6cc5f435ce',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Choccy Toffee Banoffee Calzone',
			'price' => 9.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/1fea2a71-1330-4fec-a16d-31ebc09b5b63',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Hot Apple Crunch',
			'price' => 8.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/3be537d1-724e-4e1b-ad85-94e8307098c8',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Red Velvet Chocolate Cupcake Ice Cream',
			'price' => 10.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/971700db-b986-4561-8ba6-36580f942157',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Salted Caramel & Malt Crunch Ice Cream',
			'price' => 10.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/ae70fd69-a0a6-4c52-88aa-3fe9a61ef836',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Chocolate S’Mores',
			'price' => 10.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/52fa3f4f-b015-4281-9aa9-fd7c0bc274a8',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Banana Maple Pancake Ice Cream',
			'price' => 10.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/b4d2b9d5-cf05-4e02-8c60-9b41fd82ecd3',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Mango & Coconut Dream Ice Cream',
			'price' => 10.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/270d61d7-19de-4966-9817-e6503c76ffda',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Mt Franklin Still',
			'price' => 3.50,
			'image' => 'https://d1ralsognjng37.cloudfront.net/f3d3b549-6419-43bd-a82d-926869e6e4ab',
			'restaurant_id' => 7
		]);
		DB::table('products')->insert([
			'name' => 'Soft Drinks (1.25L)',
			'price' => 4.95,
			'image' => 'https://d1ralsognjng37.cloudfront.net/b58f3bf2-3921-420e-bbff-7b84847dec87',
			'restaurant_id' => 7
		]);

	}
}
