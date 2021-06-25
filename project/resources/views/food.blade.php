@extends('nav')
@section('content')
	<div class="container-fluid">
		<div id="app">
			<div class="dropdown">
				<a class="fas fa-shopping-cart mx-2 dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
				</a>
				<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
			    	<li v-for="(item, index) in added"><a class="dropdown-item">
			    		@{{item.qty}}
			    		@{{item.qty}}x @{{item.product.name}} Rp. @{{(item.qty*item.product.sell_price)}}
			    		<button class="fas fa-trash" v-on:click="buang(index)"></button>
			    	</a></li>
			  		<button v-on:click="saveCart()">Checkout</button>
				</ul>
			</div>

			
			<div>
				<div class="row row-cols-3 col-3 align-items-center" v-for="item in food">
					<div class="col">
						<button class="btn btn-info" v-on:click="tambah(item)">+</button>
					</div>
					<div class="col">
						<img :src="'images/'+item.image" width="100px">
					</div>
					<div class="col">
						<p class="text-info"><h4>#@{{item.id}}</h4></p>
						@{{item.name}}<br>
						<h5><harga v-bind:value="item.sell_price"></harga></h5>
					</div>
				</div>
			</div>
			
		</div>
	</div>



	<script type="text/javascript">
		const axiosInstance = axios.create({
			baseURL: 'http://localhost:80',
			timeout: '3000'
		});
		Vue.component('harga', {
			data : function(){
				return {
					prefix : 'Rp. ',
					precision : 3
				}
			},
			props : ['value'],
			template : '<span>@{{ this.prefix + Number.parseFloat(this.value).toFixed(this.precision)  }}</span>'
		});

		var app = new Vue({
				el: "#app",
				data: {
					food : [ ],
					added : []
			},
			mounted : function(){
				axiosInstance.get('/vuejs/api_food.php')
				.then(response => response.data)
				.then( data =>{
					this.food = data;
				})
				if(localStorage.getItem('added')){
					try{
						this.added = JSON.parse(localStorage.getItem('added'));
					}
					catch(e){
						localStorage.removeItem('added');
					}
				}

			},
			methods:{
				tambah: function(barang){
					var productIndex;
					var productExist = this.added.filter(function(food, index){
						if(food.product.id == Number(barang.id)){
							productIndex = index;
								return true;
							}
							else{
								return false;
							}
						});
					if(productExist.length){
						this.added[productIndex].qty++;
					}
					else{
						this.added.push({product : barang, qty : 1});
					}
					this.saveFood();
				},
				buang: function(productIndex){
					if (this.added[productIndex].qty>0) {
						this.added.splice(productIndex);
					}
					else{	
						this.added[productIndex].qty++;
					}
					this.saveFood();
				},
				saveFood(){
					const parsed = JSON.stringify(this.added);
					localStorage.setItem('added',parsed);
				},
				saveCart(){
					let data = {
						cart: this.added,
					}
					axiosInstance.post('/vuejs/api_savecart.php',data).then(console.log);
					localStorage.removeItem('added');
					this.added = [];
				}
			}
		})
	</script>
@endsection