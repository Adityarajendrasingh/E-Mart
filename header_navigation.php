<!--Navigation-->
<nav class="navbar navbar-expand-lg navbar-light"> 
			<button class="navbar-toggler"  type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon "></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav" >
					<li class="nav-item active">
						<a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">new arrival</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Brands</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Sale</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Categories
						</a>
						<div class="dropdown-menu mb-2" aria-labelledby="navbarDropdown">
							<?php 
								$result=$mysqli->query("select * from categories where status = '1' order by  categories asc");
								while($row=mysqli_fetch_assoc($result))
								{
							?>
							<a class="dropdown-item" href="#"><?php echo $row['categories']; ?></a>
							<?php }?>
						</div>
					</li>
				</ul>
			</div>
		</nav>
		<!--/Navigation-->