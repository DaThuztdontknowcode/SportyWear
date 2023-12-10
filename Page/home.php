<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

    <link rel="stylesheet" href="../css/homestyle.css">
    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</head>
<?php include 'navbar.php'; ?>   
<body>
<header>
    <div class="container-fluid p-0">
        <!-- Background image or slideshow here -->
        <div class="header-background" style="background-image: url('https://i.pinimg.com/564x/0a/c9/36/0ac936aa6080e1bff6205ef3e3ba6ef5.jpg');  ">
            <!-- Overlay with Opacity to darken the image for text visibility -->
            <div class="header-overlay" style="background: rgba(0, 0, 0, 0.5);">
                <div class="container text-center">
                    <div class="row">
                        <div class="col-md-7 col-sm-12 text-white">
                            <h6>YOUR SPORTING ADVENTURE BEGINS HERE</h6>
                            <h1>Welcome to SPORTWEAR</h1>
                            <p>Discover the latest sports gear and apparel to elevate your performance.</p>
                            <div class="view">
                                <button class="btn btn-light primary-btn px-5 py-2" onclick="scrollToSection('section-1')">Impressive Figures</button>
                                <button class="btn btn-light primary-btn px-5 py-2" onclick="scrollToSection('section-3')">Another Section</button>
                                <button class="btn btn-light primary-btn px-5 py-2" onclick="redirectToPro()">SHOPPING NOW</button>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-12">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

    <main>
    <section id="section-1" class="section-1">
    <div class="container text-center">
        <div class="row">
            <div class="col-md-6 col-12 fade-in">
                <div>
                <div class="image-container">
                     <img src="https://i.pinimg.com/564x/63/4e/e3/634ee34e5e9f0b27a2716e39c86a270b.jpg" width="100%" alt="Athletic Wear" class="zoom-image">
                </div>

                </div>
            </div>
            <div class="col-md-6 col-12 fade-in">
                <div class="panel">
                <h2>Step Into Style with Our Athletic Footwear Collection</h2>
            <p class="pt-4">Discover top picks for athletic footwear. Elevate your performance and style with our premium collection designed for comfort and durability.</p>
            <p>Feel the difference with SportyWear's quality and fashion-forward designs!</p>
            <div class="text-center">
            <button class="btn btn-custom" onclick="redirectToPage1()">Get your shoes</button>
            </div>
        </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6 col-12">
                <div>
                    <div class="image-container">
                        <img src="https://i.pinimg.com/564x/09/a4/b4/09a4b46aa5970c736adcf5eeff5948b9.jpg" width="100%" alt="Sporty Footwear" class="zoom-image">
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="panel">
                        <h2>Step Into Style with Our Sporty Apparel Collection</h2>
                <p class="pt-4">We recommend our latest apparel collection. From performance-enhancing activewear to casual sporty outfits, discover the perfect fit for your active lifestyle.</p>
                <p>Experience the fusion of comfort and fashion!</p>
                <div class="text-center">
            <button class="btn btn-custom" onclick="redirectToPage2()">Get your shirt</button>
            <button class="btn btn-custom" onclick="redirectToPage5()">Get your tight</button>
            </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6 col-12">
                <div>
                    <div class="image-container">
                        <img src="https://i.pinimg.com/564x/51/f8/41/51f84171881159c0ba4fb23dcb9d5f32.jpg" width="100%" alt="Sport Accessories" class="zoom-image">
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="panel">
                <h2>Elevate Your Game with Sport Accessories</h2>
        <p class="pt-4">Complete your sports gear collection with accessories recommended by SportyWear. From high-performance gloves and stylish headbands to sleek water bottles and more, we've got you covered.</p>
        <p>Enhance your performance with the right accessories!</p>
        <div class="text-center">
            <button class="btn btn-custom" onclick="redirectToPage14()">Don't fogive your Accessories</button>
            </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- <section id="section-2" class="section-2 container-fluid p-0">
    <div class="cover">
        <div class="content text-center">
            <h1>Discover What Sets Us Apart</h1>
            <p>Explore the unique features that make our sports gear stand out. Immerse yourself in quality and innovation for an unparalleled athletic experience.</p>
        </div>
    </div>

    <div class="container-fluid text-center">
    <div class="d-flex flex-wrap justify-content-center numbers">
        <div class="rect">
            <h1>5000</h1>
            <p>Happy Athletes Served</p>
        </div>
        <div class="rect">
            <h1>8000</h1>
            <p>Cups of Coffee Boosting Energy</p>
        </div>
        <div class="rect">
            <h1>1200</h1>
            <p>Exciting Sports Events Supported</p>
        </div>
        <div class="rect">
            <h1>1000</h1>
            <p>Quality Sports Products Delivered</p>
        </div>
    </div>
</div> 
</section> -->
<section id="section-2" class="container my-5">
    <div class="row">
        <!-- Category 1 -->
        <div class="col-md-4">
            <div class="card">
                <img class="card-img-top" src="https://i.pinimg.com/564x/4c/9a/b8/4c9ab8c37b93ef118defe2b2616a2ba8.jpg" alt="Basketball Gear">
                <div class="card-body">
                    <h5 class="card-title">Nike Basketball</h5>
                    <p class="card-text">Styles made for your game.</p>
                    <a href="#" class="btn btn-primary">Shop</a>
                </div>
            </div>
        </div>

        <!-- Category 2 -->
        <div class="col-md-4">
            <div class="card">
                <img class="card-img-top" src="https://i.pinimg.com/564x/3a/03/0a/3a030af410f6f69468a05e2e37af11d1.jpg" alt="Golf Gear">
                <div class="card-body">
                    <h5 class="card-title">Nike Golf</h5>
                    <p class="card-text">Conquer any course in style.</p>
                    <a href="product_detail.php?product_id=85" class="btn btn-primary">Shop</a>
                </div>
            </div>
        </div>

        <!-- Category 3 -->
        <div class="col-md-4">
            <div class="card">
                <img class="card-img-top" src="https://i.pinimg.com/564x/80/c6/c0/80c6c03fa3e1d11760e3559dbd5b8b74.jpg" alt="Trail Gear">
                <div class="card-body">
                    <h5 class="card-title">Nike Trail</h5>
                    <p class="card-text">Gear that leads to wild places.</p>
                    <a href="#" class="btn btn-primary">Shop</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Thêm sau section-2 -->
<section id="section-3" class="section-3 container-fluid p-0">
    <div class="section-title">
        <h2>Lebron Collection</h2>
    </div>
    <div class="image-row">
        <div class="image-column">
            <img src="https://i.pinimg.com/564x/ec/2e/34/ec2e34586df8da3b918f9ef882e890ff.jpg" alt="Image 1">
            <button class="explore-btn">Explore Now</button>
            <img id="follow-img" src="https://images.footballfanatics.com/nike-white-nba-headband_pi2694000_ff_2694897_full.jpg?_hv=2" alt="Follow Image" style="display: none; position: absolute;heigh: 300px;width:300px;border-radius: 5px;z-index: 999;"/>
        </div>
        
        <div class="image-column">
            <img src="https://i.pinimg.com/564x/b1/c9/b1/b1c9b11586ded034794cf2a7f6e86f0f.jpg" alt="Image 2">
            <button class="explore-btn" onclick="redirectToProduct44()">Explore Now</button>
            <img id="follow-img2" src="https://images.puma.com/image/upload/f_auto,q_auto,b_rgb:fafafa,w_2000,h_2000/global/539492/01/mod01/fnd/PNA/fmt/png/PUMA-x-TMC-Everyday-Hussle-Men's-Sweatshorts" alt="Follow Image" style="display: none; position: absolute;heigh: 300px;width:300px;border-radius: 5px;z-index: 999;"/>
        </div>

        <div class="image-column">
            <img src="https://i.pinimg.com/564x/93/c7/bd/93c7bd60a0941c5a68591b6d74788cc7.jpg" alt="Image 3">
            <button class="explore-btn">Explore Now</button>
            <img id="follow-img3" src="https://images.footballfanatics.com/nike-white-nba-headband_pi2694000_ff_2694897_full.jpg?_hv=2" alt="Follow Image" style="display: none; position: absolute;heigh: 300px;width:300px;border-radius: 5px;z-index: 999;"/>
        </div>

        <div class="image-column">
            <img src="https://i.pinimg.com/564x/c0/b2/02/c0b202cd2463bff530fdb3d091c5e4e1.jpg" alt="Image 4">
            <button class="explore-btn">Explore Now</button>
            <img id="follow-img4" src="https://images.footballfanatics.com/nike-white-nba-headband_pi2694000_ff_2694897_full.jpg?_hv=2" alt="Follow Image" style="display: none; position: absolute;heigh: 300px;width:300px;border-radius: 5px;z-index: 999;"/>
        </div>
    </div>
</section>

<section class="section-4">
    <div class="container text-center">
    <h1 style="font-weight: bold;">Celebrities Who Love Our Products</h1>
    <h5 style="font-weight: 400;">See what famous personalities have to say about us</p>
    </div>
    <div class="team row">
        <div class="col-md-4 col-12 text-center hidden">
            <div class="card mr-2 d-inline-block p-4 shadow-lg animate-element">
                <div class="card-img-top">
                    <img src="https://kenh14cdn.com/203336854389633024/2022/6/13/photo-1-1655079616626774867903.jpg" class="img-fluid p-4 border-radius">
                </div>
                <div class="card-body">
                    <h3 class="card-title">Minh Tu</h3>
                    <p class="card-text">
                        "I absolutely love the products from this brand. They are not only stylish but also comfortable."
                    </p>
                    <a href="product_detail.php?product_id=10" class="text-secondary text-decoration-none">
                        See More
                    </a>
                    <p class="text-secondary">SUPER MODEL</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-12 text-center hidden">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="card mr-2 d-inline-block p-4 shadow-lg ">
                            <div class="card-img-top">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/f/fe/Son_Tung_M-TP_1_%282017%29.png"
                                    class="img-fluid p-4 border-radius">
                            </div>
                            <div class="card-body">
                                <h3 class="card-title">Son Tung MTP</h3>
                                <p class="card-text">
                                    "I've been a fan of these products for years. inner consistensy.Quality and style - they have it all."
                                </p>
                                <a href="product_detail.php?product_id=13" class="text-secondary text-decoration-none">
                                    See More
                                </a>
                                <p class="text-secondary">SINGER</p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="card mr-2 d-inline-block p-4 shadow-lg">
                            <div class="card-img-top">
                                <img src="https://bizweb.dktcdn.net/100/345/548/products/2cv19007-s32-2bt19008-s32-2cg19013-s32-0af32867-9d2f-4552-8a2a-24eba659a398.jpg?v=1633752733017"
                                    class="img-fluid w-50 p-4 border-radius ">
                            </div>
                            <div class="card-body">
                                <h3 class="card-title">Doan Van Hau</h3>
                                <p class="card-text">
                                    "I can't get enough of these products. negative space collage.They are a must-have in my wardrobe."
                                </p>
                                <a href="#" class="text-secondary text-decoration-none">
                                    See More
                                </a>
                                <p class="text-secondary">Baller</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-12 text-center">
            <div class="card mr-2 d-inline-block shadow-lg">
                <div class="card-img-top">
                    <img src="https://images2.thanhnien.vn/thumb_w/686/528068263637045248/2023/7/13/b-ray-16892538684861219039644-0-106-792-700-crop-16892541975471605791359.jpg"
                        class="img-fluid p-4 border-radius">
                </div>
                <div class="card-body">
                    <h3 class="card-title">BRAY</h3>
                    <p class="card-text">
                        "I've been a loyal customer of this brand for years. negative space collage movement. .Their products are top-notch."
                    </p>
                    <a href="product_detail.php?product_id=56" class="text-secondary text-decoration-none">
                        See More
                    </a>
                    <p class="text-secondary">RAPPER</p>
                </div>
            </div>
        </div>
    </div>
</section>
    <button id="scrollToTopBtn">&#8679;</button>
</main>
<script src="../Control/home.js"></script>
    </body>
    <?php include 'footer.php'; ?>   
</html>