<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> home </title>

      <!-- add icon link -->
      
      <link rel = "icon" href =
      "https://media.geeksforgeeks.org/wp-content/cdn-uploads/gfg_200X200.png"
              type = "image/x-icon">
    <!-- css links -->
    <link rel="stylesheet" href="<?php echo e(asset('style/style.css')); ?>">


    <!-- fontawesome links -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <!-- <script src="js/script.js"></script> -->


</head>
<body>



    
    <header class="header" >


        
        <div class="authBare">
            <?php if(Route::has('login')): ?>
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                <?php if(auth()->guard()->check()): ?>
                    <a href="<?php echo e(url('/home')); ?>" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                <?php else: ?>
                    <a href="<?php echo e(route('login')); ?>" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                    <?php if(Route::has('register')): ?>
                        <a href="<?php echo e(route('register')); ?>" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        </div>

        
        <!-- top bare start -->
            <div class="topBare">
                <div class="infoLinks">
                    <a href="#">About</a>
                    <a href="#">Contects</a>
                    <a href="#">Help</a>
                </div>



        <!-- top bare   start -->



        <!-- secand bare  start-->

            <div class="secandBare">
                <div class="appName">
                    <a href="">
                        <span class="partOne">Sold</span>
                        <span class="partTow">Shoop</span>
                    </a>

                </div>
                <div class="search">
                <input type="text" class="searchInpt">
                <button class="searchBtn"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
                <div class="customerServe">
                    <div class="customerTxt">Customer Serices</div>
                    <div class="customerNbr">0420059648</div>
                </div>
            </div>

        <!-- secand bare  End-->

        <!-- Nav bar Start-->
            <div class="navBare">

                <div class="categouryList"  onclick="showList()" >
                    <div class="categoury">
                    <i class="fa-sharp fa-solid fa-bars"></i>categoury

                    </div>
                    <i class="fa fa-angle-down text-dark" id="listDown"></i>

                </div>

                <div class="cartSection">
                    <a href="##">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span class="cartNbr"> 2 </span>
                    </a>
                </div>
                <div class="appName">
                    <a href="">
                        <span class="partOne">sold</span>
                        <span class="partTow">shoop</span>
                    </a>

                </div>



                <div class="baresCheck" onclick=" showList()">
                    <i class="fa-sharp fa-solid fa-bars"></i>
                </div>
            </div>




            <div class="dropdownList" id="dropdownList">

                <ul class="list">
                    <?php $__currentLoopData = $categouries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoury): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="elemnt"><a href="#<?php echo e($categoury->id); ?>"> <?php echo e($categoury->name); ?> </a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </ul>
            </div>




        <!-- Nav bar End-->

    </header>




    <main class="main">

           <!-- /* START slider image  */ -->

        <div class="pub">
            <div class="slideshow-container">
                                <!-- Full-width images with number and caption text -->
                <div class="mySlides fade" id="mySlides">
                    <a href="#">
                        <img src="images/img1.jpeg" style="width:100%">
                    </a>
                </div>
                <div class="mySlides fade" id="mySlides">
                    <a href="#">
                        <img src="images/img2.jpeg" style="width:100%">
                    </a>

                  </div>
                  <div class="mySlides fade" id="mySlides">
                    <a href="#">
                        <img src="images/img3.jpeg" style="width:100%">
                    </a>
                </div>
                              <!-- slider icons -->
                            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                            <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
        </div>

    <!-- /* END slider image  */ -->


    <!-- website options  start -->
        <div class="options">
            <div class="opt">
                <div class="optIcon">
                    <i class="fa-solid fa-check"></i>

                </div>
                <div class="optTxt">
                    Quality Product
                </div>
            </div>

            <div class="opt">
                <div class="optIcon">
                    <i class="fa-sharp fa-solid fa-sack-dollar"></i>
                </div>
                <div class="optTxt">
                    Cash Back
                </div>
            </div>

            <div class="opt">
                <div class="optIcon">
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>
                <div class="optTxt">
                    Free Shopping
                </div>
            </div>

            <div class="opt">
                <div class="optIcon">
                    <i class="fa-solid fa-phone-volume"></i>
                </div>
                <div class="optTxt">
                    27 / 7 Support
                </div>
            </div>
        </div>
    <!-- website options  end -->



    <!-- product section start  -->



    <?php $__currentLoopData = $categouries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoury): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    
        <div class="categouries">

            <div class="catgTitle"> <?php echo e($categoury->name); ?></div>
            <div class="productSection">

                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <a href="<?php echo e(route('product.show' , $product->id)); ?>">
                <div class="product">
                    <img src="<?php echo e($product->img); ?>" alt="none">
                     <div class="script">
                         <p><?php echo e($product->name); ?></p>
                         <p><?php echo e($product->price); ?></p>
                         <p><?php echo e($product->shortInfo); ?></p>
                         <p><?php echo e($product->model); ?></p>
                         <p>
                            <?php for($i =  0; $i > $product->rate; $i--): ?>
                            <i class="fa-solid fa-star"></i>
                            <?php endfor; ?>
                        </p>
                     </div>
                </div>
                </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


    <!-- product section end  -->

    </main>


    <footer class="footer">

        hello this is my footer i 'm 3abdou
        i devlloped this website like a test
        for me
        after 3 years of cadding in html css js php laravel

    </footer>

    <!-- javaScript folders -->
    <script src="<?php echo e(asset('script/script.js')); ?>"></script>

</body>
</html>
<?php /**PATH /home/hakou/Desktop/work/back/sold/resources/views/client/indexClient.blade.php ENDPATH**/ ?>