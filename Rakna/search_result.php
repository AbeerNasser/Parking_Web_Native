<?php 
ob_start();
session_start();

if (isset($_SESSION['user'])) {
    include_once "headerAfter.php";
}else{
  include_once "header.php"; 
}

?>

<div class="page-header" style="background: url(assets/img/banner1.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="breadcrumb-wrapper">
              <h2 class="product-title">Details</h2>
              <ol class="breadcrumb">
                <li><a href="#">Home /</a></li>
                <li class="current">Details</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
</div>
<div class="main-container section-padding">
      <div class="container">
        <div class="row">

					<div class="col-lg-3 col-md-12 col-xs-12 page-sidebar">
							<aside>
								<div class="widget_search">
									<form role="search" id="search-form">
										<input
											type="search"
											class="form-control"
											autocomplete="off"
											name="s"
											placeholder="Search..."
											id="search-input"
											value=""
										/>
										<button type="submit" id="search-submit" class="search-btn">
											<i class="lni-search"></i>
										</button>
									</form>
								</div>

								<div class="widget categories">
									<h4 class="widget-title">All Cities</h4>
									<ul class="categories-list">

									<?php 
													include_once "City.php";
													$city = new City();
													$data = $city ->GetAllCities();
													while ($row=mysqli_fetch_assoc($data)) {
														
											?>
										<li>
											<a href="City_details.php?id=<?php echo($row['City_Id']);?>">
												<i class="lni-home"></i>
											<?php echo($row['City_Name']);?> <span class="category-counter">(<?php echo($row['Parking_Count']);?>)</span>
											</a>
										</li>

										<?php
													}
										?>
									</ul>
								</div>
								<!-- <div class="widget">
									<h4 class="widget-title">Advertisement</h4>
									<div class="add-box">
										<img class="img-fluid" src="assets/img/img1.jpg" alt="" />
									</div>
								</div> -->
							</aside>
					</div>

					<div class="col-lg-9 col-md-12 col-xs-12 page-content">

						<div class="product-filter">
              <div class="short-name">
                <span> Welcome </span>
              </div>
              <div class="Show-item">
                <!-- <span>Show Items</span>
                <form class="woocommerce-ordering" method="post">
                  <label>
                    <select name="order" class="orderby">
                      <option selected="selected" value="menu-order"
                        >49 items</option
                      >
                      <option value="popularity">popularity</option>
                      <option value="popularity">Average ration</option>
                      <option value="popularity">newness</option>
                      <option value="popularity">price</option>
                    </select>
                  </label>
                </form> -->
              </div>
              <ul class="nav nav-tabs">
                <li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#list-view"
									><i class="lni-list"></i
                  >
                    </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active show" data-toggle="tab" href="#grid-view"
									><i class="lni-grid"></i
                  >
								</a>
                </li>
              </ul>
						</div>
					
						<div class="adds-wrapper">
					
              <div class="tab-content">
							
						  	<div id="grid-view" class="">
								
                  <div class="row">
										
										<?php 
										
												include_once "City.php";
											
												$result = new City();
												$result->setSearchKey($_GET['key']);
												$data = $result ->GetSearchResult();
												
                        while ($row=mysqli_fetch_assoc($data)) {
                          
                    ?>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                      <div class="featured-box">
                        <figure>
                          <!-- <span class="price-save">
                            30% Save
                          </span>
                          <div class="icon">
                            <span class="bg-green"
                              ><i class="lni-heart"></i
                            ></span>
                            <span><i class="lni-bookmark"></i></span>
                          </div> -->
                          <a href="City_details.php?id=<?php echo($row['City_Id']);?>"
                            ><img
                              class="img-fluid"
                              src="assets/img/cities/all/<?php echo($row['City_Id']);?>.jpg"
                              alt=""
                          /></a>
                        </figure>
                        <div class="feature-content">
                          <!-- <div class="product">
                            <a href="#">Electronic > </a>
                            <a href="#">Apple</a>
                          </div> -->
                          <h4>
                            <a href="City_details.php?id=<?php echo($row['City_Id']);?>"
                              ><?php echo($row['City_Name']);?> ...</a
                            >
                          </h4>
                          <div class="meta-tag">
                            <!-- <span>
                              <a href="#"
                                ><i class="fas fa-wheelchair"></i>wheelchair</a
                              >
                            </span>
                            <span>
                              <a href="#"
                                ><i class="lni-map-marker"></i> New York, US</a
                              >
                            </span>
                            <span>
                              <a href="#"><i class="lni-tag"></i> Apple</a>
                            </span> -->
                          </div>
                          <p class="dsc">
                          <?php echo($row['City_Desc']);?>
                          </p>
                          <div class="listing-bottom">
                            <!-- <h3 class="price float-left">$249.00</h3> -->
                            <a
                              href="City_details.php?id=<?php echo($row['City_Id']);?>"
                              class="btn btn-common float-right"
                              >View Details</a
                            >
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php 
                      }
                    ?>
                  </div>
                </div>
							
							</div>
						</div>

						<!-- <div class="pagination-bar">
              <nav>
                <ul class="pagination justify-content-center">
                  <li class="page-item">
                    <a class="page-link active" href="#">1</a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                  </li>
                </ul>
              </nav>
            </div> -->
					</div>

				</div>
			</div>
</div>
<?php
  include "contactLinksBar.php";
  include "footer.php";
?>