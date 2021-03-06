<!-- header-bottom-area end -->
<!-- main-menu-area start -->
<div class="main-menu-area hidden-xs">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="main-menu">
                    <nav>
                        <ul id="desktopMenu">
                            <!--                             <li><a href="#/?page=index&action=store" about"><?php echo $translation->translateLabel("Store"); ?></a></li> -->
                            
                            <li><a href="#/?page=forms&action=products"><?php echo $translation->translateLabel("Products"); ?></a>
                                <?php if($scope["config"]["software"] == "Cart"): ?>
                                    <ul id="productsFamilies">
                                    </ul>
                                <?php endif; ?>
                            </li>
                            <!-- <li><a href="#/?page=forms&action=search"><?php echo $translation->translateLabel("Search"); ?></a>
                                 </li> -->
                            <li><a href="#/?page=forms&action=shoppingcart"><?php echo $translation->translateLabel("My Cart"); ?></a>
                            </li>
                            <?php if($cartSettings->Support): ?>
                                <li><a href="#/?page=forms&action=loadcontent&content=Support"><?php echo $translation->translateLabel("Support"); ?></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>            
<!-- main-menu-area end -->
<!-- mobile-menu-area start -->
<div class="mobile-menu-area visible-xs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mobile-menu">
                    <nav id="dropdown">
                        <ul id="mobileMenu">
                        </ul>
                    </nav>
                </div>     
            </div>
        </div>
    </div>
</div>
<!-- mobile-menu-area end -->   
