<?php
    $families = $data->getFamilies();
    function numberToStr($strin){
	return preg_replace('/\B(?=(\d{3})+(?!\d))/', ',', $strin);
    }
    function formatCurrency($value){
        if(preg_match('/([-+\d]+)\.(\d+)/', $value, $numberParts))
            return numberToStr($numberParts[1]) . '.' . substr($numberParts[2], 0, 2);
	else
	    return $value;
    }
?>
<style>
 .primary-img {
     width : 200px;
     height : 200px;
 }
</style>
<div class="heading-banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="index.php#/?page=index&action=store">Home</a></li>
                    <li><a href="index.php#/?page=forms&action=products">Products</a></li>
		    <?php  /* 		    <li class="active"><a href="<?php echo $linksMaker->makeFamilyLink($_GET["family"]); ?>">Families</a></li>
			      <?php if(key_exists("categories", $_GET)): ?>
			      <li class="active"><a href="<?php echo $linksMaker->makeCategoryLink($_GET["category"]); ?>">Categories</a></li>
			      <?php endif; ?>
			      <?php if(key_exists("items", $_GET)): ?>
			      <li class="active"><a href="<?php echo $linksMaker->makeItemLink($_GET["item"]); ?>">Items</a></li>
			      <?php endif ?>
			    */ ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- heading-banner end -->
<!-- shop-area start -->
<div class="shop-area">
    <div class="container">
        <div class="row">
            <!-- left-sidebar start -->
	    <?php if(key_exists("items", $_GET)): ?>
		<?php
		    $categories = $data->getCategories($_GET["family"]);
		    $items = $data->getItems($_GET["category"]);
		    //echo json_encode($categories);
		?>
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <!-- widget-categories start -->
                    <aside class="widget widget-categories">
			<h3 class="sidebar-title">Categories</h3>
			<ul class="sidebar-menu">
			    <?php foreach($categories as $categoryName=>$category): ?>
				<li <?php echo ($categoryName == $_GET["category"] ? "style=\"font-weight:600;\"" : ""); ?>><a href="<?php echo $linksMaker->makeCategoryLink($categoryName); ?>"><?php echo $categoryName; ?></a> <span class="count"><!-- (14)  --></span></li>
			    <?php endforeach; ?>
			</ul>
		    </aside>
		</div>
		<!-- left-sidebar end -->
		<!-- shop-content start -->
		<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                    <div class="shop-content">
			<!-- Nav tabs -->
			<ul class="shop-tab" role="tablist">
                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab"
								       data-toggle="tab"><i class="fa fa-th"></i></a></li>
                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">
				<i class="fa fa-list"></i></a></li>
			</ul>
			<!-- <div class="show-result">
                             <p>
			     Showing 1&ndash;12 of 19 results</p>
			     </div> -->
			<div class="toolbar-form">
                            <form action="#">
				<div class="tolbar-select">
                                    <select>
					<option value="audi">Sort by Price: low to high</option>
					<option value="audi">Sort by Price: high to low</option>
                                    </select>
				</div>
                            </form>
			</div>
			<!-- Tab panes -->
			<div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="home">
				<div class="row">
                                    <!-- single-product start -->
				    <?php foreach($items as $itemName=>$item): ?>
					<div class="col-lg-4 col-md-4 col-sm-4">
					    <div class="single-product">
						<div class="product-img">
						    <a href="<?php echo $linksMaker->makeItemLink($itemName); ?>">
							<img class="primary-img" src="<?php echo $linksMaker->makeItemImageLink($item); ?>" alt="" />
							<img class="secondary-img" src="<?php echo $linksMaker->makeItemImageLink($item); ?>" alt="" />
						    </a>
						</div>
                                                <div class="product-action">
                                                    <div class="pro-button-top">
                                                        <a href="#">add to cart</a>
                                                    </div>
                                                </div>
						<div class="product-info">
						    <h3>
							<a href="<?php echo $linksMaker->makeItemLink($itemName); ?>"><?php echo $itemName; ?></a></h3>
						    <div class="pro-price">
							<span class="normal"><?php echo formatCurrency($item->Price); ?></span>
						    </div>
						    <div class="product-desc">
							<p>
							    <?php echo $item->ItemDescription; ?></p>
						    </div>
						</div>
					    </div>
					</div>
				    <?php endforeach; ?>
				</div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="profile">
				<div class="row shop-list">
                                    <!-- single-product start -->
                                    <!-- single-product start -->
				    <?php foreach($items as $itemName=>$item): ?>
					<div class="col-md-12">
					    <div class="single-product">
						<div class="product-img">
						    <a href="<?php echo $linksMaker->makeItemLink($itemName); ?>">
							<img class="primary-img" src="<?php echo $linksMaker->makeItemImageLink($item); ?>" alt="" />
							<img class="secondary-img" src="<?php echo $linksMaker->makeItemImageLink($item); ?>" alt="" />
						    </a>
						</div>
                                                <div class="product-action">
                                                    <div class="pro-button-top">
                                                        <a href="#">add to cart</a>
                                                    </div>
                                                </div>
						<div class="product-info">
						    <h3>
							<a href="<?php echo $linksMaker->makeItemLink($itemName); ?>"><?php echo $itemName; ?></a></h3>
						    <div class="pro-price">
							<span class="normal"><?php echo formatCurrency($item->Price); ?></span>
							<div class="product-desc">
							<p>
							    <?php echo $item->ItemDescription; ?></p>
						    </div>
						</div>
					    </div>
					</div>
				    <?php endforeach; ?>
				</div>
                            </div>
			</div>
                    </div>
                    <!-- <div class="shop-pagination">
			 <div class="pagination">
                         <ul>
			 <li class="active">1</li>
			 <li><a href="#">2</a></li>
			 <li><a href="#">3</a></li>
			 <li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
                         </ul>
			 </div>
			 </div> -->
		</div>
	    <?php elseif(key_exists("categories", $_GET)): ?>
		<?php
		    $categories = $data->getCategories($_GET["family"]);
		    //echo json_encode($categories);
		?>
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <!-- widget-categories start -->
                    <aside class="widget widget-categories">
			<h3 class="sidebar-title"><?php echo $translation->translateLabel("Families"); ?></h3>
			<ul class="sidebar-menu">
			    <?php foreach($families as $familyName=>$family): ?>
				<li <?php echo ($familyName == $_GET["family"] ? "style=\"font-weight:600;\"" : ""); ?>><a href="<?php echo $linksMaker->makeFamilyLink($familyName); ?>"><?php echo $familyName; ?></a> <span class="count"><!-- (14) --></span></li>
			    <?php endforeach; ?>
			</ul>
		    </aside>
		</div>
		<!-- left-sidebar end -->
		<!-- shop-content start -->
		<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                    <div class="shop-content">
			<!-- Nav tabs -->
			<ul class="shop-tab" role="tablist">
                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab"
								       data-toggle="tab"><i class="fa fa-th"></i></a></li>
                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">
				<i class="fa fa-list"></i></a></li>
			</ul>
			<!-- Tab panes -->
			<div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="home">
				<div class="row">
                                    <!-- single-product start -->
				    <?php foreach($categories as $categoryName=>$category): ?>
					<div class="col-lg-4 col-md-4 col-sm-4">
					    <div class="single-product">
						<div class="product-img">
						    <a href="<?php echo $linksMaker->makeCategoryLink($categoryName); ?>">
							<img class="primary-img" src="<?php echo $linksMaker->makeCategoryImageLink($category); ?>" alt="" />
							<img class="secondary-img" src="<?php echo $linksMaker->makeCategoryImageLink($category); ?>" alt="" />
						    </a>
						</div>
						<div class="product-info">
						    <h3>
							<a href="<?php echo $linksMaker->makeCategoryLink($categoryName); ?>"><?php echo $categoryName; ?></a></h3>
						    <div class="product-desc">
							<p>
							    <?php echo $category->CategoryDescription; ?></p>
						    </div>
						</div>
					    </div>
					</div>
				    <?php endforeach; ?>
				</div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="profile">
				<div class="row shop-list">
                                    <!-- single-product start -->
                                    <!-- single-product start -->
				    <?php foreach($categories as $categoryName=>$category): ?>
					<div class="col-md-12">
					    <div class="single-product">
						<div class="product-img">
						    <a href="<?php echo $linksMaker->makeCategoryLink($categoryName); ?>">
							<img class="primary-img" src="<?php echo $linksMaker->makeCategoryImageLink($category); ?>" alt="" />
							<img class="secondary-img" src="<?php echo $linksMaker->makeCategoryImageLink($category); ?>" alt="" />
						    </a>
						</div>
						<div class="product-info">
						    <h3>
							<a href="<?php echo $linksMaker->makeCategoryLink($categoryName); ?>"><?php echo $categoryName; ?></a></h3>
						    <div class="product-desc">
							<p>
							    <?php echo $category->CategoryDescription; ?></p>
						    </div>
						</div>
					    </div>
					</div>
				    <?php endforeach; ?>
				</div>
                            </div>
			</div>
                    </div>
		</div>
	    <?php else: ?>
		<!-- shop-content start -->
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="shop-content">
			<!-- Nav tabs -->
			<ul class="shop-tab" role="tablist">
                            <li role="presentation" class="active">
				<a href="#home" aria-controls="home" role="tab"
				    data-toggle="tab"><i class="fa fa-th"></i></a>
			    </li>
                            <li role="presentation">
				<a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">
				    <i class="fa fa-list"></i></a>
			    </li>
			</ul>
			<!-- <div class="show-result">
                             <p>
			     Showing 1&ndash;12 of 19 results</p>
			     </div> -->
			<!-- Tab panes -->
			<div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="home">
				<div class="row">
                                    <!-- single-product start -->
				    <?php echo "" //"<pre>" . json_encode($families, JSON_PRETTY_PRINT) . "</pre>"; ?>
				    <?php foreach($families as $familyName=>$family): ?>
					<div class="col-lg-4 col-md-4 col-sm-4">
					    <div class="single-product">
						<div class="product-img">
						    <a href="<?php echo $linksMaker->makeFamilyLink($familyName); ?>">
							<img class="primary-img" src="<?php echo $linksMaker->makeFamilyImageLink($family); ?>" alt="" />
							<img class="secondary-img" src="<?php echo $linksMaker->makeFamilyImageLink($family); ?>" alt="" />
						    </a>
						</div>
						<div class="product-info">
						    <h3>
							<a href="<?php echo $linksMaker->makeFamilyLink($familyName); ?>"><?php echo $familyName; ?></a></h3>
						    <div class="product-desc">
							<p>
							    <?php echo $family->FamilyDescription; ?></p>
						    </div>
						</div>
					    </div>
					</div>
				    <?php endforeach; ?>
				</div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="profile">
				<div class="row shop-list">
                                    <!-- single-product start -->
                                    <div class="col-md-12">
					<?php foreach($families as $familyName=>$family): ?>
					    <div class="single-product">
						<div class="product-img">
						    <a href="<?php echo $linksMaker->makeFamilyLink($familyName); ?>">
							<img class="primary-img" src="<?php echo $linksMaker->makeFamilyImageLink($family); ?>" alt="" />
							<img class="secondary-img" src="<?php echo $linksMaker->makeFamilyImageLink($family); ?>" alt="" />
						    </a>
						</div>
						<div class="product-info">
						    <h3>
							<a href="<?php echo $linksMaker->makeFamilyLink($familyName); ?>"><?php echo $familyName; ?></a></h3>
						    <div class="product-desc">
							<p>
							    <?php echo $family->FamilyDescription; ?></p>
						    </div>
						</div>
					    </div>
					<?php endforeach; ?>
                                    </div>
				</div>
                            </div>
			</div>
                    </div>
                    <!-- <div class="shop-pagination">
			 <div class="pagination">
                         <ul>
			 <li class="active">1</li>
			 <li><a href="#">2</a></li>
			 <li><a href="#">3</a></li>
			 <li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
                         </ul>
			 </div>
			 </div> -->
		</div>
	    <?php endif; ?>
            <!-- shop-content end -->
        </div>
    </div>
</div>
