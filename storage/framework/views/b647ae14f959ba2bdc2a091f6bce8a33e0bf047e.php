

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>create categoury</title>
    <link rel="stylesheet" href="<?php echo e(asset('style/createCategoury.css')); ?>">
</head>
<body>

    <?php if($message = Session::get('message')): ?>
      <h3 style="color:rgb(0, 255, 76);"><?php echo e($message); ?></h3   >
    <?php endif; ?>
    <h3>Create Categoury</h3>

<div class="container">
    <form action=" <?php echo e(route('categoury.store')); ?> " method="post" enctype="multipart/form-data">
        
        <?php echo csrf_field(); ?>
        <label for="name">Categoury Name</label>
        <input type="text" id="name" name="name">
        <textarea  name="info" rows="4" cols="100">information de categoury </textarea>
        <span>select an image for categoury</span> <input type="file" name="img">
        <button type="submit" class="submit">create</button>
    </form>





    

</div>
</body>
</html>
<?php /**PATH /home/hakou/Desktop/work/back/sold/resources/views/categouryViews/create.blade.php ENDPATH**/ ?>