<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>create</title>
    <link rel="stylesheet" href="<?php echo e(asset('style/createCategoury.css')); ?>">
</head>
<body>

    <?php if($message = Session::get('message')): ?>

    <h3 style="color:rgb(0, 255, 13);"><?php echo e($message); ?></h3>
    <?php endif; ?>

<div class="container">

    <form action=" <?php echo e(route('product.store' )); ?> " method="POST" enctype="multipart/form-data">
        
        <?php echo csrf_field(); ?>
        <input type="text" placeholder="product name" name="name">
        <input type="number" placeholder="product price" name="price">
        <textarea  name="shortInfo" rows="2" cols="100">product short informations</textarea>
        <textarea  name="loungInfo" rows="5" cols="100">more informations about the product</textarea>
        <input type="text" placeholder="product model" name="model">
        <input type="file" name="img" accept="image/*">
        <select name="categoury_id" id="categoury_id">
            <option >select a categoury</option>
            <?php $__currentLoopData = $categouries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoury): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($categoury->id); ?>"><?php echo e($categoury->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <button type="submit">Create</button>

    </form>
</div>
</body>
</html>
<?php /**PATH /home/hakou/Desktop/work/back/sold/resources/views/productViews/createProduct.blade.php ENDPATH**/ ?>