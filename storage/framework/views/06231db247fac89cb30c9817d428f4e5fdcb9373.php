<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo e(asset('style/globale.css')); ?>">
  <title>categoury</title>
</head>

<body>





    <div class="authbar">

        <?php if(auth()->guard()->guest()): ?>
        <?php if(Route::has('login')): ?>

                <a  href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>

        <?php endif; ?>

        <?php if(Route::has('register')): ?>

                <a href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>

        <?php endif; ?>
    <?php else: ?>

            <a  href="#" >
                <?php echo e(Auth::user()->name); ?>

            </a>

            <div >
                <a  href="<?php echo e(route('logout')); ?>"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    <?php echo e(__('Logout')); ?>

                </a>

                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                    <?php echo csrf_field(); ?>
                </form>
            </div>
        </li>
    <?php endif; ?>





 <?php if(Route::has('login')): ?>
        <?php if(auth()->guard()->check()): ?>
            <a href="<?php echo e(url('/home')); ?>" >Home</a>
        <?php else: ?>
            <a href="<?php echo e(route('login')); ?>" >Log in</a>

            <?php if(Route::has('register')): ?>
                <a href="<?php echo e(route('register')); ?>" >Register</a>
        <?php endif; ?>
            <a href="<?php echo e(route('logout')); ?>">
        <?php endif; ?>
      </div>


<?php endif; ?>
<header>

    <div class="navbar">
            <?php $__currentLoopData = $categouries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoury): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <a href="#<?php echo e($categoury->id); ?>"><?php echo e($categoury->name); ?> </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>







  </header>

  <main>



         <?php if($message = Session::get('message')): ?>

          <p style="color:rgb(55, 255, 81);"><?php echo e($message); ?></p>
        <?php endif; ?>
        <div class="categoury">
             
             <div class="btnSection">
                <button class="btn-green"> <a href="<?php echo e(route('categoury.create')); ?>" >add categoury</a></button>
                <button class="btn-green"> <a href="<?php echo e(route('product.create')); ?>" >add product</a></button>
             </div>
            <?php $__currentLoopData = $categouries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoury): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="categouryCounter" id="<?php echo e($categoury->id); ?>"> <span id="counter"> <?php echo e($categoury->name); ?> </span></div>

                    <button class="btn-red" id="deletBtn" onclick="document.getElementById('deletCategoury<?php echo e($categoury->id); ?>').style.display='block'">delete categoury</button>
                         
                         <div id="deletCategoury<?php echo e($categoury->id); ?>" class="modal">
                           
                           <span onclick="document.getElementById('deletCategoury<?php echo e($categoury->id); ?>').style.display='none'" class="close" title="Close Modal">&times;</span>
                           <form class="modal-content" action="<?php echo e(route('categoury.destroy' , $categoury->id)); ?>" method="post" enctype="multipart/form-data">
                              <?php echo method_field('DELETE'); ?>
                              <?php echo csrf_field(); ?>
                             <div class="container">
                               <h1>Delete Categoury </h1>
                               <p>Are you sure you want to delete this categoury?</p>

                               <div class="clearfix">
                                 <button type="button" class="cancelbtn" onclick="document.getElementById('deletCategoury<?php echo e($categoury->id); ?>').style.display='none'">Cancel</button>
                                 <button type="submit" class="deletebtn">Delete</button>
                               </div>
                             </div>
                           </form>
                         </div>
                        
                    <button class="btn-blue" id="editBtn" onclick="document.getElementById('editCategoury<?php echo e($categoury->id); ?>').style.display='block'">edit categoury</a></button>

                          
                          <div id="editCategoury<?php echo e($categoury->id); ?>" class="modal">
                            <span onclick="document.getElementById('editCategoury<?php echo e($categoury->id); ?>').style.display='none'" class="close" title="Close Modal">&times;</span>
                            <form class="modal-content" action="<?php echo e(route('categoury.update' , $categoury)); ?>" method="POST" enctype="multipart/form-data">
                               <?php echo method_field('PUT'); ?>
                               <?php echo csrf_field(); ?>
                                <div class="container">
                                    <img  id="inptImg" alt="none" src="<?php echo e(asset( $categoury->img)); ?>">
                                     <input type="file" name="img" accept="image/*">
                                    <input type="text" name="catgName" value="<?php echo e($categoury->name); ?>">
                                    <input type="text" name="CatgInfo" value="<?php echo e($categoury->info); ?>">
                                <div class="clearfix">
                                  <button type="button" class="cancelbtn" onclick="document.getElementById('editCategoury<?php echo e($categoury->id); ?>').style.display='none'">Cancel</button>
                                  <button type="submit" class="cancelbtn" style="background-color: rgb(40, 230, 72)" >Update</button>
                                </div>
                              </div>
                            </form>
                        </div>
                    <button class="btn-gray" id="showProductID"> <a href="<?php echo e(route('categoury.show' , $categoury->id)); ?> ">show this categoury</a></button>
                     

                    </div>
                </div>


            <table class="customers" id="cat1">
                <tr>
                  <th>prosuct img </th>
                  <th>prosuct name </th>
                  <th> Quantity</th>
                  <th>price </th>
                  <th>options</th>
                </tr>


                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($product->categoury_id == $categoury->id): ?>
                 <tr>
                         <td> <img src="<?php echo e(asset( $product->img)); ?>"> </td>
                         <td> <?php echo e($product->name); ?> </td>
                         <td><?php echo e($product->model); ?></td>
                         <td><?php echo e($product->price); ?> $</td>

                         <td>
                           <button class="btn-red" id="deletBtn" onclick="document.getElementById('id<?php echo e($product->id); ?>').style.display='block'">  delete</a></button>
                            
                            <div id="id<?php echo e($product->id); ?>" class="modal">
                              <span onclick="document.getElementById('id<?php echo e($product->id); ?>').style.display='none'" class="close" title="Close Modal">&times;</span>
                              <form class="modal-content" action="<?php echo e(route('product.destroy' , $product)); ?>" method="post">
                                 <?php echo method_field('DELETE'); ?>
                                 <?php echo csrf_field(); ?>
                                <div class="container">
                                  <h1>Delete Product</h1>
                                  <p>Are you sure you want to delete this product?</p>

                                  <div class="clearfix">
                                    <button type="button" class="cancelbtn" onclick="document.getElementById('id<?php echo e($product->id); ?>').style.display='none'">Cancel</button>
                                    <button type="submit" class="deletebtn">Delete</button>
                                  </div>
                                </div>
                              </form>
                            </div>
                              
                           <button class="btn-blue" id="editBtn" onclick="document.getElementById('edit<?php echo e($product->id); ?>').style.display='block'" >edit</button>
                               
                               <div id="edit<?php echo e($product->id); ?>" class="modal">
                                 <span onclick="document.getElementById('edit<?php echo e($product->id); ?>').style.display='none'" class="close" title="Close Modal">&times;</span>
                                 <form class="modal-content" action="<?php echo e(route('product.update' , $product->id)); ?>" method="POST" enctype="multipart/form-data">
                                    <?php echo method_field('PUT'); ?>
                                    <?php echo csrf_field(); ?>
                                   <div class="container">
                                     <img  id="inptImg" alt="none" src="<?php echo e(asset( $product->img)); ?>">
                                     <input type="file" name="img" accept="image/*">
                                     <input type="text" name="name" value="<?php echo e($product->name); ?>">
                                    <input type="text" name="model" value="<?php echo e($product->model); ?>">
                                    <p>price</p>
                                     <input type="number" name="price" value="<?php echo e($product->price); ?>">
                                     <p>rate </p>
                                     <input type="number" name="rate" value="<?php echo e($product->rate); ?>">
                                     <input type="text" name="shortInfo" value="<?php echo e($product->shortInfo); ?>">
                                     <input type="text" name="loungInfo" value="<?php echo e($product->loungInfo); ?>">

                                     <div class="clearfix">
                                       <button type="button" class="cancelbtn" onclick="document.getElementById('edit<?php echo e($product->id); ?>').style.display='none'">Cancel</button>
                                       <button type="submit" class="cancelbtn" style="background-color: rgb(40, 230, 72)" >Update</button>
                                     </div>
                                   </div>
                                 </form>
                             </div>
                                 
                           <button class="btn-gray" id="showProductID"> <a href="<?php echo e(route('product.show' , $product->id)); ?> ">show</a></button>
                          </td>
                         </tr>
                         <?php endif; ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>



    </body>

 </main>


<script src="<?php echo e(asset('script/globale.js')); ?>"></script>
</body>

</html>
<?php /**PATH /home/hakou/Desktop/work/back/sold/resources/views/productViews/index.blade.php ENDPATH**/ ?>