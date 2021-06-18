@extends('nav')
@section('content')
	<div class="row">
 			<div class="col-9">
				<div id="container">
					<div id="content-container">
						<div id="content">
							<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
								<ol class="carousel-indicators">
									<li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"></li>
									<li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"></li>
									<li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"></li>
						  		</ol>
						  		<div class="carousel-inner">
									<div class="carousel-item active">
							  			<img src="images/food_cover1.jpg" class="d-block w-100" alt="Healthy Food">
							  			<div class="carousel-caption d-none d-md-block">
											<h5>Reward Your Body </h5>
											<p>With Precious Healthy Food</p>
							  			</div>
									</div>
									<div class="carousel-item">
										<img src="images/food_cover2.jpg" class="d-block w-100" alt="Meat and Egg">
										<div class="carousel-caption d-none d-md-block">
											<h5>Meat and Egg</h5>
											<p>Yummy Your Tongue </p>
										</div>
									</div>
									<div class="carousel-item">
									  <img src="images/food_cover3.jpg" class="d-block w-100" alt="Roasted Meat">
									  <div class="carousel-caption d-none d-md-block">
										<h5>Delicious Food</h5>
										<p>We Deliver Delicious Food For You</p>
									  </div>
									</div>
								</div>
								<a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-bs-slide="prev">
									<span class="carousel-control-prev-icon" aria-hidden="true"></span>
									<span class="visually-hidden">Previous</span>
						  		</a>
								<a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-bs-slide="next">
									<span class="carousel-control-next-icon" aria-hidden="true"></span>
									<span class="visually-hidden">Next</span>
						  		</a>
							</div>
							<br>
							<h2>
								Your Body Deserve Healthy Food
							</h2>
							<p>
								Bon appetit, enjoy your food and beverage with us. Reward your body with a great and healthy food from our restaurant. You are the king and queen at our place. It's a honor to serve you. Stay healthy, stay hungry.
							</p>
						</div>
					</div>
				</div>
			</div>					
<!-- Carousel End -->
<!-- Sidebar Start -->
			<div class="col-3"  id="animasi">
				<div id="aside">
					<center>
						<button class="btn btn-info" @click="show_login = true; show_announcement = false;">Login</button>
						<button class="btn btn-info" @click="show_login = false; show_announcement = true;">Announcement</button>
					</center>
					<transition
						name = "animasi1"
						enter-active-class= "animate__animated animate__fadeIn"
						leave-active-class= "animate__animated animate__fadeOut"
					>
						<div v-if="show_login">
							<img src="images/waitress-icon.png" class="img-fluid" alt="Waitress Login Here">
							<h3 class="mb-1">
								Login Here
							</h3>
							
							<form action="{{ route('login') }}" method="post">
								@csrf
								<table>
									<tr>
										<td>Email</td>
										<td><input type="email" name="email" id="email"></td>
									</tr>
									<tr>
										<td>Password</td>
										<td><input type="password" name="password" id="password"></td>
									</tr>
									<tr>
										<td><input type="submit" value="Login"></td>
									</tr>
								</table>
							</form>
						</div>
					</transition>
					<transition
						name = "animasi2"
						enter-active-class= "animate__animated animate__fadeIn"
						leave-active-class= "animate__animated animate__fadeOut"
					>
						<div v-if="show_announcement">
							<h3>Announcement Board</h3>
						</div>
					</transition>
					
				</div>



				<div id="footer">
					Copyright &copy Puede Resto
				</div>
			</div>
		</div>
	</div>


<!-- Vue Js Script -->
		<script type="text/javascript">
			var app = new Vue({
					el: "#animasi",
					data: {
						show_login : true,
						show_annoucement :false
				}
			})
		</script>

@endsection