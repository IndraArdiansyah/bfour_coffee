const rupiah = (number) => {
	return new Intl.NumberFormat("id-ID", {
		style: "currency",
		currency: "IDR",
		minimumFractionDigits: 0,
	}).format(number);
};

document.addEventListener("alpine:init", () => {
	Alpine.data("product", () => ({
		id_menu: $(this).data("id_menu"),
		nama_menu: $(this).data("nama_menu"),
		image: $(this).data("image"),
		harga: $(this).data("harga"),
		harga2: $(this).data("harga2"),
		// id: 1,
		// name: 'Product 1',
		// description: 'This is product 1.',
		// price: 10000,
		// quantity: 1,
		// totalPrice: ()=> product.price * product.quantity,
		// incrementQuantity(){
		//     product.quantity++;
		//     updateCart();
		// },
		// decrementQuantity(){
		//     if(product.quantity > 0){
		//         product.quantity--;
		//         updateCart();
		//     }
		// },
		// remove(){
		//     cart.items = cart.items.filter(item=>item.id!== product.id);
		//     updateCart();
		// }
	}));
});

Alpine.store("cart", {
	items: [],
	total: 0,
	quantity: 0,
	add(newItem) {
		console.log(newItem);
	},
});
